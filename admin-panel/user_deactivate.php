<?php
include("../connection.php");

$id = $_GET['id'];
$query = "UPDATE tbl_users SET user_status='deactivate' WHERE user_id = '$id'";
$execute_query = mysqli_query($connection, $query);

if ($execute_query) {
    echo "<script>
        alert('User Deactivated Successfully');
        window.location.href='users_management.php';
    </script>";
}
?>