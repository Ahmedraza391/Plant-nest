<!--header area start-->

<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="search_container container">
                        <div class="hover_category">
                            <select class="select_option" name="select" id="categori2">
                                <option selected>All Categories</option>
                                <?php
                                $fetch_categories = mysqli_query($connection, "SELECT * FROM tbl_categories WHERE category_status='available'");
                                if (mysqli_num_rows($fetch_categories) > 0) {
                                    foreach ($fetch_categories as $cat) {
                                        echo "<option value='$cat[category_id]'>$cat[category_name]</option>";
                                    }
                                } else {
                                    echo "<option hidden selected>Category Not Found</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="menu" style="margin-top: 50px;">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="cart.php">View Cart</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.php"> Contact Us</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user_login'])) {
                                echo "<li class='menu-item-has-children'>
                                        <a href='Profile.php'>Profile</a>
                                    </li>";
                                echo "<li class='menu-item-has-children'>
                                        <a href='logout.php'>Logout</a>
                                    </li>";
                            } else {
                                echo "<li class='menu-item-has-children'>
                                        <a href='login.php'>Login</a>
                                    </li>";
                                echo "<li class='menu-item-has-children'>
                                        <a href='register.php'>Register</a>
                                    </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--offcanvas menu area end-->
<header>
    <div class="main_header header_five">
        <div class="header_middle header_middle5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="logo">
                            <a href="index.php"><img src="./assets/img/logo/plant-nest-logo.png" alt="Web Logo"></a>
                        </div>
                    </div>
                    <div class="col  colm_none">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="<?php if ($page == "home") {
                                                        echo "active";
                                                    } ?>" href="index.php">home</a>
                                    </li>
                                    <li>
                                        <a class="<?php if ($page == "plant_page") {
                                                        echo "active";
                                                    } ?>" href="plants.php">Plants</a>
                                    </li>
                                    <li>
                                        <a class="<?php if ($page == "cart_page") {
                                                        echo "active";
                                                    } ?>" href="cart.php">Cart</a>
                                    </li>
                                    <li>
                                        <a class="<?php if ($page == "contact_page") {
                                                        echo "active";
                                                    } ?>" href="contact.php"> Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col">
                        <div class="header_account_area header_account5">
                            <div class="header_account-list top_links">
                                <?php
                                if (isset($_SESSION['user_login'])) {
                                    echo "<a href='#'><i class='icon-user d-none d-md-block'></i></a>";
                                    echo "<ul class='dropdown_links'>";
                                    echo "<li><a href='cart.php'>Shopping Cart</a></li>";
                                    echo "<hr class='m-0'>";
                                    echo "<li><a href='user_profile.php'>Profile</a></li>";
                                    echo "<li><a href='logout.php'>Lougout</a></li>";
                                    echo "</ul>";
                                } else {
                                    echo "<a href='#'><i class='icon-user d-none d-md-block'></i></a>";
                                    echo "<ul class='dropdown_links'>";
                                    echo "<li><a href='login.php'>Login</a></li>";
                                    echo "<li><a href='register.php'>Register</a></li>";
                                    echo "</ul>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->