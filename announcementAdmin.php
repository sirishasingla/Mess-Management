<!-- INSERT INTO `announcements` (`sno`, `message`, `tstamp`) VALUES (NULL, 'tomorrow breakfast timings are 8:30 to 9:30', current_timestamp()); -->
<!-- UPDATE `announcements` SET `sno` = NULL, `message` = 'tomorrow breakfast eggs will not be served', `tstamp` = current_timestamp() WHERE `announcements`.`sno` = 5; -->
<?php
session_start();
$insert = false;
$delete = false;
$update = false;
if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="database1";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `announcements` WHERE `sno` = $sno";
    $result = mysqli_query($data, $sql);
  }

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset( $_POST['snoEdit'])){
        // Update the record
          $sno = $_POST["snoEdit"];
          $message = $_POST["announcementEdit"];
      
        // Sql query to be executed
        
        $sql = " UPDATE `announcements` SET `message` = '$message', `tstamp` = current_timestamp() WHERE `announcements`.`sno` = $sno";
        $result = mysqli_query($data, $sql);
        if($result){
          $update = true;
        }
        else{
          echo "We could not update the record successfully";
        }
      }
    else{
        $message=$_POST["announcement"];
        // $sno = $sno+1;
        $sql1 = "INSERT INTO `announcements` (`message`, `tstamp`) VALUES ('$message', current_timestamp())";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <style>
        h1 {text-align: center;}
        /* p {text-align: center;} */
        div {text-align: center;}
        </style>
    <script>
        // let table = new DataTable('#myTable');
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <title>Announcements</title>
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
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Announcement</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
      <form action="announcementAdmin.php" method="POST">
        <input type="hidden" name="snoEdit" id="snoEdit">
        <div class="mb-3">
            <label for="title" class="form-label">Announcement</label>
            <input type="text" class="form-control" id="announcementEdit" name="announcementEdit" aria-describedby="emailHelp">
        </div>
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



    <!-- <div class="container"> -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
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
        <strong>Success! </strong> The message has been inserted successfully!
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
<h1 text-align="center">Bulletin Board</h1>
    <div class="container d-flex" >
        
        <div class="p-2 flex-fill">
        <form action="announcementAdmin.php" method="POST">
            <div class="mb-3">
            <label for="announcement" class="form-label">Add Announcement Here</label>
            <textarea class="form-control" id="announcement" name="announcement" rows="15"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        </div>
        <div class="p-2 flex-fill">
            <h1>All Announcements</h1>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Announcement</th>
                        <th scope="col">Date/Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `announcements` ORDER BY sno DESC";
                        $result = mysqli_query($data, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $sno = $sno+1;
                            echo " <tr>
                            <th scope='row'>".$sno."</th>
                            <td>".$row['message']."</td>
                            <td>".$row['tstamp']."</td>
                            <td><button class='edit btn btn-sm btn-success' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-danger' id=d".$row['sno'].">Delete</button></td>
                            </tr>";
                        }
                    ?>  

                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->
<script>

edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        tr = e.target.parentNode.parentNode;
        // console.log(tr.getElementsByTagName("td")[0])
        message = tr.getElementsByTagName("td")[0].innerText;
        console.log(message);
        announcementEdit.value = message;
        snoEdit.value = e.target.id;
        console.log(snoEdit.value)
        $('#editModal').modal('toggle');
        })
    })


       deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
        console.log("delete");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `announcementAdmin.php?delete=${sno}`;
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