<!-- INSERT INTO `requests` (`sno`, `rollno`, `request`, `date`, `tstamp`, `username`) VALUES (NULL, '123123123', 'khichdi in dinner', '2023-11-11', current_timestamp(), 'sirisha'); -->
<!-- INSERT INTO `requests` (`sno`, `rollno`, `request`, `date`, `tstamp`, `username`, `status`) VALUES (NULL, '12121212', 'daal in lunch', '2023-11-12', current_timestamp(), 'user', 'Pending'); -->
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
$insert=false;
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}
// echo $;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $rollnum=$_POST["rollnumber"];
	$request=$_POST["request"];
  $date1=$_POST["date"];
  // $username=$_POST["username"];
  $username = $_SESSION["username"];
  $status=$_POST["status"];
  // $sno = $sno+1;
  $sql1 = "INSERT INTO `requests` (`rollno`, `request`, `date`, `tstamp`, `username`, `status`) VALUES ('$rollnum', '$request', '$date1', current_timestamp(), '$username', '$status')";
  $result = mysqli_query($data, $sql1);
  if($result){
  // echo "The notice has been inserted successfully!<br>";
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
    <style>
        h1 {text-align: center;}
        /* p {text-align: center;} */
        /* div {text-align: center;} */
        p {color:red; text-align: center;}
        </style>
    <title>Requests</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" ><?php echo $_SESSION["username"];?></a>
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
<?php
    if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success! </strong> The request has been submitted successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
?>
<h1>Request Form</h1>
<p text-color="red">Please provide your roll number, clearly state your request, and specify the relevant date to avoid any misunderstandings. Thank you.</p>
<div class="container">
  <div>
    <form action="userRequest.php" method="POST">
      <div class="mb-3">
        <label for="rollnumber" class="form-label">Roll Number</label>
        <input type="number" class="form-control" name="rollnumber" id="rollnumber" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="request" class="form-label">Request Message</label>
        <textarea class="form-control" id="request" name="request" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp">  
      </div>
      <input type="hidden" id="username" name="username" value="<?php $_SESSION["username"];?>" />
      <input type="hidden" id="status" name="status" value="Pending" />
      <button type="submit" class="btn btn-primary">Submit</button>
      <script>
        console.log(username);
        console.log(status);
      </script>
    </form>
  </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">SNo.</th>
      <th scope="col">Request</th>
      <th scope="col">Date/Time Form submitted</th>
      <th scope="col">Requested Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM `requests` ORDER BY sno DESC";
    $result = mysqli_query($data, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){
        
        if($_SESSION["username"]==$row['username']){
          $sno = $sno+1;
        echo " <tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['request']."</td>
        <td>".$row['tstamp']."</td>
        <td>".$row['date']."</td>
        <td>".$row['status']."</td>
        </tr>";
        }
    }
  ?> 
  </tbody>
</table>
</div>
</body>
</html>