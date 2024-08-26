<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $plant_name = $_POST['plant_name'];
    $plant_desc = $_POST['plant_desc'];
    $plant_category = $_POST['plant_category'];

    // Initialize image path variable
    $image_path = '';

    // Check if an image file is uploaded
    if (!empty($_FILES['plant_image']['name'])) {
        // Set upload directory
        $uploadDir = "uploads/plants/$plant_name/";

        // Create directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate a unique file name and move the uploaded file
        $image_ext = pathinfo($_FILES['plant_image']['name'], PATHINFO_EXTENSION);
        $image_path = $uploadDir . uniqid() . "." . $image_ext;

        if (!move_uploaded_file($_FILES['plant_image']['tmp_name'], $image_path)) {
            echo "Failed to upload image.";
            exit;
        }
    }

    // Insert plant data into the database
    $query = "INSERT INTO tbl_plants (plant_name, plant_description, category_id, plant_image) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ssss", $plant_name, $plant_desc, $plant_category, $image_path);

    // Execute and check for errors
    if ($stmt->execute()) {
        echo "Plant Added Successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
?>
