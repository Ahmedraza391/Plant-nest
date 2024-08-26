<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['slide_title'];

    $image_path = '';

    if (!empty($_FILES['slide_image']['name'])) {
        // Set upload directory
        $uploadDir = "uploads/slider/";

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate a unique file name and move the uploaded file
        $image_ext = pathinfo($_FILES['slide_image']['name'], PATHINFO_EXTENSION);
        $image_path = $uploadDir . uniqid() . "." . $image_ext;

        if (!move_uploaded_file($_FILES['slide_image']['tmp_name'], $image_path)) {
            echo "Failed to upload image.";
            exit;
        }
    }

    // Insert slides data into the database
    $query = "INSERT INTO tbl_slider (slider_title,slider_image) VALUES (?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $title, $image_path);

    // Execute and check for errors
    if ($stmt->execute()) {
        echo "Slide Added Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
?>
