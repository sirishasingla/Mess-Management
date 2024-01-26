<?php

$host="localhost";
$user="root";
$password="";
$db="database1";

session_start();



$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from login2 where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        $_SESSION["user_type"]=$row["usertype"];

		header("location:./userhome.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        $_SESSION["user_type"]=$row["usertype"];
		
		header("location:./dashboard.php");
	}

	else
	{
		echo "username or password incorrect";
	}

}
?>






<!DOCTYPE html>
<html>
<head>
	<title>Hostel Mess</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="form">
            <h1>Login</h1>
            <form name="form" action="#" method="POST">
                <label>Username: </label>
                <input type="text" id="user" name="username"></br></br>
                <label>Password: </label>
                <input type="password" id="pass" name="password"></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
            </form>
        </div>
        <script>
            function isvalid(){
                var user = document.form.username.value;
                var pass = document.form.password.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
<!-- <center>

	<h1>Login Form</h1>
	<br><br><br><br>
	<div style="background-color: grey; width: 500px;">
		<br><br>


		<form action="#" method="POST">

	<div>
		<label>username</label>
		<input type="text" name="username" required>
	</div>
	<br><br>

	<div>
		<label>password</label>
		<input type="password" name="password" required>
	</div>
	<br><br>

	<div>
		
		<input type="submit" value="Login">
	</div>


	</form>


	<br><br>
 </div>
</center> -->

</body>
</html>





<!-- 
<?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: index.html");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?> 
    -->
