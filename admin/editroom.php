<?php
session_start();
require('inc/header.php');
require('inc/links.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Room</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Room</h1>

        <?php
        if (isset($_GET['id'])) {
            $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
            if (!$con) {
                die("Error");
            }

            $id = $_GET['id'];
            // Fetch the room details from the database using the $id
            $qry = "SELECT * FROM rooms WHERE id = '$id'";
            $result = mysqli_query($con, $qry);

            // Check if the room with the given id exists in the database
            if (mysqli_num_rows($result) == 1) {
                $room = mysqli_fetch_assoc($result);
            } else {
                echo "Room not found";
                exit();
            }
        } else {
            echo "Invalid request";
            exit();
        }

        // Check if the form is submitted for updating the room
        if (isset($_POST['editroom'])) {
            $room_name = $_POST['room_name'];
            $room_features1 = $_POST['room_features1'];
            $room_features2 = $_POST['room_features2'];
            $room_features3 = $_POST['room_features3'];
            $room_facilities1 = $_POST['room_facilities1'];
            $room_facilities2 = $_POST['room_facilities2'];
            $room_facilities3 = $_POST['room_facilities3'];
            $guests_adults = $_POST['guests_adults'];
            $guests_children = $_POST['guests_children'];
            $room_price = $_POST['room_price'];

            // Check if a new image file is uploaded
            if ($_FILES['room_image']['name']) {
                $room_image = $_FILES['room_image']['name'];
                $temp_image = $_FILES['room_image']['tmp_name'];

                // Move the uploaded image to the desired folder
                move_uploaded_file($temp_image, "images/rooms/" . $room_image);
            } else {
                // If no new image is uploaded, use the existing image from the database
                $room_image = $room['room_image'];
            }

            // Update the room details in the database
            $qry = "UPDATE rooms SET room_name='$room_name', room_image='$room_image', room_features1='$room_features1', room_features2='$room_features2', room_features3='$room_features3', room_facilities1='$room_facilities1', room_facilities2='$room_facilities2', room_facilities3='$room_facilities3', guests_adults='$guests_adults', guests_children='$guests_children', room_price='$room_price' WHERE id='$id'";

            if (mysqli_query($con, $qry)) {
                echo "Room Updated Successfully";
            } else {
                echo "Error updating room: " . mysqli_error($con);
            }
        }
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td><label for="room_name">Room Name:</label></td>
                    <td><input type="text" name="room_name" id="room_name" class="form-control" required value="<?php echo isset($room['room_name']) ? $room['room_name'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_image">Room Image:</label></td>
                    <td><input type="file" name="room_image" id="room_image" class="form-control-file"></td>
                </tr>
                <tr>
                    <td><label for="room_features1">Features 1:</label></td>
                    <td><input type="text" name="room_features1" id="room_features1" class="form-control" required value="<?php echo isset($room['room_features1']) ? $room['room_features1'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_features2">Features 2:</label></td>
                    <td><input type="text" name="room_features2" id="room_features2" class="form-control" value="<?php echo isset($room['room_features2']) ? $room['room_features2'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_features3">Features 3:</label></td>
                    <td><input type="text" name="room_features3" id="room_features3" class="form-control" value="<?php echo isset($room['room_features3']) ? $room['room_features3'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_facilities1">Facilities 1:</label></td>
                    <td><input type="text" name="room_facilities1" id="room_facilities1" class="form-control" required value="<?php echo isset($room['room_facilities1']) ? $room['room_facilities1'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_facilities2">Facilities 2:</label></td>
                    <td><input type="text" name="room_facilities2" id="room_facilities2" class="form-control" value="<?php echo isset($room['room_facilities2']) ? $room['room_facilities2'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_facilities3">Facilities 3:</label></td>
                    <td><input type="text" name="room_facilities3" id="room_facilities3" class="form-control" value="<?php echo isset($room['room_facilities3']) ? $room['room_facilities3'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="guests_adults">Guests (Adults):</label></td>
                    <td><input type="number" name="guests_adults" id="guests_adults" class="form-control" required value="<?php echo isset($room['guests_adults']) ? $room['guests_adults'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="guests_children">Guests (Children):</label></td>
                    <td><input type="number" name="guests_children" id="guests_children" class="form-control" required value="<?php echo isset($room['guests_children']) ? $room['guests_children'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><label for="room_price">Price:</label></td>
                    <td><input type="number" name="room_price" id="room_price" class="form-control" required value="<?php echo isset($room['room_price']) ? $room['room_price'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="editroom" value="Update" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>