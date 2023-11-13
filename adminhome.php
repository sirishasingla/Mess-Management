<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}

?>

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
</body>
</html>