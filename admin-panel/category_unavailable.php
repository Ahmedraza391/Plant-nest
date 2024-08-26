<?php
include("../connection.php");

$id = $_GET['id'];
$query = "UPDATE tbl_categories SET category_status='unavailable' WHERE category_id = '$id'";
$execute_query = mysqli_query($connection, $query);

if ($execute_query) {
    echo "<script>
        alert('Category Unavailabled');
        window.location.href='categories_management.php';
    </script>";
}
?>