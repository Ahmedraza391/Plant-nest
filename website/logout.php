<?php
session_start();

// Unset the session variable
unset($_SESSION['user_login']);

// Redirect to the login page
echo "<script>window.location.href='login.php'</script>";
?>
