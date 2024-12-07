<?php $page = "home"; ?>
<?php
include("./components/top.php");
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
?>
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
                    echo "<button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='$i' class='$active' aria-current='true' aria-label='Slide " . ($i + 1) . "'></button>";
                    $i++;
                }
                mysqli_data_seek($execute_query, 0); 
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

<div class="product_area my-5">
    <div class="heading mb-5">
        <h2 class="text-center text-success fw-bold">Our Plants</h2>
    </div>
    <div class="custom-container container">
        <div class="custom-row row">
            <?php
            $query = mysqli_query($connection, "SELECT * FROM tbl_plants WHERE plant_status='available' LIMIT 6");
            if (mysqli_num_rows($query) > 0) {
                foreach ($query as $plant) {
                    echo "<div class='card-container col m-auto'>"; // Custom container for the card
                    echo "<div class='custom-card'>"; // Custom card class
                    echo "<a href='plant_detail.php?id=$plant[id]' class='custom-link'>";
                    echo "<img src='../admin-panel/$plant[plant_image]' class='custom-card-image' alt='Plant Image'>";
                    echo "<div class='custom-card-body'>";
                    echo "<h5 class='custom-card-title'>$plant[plant_name]</h5>";
                    // Fetching only the first 100 characters of the description
                    $short_description = substr($plant['plant_description'], 0, 100);
                    echo "<p class='custom-card-text'>$short_description...</p>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Plants Not Found";
            }
            ?>
        </div>
    </div>

</div>



<?php include("./components/bottom.php") ?>