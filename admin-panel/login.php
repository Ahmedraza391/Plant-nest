<?php
session_start();
include("../connection.php");

$message = "";

// Check if "Remember Me" cookies exist and auto-fill the form
$saved_email = isset($_COOKIE['plant_nest_admin_email']) ? $_COOKIE['plant_nest_admin_email'] : "";
$saved_password = isset($_COOKIE['plant_nest_admin_password']) ? $_COOKIE['plant_nest_admin_password'] : "";

if (isset($_POST['sign_in_btn'])) {
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $query = "SELECT * FROM tbl_admin WHERE admin_email = '$email' AND admin_password='$password'";
    $execute_query = mysqli_query($connection, $query);

    if (mysqli_num_rows($execute_query) > 0) {
        $fetch = mysqli_fetch_assoc($execute_query);
        $_SESSION['admin_login'] = $fetch;
        $message = "Login Successfully";

        // If "Remember Me" is checked, set cookies
        if (isset($_POST['remember_me'])) {
            setcookie('plant_nest_admin_email', $email, time() + (86400 * 30), "/");
            setcookie('plant_nest_admin_password', $password, time() + (86400 * 30), "/");
        } else {
            // Clear cookies if "Remember Me" is not checked
            setcookie('plant_nest_admin_email', '', time() - 3600, "/");
            setcookie('plant_nest_admin_password', '', time() - 3600, "/");
        }

        header("location:index.php");
        exit();
    } else {
        $message = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plant-Nest Admin - Login</title>
    <link rel="stylesheet" href="./assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-5 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h2 class="text-center fs-2 text-danger fw-bold">Plant-Nest Login</h2>
                            </div>
                            <form class="pt-3" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Email" name="admin_email" value="<?php echo $saved_email; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Password" name="admin_password" value="<?php echo $saved_password; ?>" required>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button name="sign_in_btn" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember_me" class="form-check-input" <?php if ($saved_email && $saved_password) echo 'checked'; ?>> Keep me signed in
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="messsage my-2">
                                <h5 class="text-center text-success fw-bold"><?php echo $message; ?></h5>
                            </div>
                            <div class="text-center mt-4 fw-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>