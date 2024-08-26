<?php
session_start();
include("./components/top.php");
include("../connection.php");

if (!isset($_SESSION['admin_login'])) {
    echo "<script>window.location.href='login.php'</script>";
    exit();
}

$id = $_SESSION["admin_login"]["admin_id"];
$query = "SELECT * FROM tbl_admin WHERE admin_id = $id";
$execute = mysqli_query($connection, $query);
$fetch = mysqli_fetch_assoc($execute);

if (isset($_POST['btn_update'])) {
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $update_query = "UPDATE tbl_admin SET admin_name = ?, admin_email = ?, admin_password = ? WHERE admin_id = ?";
    
    if ($stmt = mysqli_prepare($connection, $update_query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $admin_name, $admin_email, $admin_password, $admin_id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Update cookies if "Remember Me" was previously enabled
            if (isset($_COOKIE['plant_nest_admin_email'])) {
                setcookie('plant_nest_admin_email', $admin_email, time() + (86400 * 30), "/");
            }
            if (isset($_COOKIE['plant_nest_admin_password'])) {
                setcookie('plant_nest_admin_password', $admin_password, time() + (86400 * 30), "/");
            }

            // Update session values
            $_SESSION['admin_login']['admin_name'] = $admin_name;
            $_SESSION['admin_login']['admin_email'] = $admin_email;
            $_SESSION['admin_login']['admin_password'] = $admin_password;

            echo "<script>alert('Profile updated successfully!');</script>";
            echo "<script>window.location.href='admin_profile.php'</script>";
        } else {
            echo "Failed to update profile: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare query: " . mysqli_error($connection);
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="heading card p-3 my-2">
                <h2 class="text-center text-danger fw-bold">Admin Profile</h2>
            </div>
            <div class="card p-5">
                <form method="post">
                    <input type="hidden" name="admin_id" value="<?php echo $fetch['admin_id'] ?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Admin Name" value="<?php echo $fetch['admin_name'] ?>" required>
                        <label for="admin_name">Admin Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="Admin Email" value="<?php echo $fetch['admin_email'] ?>" required>
                        <label for="admin_email">Admin Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Admin Password" value="<?php echo $fetch['admin_password'] ?>" required>
                        <label for="admin_password">Admin Password</label>
                    </div>
                    <button type="submit" class="btn btn-success" name="btn_update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("./components/bottom.php") ?>
