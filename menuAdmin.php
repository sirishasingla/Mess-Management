<?php 
// UPDATE `menu` SET `Food` = 'Dal Parantha, Aloo Pyaaz sandwich, \r\nOats/Poha, Boiled Eggs' WHERE `menu`.`sno` = 1;
// connect to the database
// $insert = false;
$update = false;
// $delete = false;

$host="localhost";
$user="root";
$password="";
$db="database1";

session_start();
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


// echo $_SERVER["REQUEST_METHOD"];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset( $_POST['snoEdit'])){
        // Update the record
          $sno = $_POST["snoEdit"];
          $food = $_POST["foodEdit"];
      
        // Sql query to be executed
        
        $sql = "UPDATE `menu` SET `Food` = '$food' WHERE `menu`.`sno` = $sno";
        $result = mysqli_query($data, $sql);
        if($result){
          $update = true;
        }
        else{
          echo "We could not update the record successfully";
        }
      }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <script>
        // let table = new DataTable('#myTable');
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</head>
<body>


        <!-- Edit modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Food Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
      <form action="menuAdmin.php" method="POST">
        <input type="hidden" name="snoEdit" id="snoEdit">
        <div class="mb-3">
            <label for="Food" class="form-label">Food</label>
            <input type="text" class="form-control" id="foodEdit" name="foodEdit" aria-describedby="emailHelp">
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>



    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" >Menu Edit</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
      
      <form class="d-flex" role="search">
        <li class="nav-item">
          <a class="nav-link active me-2 d-flex" href="logout.php">Logout</a>
        </li>
        </ul>
      </form>
    </div>
  </div>
</nav>

<?php
    if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success! </strong> The menu has been updated successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
?>


<h1 align="center">Menu</h1>
<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Day</th>
      <th scope="col">Meal</th>
      <th scope="col">Food</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql = "SELECT * FROM `menu`";
    $result = mysqli_query($data, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){
        $sno = $sno+1;
        echo " <tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['Day']."</td>
        <td>".$row['Meal']."</td>
        <td>".$row['Food']."</td>
        <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> </td>
      </tr>";
    }
    
    
    ?>
    
  </tbody>
</table>
</div>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;
        console.log(tr.getElementsByTagName("td"));
        day = tr.getElementsByTagName("td")[0].innerText;
        meal = tr.getElementsByTagName("td")[1].innerText;
        food = tr.getElementsByTagName("td")[2].innerText;
        console.log(day, meal, food);
        foodEdit.value = food;
        snoEdit.value = e.target.id;
        console.log(snoEdit.value)
        $('#editModal').modal('toggle');
        })
    })


</script>

</body>
</html>