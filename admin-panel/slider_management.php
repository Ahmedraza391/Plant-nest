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
                <h2 class="text-center m-2 text-success fw-bold">Slider Slides</h2>
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
                            <th>Slide Title</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="slider_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row card p-3">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <button class="btn btn-success btn_sm" data-bs-toggle="modal" data-bs-target="#add_slider_modal">Add Slider Slide</button>
        </div>
        <div class="col-md-8"></div>
    </div>
    <!-- // Add Plant Modal // -->
    <div class="modal fade" id="add_slider_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="add_slider_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="add_slider_modalLabel">Add Slider Slide</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_slide_form" method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="slide_title" name="slide_title" placeholder="" required>
                            <label for="slide_title">Slide's Title</label>
                        </div>
                        <div class="card border mb-3 p-3 rounded">
                            <label for="slide_image" class="form-label">Select Slide Image</label>
                            <input type="file" class="form-control" id="slide_image" name="slide_image" required>
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

    <!-- // Edit Plant Modal // -->
    <div class="modal fade" id="edit_slider_modal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="edit_slider_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit_slider_modalLabel">Edit Plants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit_slide_image_form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="edit_slide_id_image_form" id="edit_slide_id_image_form">
                        <div class="image mb-3" style="width: 100%;height:250px;object-fit:cover;">
                            <img src="" alt="Slider Image" id="show_slide_image" class="img-fluid w-100 h-100 rounded">
                        </div>
                        <div class="card border mb-3 p-3 rounded">
                            <label for="edit_slide_image" class="form-label">Select Slide Image</label>
                            <input type="file" class="form-control" id="edit_slide_image" name="edit_slide_image" multiple required>
                            <small class="mt-2">Select Only Png,Jpg,Jpeg File.</small>
                        </div>
                        <button class="btn btn_sm btn-success mb-3">Update Image</button>
                    </form>
                    <form id="edit_slide_form" method="post">
                        <input type="hidden" name="edit_slide_id" id="edit_slide_id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_slide_title" name="edit_slide_title" placeholder="" required>
                            <label for="edit_slide_title">Slide's Title</label>
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