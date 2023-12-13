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

// Retrieve reservations for the logged-in user's email from the database
$email = $_SESSION['email'];
$query = "SELECT * FROM reservations WHERE email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Reservation</title>
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

        .table {
            margin-top: 20px;
        }

        .btn-group {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Reservation</h1>
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered">
                    <tr>
                        <th>Booking ID</th>
                        <th>Room Name</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['booking_id'] . '</td>
                        <td>' . $row['room_name'] . '</td>
                        <td>' . $row['check_in_date'] . '</td>
                        <td>' . $row['check_out_date'] . '</td>
                        <td>' . $row['status'] . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit_reservation.php?id=' . $row['booking_id'] . '">Update</a>
                            <a class="btn btn-danger btn-sm" href="delete_reservation.php?id=' . $row['booking_id'] . '">Delete</a>
                        </td>
                    </tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No reservations found for this user.</p>';
        }
        ?>

        <div class="btn-group">
            <a class="btn btn-secondary" href="index.php">Back to Dashboard</a>
        </div>
    </div>
    <!-- Bootstrap and other JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>