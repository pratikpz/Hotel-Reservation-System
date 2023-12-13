<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: #fff;
            font-weight: bold;
            white-space: nowrap;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge {
            font-size: 0.8rem;
            padding: 5px 10px;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-danger {
            background-color: #dc3545;
        }
    </style>
</head>

<body class="bg-light">
    <?php
    require('inc/header.php');
    require('inc/links.php');
    require('inc/script.php');

    // Step 1: Database connection variables
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'hbwebsite';

    // Step 2: Create connection
    $con = mysqli_connect($hname, $uname, $pass, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 3: Fetch total users from the database
    $query = "SELECT COUNT(*) AS totalUsers FROM users";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $totalUsers = $row['totalUsers'];

    // Step 4: Function to display the alert message
    function displayAlert($message, $alertType)
    {
        echo '<div class="alert alert-' . $alertType . ' alert-dismissible fade show" role="alert">';
        echo $message;
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }

    // Step 6: Approve action
    if (isset($_GET['action']) && $_GET['action'] === 'approve') {
        if (isset($_GET['booking_id'])) {
            $bookingID = $_GET['booking_id'];
            // Update status to 'Approved' in the reservations table
            $query = "UPDATE reservations SET status='Approved' WHERE booking_id=$bookingID";
            if (mysqli_query($con, $query)) {
                displayAlert('Reservation approved successfully!', 'success');

                //     // Retrieve the user's email address from the users table using booking_id
                //     $sql="SELECT email from reservations WHERE booking_id=$bookingID" ;
                //      $emailResult = mysqli_query($con, $sql);

                //     if ($emailResult && mysqli_num_rows($emailResult) > 0) {
                //         $userData = mysqli_fetch_assoc($emailResult);
                //         $email = $userData['email'];

                //         // Compose the email
                //         $to=$email;
                //         $header="From:HamroHotel@gmail.com";
                //         $subject = "Booking Request Status Update";
                //         $message = "Dear User,\n\nYour booking request has been approved.\n\nThank you for using our service.";
                //         mail($to,$subject,$message,$header);


                //     }
                // } else {
                //     displayAlert('Error: ' . mysqli_error($con), 'danger');
                // 
            }
        }
    }



    // Step 7: Reset action
    if (isset($_GET['action']) && $_GET['action'] === 'reset') {
        if (isset($_GET['booking_id'])) {
            $bookingID = $_GET['booking_id'];
            // Update status to 'Pending' in the reservations table
            $query = "UPDATE reservations SET status='Pending' WHERE booking_id=$bookingID";
            if (mysqli_query($con, $query)) {
                displayAlert('Room status has been reset to Pending!', 'success');
            } else {
                displayAlert('Error: ' . mysqli_error($con), 'danger');
            }
        }
    }

    // Step 8: Delete action
    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        if (isset($_GET['booking_id'])) {
            $bookingID = $_GET['booking_id'];
            // Update status to 'Deleted' in the reservations table
            $query = "UPDATE reservations SET status='Deleted' WHERE booking_id=$bookingID";
            if (mysqli_query($con, $query)) {
                displayAlert('Reservation deleted successfully!', 'success');

                //     // Retrieve the user's email address from the users table using booking_id
                //     $emailQuery = "SELECT email FROM users WHERE id IN (SELECT user_id FROM reservations WHERE booking_id=$bookingID)";
                //     $emailResult = mysqli_query($con, $emailQuery);

                //     if ($emailResult && mysqli_num_rows($emailResult) > 0) {
                //         $userData = mysqli_fetch_assoc($emailResult);
                //         $email = $userData['email'];

                //         // Compose the email
                //         $subject = "Booking Request Status Update";
                //         $message = "Dear User,\n\nYour booking request has been rejected.\n\nThank you for using our service.";

                //         // Send the email
                //         sendEmail($email, $subject, $message);
                //     }
                // } else {
                //     displayAlert('Error: ' . mysqli_error($con), 'danger');
            }
        }
    }


    ?>

    <div class="container-fluid" style="overflow-y: auto;">
        <div class="row">
            <div class="col-lg-10 ms-5 p-4">
                <h1 class="mb-5">Admin Panel Dashboard</h1>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body mb-4">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">There are currently <?php echo $totalUsers; ?> registered users on the website.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body mb-4">
                                <h5 class="card-title">Total Reservations</h5>
                                <p class="card-text">There are 50 active reservations at the moment.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reservations Information</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Room</th>
                                            <th>Check-in</th>
                                            <th>Check-out</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Step 9: Retrieve reservation data from the database
                                        $query = "SELECT * FROM reservations";
                                        $result = mysqli_query($con, $query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $bookingID = $row['booking_id'];
                                                $roomName = $row['room_name'];
                                                $checkInDate = $row['check_in_date'];
                                                $checkOutDate = $row['check_out_date'];
                                                $status = $row['status'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $bookingID; ?></td>
                                                    <td><?php echo $roomName; ?></td>
                                                    <td><?php echo $checkInDate; ?></td>
                                                    <td><?php echo $checkOutDate; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td>
                                                        <?php if ($status == 'Pending') : ?>
                                                            <a href="?booking_id=<?php echo $bookingID; ?>&action=approve" class="btn btn-success btn-sm">Approve</a>
                                                            <a href="?booking_id=<?php echo $bookingID; ?>&action=delete" class="btn btn-danger btn-sm">Delete</a>
                                                        <?php endif; ?>
                                                        <?php if ($status == 'Approved') : ?>
                                                            <a href="?booking_id=<?php echo $bookingID; ?>&action=reset" class="btn btn-warning btn-sm">Reset</a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="7">No reservations found.</td>
                                            </tr>
                                        <?php
                                        }

                                        // Step 10: Close the database connection
                                        mysqli_close($con);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>