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
    header("Location: user_reservation.php");
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
    header("Location: user_reservation.php");
    exit();
}

// Check if the status is "Pending," only then the user can update the reservation
if ($row['status'] !== 'Pending') {
    echo '<script>alert("Sorry, you cannot modify this reservation!");</script>';
    echo '<script>window.location.href = "user_reservation.php";</script>';
    exit();
}

// Update reservation details in the database when the "Update Reservation" button is clicked
if (isset($_POST['update_reservation'])) {
    $checkInDate = $_POST['check_in_date'];
    $checkOutDate = $_POST['check_out_date'];

    $updateQuery = "UPDATE reservations SET check_in_date = '$checkInDate', check_out_date = '$checkOutDate' WHERE booking_id = '$bookingId' AND email = '$email'";
    mysqli_query($con, $updateQuery);

    // Redirect to the user_reservation.php page after the update
    header("Location: user_reservation.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Reservation</title>
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

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Reservation</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="check_in_date">Check-in Date:</label>
                <input type="date" name="check_in_date" id="check_in_date" class="form-control" value="<?php echo $row['check_in_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="check_out_date">Check-out Date:</label>
                <input type="date" name="check_out_date" id="check_out_date" class="form-control" value="<?php echo $row['check_out_date']; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" name="update_reservation" value="Update Reservation" class="btn btn-primary">
                <a class="btn btn-secondary" href="user_reservation.php">Cancel</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap and other JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>