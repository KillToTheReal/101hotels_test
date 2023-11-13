<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
	public function index()
	{
		return view('index');
	}

	public function fetchAll()
	{
		$postModel = new \App\Models\Post();
		$posts = $postModel->findAll();
		$data = '';

		if ($posts) {
			foreach ($posts as $post) {
				$data .= '<div class="col-4">
							<div class="card shadow">
								<a href="#" id="' . $post['id'] . '" data-bs-toggle="modal" data-bs-target="#detail_post_modal" class="post_detail_btn text-decoration-none text-black">  <!-- Clickable modal zone start --!>
									<img src="uploads/headlines/' . $post['image'] . '"  alt="Post Headline" class="img-fluid card-img-top"> 
							</div>
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center">
									<div class="card-title fs-5 fw-bold"> ' . $post['title'] . ' </div>
									<div class="badge bg-dark">' . $post['category'] . '</div>
								</div>
								<div class=" card-text">' . substr($post['body'], 0, 80) . '...
								</div>
							</div>
								</a> <!-- Clickable modal zone end --!>
							<div class="card-footer d-flex justify-content-between align-items-center">
								<div class="fst-italic">' . date('d F Y', strtotime($post['created_at'])) . '</div>
								<div>
									<a href="#" id="' . $post['id'] . '" data-bs-toggle="modal" data-bs-target="#edit_post_modal" class="btn btn-success btn-sm post_edit_btn"> Edit</a>
									<a href="#" id="' . $post['id'] . '" data-bs-toggle="modal" data-bs-target="#delete_post_modal" class="btn btn-danger btn-sm post_delete_btn"> Delete</a>
								</div>
							</div>
						</div>';
			}
			return $this->response->setJSON([
				'error' => false,
				'message' => $data,
			]);
		} else {
			return $this->response->setJSON([
				'error' => false,
				'message' => '<div class="text-center text-secondary fw-bold my-5"> No posts available! </div>',
			]);
		}
	}

	// handle add post ajax request
	public function create()
	{
		$file = $this->request->getFile('file');
		$filename = $file->getRandomName();
		$data = [
			'title' => $this->request->getPost('title'),
			'category' => $this->request->getPost('category'),
			'body' => $this->request->getPost('body'),
			'image' => $filename,
			'created_at' => date('Y-m-d H:i:s')
		];

		$validation = \Config\Services::validation();
		//Rules = Uploaded | Max size 9mb | is_image | Type in: JPG, JPEG, PNG
		$validation->setRules([
			'image' => 'uploaded[file]|max_size[file,5200]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]'
		]);
		if (!$validation->withRequest($this->request)->run()) {
			return $this->response->setJSON([
				'error' => true,
				'message' => $validation->getErrors()
			]);
		} else {
			$file->move('uploads/headlines', $filename);
			$postModel = new \App\Models\Post();
			$postModel->save($data);
			return $this->response->setJSON([
				'error' => false,
				'message' => 'Successfully added new post!',
			]);
		}
	}
	// returns data to edit in form at edit request
	public function edit($id = null)
	{
		$postModel = new \App\Models\Post();
		$post = $postModel->find($id);

		return $this->response->setJSON([
			'error' => false,
			'message' => $post,
		]);
	}
	// handle change post data ajax request
	public function update()
	{
		$id = $this->request->getPost('id');
		$file = $this->request->getFile('file');
		$fileName = $file->getFileName();
		if ($fileName != '') {
			// Add new file if given so
			$fileName = $file->getRandomName();
			$file->move('uploads/headlines', $fileName);
			if ($this->request->getPost('old_image') != '') {
				//Deleting old file if existed
				unlink('uploads/headlines/' . $this->request->getPost('old_image'));
			}
		} else {
			$fileName = $this->request->getPost('old_image');
		}

		$data = [
			'title' => $this->request->getPost('title'),
			'category' => $this->request->getPost('category'),
			'body' => $this->request->getPost('body'),
			'image' => $fileName,
			'updated_at' => date('Y-m-d H:i:s')
		];

		$postModel = new \App\Models\Post();
		$post = $postModel->update($id, $data);
		return $this->response->setJSON([
			'error' => false,
			'message' => 'Successfully updated post!',
		]);
	}

	public function delete()
	{
		$id = $this->request->getPost('id');
		$postModel = new \App\Models\Post();
		$post = $postModel->find($id);
		unlink('uploads/headlines/' . $post['image']);
		$postModel->delete($id);

		return $this->response->setJSON([
			'error' => false,
			'message' => 'Successfully deleted post!',
		]);
	}

	public function detail($id = null)
	{
		$postModel = new \App\Models\Post();
		$post = $postModel->find($id);
		$post['created_at'] = date('d F Y', strtotime($post['created_at']));
		return $this->response->setJSON([
			'error' => false,
			'message' => $post,
		]);
	}
}
