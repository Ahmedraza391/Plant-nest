$(document).ready(function () {
    function categories_management() {
        $("#add_category_form").on("submit", function (e) {
            e.preventDefault();
            var categoryValue = $("#category").val();
            var spaceRegex = /^\s+$/;
            if (categoryValue === "" || spaceRegex.test(categoryValue)) {
                showToast("Please enter a valid category name without only spaces.", "warning");
            } else {
                $.ajax({
                    url: "insert_category.php",
                    type: "POST",
                    data: { category: categoryValue },
                    success: function (response) {
                        showToast(response, "success");
                        fetch_categories();
                        $("#add_category").modal("hide");
                    },
                    error: function (xhr, status, error) {
                        console.error("Error: " + error);
                    }
                });
            }
        });
        $(document).on("click", ".edit_category", function () {
            let data = $(this).data();
            $("#edit_category_modal").modal("show");
            $("#edit_category_id").val(data.category_id);
            $("#edit_category").val(data.category_name);
        });
        $("#edit_category_form").on("submit", function (e) {
            e.preventDefault();
            var categoryValue = $("#edit_category").val().trim();
            var spaceRegex = /^\s+$/;
            let formData = $(this).serialize();
            if (categoryValue === "" || spaceRegex.test(categoryValue)) {
                showToast("Please enter a valid category name without only spaces.", "warning");
            } else {
                $.ajax({
                    url: "update_category.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        showToast(response, "success");
                        fetch_categories();
                        $("#edit_category_modal").modal("hide");
                    },
                    error: function (xhr, status, error) {
                        console.error("Error: " + error);
                    }
                });
            }
        });
        function fetch_categories() {
            $.ajax({
                url: "fetch_categories.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#category_body").html(response);
                }
            });
        }
        fetch_categories();
    }
    categories_management();

    function plant_management() {
        $("#add_plant_form").on("submit", function (e) {
            e.preventDefault();

            // Get form field values
            let plantName = $("#plant_name").val();
            let plantDesc = $("#plant_desc").val();
            let plantCategory = $("#plant_category").val();
            let plantImage = $("#plant_image")[0].files[0]; // Single file

            // Validation flags
            let isValid = true;

            // Validate plant name
            if (plantName === "" || /^\s+$/.test(plantName)) {
                alert("Please enter a valid plant name.");
                isValid = false;
            }

            // Validate plant description
            if (plantDesc === "" || /^\s+$/.test(plantDesc)) {
                alert("Please enter a valid plant description.");
                isValid = false;
            }

            // Validate category selection
            if (plantCategory === "") {
                alert("Please select a category.");
                isValid = false;
            }

            // Validate image selection
            if (!plantImage) {
                alert("Please select an image.");
                isValid = false;
            } else {
                // Validate image type and size
                let fileType = plantImage.type;
                let fileSize = plantImage.size;

                // Validate file types (png, jpg, jpeg)
                if (!fileType.match('image/png') && !fileType.match('image/jpg') && !fileType.match('image/jpeg')) {
                    alert("Only PNG, JPG, and JPEG image files are allowed.");
                    isValid = false;
                }

                // Validate file size (2MB max)
                if (fileSize > 2 * 1024 * 1024) { // 2MB
                    alert("The image must be less than 2MB.");
                    isValid = false;
                }
            }

            // If valid, submit form data via AJAX
            if (isValid) {
                let formData = new FormData(this);

                $.ajax({
                    url: "insert_plant.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        alert(response);
                        fetch_plants();
                        $("#add_plant_modal").modal("hide");
                        $("#add_plant_form")[0].reset();
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            }
        });
        $(document).on("click", ".view_plant", function () {
            let data = $(this).data();
            $("#view_plant_modal").modal("show");
            $("#view_plant_id").text(data.id);
            $("#view_plant_name").text(data.name);
            $("#view_plant_desc").text(data.description);
            $("#view_category").text(data.category);
            $("#view_plant_image").attr("src", data.plant_image)
        });
        $(document).on("click", ".edit_plant", function () {
            let data = $(this).data();
            let id = data.id;
            let name = data.name;
            let desc = data.description;
            let category_id = data.category_id;
            let plant_image = data.plant_image;
            $("#edit_plant_modal").modal("show");
            $("#edit_plant_id").val(id);
            $("#edit_plant").val(name);
            $("#edit_plant_desc").val(desc);
            $("#show_plant_image").attr("src", plant_image);
            $("#edit_plant_name_image").val(name);
            $.ajax({
                url: "plant_fetch_category.php",
                type: "POST",
                data: { id: category_id },
                success: function (response) {
                    console.log(response);
                    $("#edit_plant_category").html(response);
                }
            });
            $("#edit_plant_id_image_form").val(id);
        });
        $("#edit_plant_form").on("submit", function (e) {
            e.preventDefault();

            // Get form field values
            let plantName = $("#edit_plant").val();
            let plantDesc = $("#edit_plant_desc").val();
            let plantCategory = $("#edit_plant_category").val();

            // Validation flags
            let isValid = true;

            // Validate plant name
            if (plantName === "" || /^\s+$/.test(plantName)) {
                alert("Please enter a valid plant name.");
                isValid = false;
            }

            // Validate plant description
            if (plantDesc === "" || /^\s+$/.test(plantDesc)) {
                alert("Please enter a valid plant description.");
                isValid = false;
            }

            // Validate category selection
            if (plantCategory === "") {
                alert("Please select a category.");
                isValid = false;
            }

            // If valid, submit form data via AJAX
            if (isValid) {
                let formData = $(this).serialize();

                $.ajax({
                    url: "update_plant.php",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        alert(response);
                        fetch_plants();
                        $("#edit_plant_modal").modal("hide");
                        $("#edit_plant_form")[0].reset();
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            }
        });
        $("#edit_plant_image_form").on("submit", function (e) {
            e.preventDefault();

            let plantImage = $("#edit_plant_image")[0].files[0];

            // Validation flag
            let isValid = true;

            // Validate image selection (only if a new image is being uploaded)
            if (plantImage) {
                let fileType = plantImage.type;
                let fileSize = plantImage.size;

                // Validate file types (png, jpg, jpeg)
                if (!fileType.match('image/png') && !fileType.match('image/jpg') && !fileType.match('image/jpeg')) {
                    alert("Only PNG, JPG, and JPEG image files are allowed.");
                    isValid = false;
                }

                // Validate file size (2MB max)
                if (fileSize > 2 * 1024 * 1024) { // 2MB
                    alert("The image must be less than 2MB.");
                    isValid = false;
                }
            } else {
                alert("Please select an image to upload.");
                isValid = false;
            }

            if (isValid) {
                let formData = new FormData(this);

                $.ajax({
                    url: "update_plant_image.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        alert(response);
                        fetch_plants();
                        $("#edit_plant_modal").modal("hide");
                        $("#edit_plant_image_form")[0].reset();
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            }
        });
        function fetch_plants() {
            $.ajax({
                url: "fetch_plants.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#plant_body").html(response);
                }
            })
        }
        fetch_plants();
    }
    plant_management();

    function user_management() {
        $("#add_user_form").on("submit", function (e) {
            e.preventDefault();

            // Form validation
            let userName = $("#user_name").val().trim();
            let userEmail = $("#user_email").val().trim();
            let userPassword = $("#user_password").val().trim();
            let userImage = $("#user_image")[0].files[0];

            // Check for multiple spaces
            let multipleSpacesPattern = /\s\s+/;

            if (userName === "" || userEmail === "" || userPassword === "") {
                alert("All fields are required.");
                return false;
            }

            if (multipleSpacesPattern.test(userName) || multipleSpacesPattern.test(userEmail)) {
                alert("Fields cannot contain multiple consecutive spaces.");
                return false;
            }

            // Email validation
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(userEmail)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Image validation
            let validImageTypes = ["image/png", "image/jpeg", "image/jpg"];
            if (userImage && !validImageTypes.includes(userImage.type)) {
                alert("Please select a valid image file (PNG, JPG, JPEG).");
                return false;
            }

            // If all validations pass, submit the form data via AJAX
            let formData = new FormData(this);

            $.ajax({
                url: "insert_users.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    alert(response);
                    fetch_users();
                    $("#add_user_modal").modal("hide");
                    $("#add_user_form")[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("Error: " + textStatus, errorThrown);
                }
            });
        });
        $(document).on("click", ".view_user", function () {
            let data = $(this).data();
            $("#view_user_id").text(data.id);
            $("#view_user_name").text(data.name);
            $("#view_user_email").text(data.email);
            $("#view_user_image").attr("src", data.user_image);
            $("#view_user_modal").modal("show");
        });
        $(document).on("click", ".edit_user", function () {
            let data = $(this).data();
            $("#edit_user_modal").modal("show");
            $("#edit_user_id_image_form").val(data.id);
            $("#edit_user_email_image").val(data.email);
            $("#show_user_image").attr("src", data.user_image);
            $("#edit_user_id").val(data.id);
            $("#edit_user_name").val(data.name);
            $("#edit_user_email").val(data.email);
            $("#edit_user_password").val(data.password);
        });
        $("#edit_user_image_form").on("submit", function (e) {
            e.preventDefault();

            // Image validation
            let userImage = $("#edit_user_image")[0].files[0];
            let validImageTypes = ["image/png", "image/jpeg", "image/jpg"];

            if (userImage && !validImageTypes.includes(userImage.type)) {
                alert("Please select a valid image file (PNG, JPG, JPEG).");
                return false;
            }

            let formData = new FormData(this);

            $.ajax({
                url: "update_user_image.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    alert(response);
                    fetch_users();
                    $("#edit_user_modal").modal("hide");
                    $("#edit_user_image_form")[0].reset();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("Error: " + textStatus, errorThrown);
                }
            });
        });
        $("#edit_user_form").on("submit", function (e) {
            e.preventDefault();
            let userName = $("#edit_user_name").val().trim();
            let userEmail = $("#edit_user_email").val().trim();
            let userPassword = $("#edit_user_password").val().trim();

            let multipleSpacesPattern = /\s\s+/;

            if (userName === "" || userEmail === "" || userPassword === "") {
                alert("All fields are required.");
                return false;
            }

            if (multipleSpacesPattern.test(userName) || multipleSpacesPattern.test(userEmail)) {
                alert("Fields cannot contain multiple consecutive spaces.");
                return false;
            }

            // Email validation
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(userEmail)) {
                alert("Please enter a valid email address.");
                return false;
            }

            let formData = $(this).serialize();
            $.ajax({
                url: "update_users.php",
                type: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    showToast(response, "success");
                    fetch_users();
                    $("#edit_user_modal").modal("hide");
                    $("#edit_user_form")[0].reset();
                }
            })
        })
        function fetch_users() {
            $.ajax({
                url: "fetch_users.php",
                type: "POST",
                success: function (response) {
                    console.log(response);
                    $("#user_body").html(response);
                },
                error: function (xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            })
        }
        fetch_users();
    }
    user_management();

    function website_slider() {
        $("#add_slide_form").on("submit", function (e) {
            e.preventDefault();
            
            let isValid = true;
            let plantImageInput = $("#slide_image")[0]; 
            let plantImage = plantImageInput.files[0];
            if (!plantImage) {
                alert("Please select an image.");
                isValid = false;
            } else {
                let fileType = plantImage.type;
                let fileSize = plantImage.size;

                if (!fileType.match('image/png') && !fileType.match('image/jpg') && !fileType.match('image/jpeg')) {
                    alert("Only PNG, JPG, and JPEG image files are allowed.");
                    isValid = false;
                }
        
                if (fileSize > 2 * 1024 * 1024) { // 2MB
                    alert("The image must be less than 2MB.");
                    isValid = false;
                }
            }
        
            if (isValid) {
                let formData = new FormData(this);
        
                $.ajax({
                    url: "insert_slide.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        alert(response);
                        fetch_slides();
                        $("#add_slider_modal").modal("hide");
                        $("#add_slide_form")[0].reset();
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            }
        });
        $(document).on("click",".edit_slide",function(){
            let data = $(this).data();
            $("#edit_slider_modal").modal("show");
            $("#edit_slide_id_image_form").val(data.id);
            $("#edit_slide_id").val(data.id);
            $("#edit_slide_title").val(data.title);
            $("#show_slide_image").attr("src",data.image);
        });
        $("#edit_slide_image_form").on("submit",function(e){
            e.preventDefault();
            isValid = true;
            let plantImageInput = $("#edit_slide_image")[0]; 
            let plantImage = plantImageInput.files[0];
            if (!plantImage) {
                alert("Please select an image.");
                isValid = false;
            } else {
                let fileType = plantImage.type;
                let fileSize = plantImage.size;

                if (!fileType.match('image/png') && !fileType.match('image/jpg') && !fileType.match('image/jpeg')) {
                    alert("Only PNG, JPG, and JPEG image files are allowed.");
                    isValid = false;
                }
        
                if (fileSize > 2 * 1024 * 1024) { // 2MB
                    alert("The image must be less than 2MB.");
                    isValid = false;
                }
            }
            if (isValid) {
                let formData = new FormData(this);
        
                $.ajax({
                    url: "update_slide_image.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        alert(response);
                        fetch_slides();
                        $("#edit_slider_modal").modal("hide");
                        $("#edit_slide_image_form")[0].reset();
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            }
        })
        $("#edit_slide_form").on("submit",function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url : "update_slide.php",
                type : "POST",
                data : formData,
                success:function(response){
                    console.log(response);
                    showToast(response,"success");
                    fetch_slides();
                    $("#edit_slider_modal").modal("hide");
                }
            })
        })
        function fetch_slides(){
            $.ajax({
                url : "fetch_slides.php",
                type : "POST",
                success:function(response){
                    console.log(response);
                    $("#slider_body").html(response);
                }
            });
        }
        fetch_slides();
    }
    website_slider();

    function showToast(message, type) {
        switch (type) {
            case 'success':
                toastr.success(message);
                break;
            case 'info':
                toastr.info(message);
                break;
            case 'warning':
                toastr.warning(message);
                break;
            case 'error':
                toastr.error(message);
                break;
            default:
                toastr.info(message);
        }
        toastr.options = {
            newestOnTop: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            preventDuplicates: false,
            onclick: null,
            showDuration: 300,
            hideDuration: 1000,
            timeOut: 3000,
            extendedTimeOut: 1000,
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
        };
    }
});

// continue on register / login in website and other work on website
// and create feedback form and contact form in this


// continue on login / register in website
// and add image fields in register form 
