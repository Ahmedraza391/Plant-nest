<?php
include("../connection.php");

$id = $_GET['id'];
$query = "UPDATE tbl_users SET user_status='activate' WHERE user_id = '$id'";
$execute_query = mysqli_query($connection, $query);

if ($execute_query) {
    echo "<script>
        alert('User Activated Successfully');
        window.location.href='users_management.php';
    </script>";
}
?>