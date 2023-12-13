<!DOCTYPE html>
<html>

<head>
    <title>Add Room</title>
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
        <h1>Add Room</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td><label for="room_name">Room Name:</label></td>
                    <td><input type="text" name="room_name" id="room_name" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="room_image">Room Image:</label></td>
                    <td><input type="file" name="room_image" id="room_image" class="form-control-file"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h3>Facilities:</h3>
                    </td>
                </tr>
                <tr>
                    <td><label for="room_facilities1">Facilities 1:</label></td>
                    <td><input type="text" name="room_facilities1" id="room_facilities1" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="room_facilities2">Facilities 2:</label></td>
                    <td><input type="text" name="room_facilities2" id="room_facilities2" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="room_facilities3">Facilities 3:</label></td>
                    <td><input type="text" name="room_facilities3" id="room_facilities3" class="form-control" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <small class="form-text text-muted">Please enter the room facilities separated by commas for each field (e.g., Wi-Fi, Air Conditioner, Television).</small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h3>Features:</h3>
                    </td>
                </tr>
                <tr>
                    <td><label for="room_features1">Features 1:</label></td>
                    <td><input type="text" name="room_features1" id="room_features1" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="room_features2">Features 2:</label></td>
                    <td><input type="text" name="room_features2" id="room_features2" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="room_features3">Features 3:</label></td>
                    <td><input type="text" name="room_features3" id="room_features3" class="form-control" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <small class="form-text text-muted">Please enter the room features separated by commas for each field (e.g., 2 Rooms, 1 Bathroom, 1 Balcony).</small>
                    </td>
                </tr>
                <tr>
                    <td><label for="guests_adults">Number of Adults:</label></td>
                    <td><input type="number" name="guests_adults" id="guests_adults" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="guests_children">Number of Children:</label></td>
                    <td><input type="number" name="guests_children" id="guests_children" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="room_price">Room Price:</label></td>
                    <td><input type="number" name="room_price" id="room_price" class="form-control" required></td>
                </tr>
            </table>

            <input type="submit" name="addroom" value="Add Room" class="btn btn-primary">
        </form>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['addroom'])) {
    $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
    if (!$con) {
        die("Error");
    }

    $room_name = $_POST['room_name'];
    $room_image = $_FILES['room_image']['name'];
    $room_image_tmp = $_FILES['room_image']['tmp_name'];
    $room_features1 = $_POST['room_features1'];
    $room_features2 = $_POST['room_features2'];
    $room_features3 = $_POST['room_features3'];
    $room_facilities1 = $_POST['room_facilities1'];
    $room_facilities2 = $_POST['room_facilities2'];
    $room_facilities3 = $_POST['room_facilities3'];
    $guests_adults = $_POST['guests_adults'];
    $guests_children = $_POST['guests_children'];
    $room_price = $_POST['room_price'];

    $target_dir = "images/rooms";
    $target_file = $target_dir . basename($room_image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($room_image_tmp);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["room_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($room_image_tmp, $target_file)) {
            // File uploaded successfully, now insert the data into the database
            $qry = "INSERT INTO rooms (room_name, room_image, room_features1, room_features2, room_features3, room_facilities1, room_facilities2, room_facilities3, guests_adults, guests_children, room_price)
                VALUES ('$room_name', '$room_image', '$room_features1','$room_features2','$room_features3', '$room_facilities1','$room_facilities2','$room_facilities3', '$guests_adults', '$guests_children', '$room_price')";

            if (mysqli_query($con, $qry)) {
                echo "Room Added Successfully";
                // header('location:displayroom.php');
            } else {
                echo "Error adding room: " . mysqli_error($con);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>