<?php
include("../connection.php");

// Query to fetch plants and their categories
$query = mysqli_query($connection, "SELECT * FROM tbl_users");

$output = "";

// Check if there are rows in the result set
if (mysqli_num_rows($query) > 0) {
    foreach ($query as $data) {
        $output .= "<tr>";
        $output .= "<td>{$data['user_id']}</td>";
        $output .= "<td>";
            $output .= "<img class='img-fluid' src='$data[user_image]' alt='User Image' />";
        $output .= "</td>";

        $output .= "<td>" . htmlspecialchars($data['user_name'], ENT_QUOTES, 'UTF-8') . "</td>";
        $output .= "<td>" . htmlspecialchars($data['user_email'], ENT_QUOTES, 'UTF-8') . "</td>";

        // Status buttons
        $output .= "<td>";
        if ($data['user_status'] == "activate") {
            $output .= "<a href='user_deactivate.php?id={$data['user_id']}' class='btn btn-danger btn_sm'>Deactivate</a>";
        } else {
            $output .= "<a href='user_activate.php?id={$data['user_id']}' class='btn btn-success btn_sm'>Activate</a>";
        }
        $output .= "</td>";

        // View button
        $output .= "<td>";
        $output .= "<button class='btn btn-light btn_sm view_user' data-id='{$data['user_id']}' data-name='" . htmlspecialchars($data['user_name'], ENT_QUOTES, 'UTF-8') . "' data-email='" . htmlspecialchars($data['user_email'], ENT_QUOTES, 'UTF-8') . "' data-user_image='$data[user_image]' >View</button>";
        $output .= "</td>";

        // Edit button
        $output .= "<td>";
        $output .= "<button class='btn btn-success btn_sm edit_user' data-id='{$data['user_id']}' data-name='" . htmlspecialchars($data['user_name'], ENT_QUOTES, 'UTF-8') . "' data-email='" . htmlspecialchars($data['user_email'], ENT_QUOTES, 'UTF-8') . "' data-password='" . htmlspecialchars($data['user_password'], ENT_QUOTES, 'UTF-8') . "' data-user_image='$data[user_image]'>Edit</button>";
        $output .= "</td>";

        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='7'>Users Not found</td></tr>";
}

echo $output;
?>
