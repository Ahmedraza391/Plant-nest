<?php
include("../connection.php");

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id = $_POST['edit_slide_id'];
$title = $_POST['edit_slide_title'];

$query = "UPDATE tbl_slider SET slider_title = ? WHERE id = ?";

if ($stmt = mysqli_prepare($connection, $query)) {
    mysqli_stmt_bind_param($stmt, "si", $title, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Slide Updated Successfully";
    } else {
        echo "Failed to Update Slide: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare query: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
