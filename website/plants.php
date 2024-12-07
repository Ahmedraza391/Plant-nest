<?php include("./components/top.php") ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Shop</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<div class="row my-3 m-0">
    <div class="col-md-2"></div>
    <div class="col-md-6 m-auto">
        <form method="POST" id="search_form">
            <div class="w-100">
                <div class=" d-flex align-items-center justify-content-center ">
                    <input type="text" class="form-control me-2" id="search_plant" placeholder="Search Plants">
                    <button type="submit" class="btn btn_sm btn-danger">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<!--shop  area start-->
<div class="shop_area shop_reverse mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                            title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class="niceselect_option">
                        <form class="select_option" action="#">
                            <select name="orderby" id="short">
                                <option selected value="1">Select Category</option>
                                <?php
                                $query = "SELECT * FROM tbl_categories WHERE category_status='available'";
                                $executer_query = mysqli_query($connection, $query);
                                if (mysqli_num_rows($executer_query) > 0) {
                                    foreach ($executer_query as $cate) {
                                        echo "<option value='$cate[category_id]'>$cate[category_name]</option>";
                                    }
                                } else {
                                    echo "<option selected hidden>Plant Not Found</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                    <div class=" niceselect_option">
                        <form class="select_option" action="#">
                            <select name="orderby" id="short">
                                <option selected value="1">Sort Plants</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                            </select>
                        </form>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <div class="fetched_plants row shop_wrapper">

                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper previous_plants">
                    <?php
                    $fetch_plants = mysqli_query($connection, "SELECT * FROM tbl_plants WHERE plant_status='available'");
                    if (mysqli_num_rows($fetch_plants) > 0) {
                        foreach ($fetch_plants as $plant) {
                            echo "<div class='col-lg-4 col-md-4 col-12 '>";
                            echo "<article class='single_product'>";
                            echo "<a class='' href='plant_detail.php?id=$plant[id]'>";
                            echo "<div class='product_thumb rounded' style='height='11px !important''>";
                            echo "<img src='../admin-panel/$plant[plant_image]' alt='$plant[plant_name]' class='w-100 h-100'>";
                            echo "<div class='action_links w-100'>";
                            echo "<div class='product_content grid_content'>";
                            echo "<div class='product_price_rating'>";
                            echo "<h4 class='product_name text-success fw-bold''>$plant[plant_name]</h4>";
                            echo "<div class='price_box'>";
                            echo "<span class='current_price'>$plant[plant_price]/- Rs</span>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</a>";
                            echo "</article>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->
<?php include("./components/bottom.php") ?>
<script>
    $(document).ready(function() {
        $("#search_plant").on("keyup", function() {
            var searchQuery = $(this).val(); 
            $.ajax({
                url: 'fetch_plants.php',
                type: 'POST',
                data: {
                    query: searchQuery
                },
                success: function(response) {
                    $('.fetched_plants').html(response);
                    $(".previous_plants").css("display","none")
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any error to the console
                }
            });
        });
    });
</script>