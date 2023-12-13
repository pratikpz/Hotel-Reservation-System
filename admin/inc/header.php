
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #343a40;
            color: #fff;
        }

        .navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 24px;
        }

        .navbar .btn {
            color: #343a40;
            background-color: #fff;
        }

        #sidebar .dropdown-menu .dropdown-item {
            background-color: #343a40;
            color: #fff;
        }

        #sidebar .dropdown-menu .dropdown-item:hover {
            background-color: #555;
        }

        #sidebar .nav-link {
            color: #fff;
        }

        #sidebar .nav-link:hover {
            color: #ccc;
        }

        #sidebar .dropdown-toggle::after {
            color: #fff;
        }

        body {
            background-color: #f8f9fa;
        }

        #dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        #sidebar {
            flex: 0 0 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        #sidebar a {
            color: #fff;
            text-decoration: none;
        }

        #sidebar ul li {
            padding-bottom: 10px;
        }

        #content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            color: #333;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0">HB website</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>
    <div id="dashboard-container">
        <div id="sidebar">
            <h4 class="pl-4">Admin Panel</h4>
            <ul class="list-unstyled pl-4 mt-4">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="roomsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Rooms</a>
                    <div class="dropdown-menu" aria-labelledby="roomsDropdown">
                        <a class="dropdown-item" href="add_room.php">Add Room</a>
                        <a class="dropdown-item" href="displayroom.php">Display Room</a>
                    </div>
                </li>
                <li><a href="user_info.php">Users</a></li>

                <li><a href="settings.php">Settings</a></li>
            </ul>
        </div>
</body>