<?php 
require('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        #chartdiv {
          width: 100%;
          height: 500px;
        }
        </style>
</head>

<body>
    <div class="d-flex ">

       
    
        <!-- side nav starts -->
        <div class="side_nav">



            <h2 class="text-center fs-5">Online Bike Rental</h2>
            <ul class="list-group ">
                <li>
                    <div class="box "><i class="fa fa-tachometer  " aria-hidden="true"></i> <a class="link-underline-opacity-0  link-light ms-1" href="admin_portal.php">DASHBOARD</a></div>
                </li>
                <li>

                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#Brand" role="button"
                        aria-expanded="false" aria-controls="Brand">
                        <i class="fa fa-first-order" aria-hidden="true"></i>
                        Brands
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y"
                            aria-hidden="true"></i>
                    </div>


                    <div class="collapse" id="Brand">
                        <div class=" d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="addbrand.php"> <i
                                    class="fa fa-check-square-o" aria-hidden="true"></i> Add new Brand</a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_brand.php"> <i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Brand</a>
                        </div>

                    </div>


                </li>
                <li>

                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#Vehicle" role="button"
                        aria-expanded="false" aria-controls="Vehicle"><i class="fa fa-motorcycle"
                            aria-hidden="true"></i>
                        Vehicles
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y"
                            aria-hidden="true"></i>
                    </div>

                    <div class="collapse" id="Vehicle">
                        <div class=" d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="add_bike.php"> <i
                                    class="fa fa-plus-square" aria-hidden="true"></i> Add new Vehicle</a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_bike.php"> <i
                                    class="fa fa-wrench" aria-hidden="true"></i> Update Vehicle</a>
                        </div>
                    </div>
                </li>
                <li>

                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#booking" role="button" aria-expanded="false" aria-controls="booking">
                        <i class="fa fa-bookmark-o" aria-hidden="true"></i> Manage Bookings
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y" aria-hidden="true"></i>
                    </div>
                    
                    <div class="" id="booking">
                        <div class="d-flex flex-column dropdown">
                            <a class="act link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="booking.php">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> New Bookings
                            </a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="cancel_requests.php">
                                <i class="fa fa-wrench" aria-hidden="true"></i> Cancel Requests
                            </a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="booking_canceled.php">
                                <i class="fa fa-times-circle" aria-hidden="true"></i> Canceled 
                            </a>
                        </div>
                    </div>
                    
                </li>
                <li>

                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#contacts" role="button" aria-expanded="false" aria-controls="contacts">
                        <i class="fa fa-address-book" aria-hidden="true"></i> Contacts
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y" aria-hidden="true"></i>
                    </div>
                    
                    <div class="collapse" id="contacts">
                        <div class="d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="contacts.php">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> New Mails
                            </a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="sent_mails.php">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i> Sent
                            </a>
                        </div>
                    </div>
                    
                </li>
              
                <li>
                    <div class="box mt-3"><i class="fa fa-user-circle-o" aria-hidden="true"></i><a class="link-underline-opacity-0  link-light ms-1"  href="users.php">Registered Users</a></div>
                </li>
              


            </ul>

        </div>
        <!-- side nav ends -->

        <div class="main_section">
            <!-- navbar -->
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <h3>Hi, Admin</h3>
                    <div class="nav-item d-flex ">
                        <i class="fa fa-bell-o nav-item pt-2 fs-5" aria-hidden="true"></i>

                        <div class=" dropdown dropstart me-2">
                            <button class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bars fs-4" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Log Out</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-unlock-alt"
                                            aria-hidden="true"></i> Change Password</a></li>

                            </ul>
                        </div>
                        <img src="images/admin.png" class="mt-1" alt="">
                    </div>
                </div>
            </nav>

 
            <div class="my-2 ms-4">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a class=" link-underline-opacity-0 link-dark fw-bold " href="admin_portal.php">DashBoard</a></li>
                      
                      <li class="breadcrumb-item fw-bold " aria-current="page">Manage Booking</li>
                      <li class="breadcrumb-item fw-bold active" aria-current="page">New Bookings</li>
                    </ol>
                </nav>
             </div>
             <div class='m-5'>
             <h2 class="text-center">New Bookings</h2>
    <table class="border border-dark border-3 table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Days</th>
                <th scope="col">Bike Id</th>
                <th scope="col">Brand</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Book/Accept</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
        include "../shared/connection.php"; // Assuming this includes your database connection
       
        $count = 1;

        // Prepare and execute the query to fetch orders with a status of "Pending"
        $stmt_order = $conn->prepare("SELECT * FROM `order` WHERE status = ?");
        $status = "Pending";
        $stmt_order->bind_param("s", $status);
        $stmt_order->execute();
        $sql_result_order = $stmt_order->get_result();

        // Loop through each order and display the details
        while ($row_order = mysqli_fetch_assoc($sql_result_order)) {
            $bike_id = $row_order['bike_id'];

            // Prepare and execute the query to fetch bike details based on bike_id
            $stmt_bike = $conn->prepare("SELECT * FROM bIKES WHERE id = ?");
            $stmt_bike->bind_param("i", $bike_id); // Use 'i' for integer parameter
            $stmt_bike->execute();
            $sql_result_bikes = $stmt_bike->get_result();

            // Fetch the bike details
            $row_bikes = $sql_result_bikes->fetch_assoc();

            // Output table row with order and bike details
            echo "<tr>
                  <td>{$count}</td>
                  <td>{$row_order['name']}</td>
                  <td>{$row_order['mail']}</td>
                  <td>{$row_order['contact']}</td>
                  <td>{$row_order['address']}</td>
                  <td>{$row_order['days']}</td> 
                  <td>{$row_order['bike_id']}</td>
                  <td>{$row_bikes['brand']}</td>
                  <td>{$row_bikes['title']}</td>
                  <td><img src='{$row_bikes['img1']}' class='picture' style='width: 50px; height: 50px;'></td>
                  <td>{$row_order['status']}</td>
                  <td class=''>
                    <form method='POST' action='book.php' >
                      <input type='hidden' name='id' value='{$row_order['id']}'>
                      <input type='submit' class='btn btn-danger col-md-12' value='Book'>
                    </form>
                    <form method='POST' action='cancel.php'>
                      <input type='hidden' name='id' value='{$row_order['id']}'>
                      <input type='submit' class='btn col-md-12 mt-3 btn-danger' value='Cancel'>
                    </form>
                  </td>
              </tr>";
            $count++;
            $stmt_bike->close();
        }

        // Close prepared statements and database connection
        $stmt_order->close();
       
        $conn->close();
        ?>
        </tbody>
    </table>
