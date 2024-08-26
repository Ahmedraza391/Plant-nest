<?php
include("../connection.php");

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['edit_user_id'], $_POST['edit_user_name'], $_POST['edit_user_email'], $_POST['edit_user_password'])) {

    $id = $_POST['edit_user_id'];
    $name = $_POST['edit_user_name'];
    $email = $_POST['edit_user_email'];
    $password = $_POST['edit_user_password'];

    $query = "UPDATE tbl_users SET user_name = ?, user_email = ?, user_password = ? WHERE user_id = ?";

    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "User Updated Successfully";
        } else {
            echo "Failed to Update User: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare query: " . mysqli_error($connection);
    }

} else {
    echo "Required fields are missing.";
}

mysqli_close($connection);
?>
