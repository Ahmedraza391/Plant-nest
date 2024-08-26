<?php
session_start();
include("./components/top.php")
?>
<?php
if (!isset($_SESSION['admin_login'])) {
    echo "<script>window.location.href='login.php'</script>";
}
?>
<div class="container">
    <div class="row mb-3 card p-2">
        <div class="col-md-12">
            <div class="heading">
                <h2 class="text-center m-2 text-success fw-bold">Users</h2>
            </div>
        </div>
    </div>
    <div class="row mb-3 card p-2">
        <div class="col-md-10 m-auto">
            <div class="overflow_table ">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="user_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row card p-3">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <button class="btn btn-success btn_sm" data-bs-toggle="modal" data-bs-target="#add_user_modal">Add Users</button>
        </div>
        <div class="col-md-8"></div>
    </div>
    <!-- // Add User Modal // -->
    <div class="modal fade" id="add_user_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="add_user_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_user_modalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_user_form" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="" required>
                            <label for="user_name">User's Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="" required>
                            <label for="user_email">User's Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="" required>
                            <label for="user_password">User's Password</label>
                        </div>
                        <div class="card border mb-3 p-3 rounded">
                            <label for="user_image" class="form-label">Upload User Image</label>
                            <input type="file" class="form-control" id="user_image" name="user_image" required>
                            <small class="mt-2">Select Only Png,Jpg,Jpeg File.</small>
                        </div>
                        <button class="btn btn_sm btn-success">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn_sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- // View User Modal // -->
    <div class="modal fade" id="view_user_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="view_user_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="view_user_modalLabel">View User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container row">
                        <div class="col-md-12">
                            <div class="card p-3 shadow">
                                <div class="image mb-3">
                                    <img src="" id="view_user_image" class="img-fluid " alt="User Image" style="border-radius:10px !important; width: 100%; height: 400px;object-fit:cover;">
                                </div>
                                <h5 class="mb-3">Usre's ID : #<span id="view_user_id"></span></h5>
                                <h5 class="mb-3">Usre's Name : <span id="view_user_name"></span></h5>
                                <h5 class="mb-3">Usre's Email : <span id="view_user_email"></span></h5>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn_sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- // Edit User Modal // -->
    <div class="modal fade" id="edit_user_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="edit_user_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_user_modalLabel">Edit Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_user_image_form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="edit_user_id_image_form" id="edit_user_id_image_form">
                        <input type="hidden" name="edit_user_email_image" id="edit_user_email_image">
                        <div class="image mb-3">
                            <img src="" alt="User Image" id="show_user_image" class="img-fluid rounded" style="width: 100%;height:400px;object-fit:cover;background-position: top;">
                        </div>
                        <div class="card border mb-3 p-3 rounded">
                            <label for="edit_user_image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="edit_user_image" name="edit_user_image" required>
                            <small class="mt-2">Select Only Png,Jpg,Jpeg File.</small>
                        </div>
                        <button class="btn btn_sm btn-success mb-3">Update Image</button>
                    </form>
                    <form id="edit_user_form" method="post">
                        <input type="hidden" name="edit_user_id" id="edit_user_id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_user_name" name="edit_user_name" placeholder="" required>
                            <label for="edit_user_name">User's Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="edit_user_email" name="edit_user_email" placeholder="" required>
                            <label for="edit_user_email">User's Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_user_password" name="edit_user_password" placeholder="" required>
                            <label for="edit_user_password">User's Password</label>
                        </div>
                        <button class="btn btn_sm btn-success">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn_sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("./components/bottom.php") ?>