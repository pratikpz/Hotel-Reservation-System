<?php
require('include/header.php');
require('include/links.php');

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';
$con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
    die("Cannot connect to the database: " . mysqli_connect_error());
}
// Function to check if a room is already booked
function isRoomBooked($room_name)
{
    global $con;
    // Fetch reservations from the database for the given room name with status 'Approved'
    $query = "SELECT status FROM reservations WHERE room_name = '$room_name' AND status = 'Approved'";
    $result = mysqli_query($con, $query);

    return mysqli_num_rows($result) > 0;
}
// Query to retrieve room data
$qry = "SELECT * FROM rooms";
$result = mysqli_query($con, $qry);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hamro Hotel - Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .my-5 {
            margin-top: 40px;
        }

        .h-font {
            font-size: 24px;
        }

        .h-line {
            height: 3px;
            background-color: #000;
        }

        .fc {
            height: 100%;
        }



        /* Add your custom CSS styles for badges */
        .badge-booked {
            background-color: red;
            color: #fff;
            font-size: 0.8rem;
            padding: 5px 10px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 px-0 fc">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filter</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                                <label class="form-label" style="font-weight:500">Check-In</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label" style="font-weight:500">Check-Out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Facility one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Facility two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Facility three</label>
                                </div>
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Guests</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-check-label">Adults</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-check-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="card mb-4 border-0 shadow">
                    <?php
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="row g-0 p-3 align-items-center">
                            <div class="col-md-5 px-lg-0 me-3 px-md-2 px-0 mb-2">
                                <!-- Use the 'room_image' value from the database to construct the image path -->
                                <img src="admin/images/rooms/<?php echo $data['room_image']; ?>" class="img-fluid rounded-start" alt="...">
                            </div>

                            <div class="col-md-4 mb-lg-0 mb-md-0 mb-3">
                                <h5 class="mb-3"><?php echo $data['room_name']; ?></h5>
                                <div class="features mb-3">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge bg-light text-dark text-wrap">
                                        <?php echo $data['room_features1']; ?>
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        <?php echo $data['room_features2']; ?>
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        <?php echo $data['room_features3']; ?>
                                    </span>
                                </div>

                                <div class="facilities mb-3">
                                    <h6 class="mb-1">Facilities</h6>
                                    <span class="badge bg-info text-dark text-wrap">
                                        <?php echo $data['room_facilities1']; ?>
                                    </span>
                                    <span class="badge bg-info text-dark text-wrap">
                                        <?php echo $data['room_facilities2']; ?>
                                    </span>
                                    <span class="badge bg-info text-dark text-wrap">
                                        <?php echo $data['room_facilities3']; ?>
                                    </span>
                                </div>
                                <div class="guests">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge bg-info text-dark text-wrap">
                                        <?php echo $data['guests_adults']; ?> Adults
                                    </span>
                                    <span class="badge bg-info text-dark text-wrap">
                                        <?php echo $data['guests_children']; ?> Children
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2 mt-lg-0 mt-4 text-center">
                                <h6 class="mb-4">Rs. <?php echo $data['room_price']; ?> per night</h6>
                                <?php
                                $room_name = $data['room_name'];
                                if (isRoomBooked($room_name)) {
                                    echo '<span class="badge badge-booked">Already Booked</span>';
                                } else {
                                    // Check if the user is logged in
                                    if (isset($_SESSION['email'])) {
                                        // User is logged in, show the "Book Now" button
                                        echo '<a href="reservation.php?room_name=' . $room_name . '&action=book" class="btn btn-success btn-sm shadow-none">Book Now</a>';
                                    } else {
                                        // User is not logged in, show the login prompt
                                        echo '<button class="btn btn-success btn-sm shadow-none" onclick="showLoginAlert()">Book Now</button>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showLoginAlert() {
            alert("Please log in first to make a reservation.");
        }
    </script>
</body>

</html>