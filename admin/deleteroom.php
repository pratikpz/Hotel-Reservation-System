<?php
// $deleteid=$_GET['id'];
// $con=mysqli_connect('localhost','root','','hbwebsite');
// $qry="Delete from rooms where id=$deleteid";
// if (mysqli_query($con,$qry)){
//     echo("Room deleted");
//     header('location:display_room.php');

// }




if (isset($_GET['id'])) {
    $room_id = $_GET['id'];

    $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
    if (!$con) {
        die("Error");
    }

    $qry = "DELETE FROM rooms WHERE id = $room_id";
    if (mysqli_query($con, $qry)) {
        echo "Room deleted successfully.";
        header('location:displayroom.php');
    } else {
        echo "Error deleting room: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid room ID.";
}
?>
<?php require('inc/header.php'); ?>


