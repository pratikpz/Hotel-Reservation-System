<?php
// Step 1: Set up a MySQL database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hbwebsite";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Fetch user registration data from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Step 3: Display the data in an HTML table
?>
<?php
// Step 1: Set up a MySQL database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hbwebsite";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Fetch user registration data from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Step 3: Display the data in an HTML table
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        body {
            background-color: #f8f9fa;
        }
        
        .container {
            padding-top: 50px;

            
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        
        th, td {
            padding: 12px 15px;
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

        .user-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h2 class="mb-4">User Data</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Password</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><img src="" alt="User Photo" class="user-photo"></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['zipCode']; ?></td>
                            <td><?php echo $row['dateOfBirth']; ?></td>
                            <td><?php echo $row['hashedPassword']; ?></td>
                            <td>
                            <form action="delete_user.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

