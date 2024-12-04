<?php
require('authentication.php');
include "../shared/connection.php";
include "template.html"; // Assuming this includes your HTML template

$name = $_POST['name'];

// Query to fetch brand details
$stmt = $conn->prepare("SELECT * FROM brand WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$sql_result_brand = $stmt->get_result();

// Fetch brand details
$row_brand = $sql_result_brand->fetch_assoc();

// Query to count bikes for the brand
$stmt2 = $conn->prepare("SELECT COUNT(*) AS bike_count FROM bIKES WHERE brand = ?");
$stmt2->bind_param("s", $name);
$stmt2->execute();
$sql_result_bikes = $stmt2->get_result();

// Fetch bike count
$row_bikes = $sql_result_bikes->fetch_assoc();
$bike_count = $row_bikes['bike_count'];

// Display the form with fetched data
echo "
<div class='card position-absolute bottom-0 mb-5 end-50 w-25 border border-dark'>
    <div class='card-img-top'>
        <img src='{$row_brand['logo']}' class='h-100 w-100 rounded'>
    </div>
    <form method='POST' action='edit.php' enctype='multipart/form-data' class='card-body mx-auto my-2 row g-3'>
        <div class='row-md-4'>
            <label for='brand_name' class='form-label'>Brand name</label>
            <input type='text' class='form-control' id='brand_name' value='" . htmlspecialchars($row_brand['name'], ENT_QUOTES) . "' name='brand_name' required>
        </div>

        <div class='row-md-4'>
            <label for='bikes' class='form-label'>Bikes</label>
            <input type='number' class='form-control' id='bikes' value='$bike_count' name='bikes' required>
        </div>

        <div class='row-md-4'>
            <label for='brand_logo' class='form-label'>Brand logo</label>
            <input type='file' class='form-control' id='brand_logo' name='brand_logo' required>
        </div>

        <div class='row-md-12 mt-4 d-flex justify-content-evenly'>
            <button type='submit' class='col-md-5 btn btn-primary'>Update</button>
            <a type='button' href='update_brand.php'class='col-md-5  btn btn-warning'>Back</a>
        </div>
    </form>
</div>";

// Close prepared statements and database connection
$stmt->close();
$stmt2->close();
$conn->close();
?>
