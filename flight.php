<?php
session_start();
if(isset($_SESSION['passport'])) {
  $v2 = $_SESSION['passport'];
  include('dbconnect.php');
  $query="SELECT * FROM flight;";
  $result=mysqli_query($con,$query);
  $C = 0;
  while($row=mysqli_fetch_array($result)){
    $source[$C]=$row['source'];
    $destination[$C]=$row['destination'];
    $C++;
  }
  $src=array_values(array_unique($source));
  $dest=array_values(array_unique($destination));
  echo '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script>window.history.forward();</script>
      <script src="script.js"></script> 
      <title>Home</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <form class="form-inline my-2 my-lg-0" autocomplete="off" method="post" action="ResDetails.php">
        <label style="color:white;">TICKET DETAILS : </label>
        <input class="form-control mr-sm-2" type="search" placeholder="Enter Reservation id" name="resid" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      </li>
        </ul>
          </div>
          <form class="form-inline my-2 my-lg-0" action="logout.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">LOGOUT</button>
          </form>
      </nav>
      <scrip src="js/jquery-3.5.1.slim.min.js"></scrip>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
  <body>
  <div class="search-form">
  <center><h1>WELCOME TO GO AIR</h1></center>
  <br>
      <div class="container"> 
         <h2>SEARCH FLIGHTS</h2> 
      </div>
      <br>
      <div class="container">  
        <form id="fli" class="form-inline" autocomplete="off" action="search.php" method="POST"> 
        <input type="text" list="browsers" class="select-op" name="source" placeholder="SOURCE" style="text-align:center; autofocus id="sour" required>
        <datalist id="browsers">';
        for($r=0; $r<sizeof($src); $r++) {
          echo '<option name="src" value="'.$src[$r].'">';
        }
        echo '</datalist>
        <input type="text" list="dests" class="select-op" name="destination" placeholder="DESTINATION" style="text-align:center; id="dest" required>
        <datalist id="dests">';
        for($r=0; $r<sizeof($dest); $r++) {
            echo '<option name="desti" value="'.$dest[$r].'">';
        }
        echo '</datalist>
        <input type="date" class="select-op" id="date" name="date" required> 
        <button type="submit" class="select-btn">Search</button>  
        </form>
        <span id="message" class="errorHeader">Enter all in capital</span>
      </div>
    </div>
  </body>
  </html>';
} else {
  header("location:index.php");
}

?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
        let today = new Date(),
        day = today.getDate(),
        month = today.getMonth()+1, //January is 0
        year = today.getFullYear();
            if(day<10){
                    day='0'+day;
                } 
            if(month<10){
                month='0'+month;
            }
        year = year;
        today = year+'-'+month+'-'+day;

        document.getElementById("date").setAttribute("min", today);


document.onkeydown = function(t) {
    if(t.which==9) {
        return false;
    }
}
 
</script>
