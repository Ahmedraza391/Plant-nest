<?php
session_start();
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_login']['user_id'];

    foreach ($_POST['quantities'] as $cart_id => $quantity) {
        $quantity = (int)$quantity;
        $update_query = "UPDATE tbl_cart SET plant_quantity = '$quantity' WHERE cart_id = '$cart_id' AND user_id = '$user_id'";
        mysqli_query($connection, $update_query);
    }

    echo "<script>alert('Cart Updated Successfully');window.location.href='cart.php'</script>";
}
?>
