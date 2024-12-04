<?php 
require('authentication.php');
?>
<?php


if (isset($_FILES['brandimg']) && isset($_POST['brand_name'])) {
    $target = "../shared/images/" . basename($_FILES['brandimg']['name']);

    if (move_uploaded_file($_FILES['brandimg']['tmp_name'], $target)) {
        $name = $_POST['brand_name'];

        include "../shared/connection.php";

        $status = mysqli_query($conn, "INSERT INTO brand (name, logo) VALUES ('$name', '$target')");
        if ($status) {
            header("Location: addbrand.php");
            exit();
        } else {
            echo "Failed to upload brand";
            echo mysqli_error($conn);
        }
    } else {
        echo "Failed to move uploaded file.";
    }
} else {
    echo "Please provide both brand name and image.";
}

?>
