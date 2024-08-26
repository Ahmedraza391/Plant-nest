<?php
include("../connection.php");

$id = $_GET['id'];
$query = "UPDATE tbl_slider SET slider_status='deactivate' WHERE id = '$id'";
$execute_query = mysqli_query($connection, $query);

if ($execute_query) {
    echo "<script>
        alert('Slide Deactivated Successfully');
        window.location.href='slider_management.php';
    </script>";
}
?>