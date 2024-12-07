<?php
session_start();
include('../connection.php');

if (isset($_GET['cart_id'])) {
    $cart_id = $_GET['cart_id'];
    $user_id = $_SESSION['user_login']['user_id'];

    $delete_query = "DELETE FROM tbl_cart WHERE cart_id = '$cart_id' AND user_id = '$user_id'";
    mysqli_query($connection, $delete_query);

    echo "<script>alert('Plant Removed Successfully');window.location.href='cart.php'</script>";
}
?>
