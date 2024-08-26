<?php
include("../connection.php");

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id = $_POST['edit_plant_id'];
$name = $_POST['edit_plant'];
$desc = $_POST['edit_plant_desc'];
$category = $_POST['edit_plant_category'];

$query = "UPDATE tbl_plants SET plant_name = ?, plant_description = ?, category_id = ? WHERE id = ?";

if ($stmt = mysqli_prepare($connection, $query)) {
    mysqli_stmt_bind_param($stmt, "ssii", $name, $desc, $category, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Plant Updated Successfully";
    } else {
        echo "Failed to Update Plant: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare query: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
