<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="database1";

$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn)
{
	die("connection error");
}

$sql = "SELECT * FROM `menu`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
// echo $num;

if($num>0){
    $monbreakfast = mysqli_fetch_assoc($result);
    $monlunch = mysqli_fetch_assoc($result);
    $mondinner = mysqli_fetch_assoc($result);
    $tuebreakfast = mysqli_fetch_assoc($result);
    $tuelunch = mysqli_fetch_assoc($result);
    $tuedinner = mysqli_fetch_assoc($result);
    $wedbreakfast = mysqli_fetch_assoc($result);
    $wedlunch = mysqli_fetch_assoc($result);
    $weddinner = mysqli_fetch_assoc($result);
    $thurbreakfast = mysqli_fetch_assoc($result);
    $thurlunch = mysqli_fetch_assoc($result);
    $thurdinner = mysqli_fetch_assoc($result);
    $fribreakfast = mysqli_fetch_assoc($result);
    $frilunch = mysqli_fetch_assoc($result);
    $fridinner = mysqli_fetch_assoc($result);
    $satbreakfast = mysqli_fetch_assoc($result);
    $satlunch = mysqli_fetch_assoc($result);
    $satdinner = mysqli_fetch_assoc($result);
    $sunbreakfast = mysqli_fetch_assoc($result);
    $sunlunch = mysqli_fetch_assoc($result);
    $sundinner = mysqli_fetch_assoc($result);
}

if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['user_type'])){
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $user_type = $_SESSION['user_type'];
}else {
    // Redirect to the login page if session variables are not set
    header("Location: login.php");
    exit();
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Mess Menu</title>
</head>
<body>
  
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" >Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php
            echo "<a class='nav-link active' aria-current='page' href='userhome.php'>Home</a>";          
          ?>  
        </li>
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link active" href="logout.php"> Logout</a>
          </li>
      </ul>
  </div>
</nav>
    <div class="table">

        <h1 style="text-align:center" >Mess Menu</h1>
        <br>
    <table class="table align-middle table-bordered border table-success table-striped border-success border-5" >
  <thead>
    <tr>
      <th scope="col">Day</th>
      <th scope="col">Breakfast</th>
      <th scope="col">Lunch</th>
      <th scope="col">Dinner</th>
      <!-- <th scope="col"><?php 
        if($user_type==="admin"){
            echo "Edit";
            
        }
      ?></th> -->
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Monday</th>
        <td><?php 
              echo $monbreakfast['Food'];
              // if($user_type==="admin"){ 
              //   echo "<br>";
              //   echo "<button> edit </button>";
              // }
            ?>
        </td>
      <td><?php echo $monlunch['Food'];?></td>
      <td><?php echo $mondinner['Food'];?></td>
        <?php   ?>
    </tr>
    <tr>
      <th scope="row">Tuesday</th>
      <td><?php echo $tuebreakfast['Food'];?></td>
      <td><?php echo $tuelunch['Food'];?></td>
      <td><?php echo $tuedinner['Food'];?></td>
    </tr>
    <tr>
      <th scope="row">Wednesday</th>
      <!-- <td colspan="2">Larry the Bird</td> -->
      <td><?php echo $wedbreakfast['Food'];?></td>
      <td><?php echo $wedlunch['Food'];?></td>
      <td><?php echo $weddinner['Food'];?></td>
    </tr>
    <tr>
      <th scope="row">Thursday</th>
      <td><?php echo $thurbreakfast['Food'];?></td>
      <td><?php echo $thurlunch['Food'];?></td>
      <td><?php echo $thurdinner['Food'];?></td>
    </tr>
    <tr>
      <th scope="row">Friday</th>
      <td><?php echo $fribreakfast['Food'];?></td>
      <td><?php echo $frilunch['Food'];?></td>
      <td><?php echo $fridinner['Food'];?></td>
    </tr>
    <tr>
      <th scope="row">Saturday</th>
      <td><?php echo $satbreakfast['Food'];?></td>
      <td><?php echo $satlunch['Food'];?></td>
      <td><?php echo $satdinner['Food'];?></td>
    </tr>
    <tr>
      <th scope="row">Sunday</th>
      <td><?php echo $sunbreakfast['Food'];?></td>
      <td><?php echo $sunlunch['Food'];?></td>
      <td><?php echo $sundinner['Food'];?></td>
    </tr>
  </tbody>
</table>
    </div>
</body>
</html>