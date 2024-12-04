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


                    <div class="" id="Brand">
                        <div class=" d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="addbrand.php"> <i
                                    class="fa fa-check-square-o" aria-hidden="true"></i> Add new Brand</a>
                            <a class="act link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_brand.php"> <i
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
                    
                    <div class="collapse" id="booking">
                        <div class="d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="booking.php">
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
                      <li class="breadcrumb-item fw-bold">Brand</li>
                      <li class="breadcrumb-item fw-bold active" aria-current="page">Update Brand</li>
                    </ol>
                </nav>
                </div>

                <table class="w-75 mx-auto table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Total Bikes</th>
                        <th scope="col">Brand Logo</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
include "../shared/connection.php"; // Assuming this includes your database connection

$count = 1;
$sql_result_brands = mysqli_query($conn, "SELECT * FROM brand");

while ($row_brand = mysqli_fetch_assoc($sql_result_brands)) {
    $name = $row_brand['name'];

    // Prepare and execute the query to count bikes for the current brand
    $stmt = $conn->prepare("SELECT COUNT(*) AS bike_count FROM bIKES WHERE brand = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    // Get the result
    $sql_result_bikes = $stmt->get_result();

    // Fetch the count from the result
    $row_bikes = $sql_result_bikes->fetch_assoc();
    $bike_count = $row_bikes['bike_count'];

    // Output table row with brand information and bike count
    echo "<tr>
              <td>{$count}</td>
              <td>{$row_brand['name']}</td>
              <td>{$bike_count}</td>
              <td><img src='{$row_brand['logo']}' class='picture' style='width: 50px; height: 50px;'></td>
              <td>
                <form method='POST' action='edit_brand.php'>
                  <input type='hidden' name='name' value='{$row_brand['name']}'>
                  <input type='submit' class='btn btn-primary' value='Update'>
                </form>
              </td>
              <td>
                <form method='POST' action='delete_brand.php'>
                  <input type='hidden' name='name' value='{$row_brand['name']}'>
                  <input type='submit' class='btn btn-danger' value='Delete'>
                </form>
              </td>
          </tr>";
    $count++;
}

?>

                </tbody>
            </table>
            
              
                
        </div>
    </div>

</body>

</html>
