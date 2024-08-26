<?php
include("../connection.php");

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['edit_slide_id_image_form'];
    $image = $_FILES['edit_slide_image'];

    if ($image['name'] !== '') {
        $uploadDir = "uploads/slider/"; 

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $image_ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $image_new_name = $uploadDir . "/" . uniqid() . "." . $image_ext;

        if (move_uploaded_file($image['tmp_name'], $image_new_name)) {
            
            $query = "UPDATE tbl_slider SET slider_image = ? WHERE id = ?";

            if ($stmt = mysqli_prepare($connection, $query)) {
                mysqli_stmt_bind_param($stmt, "si", $image_new_name, $id);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Slide Updated Successfully";
                } else {
                    echo "Failed to Update Slide: " . mysqli_stmt_error($stmt);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare query: " . mysqli_error($connection);
            }
        } else {
            echo "Failed to upload the image.";
        }
    } else {
        echo "No image was uploaded.";
    }
}

mysqli_close($connection);
?>
