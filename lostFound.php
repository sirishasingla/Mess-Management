<?php 
// INSERT INTO `notice` (`sno`, `title`, `description`, `location`, `tstamp`) VALUES (NULL, 'Lost', 'Keychain with 2 keys and red leather tag engraved with initials \'M.R.\' ', 'in hostel mess', current_timestamp());
// connect to the database
$insert = false;
$update = false;
$delete = false;

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

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notice` WHERE `sno` = $sno";
    $result = mysqli_query($data, $sql);
  }


// echo $_SERVER["REQUEST_METHOD"];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset( $_POST['snoEdit'])){
        // Update the record
          $sno = $_POST["snoEdit"];
          $title = $_POST["titleEdit"];
          $description = $_POST["descriptionEdit"];
          $location = $_POST['locationEdit'];
      
        // Sql query to be executed
        
        $sql = "UPDATE `notice` SET `title` = '$title', `description` = '$description', `location` = '$location' WHERE `notice`.`sno` = $sno";
        $result = mysqli_query($data, $sql);
        if($result){
          $update = true;
        }
        else{
          echo "We could not update the record successfully";
        }
      }
    else{
        $title=$_POST["title"];
	    $description=$_POST["description"];
        $location=$_POST["location"];
        // $sno = $sno+1;
        $sql1 = "INSERT INTO `notice` ( `title`, `description`, `location`, `tstamp`) VALUES ('$title', '$description', '$location', current_timestamp())";
        $result = mysqli_query($data, $sql1);
        if($result){
        // echo "The notice has been inserted successfully!<br>";
            $insert = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost/Found</title>
    
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
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Notice</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
      <form action="lostFound.php" method="POST">
        <input type="hidden" name="snoEdit" id="snoEdit">
        <div class="mb-3">
            <label for="title" class="form-label">Lost/Found</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="locationEdit" name="locationEdit" aria-describedby="emailHelp">
        </div>
        <!-- <button type="submit" class="btn btn-primary">Add</button> -->
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="edit btn btn-primary">Save changes</button> -->
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>



<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" >Lost/Found</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php
          if($user_type==="admin"){ 
            echo "<a class='nav-link active' aria-current='page' href='adminhome.php'>Home</a>";
          }
          else{
            echo "<a class='nav-link active' aria-current='page' href='userhome.php'>Home</a>";
          }
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
        <strong>Success! </strong> The notice has been inserted successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
?>
<?php
    if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success! </strong> The notice has been updated successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
?>
<?php
    if($delete){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success! </strong> The notice has been deleted successfully!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
?>
<div class="container">
<h1>Notice Board</h1>
<form action="lostFound.php" method="POST">
   
  <div class="mb-3 my-4">
    <label for="title" class="form-label">Lost/Found</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>
  <div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <input type="text" class="form-control" id="location" name="location" aria-describedby="emailHelp">
    </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>

<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Location</th>
      <th scope="col">Date/Time</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql = "SELECT * FROM `notice`";
    $result = mysqli_query($data, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){
        $sno = $sno+1;
        echo " <tr>
        <th scope='row'>".$sno."</th>
        <td>".$row['title']."</td>
        <td>".$row['description']."</td>
        <td>".$row['location']."</td>
        <td>".$row['tstamp']."</td>
        <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
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
        console.log(tr.getElementsByTagName("td")[2])
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        loc = tr.getElementsByTagName("td")[2].innerText;
        console.log(title, description, loc);
        titleEdit.value = title;
        descriptionEdit.value = description;
        locationEdit.value = loc;
        snoEdit.value = e.target.id;
        console.log(snoEdit.value)
        $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `lostFound.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
</script>

</body>
</html>