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
// $insert = false;
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <style>
         h1 {text-align: center;}
    </style>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <title>Unavailability</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand">admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Home</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<h1>Unavailability</h1>
<br>
<div class="container">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Username</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Date</th>
      <th scope="col">Meal</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM `unavailability` ";
    $result = mysqli_query($data, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){
        
        $sno = $sno+1;
        echo " <tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['username']."</td>
        <td>".$row['rollno']."</td>
        <td>".$row['date']."</td>
        <td>".$row['meal']."</td>
        </tr>";
        
    }
  ?> 
    
  </tbody>
</table>
</div>
</body>
</html>