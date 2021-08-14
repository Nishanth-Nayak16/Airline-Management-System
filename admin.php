<?php
session_start();
if(isset($_SESSION['admin'])) {
  include('dbconnect.php');

  $query="SELECT * FROM airplane";
  $result=mysqli_query($con,$query);
  
  echo '<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
  
  <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <form class="form-inline my-2 my-lg-0" action="info.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Flight Info</button>
              </form>
            </li>
            <li class="nav-item active">
            <form class="form-inline my-2 my-lg-0" action="air-info.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Airplane Info</button>
            </form>
            </li>
            <li class="nav-item active">
              <form class="form-inline my-2 my-lg-0" action="type-info.php">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Aircraft Type Info</button>
              </form>
            </li>
          </ul>
        </div>
        <form class="form-inline my-2 my-lg-0" action="logout.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">LOGOUT</button>
        </form>
      </nav>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  <body class="hero1">
      <div>
        <div class="form">
          <form id="flightForm" class="login-form" action="admin-flight.php" method="POST">
            <center><h3>ENTER FLIGHT DETAIL</h3></center>
            <input type="text" id="flight" onblur="validateFlight()" class="input-field" name="flight" placeholder="Enter Flight Code" style="text-transform:uppercase" autocomplete="off" autofocus required>
            <span id="messageFlight" class="errorHeader">Invalid Flight Code</span>
            <input type="text" list="browsers" class="input-field" name="airId" placeholder="Select Airplane Id" id="airId" autocomplete="off" style="text-transform:uppercase" required>
            <datalist id="browsers">';
            while($row=mysqli_fetch_array($result)) {
              $airId = $row['airplane_id'];
              echo '<option name="airId" value="'.$airId.'">';
            }
            echo '</datalist>
            <br></br>
            <input type="text" id="source" class="input-field" onblur="validateSource()" name="src" placeholder="Enter Source" style="text-transform:uppercase" autocomplete="off" required>
            <span id="messageSource" class="errorHeader">Invalid Source</span>
            <input type="text" id="destination" class="input-field" onblur="validateDestination()" name="dest" placeholder="Enter Destination" style="text-transform:uppercase" autocomplete="off" required>
            <span id="messageDestination" class="errorHeader">Invalid Destination</span>
            <input type="number" id="class" class="input-field" min="1000" max="20000" name="cost" placeholder="ENTER COST" autocomplete="off" step="any" required>
            <br></br>
            <input type="number" id="nos" class="input-field" name="nos" min="50" max="500" placeholder="ENTER NUMBER OF SEATS" autocomplete="off" required>
            <br></br>
            <input type="time" id="Time" class="input-field" name="t" placeholder="Enter Time" required>
            <br></br>
            <input type="date" id="date" class="input-field" name="d" placeholder="Enter Date" autocomplete="off" required>
            <br></br>
            <button type="submit" name="flights" class="button-submit">SUBMIT</button>
          </form>
        </div>
    </div>
  </body>
  </html>';
} else {
  header("location:index.php");
}

?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script>

    document.onkeydown = function(t) {
        if(t.which==9) {
            return false;
        }
    }

    $(function() {
        $('input').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
    });

    let today = new Date(),
      day = today.getDate(),
      month = today.getMonth()+1, //January is 0
      year = today.getFullYear();
          if(day<10){
                  day='0'+day
              } 
          if(month<10){
              month='0'+month
          }
      today = year+'-'+month+'-'+day;

    document.getElementById("date").setAttribute("min", today);
</script>
<script src="script.js">
</script>
