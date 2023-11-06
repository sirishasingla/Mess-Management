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

<a href="logout.php">Logout</a>
<a href="menuAdmin.php">Update Menu</a>
<a href="menu.php">Display Menu</a>
</body>
</html>