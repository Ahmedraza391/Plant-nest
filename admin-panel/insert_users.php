<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and trim form inputs
    $userName = trim($_POST['user_name']);
    $userEmail = trim($_POST['user_email']);
    $userPassword = trim($_POST['user_password']);

    // Validate image
    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] === 0) {
        $image = $_FILES['user_image'];
        $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        if (in_array($imageExtension, $allowedExtensions)) {
            // Define the directory path
            $userDirectory = 'uploads/users/' . $userEmail;

            // Create the directory if it doesn't exist
            if (!is_dir($userDirectory)) {
                mkdir($userDirectory, 0777, true);
            }

            $imageNewName = uniqid() . "." . $imageExtension;
            $imageDestination = $userDirectory . "/" . $imageNewName;

            if (move_uploaded_file($image['tmp_name'], $imageDestination)) {
                // Insert user data into the database
                $sql = "INSERT INTO tbl_users (user_name, user_email, user_password, user_image) VALUES ('$userName', '$userEmail', '$userPassword', '$imageDestination')";

                if ($connection->query($sql) === TRUE) {
                    echo "User added successfully!";
                } else {
                    echo "Error: " . $connection->error;
                }

                $connection->close();
            } else {
                echo "Error uploading the image.";
            }
        } else {
            echo "Invalid image file type.";
        }
    } else {
        echo "Please upload an image.";
    }
} else {
    echo "Invalid request method.";
}
?>
