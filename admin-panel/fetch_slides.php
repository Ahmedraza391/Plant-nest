<?php
include("../connection.php");

$query = mysqli_query($connection, "SELECT * FROM tbl_slider");

$output = "";

if (mysqli_num_rows($query) > 0) {
    foreach ($query as $data) {
        $output .= "<tr>";
        $output .= "<td>{$data['id']}</td>";
        $output .= "<td>";
            $output .= "<img class='img-fluid' src='$data[slider_image]' alt='Slider Image' />";
        $output .= "</td>";

        $output .= "<td>" . htmlspecialchars($data['slider_title'], ENT_QUOTES, 'UTF-8') . "</td>";
        // Status buttons
        $output .= "<td>";
        if ($data['slider_status'] == "activate") {
            $output .= "<a href='slide_deactivate.php?id={$data['id']}' class='btn btn-danger btn_sm'>Deactivate</a>";
        } else {
            $output .= "<a href='slide_activate.php?id={$data['id']}' class='btn btn-success btn_sm'>Activate</a>";
        }
        $output .= "</td>";

        // Edit button
        $output .= "<td>";
        $output .= "<button class='btn btn-success btn_sm edit_slide' data-id='{$data['id']}' data-title='" . htmlspecialchars($data['slider_title'], ENT_QUOTES, 'UTF-8') . "' data-image='$data[slider_image]'>Edit</button>";
        $output .= "</td>";

        $output .= "</tr>";
    }
} else {
    // Handle case when there are no records
    $output .= "<tr><td colspan='5'>Slides Not found</td></tr>";
}

// Output the generated HTML
echo $output;
?>