</div>


<div class='m-5'>
    <h2 class="text-center">Bookings</h2>
    <table class="border border-dark border-3 table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Days</th>
                <th scope="col">Bike Id</th>
                <th scope="col">Brand</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
               
            </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
        include "../shared/connection.php"; // Assuming this includes your database connection

        $count = 1;

        // Prepare and execute the query to fetch orders with a status of "Pending"
        $stmt_order = $conn->prepare("SELECT * FROM `order` WHERE status = ?");
        $status = "Booked";
        $stmt_order->bind_param("s", $status);
        $stmt_order->execute();
        $sql_result_order = $stmt_order->get_result();

        // Loop through each order and display the details
        while ($row_order = mysqli_fetch_assoc($sql_result_order)) {
            $bike_id = $row_order['bike_id'];

            // Prepare and execute the query to fetch bike details based on bike_id
            $stmt_bike = $conn->prepare("SELECT * FROM bIKES WHERE id = ?");
            $stmt_bike->bind_param("i", $bike_id); // Use 'i' for integer parameter
            $stmt_bike->execute();
            $sql_result_bikes = $stmt_bike->get_result();

            // Fetch the bike details
            $row_bikes = $sql_result_bikes->fetch_assoc();

            // Output table row with order and bike details
            echo "<tr>
                  <td>{$count}</td>
                  <td>{$row_order['name']}</td>
                  <td>{$row_order['mail']}</td>
                  <td>{$row_order['contact']}</td>
                  <td>{$row_order['address']}</td>
                  <td>{$row_order['days']}</td> 
                  <td>{$row_order['bike_id']}</td>
                  <td>{$row_bikes['brand']}</td>
                  <td>{$row_bikes['title']}</td>
                  <td><img src='{$row_bikes['img1']}' class='picture' style='width: 50px; height: 50px;'></td>
                  <td>{$row_order['status']}</td>
                 
              </tr>";
            $count++;
            $stmt_bike->close();
        }

        // Close prepared statements and database connection
        $stmt_order->close();
       
        $conn->close();
        ?>
        </tbody>
    </table>
</div>

        </div>
    </div>

   
</body>

</html>
