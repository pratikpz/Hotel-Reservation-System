
        <?php require('inc/essentials.php'); ?>
       
        
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
            alert('Success', 'WELCOME TO HAMRO HOTEL!');
          }
        }







        ?>