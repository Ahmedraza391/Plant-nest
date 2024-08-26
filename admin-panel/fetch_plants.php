<?php
include("../connection.php");

// Query to fetch plants and their categories
$query = mysqli_query($connection, "SELECT tbl_plants.*, tbl_categories.* FROM tbl_plants INNER JOIN tbl_categories ON tbl_plants.category_id = tbl_categories.category_id");

$output = "";

// Check if there are rows in the result set
if (mysqli_num_rows($query) > 0) {
    foreach ($query as $data) {
        $output .= "<tr>";
        $output .= "<td>{$data['id']}</td>";
        // Display the first image
        $output .= "<td>";
            $output .= "<img class='img-fluid' src='$data[plant_image]' alt='Plant Image' />";
        $output .= "</td>";

        $output .= "<td>" . htmlspecialchars($data['plant_name'], ENT_QUOTES, 'UTF-8') . "</td>";
        $output .= "<td>" . htmlspecialchars($data['category_name'], ENT_QUOTES, 'UTF-8') . "</td>";

        // Status buttons
        $output .= "<td>";
        if ($data['plant_status'] == "available") {
            $output .= "<a href='plant_unavailable.php?id={$data['id']}' class='btn btn-danger btn_sm'>Unavailable</a>";
        } else {
            $output .= "<a href='plant_available.php?id={$data['id']}' class='btn btn-success btn_sm'>Available</a>";
        }
        $output .= "</td>";

        // View button
        $output .= "<td>";
        $output .= "<button class='btn btn-light btn_sm view_plant' data-id='{$data['id']}' data-name='" . htmlspecialchars($data['plant_name'], ENT_QUOTES, 'UTF-8') . "' data-description='" . htmlspecialchars($data['plant_description'], ENT_QUOTES, 'UTF-8') . "' data-category='" . htmlspecialchars($data['category_name'], ENT_QUOTES, 'UTF-8') . "' data-plant_image='$data[plant_image]' >View</button>";
        $output .= "</td>";

        // Edit button
        $output .= "<td>";
        $output .= "<button class='btn btn-success btn_sm edit_plant' data-id='{$data['id']}' data-name='" . htmlspecialchars($data['plant_name'], ENT_QUOTES, 'UTF-8') . "' data-description='" . htmlspecialchars($data['plant_description'], ENT_QUOTES, 'UTF-8') . "' data-category_id='{$data['category_id']}' data-category_name='" . htmlspecialchars($data['category_name'], ENT_QUOTES, 'UTF-8') . "' data-plant_image='$data[plant_image]'>Edit</button>";
        $output .= "</td>";

        $output .= "</tr>";
    }
} else {
    // Handle case when there are no records
    $output .= "<tr><td colspan='7'>Plants Not found</td></tr>";
}

// Output the generated HTML
echo $output;
?>
