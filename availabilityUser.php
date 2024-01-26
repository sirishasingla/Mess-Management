<!-- INSERT INTO `unavailability` (`sno`, `username`, `rollno`, `meal`, `date`) VALUES (NULL, 'sirisha', '102102012', 'Breakfast', '2023-11-14'); -->
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
$insert = false;
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $rollnum=$_POST["rollno"];    
    $date1=$_POST["date"];
    $meal=$_POST["meal"];
    // $username=$_POST["username"];
    $username = $_SESSION["username"];
    // $status=$_POST["status"];
    // $sno = $sno+1;
    $sql1 = "INSERT INTO `unavailability` (`username`, `rollno`, `meal`, `date`) VALUES ('$username', '$rollnum', '$meal', '$date1')";
    $result = mysqli_query($data, $sql1);
    if($result){
    $insert = true;
    }
  
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Availability</title>
    <style>
    h1 {text-align: center;}
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand"><?php echo $_SESSION["username"];?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="userhome.php">Home</a>
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
<?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success! </strong> The request has been submitted successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
?>
<br>
<h1>Unavailability Form</h1>
<br>
<div class="container">
<form action="availabilityUser.php" method="POST">
  <div class="mb-3">
    <label for="rollno" class="form-label">Roll Number</label>
    <input type="number" class="form-control" name="rollno" id="rollno" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" name="date" id="date">
  </div>
  <div class="mb-3">
  <label for="disabledSelect" class="form-label">Meal</label>
      <select id="meal" name="meal" class="form-select meal">
        <option>Breakfast</option>
        <option>Lunch</option>
        <option>Dinner</option>
      </select>
  </div>
  <input type="hidden" id="username" name="username" value="<?php $_SESSION["username"];?>" />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Username</th>
      <th scope="col">RollNo</th>
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
        
        if($_SESSION["username"]==$row['username']){
          $sno = $sno+1;
        echo " <tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['username']."</td>
        <td>".$row['rollno']."</td>
        <td>".$row['date']."</td>
        <td>".$row['meal']."</td>
        </tr>";
        }
    }
  ?> 
  </tbody>
</table>
</div>
    
</body>
</html>