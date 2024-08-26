<?php
include("./components/top.php");

if (isset($_POST['login_btn'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    // Basic validation
    if (empty($email) || empty($password)) {
        $error_message = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
    } else {
        // Check if user exists and if the provided password matches
        $query = "SELECT * FROM tbl_users WHERE user_email = ? AND user_password = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user_login'] = $row;

            // Remember Me functionality
            if (isset($_POST['remember'])) {
                setcookie('user_email', $email, time() + (86400 * 30), "/"); // 30 days
                setcookie('user_password', $password, time() + (86400 * 30), "/"); // 30 days
            } else {
                // Clear cookies if Remember Me is not checked
                if (isset($_COOKIE['user_email'])) {
                    setcookie('user_email', '', time() - 3600, "/");
                }
                if (isset($_COOKIE['user_password'])) {
                    setcookie('user_password', '', time() - 3600, "/");
                }
            }
            if(isset($_SESSION['page_url'])){
                echo "<script>window.location.href='$_SESSION[page_url]'</script>";
            }else{
                echo "<script>alert('User Login Successfully ');window.location.href='index.php'</script>";
            }
            exit();
        } else {
            $error_message = "Incorrect email or password.";
        }
    }
}

// Prefill email and password if Remember Me cookies exist
$remembered_email = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '';
$remembered_password = isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : '';
?>

<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 m-auto">
                <div class="account_form">
                    <h2>Login</h2>
                    <?php if (isset($error_message)) { ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php } ?>
                    <form method="post" class="p-3 p-md-5">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="" value="<?php echo htmlspecialchars($remembered_email); ?>">
                            <label for="user_email">User Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" value="<?php echo htmlspecialchars($remembered_password); ?>">
                            <label for="user_password">User Password</label>
                        </div>
                        <div class="login_submit">
                            <label for="remember">
                                <input id="remember" name="remember" type="checkbox" <?php if ($remembered_email) echo 'checked'; ?>>
                                Remember me
                            </label>
                            <button type="submit" name="login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- customer login end -->
<?php include("./components/bottom.php") ?>
