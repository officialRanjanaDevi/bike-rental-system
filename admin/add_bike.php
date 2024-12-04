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

        <div class="" id="Vehicle">
            <div class=" d-flex flex-column dropdown">
                <a class="act link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="add_bike.php"> <i
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


        <div class="main_section"  >
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
                                <li><a class="dropdown-item" href="#"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a></li>

                            </ul>
                        </div>
                        <img src="images/admin.png" class="mt-1" alt="">
                    </div>
                </div>
            </nav>

            <!-- bread crumb -->
            <div class="my-2 ms-4">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class=" link-underline-opacity-0 link-dark fw-bold " href="admin_portal.php">DashBoard</a></li>
                        <li class="breadcrumb-item fw-bold">Brand</li>
                        <li class="breadcrumb-item fw-bold active" aria-current="page">Add New Bike</li>
                    </ol>
                </nav>
            </div>

            <!--add bike form  -->
            <div >
                <form method="POST" action="addbike.php"  enctype='multipart/form-data'  class=" m-5 row g-3">
                    <div class="col-md-6">
                        <label for="vehicle_title" class="form-label">Vehicle Title</label>
                        <input type="text" class="form-control" name="vehicle_title" required>
                    </div>
                    <div class='col-md-6'>
                        <label for='select_brand' class='form-label'>Select Brand</label>
                        <select name='select_brand' class='form-select' name='select_brand' required>
                            <option selected>Choose...</option>
                            <?php
                            include "../shared/connection.php";
                            $stmt = $conn->prepare("SELECT * FROM brand");
                            $stmt->execute();
                            $sql_result = $stmt->get_result();
                        
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                echo"hello";
                                 echo "<option>{$row['name']}</option>";
                            }

                // Close the prepared statement and connection
                $stmt->close();
                $conn->close();
                            ?>
                        </select>
                   </div>

                    <div class="col-12">
                        <label for="overview" class="form-label">Model Overview</label>
                        <textarea class="form-control" name="overview" placeholder="Write something here....." required></textarea>

                    </div>
                    <div class="col-md-2">
                        <label for="model_year" class="form-label">Model Year</label>
                        <input type="text" class="form-control" name="model_year" required>
                    </div>
                    <div class="col-md-4">
                        <label for="seats" class="form-label">Seating Capacity</label>
                        <select name="seats" class="form-select"required>
                            <option selected>Choose...</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="rent" class="form-label">Rent per day</label>
                        <input type="number" class="form-control" name="rent" required>
                    </div>

                    <div class="col-md-4">
                        <label for="fuel" class="form-label">Fuel Type</label>
                        <select name="fuel" class="form-select" required>
                            <option selected>Choose...</option>
                            <option>Petrol</option>
                            <option>CNG</option>
                            <option>Electric</option>
                        </select>
                    </div>

                    <div class=" col-md-4">
                        <label for="img1" class="" required> image 1</label>
                        <input type="file" name="img1" class="form-control mt-2">
                    </div>
                    <div class="col-md-4">
                        <label for="img2" class="" required> image 2</label>
                        <input type="file" name="img2" class="form-control mt-2">
                    </div>
                    <div class="col-md-4">
                        <label for="img3" class=""required> image 3</label>
                        <input type="file" name="img3" class="form-control mt-2">
                    </div>
                

                    <!-- accessories -->
                    <div class="row g-3">
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" value="" name="antilock">
                            <label class="form-check-label" for="antilock">
                                Anti-Lock Breaking System
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" value="" name="break_assit">
                            <label class="form-check-label" for="break_assit">
                                Break Assit
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" value="" name="crash_sensor">
                            <label class="form-check-label" for="crash_sensor">
                                Crash Sensor
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" value="" name="smooth_handling">
                            <label class="form-check-label" for="smooth_handling">
                                Smooth Handling
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" value="" name="cen_lock">
                            <label class="form-check-label" for="cen_lock">
                                Central Locking
                            </label>
                        </div>
                        <div class="form-check col-md-4">
                            <input class="form-check-input" type="checkbox" value="" name="leather_seats">
                            <label class="form-check-label" for="leather_seats">
                                Leather Seats
                            </label>
                        </div>
                    </div>
                    
                <div class='col-12 d-flex justify-content-between'>
                 <button class='btn col-md-4 btn-primary'>Submit</button>
                 <a class='btn col-md-4 btn-warning' href='update_bike.php'>Back</a>   
                </div>
                </form>
            </div>

        </div>
    </div>


</body>

</html>
