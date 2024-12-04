<?php
// Include the database connection file
require('authentication.php');
include "../shared/connection.php";

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $status = "Booked";

        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE `order` SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        
        // Execute the statement and check for success
        if ($stmt->execute()) {
            header("Location: booking.php");
            exit();
        } else {
            echo "Failed to book bike: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Order ID not provided.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
