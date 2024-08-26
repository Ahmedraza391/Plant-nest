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
                <h2 class="text-center m-2 text-success fw-bold">Plants</h2>
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
                            <th>Plant Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="plant_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row card p-3">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <button class="btn btn-success btn_sm" data-bs-toggle="modal" data-bs-target="#add_plant_modal">Add Plants</button>
        </div>
        <div class="col-md-8"></div>
    </div>
    <!-- // Add Plant Modal // -->
    <div class="modal fade" id="add_plant_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="add_plant_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_plant_modalLabel">Add Plant</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_plant_form" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="plant_name" name="plant_name" placeholder="" required>
                            <label for="plant_name">Plant's Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="" id="plant_desc" name="plant_desc" required></textarea>
                            <label for="plant_desc">Plant's Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select text-dark" name="plant_category" id="plant_category" required>
                                <option selected hidden value="">Select Category</option>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM tbl_categories WHERE category_status='available'");
                                if (mysqli_num_rows($query) > 0) {
                                    foreach ($query as $data) {
                                        echo "<option value='$data[category_id]'>$data[category_name]</option>";
                                    }
                                } else {
                                    echo "<option hidden selected >Categories Not Found.</option>";
                                }
                                ?>
                            </select>
                            <label for="plant_category">Categories</label>
                        </div>
                        <div class="card border mb-3 p-3 rounded">
                            <label for="plant_image" class="form-label">Select Plant Image</label>
                            <input type="file" class="form-control" id="plant_image" name="plant_image" required>
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

    <!-- // View Plant Modal // -->
    <div class="modal fade" id="view_plant_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="view_plant_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="view_plant_modalLabel">View Plant</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container row">
                        <div class="col-md-12">
                            <div class="card p-3 shadow">
                                <div class="image mb-3">
                                    <img src="" id="view_plant_image" class="img-fluid w-100 " alt="Plant Image" style="border-radius:10px !important;height: 250px;">
                                </div>
                                <h5 class="mb-3">Plant ID : #<span id="view_plant_id"></span></h5>
                                <h5 class="mb-3">Plant Name : <span id="view_plant_name"></span></h5>
                                <h5 class="mb-3">Plant Category : <span id="view_category"></span></h5>
                                <h5 class="mb-3">Plant Description : <p style="display: contents;" id="view_plant_desc"></p>
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

    <!-- // Edit Plant Modal // -->
    <div class="modal fade" id="edit_plant_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="edit_plant_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_plant_modalLabel">Edit Plants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_plant_image_form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="edit_plant_id_image_form" id="edit_plant_id_image_form">
                        <input type="hidden" name="edit_plant_name_image" id="edit_plant_name_image">
                        <div class="image mb-3" style="width: 100%;height:250px;object-fit:cover;">
                            <img src="" alt="Plant Image" id="show_plant_image" class="img-fluid w-100 h-100 rounded">
                        </div>
                        <div class="card border mb-3 p-3 rounded">
                            <label for="edit_plant_image" class="form-label">Select Plant Image</label>
                            <input type="file" class="form-control" id="edit_plant_image" name="edit_plant_image" multiple required>
                            <small class="mt-2">Select Only Png,Jpg,Jpeg File.</small>
                        </div>
                        <button class="btn btn_sm btn-success mb-3">Update Image</button>
                    </form>
                    <form id="edit_plant_form" method="post">
                        <input type="hidden" name="edit_plant_id" id="edit_plant_id">
                        <div class="form-floating mb-3">
                            <select class="form-select text-dark" name="edit_plant_category" id="edit_plant_category" required>
                                <option selected hidden value="">Select Category</option>
                            </select>
                            <label for="edit_plant_category">Categories</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_plant" name="edit_plant" placeholder="" required>
                            <label for="edit_plant">Plant's Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="" id="edit_plant_desc" name="edit_plant_desc" required></textarea>
                            <label for="edit_plant_desc">Plant's Description</label>
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