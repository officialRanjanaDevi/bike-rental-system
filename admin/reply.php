<?php
// Include the database connection file
include "../shared/connection.php";
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
    <div class="d-flex position-fixed w-100 ">
        <!-- Side nav starts -->
        <div class="side_nav ">
            <h2 class="text-center fs-5">Online Bike Rental</h2>
            <ul class="list-group">
                <li>
                    <div class="box"><i class="fa fa-tachometer" aria-hidden="true"></i> <a class="link-underline-opacity-0 link-light ms-1" href="admin_portal.php">DASHBOARD</a></div>
                </li>
                <li>
                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#Brand" role="button" aria-expanded="false" aria-controls="Brand">
                        <i class="fa fa-first-order" aria-hidden="true"></i> Brands
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y" aria-hidden="true"></i>
                    </div>
                    <div class="collapse" id="Brand">
                        <div class="d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="addbrand.php">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> Add new Brand
                            </a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_brand.php">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Brand
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#Vehicle" role="button" aria-expanded="false" aria-controls="Vehicle">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i> Vehicles
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y" aria-hidden="true"></i>
                    </div>
                    <div class="collapse" id="Vehicle">
                        <div class="d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="add_bike.php">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> Add new Vehicle
                            </a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_bike.php">
                                <i class="fa fa-wrench" aria-hidden="true"></i> Update Vehicle
                            </a>
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
                    <div class="" id="contacts">
                        <div class="d-flex flex-column dropdown">
                            <a class="act link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="contacts.php">
                                <i class="fa fa-plus-square" aria-hidden="true"></i> New Mails
                            </a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="sent_mails.php">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i> Sent
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box mt-3"><i class="fa fa-user-circle-o" aria-hidden="true"></i><a class="link-underline-opacity-0 link-light ms-1" href="users.php">Registered Users</a></div>
                </li>
            </ul>
        </div>
        <!-- Side nav ends -->
        <div class="main_section position-relative ">
            <!-- Navbar -->
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <h3>Hi, Admin</h3>
                    <div class="nav-item d-flex">
                        <i class="fa fa-bell-o nav-item pt-2 fs-5" aria-hidden="true"></i>
                        <div class="dropdown dropstart me-2">
                            <button class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bars fs-4" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a></li>
                            </ul>
                        </div>
                        <img src="images/admin.png" class="mt-1" alt="">
                    </div>
                </div>
            </nav>
            <div class="my-2 ms-4">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="link-underline-opacity-0 link-dark fw-bold" href="admin_portal.php">DashBoard</a></li>
                        <li class="breadcrumb-item fw-bold">Contacts</li>
                        <li class="breadcrumb-item fw-bold active" aria-current="page">Reply</li>
                    </ol>
                </nav>
            </div>


            <div class="h-50 w-50 bg-primary z-1 position-absolute top-50 start-50 translate-middle ">
    <div class="card text-center h-100 border-3 border-black">
        <div class="card-header">
            Send Message
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <?php
                // Include the database connection file
                include "../shared/connection.php";
        
                // Fetch the id from POST data
                $id = $_POST['id'];

                // Prepare the SQL statement to prevent SQL injection
                $stmt = $conn->prepare("SELECT mail FROM contacts WHERE id = ?");
                $stmt->bind_param("i", $id);

                // Execute the statement and fetch the result
                if ($stmt->execute()) {
                    $stmt->bind_result($mail);
                    $stmt->fetch();
                    echo htmlspecialchars($mail); // Output the email
                } else {
                    echo "Failed to execute query: " . htmlspecialchars($stmt->error);
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
                ?>
            </h5>
            <form action="reply_sent.php" method="POST">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"> <!-- Echo the id securely -->
                <div class="col-sm-12 my-3">
                    <textarea class="form-control" required placeholder="Write your message" name="message" aria-label="Message" rows="7"></textarea>
                </div>
                <div class="card-footer text-body-secondary">
                    <button type="submit" class="btn btn-primary w-50">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

            </div>
         


            
        </div>
    </div>

  
</body>

</html>
