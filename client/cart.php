<?php
include "authentication.php";
include "../shared/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental System(MiniProject)</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
      
    <link rel="Stylesheet" href="index.css" />
</head>
<body>
<nav class="navbar  navbar-expand-lg border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Online Bike Rental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
            <li class="nav-item ms-5">
              <a class="nav-link " aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="bike_listing.php">Bike Listing</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link " href="rented.php">Orders</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="faqs.html">FAQs</a>
            </li>
            <li class="nav-item ms-5">
              <a class="nav-link" href="contact_us.php">Contact us</a>
            </li>
          </ul>
          <button type="button" onclick="location.href = 'cart.php'" class=" btn btn-outline-light border-0 ">
          <i class="fa fa-cart-plus fs-4" aria-hidden="true"></i></button>
          <div class="dropdown dropstart">
  <a class=" btn btn-outline-light border-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-sign-out fs-4" aria-hidden="true"></i>
  </a>

  <ul class="dropdown-menu mt-4 bg-transparent border-2 border-light ms-3">
    <li><a class="btn btn-outline-light border-0 w-100 rounded-0" href="logout.php">Log Out</a></li>
    <li><a class="btn btn-outline-light border-0 w-100 rounded-0" href="#">Your Profile</a></li>
  </ul>
</div>
<i class="fa fa-user-circle-o fs-4 text-light" aria-hidden="true"></i>  
        </div>
      </div>
    </nav>

      <h2 class="text-center mt-5">Selected Bikes</h2>
      <table class="w-75 mx-auto my-5 table table-striped table-hover">
      <thead>
    <tr>
        <th scope="col">S.No</th>
        <th scope="col">Title</th>
        <th scope="col">Brand</th>
        <th scope="col">Images</th>
        <th scope="col">Rent per day</th>
        <th scope="col">Remove</th>
    </tr>
</thead>
<tbody class="table-group-divider">
    <?php
  
    $count = 1;
    $mail = $_SESSION['usermail'];  // Assuming session is already started

    // Use prepared statements for the outer query
    $stmt = $conn->prepare("SELECT * FROM cart WHERE mail= ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($cartRow = $result->fetch_assoc()) {
        $bike_id = $cartRow['bike_id'];

        // Use prepared statements for the inner query
        $stmt2 = $conn->prepare("SELECT * FROM bikes WHERE id= $bike_id");
        
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($bikeRow = $result2->fetch_assoc()) {
            echo "<tr>
                <td>{$count}</td>
                <td>{$bikeRow['title']}</td>
                <td>{$bikeRow['brand']}</td>
                <td><img src='{$bikeRow['img1']}' class='picture' style='width: 100px; height: 100px;'></td>
                <td>{$bikeRow['rent']} INR</td>
                
                <td>
                    <form method='POST' action='remove.php'>
                        <input type='hidden' name='id' value='{$cartRow['id']}'>
                        <input type='submit' class='btn btn-danger' value='Remove'>
                    </form>
                </td>
            </tr>";
            $count++;
        }

        $stmt2->close();
    }

    $stmt->close();
    $conn->close();
    ?>
</tbody>

            </table>

      <!--footer  starts-->
      <div class="border-1 border-top">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white " style="background-color: #000000">
          <!-- Grid container -->
          <div class=" p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
              <!--Grid row-->
              <div class="row mx-5 px-5 ">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0 pe-5">
                  <h5 class="text-uppercase">FOOTER CONTENT</h5>
    
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Molestiae modi cum ipsam ad, illo possimus laborum ut
                    reiciendis obcaecati. Ducimus, quas. Corrupti, pariatur eaque?
                    Reiciendis assumenda iusto sapiente inventore animi?
                  </p>
                </div>
                <!--Grid column-->
    
    
                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 mx-5 px-5">
                  <h5 class="text-uppercase">Links</h5>
    
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#!" class="text-white">Link 1</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 2</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 3</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 4</a>
                    </li>
                  </ul>
                </div>
                <!--Grid column-->
    
                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0 ms-5 ps-5">
                  <h5 class="text-uppercase">Links</h5>
    
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#!" class="text-white">Link 1</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 2</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 3</a>
                    </li>
                    <li>
                      <a href="#!" class="text-white">Link 4</a>
                    </li>
                  </ul>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </section>
            <!-- Section: Links -->
    
            <hr class="mb-4" />
    
            <!-- Section: CTA -->
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <span class="me-3">Register for free</span>
                <button type="button" class="btn btn-outline-light btn-rounded">
                  Sign up!
                </button>
              </p>
            </section>
            <!-- Section: CTA -->
    
            <hr class="mb-4" />
    
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
              <!-- Facebook -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                  class="fab fa-facebook-f"></i></a>
    
              <!-- Twitter -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
    
              <!-- Google -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
    
              <!-- Instagram -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
    
              <!-- Linkedin -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                  class="fab fa-linkedin-in"></i></a>
    
              <!-- Github -->
              <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
          </div>
          <!-- Grid container -->
    
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </div>
 
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
