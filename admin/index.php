<?php
require('inc/essentials.php');
require('inc/db_config.php');

session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('inc/links.php'); ?>

    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 325px;

        }
    </style>
</head>

<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden ">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn text-white shadow-none custom-bg outline-none">LOGIN</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['admin_name'];
        $password = $_POST['admin_pass'];

        $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
        if ($con === false) {
            die('error on connectoin');
        }

        $qry = "SELECT * FROM `admin_cred` WHERE `admin_name`='$username' and `admin_pass`='$password' ";

        $result = mysqli_query($con, $qry);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            //  $_SESSION['adminLogin']=true;
            //  $_SESSION['auth'] = 'yes';

            $_SESSION['admin_name'] = $username;
            $_SESSION['admin_pass'] = $password;

            header('location:dashboard.php');
        } else {
            alert('error', 'Login Failed. Wrong Credentials!');
        }
    }
    ?>

    <?php require('inc/script.php'); ?>
</body>

</html>