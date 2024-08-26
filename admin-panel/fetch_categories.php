<?php
include("../connection.php");
$query = mysqli_query($connection, "SELECT * FROM tbl_categories");
$output = "";
if (mysqli_num_rows($query) > 0) {
    foreach ($query as $data) {
        $output .= "<tr>";
        $output .= "<td>$data[category_id]</td>";
        $output .= "<td>$data[category_name]</td>";
        $output .= "<td>";
        if ($data['category_status'] == "available") {
            $output .= "<a href='category_unavailable.php?id=$data[category_id]' class='btn btn-danger btn_sm'>Unavailable</a>";
        } else {
            $output .= "<a href='category_available.php?id=$data[category_id]' class='btn btn-success btn_sm'>Available</a>";
        }
        $output .= "</td>";
        $output .= "<td>";
        $output .= "<button class='btn btn-success btn_sm edit_category' data-category_id='{$data['category_id']}' data-category_name='{$data['category_name']}'>Edit</button>";
        $output .= "</td>";

        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='4'></td>/<tr>";
}
echo $output;
