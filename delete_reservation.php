<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hbwebsite';

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Check if the booking ID is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: update_reservation.php");
    exit();
}

$bookingId = $_GET['id'];

// Retrieve reservation details from the database based on the booking ID and user's email
$email = $_SESSION['email'];
$query = "SELECT * FROM reservations WHERE booking_id = '$bookingId' AND email = '$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Check if the reservation exists for the provided booking ID and user's email
if (!$row) {
    header("Location: update_reservation.php");
    exit();
}

// Check if the status is "Pending," only then the user can delete the reservation
if ($row['status'] !== 'Pending') {
    echo '<script>alert("Sorry, you cannot modify this reservation!");</script>';
    echo '<script>window.location.href = "user_reservation.php";</script>';
    exit();
}

// Delete reservation from the database when the "Delete Reservation" button is clicked
if (isset($_POST['delete_reservation'])) {
    $deleteQuery = "DELETE FROM reservations WHERE booking_id = '$bookingId' AND email = '$email'";
    mysqli_query($con, $deleteQuery);

    // Redirect to the update_reservation.php page after the deletion
    header("Location: user_reservation.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Reservation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Delete Reservation</h1>
        <p>Are you sure you want to delete this reservation?</p>
        <p><strong>Booking ID:</strong> <?php echo $row['booking_id']; ?></p>
        <p><strong>Room Name:</strong> <?php echo $row['room_name']; ?></p>
        <p><strong>Check-in Date:</strong> <?php echo $row['check_in_date']; ?></p>
        <p><strong>Check-out Date:</strong> <?php echo $row['check_out_date']; ?></p>
        <form action="" method="POST">
            <input type="submit" name="delete_reservation" value="Delete Reservation" class="btn btn-danger">
            <a class="btn btn-secondary" href="user_reservation.php">Cancel</a>
        </form>
    </div>
    <!-- Bootstrap and other JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>