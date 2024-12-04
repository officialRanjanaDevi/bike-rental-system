<?php
require('authentication.php');
   include "authentication.php";
$id = $_POST['id'];
$targetDir = "../shared/images/";
$target1 = $targetDir . basename($_FILES['img1']['name']);
$target2 = $targetDir . basename($_FILES['img2']['name']);
$target3 = $targetDir . basename($_FILES['img3']['name']);

if (
    move_uploaded_file($_FILES['img1']['tmp_name'], $target1) &&
    move_uploaded_file($_FILES['img2']['tmp_name'], $target2) &&
    move_uploaded_file($_FILES['img3']['tmp_name'], $target3)
) {
    $title = $_POST['vehicle_title'];
    $brand = $_POST['select_brand'];
    $overview = $_POST['overview'];
    $year = $_POST['model_year'];
    $seats = $_POST['seats'];
    $rent = $_POST['rent'];
    $fuel = $_POST['fuel'];

    $lock = isset($_POST['antilock']) ? 1 : 0;
    $brake = isset($_POST['brake_assist']) ? 1 : 0;
    $crash = isset($_POST['crash_sensor']) ? 1 : 0;
    $handling = isset($_POST['smooth_handling']) ? 1 : 0;
    $central = isset($_POST['cen_lock']) ? 1 : 0;
    $leather = isset($_POST['leather_seats']) ? 1 : 0;

    include "../shared/connection.php";

    $stmt = $conn->prepare("UPDATE bikes SET title=?, brand=?, overview=?, fuel=?, Break=?, breakAssit=?, crashSensor=?, smoothHandling=?, centralLocking=?, LeatherSeats=?, img1=?, img2=?, img3=? ,year=$year, capacity=$seats, rent=$rent WHERE id=$id");
    $stmt->bind_param("sssssssssssss", $title, $brand, $overview,$fuel, $lock, $brake, $crash, $handling, $central, $leather, $target1, $target2, $target3);

    if ($stmt->execute()) {
        header("Location: update_bike.php");
        exit();
    } else {
        echo "Failed to update bike:  . $stmt->error";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Failed to move uploaded files.";
}
?>
