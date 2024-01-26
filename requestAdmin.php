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
// $insert=false;
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

if (isset($_GET['sno']) && isset($_GET['status'])) {
    $sno = $_GET['sno'];
    $status = $_GET['status'];

    // Perform the database update using $sno and $status
    // You'll need to modify the SQL query based on your database structure
    $sql = "UPDATE requests SET status = '$status' WHERE sno = $sno";
    
    // Execute the query and handle any errors
    // ...
    $result = mysqli_query($data, $sql);

    // Redirect back to the original page or wherever you want to go
    header("Location: requestAdmin.php");
    exit();
} 
// else {
//     // Handle invalid or missing parameters
//     echo "Invalid or missing parameters";
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
     <!-- Bootstrap JS and jQuery -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <style>
    h1 {text-align: center;}
        </style>
        <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <title>Special Requests</title>
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
    <div class="container">
        <br>
        <h1>Special Requests</h1>
        <br>    
    <table class="table"  id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Username</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Request</th>
      <th scope="col">Requested Date</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql = "SELECT * FROM `requests`";
    $result = mysqli_query($data, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){
        $sno = $sno+1;
        echo " <tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['username']."</td>
        <td>".$row['rollno']."</td>
        <td>".$row['request']."</td>
        <td>".$row['date']."</td>
        <td>".$row['status']."</td>
        <td><button class='accept btn btn-sm btn-success' id=".$row['sno'].">Accept</button> <button class='reject btn btn-sm btn-danger' id=d".$row['sno'].">Reject</button></td>
      </tr>";
    }
    
    
    ?>
    
  </tbody>
</table>
    </div>

    <script>
    accepts = document.getElementsByClassName('accept');
    Array.from(accepts).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("accept");
        tr = e.target.parentNode.parentNode;
        console.log(tr.getElementsByTagName("td")[4]);
        status = tr.getElementsByTagName("td")[4].innerText;
        console.log(status);
        sno = e.target.id;
        console.log(sno);
        if (confirm("Are you sure you want to accept this request!")) {
            console.log("yes");
            window.location = `requestAdmin.php?sno=${sno}&status=accepted`;
        }
        else {
          console.log("no");
        }
        
        })
    })

    rejects = document.getElementsByClassName('reject');
    Array.from(rejects).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("reject");
        tr = e.target.parentNode.parentNode;
        console.log(tr.getElementsByTagName("td")[4]);
        status = tr.getElementsByTagName("td")[4].innerText;
        console.log(status);
        sno = e.target.id.substr(1);
        console.log(sno);
        if (confirm("Are you sure you want to reject this request!")) {
            console.log("yes");
            window.location = `requestAdmin.php?sno=${sno}&status=rejected`;
        }
        else {
          console.log("no");
        }
        
        })
    })


</script>
</body>
</html>