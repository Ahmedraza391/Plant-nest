<?php $page = "home"; ?>
<?php include("./components/top.php") ?>
<!--slider area start-->
<section class="slider_section mb-30">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <?php
            $query = "SELECT * FROM tbl_slider WHERE slider_status='activate' LIMIT 3";
            $execute_query = mysqli_query($connection, $query);

            if (mysqli_num_rows($execute_query) > 0) {
                $i = 0;
                while ($slide = mysqli_fetch_assoc($execute_query)) {
                    $active = $i === 0 ? 'active' : '';
                    echo "<button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='$i' class='$active' aria-current='true' aria-label='Slide ".($i + 1)."'></button>";
                    $i++;
                }
                mysqli_data_seek($execute_query, 0); // Reset the pointer to loop through items
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            if (mysqli_num_rows($execute_query) > 0) {
                $i = 0;
                while ($slide = mysqli_fetch_assoc($execute_query)) {
                    $active = $i === 0 ? 'active' : '';
                    $sliderImage = $slide['slider_image'];
                    $sliderTitle = $slide['slider_title'];
                    // $sliderCaption = $slide['slider_caption'];

                    echo "<div class='carousel-item $active' data-bs-interval='10000'>";
                        echo "<img src='../admin-panel/$sliderImage' class='d-block w-100' alt='$sliderTitle'>";
                        echo "<div class='carousel-caption d-none d-md-block'>";
                            echo "<div class='bg_transparent_slider '>";
                            echo "<h3 class='text-danger fw-bold'>$sliderTitle</h3>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    $i++;
                }
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!--slider area end-->
<!--banner area start-->
<div class="banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <figure class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="./assets/img/bg/banner1.jpg" alt=""></a>
                        <div class="banner_content">
                            <h3>Big Sale Products</h3>
                            <h2>Plants <br> For Interior</h2>
                            <a href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-lg-6 col-md-6">
                <figure class="single_banner">
                    <div class="banner_thumb">
                        <a href="shop.html"><img src="./assets/img/bg/banner2.jpg" alt=""></a>
                        <div class="banner_content">
                            <h3>Top Products</h3>
                            <h2>Plants <br> For Healthy</h2>
                            <a href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->
<?php include("./components/bottom.php") ?>