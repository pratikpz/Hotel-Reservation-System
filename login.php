<?php
session_start();
require('admin/inc/links.php');

// Initialize error message variable
$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection variables
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'hbwebsite';

    // Create connection
    $conn = mysqli_connect($hname, $uname, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the query
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['hashedPassword'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header('location:index.php');
            exit();
        } else {
            $errorMsg = 'Wrong password. Please try again.';
        }
    } else {
        $errorMsg = 'Invalid email. Please try again.';
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php if (!empty($errorMsg)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $errorMsg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href = 'index.php';"></button>



            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>