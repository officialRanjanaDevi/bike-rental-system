<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] === true) {
    // Check if adminmail is set
    if (isset($_SESSION['adminmail'])) {
    } else {
         header("Location: logout.php");
    }
} else {
    header("Location: logout.php");
}
?>
