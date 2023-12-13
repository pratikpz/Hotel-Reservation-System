<html>

<body>
    <?php require('inc/links.php'); ?>
    <?php require('inc/script.php'); ?>
    <?php require('inc/essentials.php'); ?>
    <?php require('inc/header.php'); ?>

    <?php

    if (isset($_POST['user_id'])) {
        $dropid = $_POST['user_id'];

        $con = mysqli_connect('localhost', 'root', '', 'hbwebsite');
        if (!$con) {
            die("Error");
        }

        $qry = "DELETE FROM users WHERE id = $dropid";
        if (mysqli_query($con, $qry)) {
            echo '<div class="custom-alert alert alert-success alert-warning alert-dismissible fade show" role="alert">
                          <strong class="me-3">User removed successfully</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
        } else {
            echo '<div class="custom-alert alert alert-danger alert-warning alert-dismissible fade show" role="alert">
                          <strong class="me-3">Failed to remove user</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
        }

        mysqli_close($con);
    }

    ?>

</body>

</html>