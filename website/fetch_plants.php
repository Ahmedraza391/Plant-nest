<?php
include '../connection.php'; // Include your database connection file

if (isset($_POST['query'])) {
    $searchQuery = mysqli_real_escape_string($connection, $_POST['query']); // Sanitize the input
    $query = "SELECT * FROM tbl_plants WHERE plant_name LIKE '%$searchQuery%' AND plant_status='available'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($plant = mysqli_fetch_assoc($result)) {
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
    } else {
        echo "<p>No plants found.</p>";
    }
}
