<?php 
require('authentication.php');
?>
<?php

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
        $break = isset($_POST['break_assit']) ? 1 : 0;
        $crash = isset($_POST['crash_sensor']) ? 1 : 0;
        $handling = isset($_POST['smooth_handling']) ? 1 : 0;
        $central = isset($_POST['cen_lock']) ? 1 : 0;
        $leather = isset($_POST['leather_seats']) ? 1 : 0;

        include "../shared/connection.php";

        $stmt = $conn->prepare("INSERT INTO bikes (title, brand, overview, year, capacity, rent, fuel, Break, breakAssit, crashSensor, smoothHandling, centralLocking, LeatherSeats, img1, img2, img3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssss", $title, $brand, $overview, $year, $seats, $rent, $fuel, $lock, $break, $crash, $handling, $central, $leather, $target1, $target2, $target3);

        if ($stmt->execute()) {
            header("Location: add_bike.php");
            exit();
        } else {
            echo "Failed to upload brand";
            echo $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Failed to move uploaded files.";
    }

?>

