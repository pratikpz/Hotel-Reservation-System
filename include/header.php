<?php session_start();
require('include/links.php');

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hotel Reservation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .notification-menu {
            position: absolute;
            top: 100%;
            right: 0;
            width: 500px;
            /* Adjust the width as needed */
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-height: 600px;
            /* Set a maximum height for the menu */
            overflow-y: auto;
            /* Add a scrollbar if the content exceeds the maximum height */
            z-index: 1;
        }

        .notification-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;

        }

        .notification-menu a:hover {
            background-color: #f5f5f5;
        }

        .bell-icon {
            position: relative;
            display: inline-block;
            margin-right: 20px;
            font-size: 1.5rem;
            color: #333;
            cursor: pointer;
        }

        .bell-icon .notification-badge {
            position: absolute;
            top: -5px;
            right: -8px;
            background-color: red;
            color: #fff;
            font-size: 0.8rem;
            padding: 2px 6px;
            border-radius: 50%;
        }

        .dropdown-menu {
            min-width: 150px;

        }

        .bell-icon i {
            transition: transform 0.3s;
            /* Add a smooth transition when icon is rotated */
        }

        .bell-icon.active i {
            transform: rotate(90deg);
            /* Rotate the icon when dropdown is shown */
        }

        .notification-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: none;
            min-width: 200px;
            /* Set the width of the dropdown */
        }

        .bell-icon.active .notification-menu {
            display: block;
            max-height: 70px;
            /* Set the height of the dropdown */
            overflow-y: auto;
            /* Enable scroll if content overflows */
        }

        .notification-menu a {
            display: block;
            padding: 8px 12px;
            color: #333;
            text-decoration: none;
        }

        .notification-menu a:hover {
            background-color: #f7f7f7;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle the bell icon and notification dropdown
            $('#bellIcon').click(function() {
                $('.notification-menu').toggleClass('active');
                $('.bell-icon').toggleClass('active');
            });
        });
    </script>
</head>

<body>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Add the Bootstrap CSS and Bootstrap Icons CSS links to your head section if not already added -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <nav class="navbar navbar-expand-lg navbar-light px-lg-3 py-lg-2 shadow-sm sticky-top" style="background-color: white;">
        <div class="container-fluid">
            <!-- Brand logo -->
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Hamro Hotel</a>
            <!-- Toggler button for responsive navigation -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation links -->
            <?php
            $curl = $_SERVER['REQUEST_URI'];
            $url = substr($curl, 9, -4);
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Your navigation links -->
                    <li class="nav-item <?php if ($url === 'index') echo 'active'; ?>">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item <?php if ($url === 'rooms') echo 'active'; ?>">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item <?php if ($url === 'facilities') echo 'active'; ?>">
                        <a class="nav-link" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item <?php if ($url === 'contact') echo 'active'; ?>">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item <?php if ($url === 'about') echo 'active'; ?>">
                        <a class="nav-link" href="About.php">About Us</a>
                    </li>
                </ul>
                <!-- User profile and notification dropdown -->
                <div class="d-flex flex-wrap position-relative">
                    <?php
                    if (isset($_SESSION['email'])) {
                        $userEmail = $_SESSION['email'];


                        // Database connection parameters
                        $host = 'localhost';
                        $username = 'root';
                        $password = '';
                        $database = 'hbwebsite';

                        // Create a connection
                        $con = mysqli_connect($host, $username, $password, $database);

                        // Check connection
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        // Fetch user's bookings from the database
                        $query = "SELECT room_name, status FROM reservations WHERE email = '$userEmail'";
                        $result = mysqli_query($con, $query);
                        $notification = '';

                        $notifications = array();

                        // Iterate through bookings and update notifications
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['status'] === 'Approved') {
                                $notification = "Your request for {$row['room_name']} has been approved.";
                            } elseif ($row['status'] === 'Deleted') {
                                $notification = "Your request for {$row['room_name']} has been rejected.";
                            }
                            $notifications[] = $notification;
                        }
                        echo '<div class="dropdown">
                <a class="btn btn-outline-dark shadow-none me-lg-3 me-2 dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-fill me-1"></i>Hello, ' . $_SESSION['email'] . '
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="user_reservation.php">Reservations</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="user_logout.php">Logout</a></li>
                </ul>
            </div>';

                        // Bell Icon for Notifications
                        echo '<div class="bell-icon" id="bellIcon">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">' . count($notifications) . '</span>
                <div class="notification-menu">';

                        foreach ($notifications as $notification) {
                            echo "<a href='#'>{$notification}</a>";
                        }


                        mysqli_close($con);
                    } else {
                        // Login and Register Buttons
                        echo '<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
            </button>
            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register
            </button>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </nav>







    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="login.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-people-fill fs-3 me-3"></i>User Login</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" id="email" name="email">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" id="password" name="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                            <a href="javascript:void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>










    <!-- Register modal -->


    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-plus-fill fs-3 me-3"></i>User Registration</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            Your details must match with your ID (CITIZENSHIP,DRIVING LICENCE,PASSPORT)
                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control shadow-sm" name="name" required>
                                </div>


                                <div class="col-md-6 p-0">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-sm" name="email" required>
                                </div>


                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Contact</label>
                                    <input type="number" class="form-control shadow-sm" name="contact" required>
                                </div>


                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Photo</label>
                                    <input type="file" class="form-control shadow-sm" name="photo_path">
                                </div>


                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" name="address" rows="1"></textarea>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Zip Code</label>
                                    <input type="number" class="form-control shadow-sm" name="zipCode">
                                </div>


                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control shadow-sm" name="dob" required>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-sm" name="password" required>
                                </div>


                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control shadow-sm" name="cpassword" required>
                                </div>


                                <div class="text-center my-1">
                                    <!-- <button type="submit" class="btn btn-dark shadow-none">REGISTER</button> -->
                                    <input type="submit" name="register" value="register" class="btn btn-primary">

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php

    if (isset($_POST['register'])) {
        $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
        if (!$con) {
            die("Error");
        }

        $name = $_POST['name'];
        // $photo=$_POST['photo_path'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $zipCode = $_POST['zipCode'];
        $dateOfBirth = $_POST['dob'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpassword'];
        $errors = array();


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $qry = "INSERT INTO users (name, email, contact, address, zipCode, dateOfBirth, hashedPassword) VALUES ('$name','$email', '$contact', '$address', '$zipCode', '$dateOfBirth', '$hashedPassword')";

        if (mysqli_query($con, $qry)) {
            echo '<script type="text/javascript">alert("Registration Successfull")</script>';
        }
    }
    ?>


</body>

</html> <!-- navbar -->