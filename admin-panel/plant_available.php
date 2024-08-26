<?php
include("../connection.php");

$id = $_GET['id'];
$query = "UPDATE tbl_plants SET plant_status='available' WHERE id = '$id'";
$execute_query = mysqli_query($connection, $query);

if ($execute_query) {
    echo "<script>
        alert('Plant Availabled');
        window.location.href='plants_management.php';
    </script>";
}
?>