<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>

    <!-- add new post modal window start -->
    <div class="modal fade" id="add_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data" id="add_post_form" novalidate>
                    <div class="modal-body p-5">
                        <div class="mb-3">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" required>
                            <div class="invalid-feedback">Post title is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="category">Post Category</label>
                            <input type="text" name="category" class="form-control" placeholder="Category" required>
                            <div class="invalid-feedback">Post category is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="body">Post Body</label>
                            <textarea name="body" class="form-control" rows="4" placeholder="Body" required></textarea>
                            <div class="invalid-feedback">Post body is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="file">Post Image</label>
                            <input type="file" name="file" id="image" class="form-control" required>
                            <div class="invalid-feedback">Post image is required</div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_post_btn">Add Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- add new post modal window end -->

    <!-- edit post modal window start -->
    <div class="modal fade" id="edit_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data" id="edit_post_form" novalidate>
                    <input type="hidden" name="id" id="pid">
                    <input type="hidden" name="old_image" id="old_image">
                    <div class="modal-body p-5">
                        <div class="mb-3">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                            <div class="invalid-feedback">Post title is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="category">Post Category</label>
                            <input type="text" name="category" id="category" class="form-control" placeholder="Category" required>
                            <div class="invalid-feedback">Post category is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="body">Post Body</label>
                            <textarea name="body" class="form-control" id="body" rows="4" placeholder="Body" required></textarea>
                            <div class="invalid-feedback">Post body is required</div>
                        </div>
                        <div class="mb-3">
                            <label for="file">Post Image</label>
                            <input type="file" name="file" class="form-control">
                            <div class="invalid-feedback">Post image is required</div>
                            <div id="post_image"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit_post_btn">Update Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- edit post modal window end -->

    <!-- delete post modal window start -->
    <div class="modal fade" id="delete_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" enctype="multipart/form-data" id="delete_post_form" novalidate>
                        <input type="hidden" name="id" id="del_pid">
                        <div class="text-secondary fw-bold fs-3"> Are you sure you wanna delete this? </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="delete_post_btn">!!!Delete Post</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete post modal window end -->

    <!-- full post modal window start -->
    <div class="modal fade" id="detail_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" id="detail_post_image" class="img-fluid">
                    <h3 id="detail_post_title" class="mt-3"></h3>
                    <h5 id="detail_post_category"></h5>
                    <p id="detail_post_body"></p>
                    <p id="detail_post_created_at" class="fst-italic"></p>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>
    <!-- full post modal window end -->


    <div class="container">
        <div class="row md-4">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="text-secondary fw-bold fs-3"> All Posts </div>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add_post_modal">Add New Post</button>
                    </div>
                    <div class="card p-5">
                        <div class="row align-items-center" id="show_posts">
                            <!-- Structure of card layout is inside PostController::fetchAll -->
                            <h1 class="text-secondary text-center my-5"> Posts Loading... </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $(function() {
                // new ajax request for adding post
                $("#add_post_form").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    if (!this.checkValidity()) {
                        e.preventDefault();
                        $(this).addClass('was-validated');
                    } else {
                        $("#add_post_btn").text("Adding...");
                        $.ajax({
                            url: '<?= base_url('post/add') ?>',
                            method: 'post',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function(resp) {
                                if (resp.error) {
                                    $("#file").addClass('is-invalid');
                                    $('#file').next().text(response.message.file)
                                } else {
                                    $('#add_post_modal').modal('hide');
                                    $('#add_post_form')[0].reset();
                                    $('#add_post_btn').text('Add Post');
                                    $('#add_post_form').removeClass('was-validated')
                                    $('#file').removeClass('is-invalid');
                                    $('#file').next().text('');
                                }
                                fetchAllPosts();
                            }
                        })
                    }
                });

                // edit post ajax req
                $(document).delegate('.post_edit_btn', 'click', function(e) {
                    e.preventDefault();
                    const id = $(this).attr('id');
                    $.ajax({
                        url: '<?= base_url('post/edit/') ?>/' + id,
                        method: "get",
                        success: function(resp) {
                            //Filling the edit fields for user to change
                            $('#pid').val(resp.message.id);
                            $('#old_image').val(resp.message.image);
                            $('#title').val(resp.message.title);
                            $('#category').val(resp.message.category);
                            $('#body').val(resp.message.body);
                            $("#post_image").html('<img src="<?= base_url('uploads/headlines') ?>/' + resp.message.image + '" class="img-fluid mt-2 img-thumbnail" width="200">');
                        }
                    });
                });

                //edit post form submit
                $("#edit_post_form").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    if (!this.checkValidity()) {
                        e.preventDefault();
                        $(this).addClass('was-validated');
                    } else {
                        $("#edit_post_btn").text("Updating...");
                        $.ajax({
                            url: '<?= base_url('post/update') ?>',
                            method: 'post',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function(resp) {
                                $('#edit_post_modal').modal('hide');
                                $('#edit_post_btn').text('Update Post');
                                fetchAllPosts();
                            }
                        })
                    }
                });

                // Delete post ajax request
                $(document).delegate('.post_delete_btn', 'click', function(e) {
                    e.preventDefault();
                    const id = $(this).attr('id');
                    $('#del_pid').val(id);
                });
                // Delete post form submit
                $("#delete_post_form").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    $("#delete_post_btn").text("Deleting...");
                    console.log(formData);
                    $.ajax({
                        url: '<?= base_url('post/delete') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(resp) {
                            $('#delete_post_modal').modal('hide');
                            $('#delete_post_btn').text('Delete post');
                            fetchAllPosts();
                        }
                    })
                });

                //get all posts to display
                fetchAllPosts();

                function fetchAllPosts() {
                    $.ajax({
                        url: '<?= base_url('post/fetch') ?>',
                        method: 'get',
                        success: function(resp) {
                            $("#show_posts").html(resp.message);
                        }
                    })
                }

                $(document).delegate('.post_detail_btn', 'click', function(e) {
                    e.preventDefault();
                    const id = $(this).attr('id');
                    $.ajax({
                        url: '<?= base_url('post/detail/') ?>/' + id,
                        method: "get",
                        dataType: 'json',
                        success: function(resp) {
                            console.log(resp);
                            $("#detail_post_image").attr('src', '<?= base_url('uploads/headlines/') ?>/' + resp.message.image);
                            $("#detail_post_title").text(resp.message.title);
                            $("#detail_post_category").text(resp.message.category);
                            $("#detail_post_body").text(resp.message.body);
                            $("#detail_post_created_at").text(resp.message.created_at);


                        }
                    })
                });
            });
        </script>
</body>

</html>