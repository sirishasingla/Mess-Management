<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="database1";


if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mess Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Mess Management</h1>      
    <p>User Home Page</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Hostel-Q</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="#notice">Notice</a></li>
        <li><a href="userRequest.php">Special Requests</a></li>
        <li><a href="lostFound.php">Lost and Found</a></li>
        <li><a href="availabilityUser.php">Availability</a></li>
        <li><a href="#">Chat</a></li>
        <li><a href="#">Feedback</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <h2>Food Wastage Benefits No One</h2>
  <blockquote>
    <p>In a world where hunger continues to afflict millions, it's vital to address food loss and waste. Each day, an alarming 25,000 individuals, including over 10,000 children, succumb to hunger and its related consequences. Shockingly, about 13 percent of the world's food production is lost between harvest and retail, with an additional 17 percent wasted in households, food service, and retail. This squanders vital resources such as water, land, and energy, while also contributing to greenhouse gas emissions and climate change in landfills. Food loss and waste harm food security and affordability. To establish resilient, sustainable food systems, a coordinated approach to minimize waste is critical. Embracing innovative technologies and practices is our path forward. With just seven years to reach Sustainable Development Goal 12, there's an urgent call to action to combat food loss and waste.</p>
    <footer>from United Nations website</footer>
  </blockquote>
</div>
<!-- <div class="jumbotron">
  <div class="container text-center">
    <h3>Food Wastage Benefits No One</h3>      
    <p>1.3 billion tons of food a year wasted.<br>Each day, 25,000 people, including more than 10,000 children, die from hunger</p>
  </div>
</div> -->

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Ways to Reduce Food Wastage in Mess</div>
        <div class="panel-body"><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"></button><img src="https://i.pinimg.com/736x/7f/6f/07/7f6f074c12ac81cc9f2dbcb937513396.jpg" class="img-responsive" style="width:100%" alt="Image"></button>
          <div id="demo" class="collapse">
            <ol>
              <li>Portion Control: Take only what you can eat. Smaller portions reduce plate waste.</li> 
              <li>Scrape and Save: Scraping your plate into designated bins collects organic waste for composting.</li>
              <li>Plan Tomorrow's Plate: Indicate your absence or special food requests for the next day. Help us prepare the right amount. </li>
              <li>Speak Your Taste: Give regular feedback on food quality and menu items. Your input makes our meals better.</li>
            </ol>
          </div></div>
        <div class="panel-footer">
          <div class="container">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">View Ways</button>
            <!-- <div id="demo" class="collapse">
              Lorem ipsum dolor sit amet,<br> consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading" id="notice">NOTICE BOARD</div>
        <div class="panel-body">
          <!-- <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"> -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sno</th>
                <th scope="col">Announcement</th>
                <th scope="col">Date/Time</th>
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
               </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="panel-footer">---</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">CHAT</div>
        <div class="panel-body">
          <!-- <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"> -->
        </div>        <div class="panel-footer">---</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">MENU</div>
        <div class="panel-body">
          <!-- <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"> -->
        </div>
        <div class="panel-footer">---</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">SPECIAL REQUESTS</div>
        <div class="panel-body">
          <!-- <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"> -->
        </div>
        <div class="panel-footer">---</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" >LOST 'n' FOUND</div>
        <div class="panel-body">
          <!-- <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"> -->
        </div>
        <div class="panel-footer">---</div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>Contact Mess Committee</p>  
  <form class="form-inline">Contact:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
