<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}

?>
<!-- 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>THIS IS ADMIN HOME PAGE</h1><?php echo $_SESSION["username"] ?>
<br>
<a href="logout.php">Logout</a>
<br>
<a href="menuAdmin.php">Update Menu</a>
<br>
<a href="menuDisplayAdmin.php">Display Menu</a>
<br>
<a href="lostFoundAdmin.php">Lost/Found</a>
<br>
<a href="announcementAdmin.php">Announcements</a>
<br>
<a href="requestAdmin.php">Special Request</a>
<br>
<a href="availabilityAdmin.php">Unavailability</a>
<br>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mess Management System - Admin Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
    </style>
</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>Mess Management</h1>
        <p>Admin Home Page</p>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Hostel-Q</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="menuAdmin.php">Update Menu</a></li>
                <li><a href="menuDisplayAdmin.php">Display Menu</a></li>
                <li><a href="lostFoundAdmin.php">Lost/Found</a></li>
                <li><a href="announcementAdmin.php">Announcements</a></li>
                <li><a href="requestAdmin.php">Special Request</a></li>
                <li><a href="availabilityAdmin.php">Unavailability</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Additional content goes here -->

<footer class="container-fluid text-center">
    <p>Contact Mess Committee</p>
    <form class="form-inline">
        Contact:
        <input type="email" class="form-control" size="50" placeholder="Email Address">
        <button type="button" class="btn btn-danger">Sign Up</button>
    </form>
</footer>

</body>
</html>
