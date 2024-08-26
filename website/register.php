<title>Plant-Nest - Register</title>
<?php $page = "login"; ?>
<?php include("./components/top.php") ?>
<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 m-auto">
                <div class="account_form">
                    <h2>Register</h2>
                    <form method="post" class="p-3 p-md-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user_name" placeholder="">
                            <label for="user_name">User Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user_email" placeholder="">
                            <label for="user_email">User Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="user_password" placeholder="Password">
                            <label for="user_password">User Password</label>
                        </div>
                        <div class="login_submit">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- customer login end -->
<?php include("./components/bottom.php") ?>