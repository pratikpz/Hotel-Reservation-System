<?php
session_start();
require('inc/links.php');
require('inc/script.php');
require('inc/header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Display Rooms</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px 15px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: black;
            color: black;
            font-weight: bold;
            white-space: nowrap;
        }

        tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn-sm {
            padding: 0.3rem 0.6rem;
            font-size: 0.875rem;
        }

        .table-container {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container p-0 m-2">
        <h1>Rooms List</h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Image</th>
                        <th>Feature 1</th>
                        <th>Feature 2</th>
                        <th>Feature 3</th>
                        <th>Facility 1</th>
                        <th>Facility 2</th>
                        <th>Facility 3</th>
                        <th>Guests</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
                    if (!$con) {
                        die("Error");
                    }
                    $qry = "SELECT * FROM rooms";
                    $result = mysqli_query($con, $qry);
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $data['room_name']; ?></td>
                            <td>
                                <!-- Display the image using the 'uploads' folder path and image name from the database -->
                                <img src="images/rooms/<?php echo $data['room_image']; ?>" alt="<?php echo $data['room_name']; ?>" height="100">
                            </td>
                            <td><?php echo $data['room_features1']; ?></td>
                            <td><?php echo $data['room_features2']; ?></td>
                            <td><?php echo $data['room_features3']; ?></td>
                            <td><?php echo $data['room_facilities1']; ?></td>
                            <td><?php echo $data['room_facilities2']; ?></td>
                            <td><?php echo $data['room_facilities3']; ?></td>
                            <td><?php echo $data['guests_adults']; ?> Adults, <?php echo $data['guests_children']; ?> Children</td>
                            <td><?php echo $data['room_price']; ?></td>
                            <td class="d-flex">
                                <a href="deleteroom.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm me-2">Delete</a>
                                <a href="editroom.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>