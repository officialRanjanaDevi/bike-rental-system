<?php
require('authentication.php');
include "../shared/connection.php";

$sql_result_brands = mysqli_query($conn, "SELECT * FROM brand");

$brand_data = [];

while ($row_brand = mysqli_fetch_assoc($sql_result_brands)) {
    $name = $row_brand['name'];
    $logo = $row_brand['logo'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS bike_count FROM bikes WHERE brand = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $sql_result_bikes = $stmt->get_result();
    $row_bikes = $sql_result_bikes->fetch_assoc();
    $bike_count = $row_bikes['bike_count'];

    $brand_data[] = [
        'brand' => $name, 
        'bikes' => $bike_count,
        'pictureSettings' => [
            'src' => $logo
        ]
    ];
}
$json_data = json_encode($brand_data);

$stmt = $conn->prepare("SELECT COUNT(*) AS bike_count FROM bikes");
$stmt->execute();

$sql_result_bikes = $stmt->get_result();
$row_bikes = $sql_result_bikes->fetch_assoc();
$bike_count = $row_bikes['bike_count'];


$stmt = $conn->prepare("SELECT COUNT(*) AS user_count FROM registered_user");
$stmt->execute();

$sql_result_bikes = $stmt->get_result();
$row_bikes = $sql_result_bikes->fetch_assoc();
$user = $row_bikes['user_count'];


$stmt = $conn->prepare("SELECT COUNT(*) AS mails FROM contacts WHERE status='Pending'");
$stmt->execute();

$sql_result_bikes = $stmt->get_result();
$row_bikes = $sql_result_bikes->fetch_assoc();
$mails= $row_bikes['mails'];

$stmt = $conn->prepare("SELECT COUNT(*) AS booking_count FROM `order` WHERE status = 'Pending'");
$stmt->execute();
$sql_result_bookings = $stmt->get_result();
$row_bookings = $sql_result_bookings->fetch_assoc();
$booking = $row_bookings['booking_count'];

// Count the number of cancel requests
$stmt = $conn->prepare("SELECT COUNT(*) AS cancel_count FROM `order` WHERE status = 'Cancel Requested'");
$stmt->execute();
$sql_result_cancels = $stmt->get_result();
$row_cancels = $sql_result_cancels->fetch_assoc();
$cancel= $row_cancels['cancel_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="d-flex">
        <!-- side nav starts -->
        <div class="side_nav">
            <h2 class="text-center fs-5">Online Bike Rental</h2>
            <ul class="list-group">
                <li>
                    <div class="box act"><i class="fa fa-tachometer" aria-hidden="true"></i> <a class="link-underline-opacity-0 link-light ms-1" href="admin_portal.php">DASHBOARD</a></div>
                </li>
                <li>
                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#Brand" role="button" aria-expanded="false" aria-controls="Brand">
                        <i class="fa fa-first-order" aria-hidden="true"></i>
                        Brands
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y" aria-hidden="true"></i>
                    </div>
                    <div class="collapse" id="Brand">
                        <div class="d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="addbrand.php"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Add new Brand</a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_brand.php"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Brand</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box mt-3 position-relative" data-bs-toggle="collapse" href="#Vehicle" role="button" aria-expanded="false" aria-controls="Vehicle">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i>
                        Vehicles
                        <i class="fa fa-caret-down position-absolute top-50 end-0 translate-middle-y" aria-hidden="true"></i>
                    </div>
                    <div class="collapse" id="Vehicle">
                        <div class="d-flex flex-column dropdown">
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="add_bike.php"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add new Vehicle</a>
                            <a class="link-underline-opacity-0 link-light link-opacity-75 ps-3 py-2" href="update_bike.php"> <i class="fa fa-wrench" aria-hidden="true"></i> Update Vehicle</a>
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
                    <div class="box mt-3"><i class="fa fa-user-circle-o" aria-hidden="true"></i><a class="link-underline-opacity-0 link-light ms-1" href="users.php">Registered Users</a></div>
                </li>
            </ul>
        </div>
        <!-- side nav ends -->
        <div class="main_section">
            <!-- navbar -->
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
            <div id="chartdiv" class="ms-5 mt-5"style="width: 100%; height:60%;"></div>
           <div class="row h-25  ms-5 mt-5 w-100">
            <div class="h-100  p-2 rounded-3 border-dark col-md-2 ms-5 ">
               <a type="button" class="border border-3 text-light border-dark btn fs-5 fw-semibold act position-relative h-50 mb-1 w-100" href="booking.php";>New Bookings
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">+<?php echo($booking);?></span>
</a>
                <a type="button" class="border border-3 text-light border-dark btn fs-5 fw-semibold act position-relative h-50 mb-1 w-100" href="cancel_requests.php">Cancel Requests
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">+<?php echo($cancel);?></span>
</a>
            </div>


               <div class="h-100 py-2   rounded-3 border-dark col-md-2 ms-5 ">  
                <a type="button" class="text-light border border-3 border-dark btn fs-5 fw-semibold act position-relative h-100 mb-1 w-100" href="contacts.php">New Mails
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">+<?php echo($user);?></span>
</a></div>
            <div class="h-100 py-2  rounded-3 border-dark col-md-2 ms-5 ">
                <a type="button" class="border text-light border-3 border-dark btn fs-5 fw-semibold act position-relative h-100 mb-1 w-100" href="users.php">Total Registered Users
                <h1 class="text-dark fw-bold"><?php echo($user);?></h1>
</a></div>
            <div class="h-100  py-2  rounded-3 border-dark col-md-2 ms-5 ">
            <a type="button" class="border border-3 text-light border-dark btn fs-5 fw-semibold act position-relative h-100 mb-1 w-100" href="update_bike.php">Bikes
              <h1 class="text-dark my-4 fw-bold"><?php echo($bike_count);?></h1>
              </a>
            </div>
           </div>
        </div>
    </div>
    <script>
        var data = <?php echo $json_data; ?>;

        am5.ready(function() {
            var root = am5.Root.new("chartdiv");

            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    wheelX: "none",
                    wheelY: "none",
                    paddingBottom: 30,
                    paddingTop: 40,
                    paddingLeft: 0,
                    paddingRight: 0
                })
            );

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minorGridEnabled: true,
                minGridDistance: 60
            });
            xRenderer.grid.template.set("visible", false);

            var xAxis = chart.xAxes.push(
                am5xy.CategoryAxis.new(root, {
                    paddingTop: 40,
                    categoryField: "brand",
                    renderer: xRenderer
                })
            );

            var yRenderer = am5xy.AxisRendererY.new(root, {});
            yRenderer.grid.template.set("strokeDasharray", [3]);

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    min: 0,
                    renderer: yRenderer
                })
            );

            var series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    name: "Bikes",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "bikes",
                    categoryXField: "brand",
                    sequencedInterpolation: true,
                    calculateAggregates: true,
                    maskBullets: false,
                    tooltip: am5.Tooltip.new(root, {
                        dy: -30,
                        pointerOrientation: "vertical",
                        labelText: "{valueY}"
                    })
                })
            );

            series.columns.template.setAll({
                strokeOpacity: 0,
                cornerRadiusBR: 10,
                cornerRadiusTR: 10,
                cornerRadiusBL: 10,
                cornerRadiusTL: 10,
                maxWidth: 40,
                fillOpacity: 0.8
            });

            var currentlyHovered;

            series.columns.template.events.on("pointerover", function(e) {
                handleHover(e.target.dataItem);
            });

            series.columns.template.events.on("pointerout", function(e) {
                handleOut();
            });

            function handleHover(dataItem) {
                if (dataItem && currentlyHovered != dataItem) {
                    handleOut();
                    currentlyHovered = dataItem;
                    var bullet = dataItem.bullets[0];
                    bullet.animate({
                        key: "locationY",
                        to: 1,
                        duration: 600,
                        easing: am5.ease.out(am5.ease.cubic)
                    });
                }
            }

            function handleOut() {
                if (currentlyHovered) {
                    var bullet = currentlyHovered.bullets[0];
                    bullet.animate({
                        key: "locationY",
                        to: 0,
                        duration: 200,
                        easing: am5.ease.out(am5.ease.cubic)
                    });
                }
            }

            var circleTemplate = am5.Template.new({});

            series.bullets.push(function(root, series, dataItem) {
                var bulletContainer = am5.Container.new(root, {});
                var circle = bulletContainer.children.push(
                    am5.Circle.new(
                        root,
                        {
                            radius: 25
                        },
                        circleTemplate
                    )
                );

                var maskCircle = bulletContainer.children.push(
                    am5.Circle.new(root, { radius: 27 })
                );

                var imageContainer = bulletContainer.children.push(
                    am5.Container.new(root, {
                        mask: maskCircle
                    })
                );

                var image = imageContainer.children.push(
                    am5.Picture.new(root, {
                        templateField: "pictureSettings",
                        centerX: am5.p50,
                        centerY: am5.p50,
                        width: 60,
                        height: 60
                    })
                );

                return am5.Bullet.new(root, {
                    locationY: 0,
                    sprite: bulletContainer
                });
            });

            series.set("heatRules", [
                {
                    dataField: "valueY",
                    min: am5.color(0xFF8F00),
                    max: am5.color(0xFF8F00),
                    target: series.columns.template,
                    key: "fill"
                },
                {
                    dataField: "valueY",
                    min: am5.color(0x000000),
                    max: am5.color(0x000000),
                    target: circleTemplate,
                    key: "fill"
                }
            ]);

            series.data.setAll(data);
            xAxis.data.setAll(data);

            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineX.set("visible", false);
            cursor.lineY.set("visible", false);

            cursor.events.on("cursormoved", function() {
                var dataItem = series.get("tooltip").dataItem;
                if (dataItem) {
                    handleHover(dataItem);
                } else {
                    handleOut();
                }
            });

            series.appear();
            chart.appear(1000, 100);
        });
    </script>
</body>
</html>
