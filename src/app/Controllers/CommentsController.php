<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CommentsController extends BaseController
{
	public function index()
	{
		//
	}


	public function create()
	{
		$data = [
			'name' => $this->request->getPost('name'),
			'date' => $this->request->getPost('date'),
			'text' => $this->request->getPost('text'),
			'post_id' => $this->request->getPost('post_id'),
		];

		$validation = \Config\Services::validation();
		$validation->setRules([
			'name' => 'valid_email',
		]);

		if (!$validation->withRequest($this->request)->run()) {
			return $this->response->setJSON([
				'error' => true,
				'message' => $validation->getErrors()
			]);
		} else {
			$commentModel = new \App\Models\Comment();
			$commentModel->save($data);

			return $this->response->setJSON([
				'error' => false,
				'message' => 'Successfully added new post!',
			]);
		}
	}


	public function fetch($id = 1, $field = 'id', $order = 'ASC', $page = 1)
	{
		// $commentModel = new \App\Models\Comment();
		// $comments = $commentModel->where('post_id', $id)->get();
		$COMMS_PER_PAGE = 3;
		$db = \Config\Database::connect();


		$pagesAmountQuery = $db->query('SELECT count(*) FROM comments WHERE post_id =' . $id);
		$pagesAmountQuery = $pagesAmountQuery->getResult('array');
		$pagesAmount = ceil($pagesAmountQuery[0]['count(*)'] / $COMMS_PER_PAGE);
		$offset = ($page - 1) * 3;
		$pagination = '<nav aria-label="Page navigation example">
							<ul class="pagination">';

		for ($i = 1; $i <= $pagesAmount; $i++) {
			$isActive = $i == $page ? "active" : '';
			$pagination .= ' <li id="pagination_item" value="' . $i . '" class="page-item ' . $isActive . '"><a class="page-link" href="#">' . $i . '</a></li>';
		}
		$pagination .= '	</ul>
					   </nav>';


		$query   = $db->query('SELECT * FROM comments WHERE post_id =' . $id . ' ORDER BY ' . $field . ' ' . $order . ' LIMIT ' . $COMMS_PER_PAGE . ' OFFSET ' . $offset);
		$results = $query->getResult('array');
		$commentData = '';
		if (sizeof($results) > 0) {
			foreach ($results as $comment) {
				$commentData .= '<div class="col-8 my-2">
									<div class="card shadow d-flex ">
										<div class="card-header d-flex justify-content-between align-items-center">
											<h6> ' . $comment['name'] . '</h6>
											<div class="fst-italic"> ' . date('d F Y', strtotime($comment['date'])) . '</div>
											<button id="delete_comm_btn" class="btn btn-danger" value="' . $comment['id'] . '"> <image height="25" src="uploads/icons8-trash-64.png"> </button>
										</div>
										<div class="card-body text-start">
											' . $comment['text'] . '
										</div>
									</div>
								</div>';
			}


			return $this->response->setJSON([
				'error' => false,
				'message' => $commentData,
				'pagination' => $pagination,
			]);
		} else {
			return $this->response->setJSON([
				'error' => false,
				'message' => '<h4>No comments here. Leave first one! <h4>',
				'pagination' => false,
			]);
		}
	}

	public function delete($id = null)
	{
		$commentModel = new \App\Models\Comment();
		$commentModel->delete($id);
		return $this->response->setJSON([
			'error' => false,
			'message' => 'Successfully deleted comment!',
		]);
	}
}
