<?php
// Include the database connection file
require('authentication.php');
include "../shared/connection.php";

// Check if form data and files are set

    $name = $_POST['brand_name'];
    $bikes = $_POST['bikes'];
    
    // Validate that the uploaded file is an image
    $fileType = pathinfo($_FILES['brand_logo']['name'], PATHINFO_EXTENSION);
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array(strtolower($fileType), $allowedTypes)) {
        $target = "../shared/images/" . basename($_FILES['brand_logo']['name']);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['brand_logo']['tmp_name'], $target)) {
            // Prepare the SQL UPDATE statement
            $stmt = $conn->prepare("UPDATE brand SET  logo = ? WHERE name = ?");
            $stmt->bind_param("ss", $target, $name);
            
            // Execute the statement and check for success
            if ($stmt->execute()) {
                header("Location: update_brand.php");
                exit();
            } else {
                echo "Failed to update brand: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }


$conn->close();
?>
