<?php
include("../connection.php");

$id = $_GET['id'];
$query = "UPDATE tbl_plants SET plant_status='unavailable' WHERE id = '$id'";
$execute_query = mysqli_query($connection, $query);

if ($execute_query) {
    echo "<script>
        alert('Plant Unavailabled');
        window.location.href='plants_management.php';
    </script>";
}
?>