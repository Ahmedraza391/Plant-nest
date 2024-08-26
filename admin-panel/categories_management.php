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
                <h2 class="text-center m-2 text-success fw-bold">Categories</h2>
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
                            <th>Category</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="category_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row card p-3">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <button class="btn btn-success btn_sm" data-bs-toggle="modal" data-bs-target="#add_category">Add Category</button>
        </div>
        <div class="col-md-8"></div>
    </div>
    <!-- // Add Category Modal // -->
    <div class="modal fade" id="add_category" tabindex="-1" data-bs-backdrop="static" aria-labelledby="add_categoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_categoryLabel">Add Categories</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_category_form" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="category" name="category" placeholder="" required>
                            <label for="category">Category</label>
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

    <!-- // Edit Category Modal // -->
    <div class="modal fade" id="edit_category_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="edit_category_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_category_modalLabel">Edit Categories</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_category_form" method="post">
                        <input type="hidden" name="edit_category_id" id="edit_category_id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_category" name="edit_category" placeholder="" required>
                            <label for="edit_category">Category</label>
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