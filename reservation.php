<?php
session_start();
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';
$conn = mysqli_connect($hname, $uname, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Get the room name from the URL parameter or form data
$room_name = $_GET['room_name'] ?? '';

$email = $_SESSION['email']; // Retrieve the email from the session
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get the form data
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $contact = $_POST['contact'];
//     $checkin = $_POST['checkin'];
//     $checkout = $_POST['checkout'];

//     // Insert the user's information into the reservations table
//     $insertQuery = "INSERT INTO reservations (email, room_name, check_in_date, check_out_date, status) VALUES ('$email', '$room_name', '$checkin', '$checkout', 'Pending')";
//     $insertResult = mysqli_query($conn, $insertQuery);

//     if ($insertResult) {
//         echo "<script>alert('Room Requested'); window.location.href = 'index.php';</script>";
//         exit();
//     } else {
//         echo "<script>alert('Failed to request the room.');</script>";
//     }
// }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Fetch user_id from session data
    $user_id = $_SESSION['id'];

    // Insert the user's information into the reservations table
    $insertQuery = "INSERT INTO reservations (email, room_name, check_in_date, check_out_date, status, user_id) 
                    VALUES ('$email', '$room_name', '$checkin', '$checkout', 'Pending', '$user_id')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "<script>alert('Room Requested'); window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to request the room.');</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f8f8;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333333;
            margin-bottom: 30px;
            text-align: center;
        }

        label {
            color: #666666;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2>Booking of <?php echo $room_name; ?></h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contact" name="contact" value="<?php echo $user['contact']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="checkin" class="form-label">Check-in Date</label>
                        <input type="date" class="form-control" id="checkin" name="checkin" required>
                    </div>

                    <div class="mb-3">
                        <label for="checkout" class="form-label">Check-out Date</label>
                        <input type="date" class="form-control" id="checkout" name="checkout" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>