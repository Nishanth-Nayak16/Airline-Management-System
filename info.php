<?php
include('dbconnect.php');

$query="SELECT * FROM flight";
$result=mysqli_query($con,$query);
echo '<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- Bootstrap CSS -->
  <style>
  th {
    text-align: center;
  }
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <style>
  th {
    text-align: center;
  }
  h2 {
    font-weight: bold;
  }
  </style>
  <style>

  /* Button used to open the contact form - fixed at the bottom of the page */
  .input-field {
    width: 100%;
    padding: 10px 0;
    margin: 2px 0;
    border: none;
    outline: none;
  }
  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    position: relative;
    bottom: 0;
    border: 1px solid transparent;
  }
  
  /* Add styles to the form container */
  .form-container {
    background: transparent;
    width: 300px;
    margin: 0 auto;
    padding: 20px;
  }
  .add-btn {
    text-transform: uppercase;
    outline: 0;
    background: orange;
    width: 18%;
    border: none;
    padding: 10px;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
    transition: .5s;
    margin: 5px 0;
    height: 20%;
  }
  
  /* Set a style for the submit/login button */
  .btn {
    background-color: red;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }
  
  /* Add a red background color to the cancel button */
  .cancel {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }
  
  /* Add some hover effects to buttons */
  .btn:hover, .open-button:hover {
    opacity: 1;
  }
  </style>
  <title>Flight Details</title>
  </head>
<body class="search-body">
<div class="container">
<center><h2>FLIGHT DEATILS</h2></center><br>
<table class="table table-hover">
<thead style="background:transparent;">
  <tr style="font-size:15px;">
    <th>FLIGHT CODE</th>
    <th>AIRPLANE ID</th>
    <th>SOURCE</th>
    <th>DESTINATION</th>
    <th>COST</th>
    <th>AVAILABLE SEATS</th>
    <th>TOTAL SEATS</th>
    <th>TIME</th>
    <th>FLIGHT DATE</th>
    <th></th>
  </tr>
</thead>
<tbody style="background:transparent"; >
';
while($row=mysqli_fetch_array($result)){
  $fcode=$row['fcode'];
  $airId=$row['airplane_id'];
  $source=$row['source'];
  $destination=$row['destination'];
  $cost=$row['cost'];
  $nos=$row['no_of_seats'];
  $time=$row['ftime'];
  $date=$row['fdate'];
  $sql = "SELECT sum(seats) as s FROM reservation WHERE f_code = '$fcode'";
  $res=mysqli_query($con,$sql);
  $r = mysqli_fetch_array($res);
  $tot = $r['s']+$nos;
  echo '
  <form method="post" action="del.php">
  <tr style="font-size:medium;text-align: center;font-weight: bold;" name="MyTable">
  <td><input type="hidden" name="fcode" value="'.$fcode.'">'.$fcode.'</td>
  <td><input type="hidden" name="airId">'.$airId.'</td>
  <td><input type="hidden" name="source">'.$source.'</td>
  <td><input type="hidden" name="destination">'.$destination.'</td>
  <td><input type="hidden" name="cost">'.$cost.'</td>
  <td><input type="hidden" name="nos">'.$nos.'</td>
  <td><input type="hidden" name="tot">'.$tot.'</td>
  <td><input type="hidden" name="time">'.$time.'</td>
  <td><input type="hidden" name="date">'.$date.'</td>
  <td><button type="submit" name="flight-cancel" class="book-btn">CANCEL</button></td>
</tr>
  </form>';
}
echo '</tbody></table>
</div> 
<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <form action="admin.php">
    <center>
    <button type="submit" class="select-btn">BACK</button>
    </center>
  </form>
  <br>
  <button class="add-btn" onclick="openForm()">UPDATE COST</button>
  <br>
  <div class="form-popup" id="myForm">
<form id="airId" class="form" action="admin-flight.php" method="POST" autocomplete="off">
<center>
<h4>UPDATE COST</h4>
</center>
<form id="airType"  action="admin-flight.php" method="POST" autocomplete="off">
<input type="text" list="browsers" id="fcode" class="input-field" name="fcode" placeholder="SELECT FLIGHT CODE" autofocus id="browser" required>
<datalist id="browsers">';
$q="SELECT * FROM flight";
$res=mysqli_query($con,$q);
while($row1=mysqli_fetch_array($res)){
$fcode1=$row1['fcode'];
echo '<option name="type" value="'.$fcode1.'">';
}
echo '</datalist>
<br></br>
<input type="number" id="class" class="input-field" min="1000" max="20000" name="cost" placeholder="ENTER COST" autocomplete="off" required>
<br></br>
<button type="submit" name="update-cost" class="button-submit">DONE</button>
</form>
</div>
  </body>
  </html>';
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script>

document.onkeydown = function(t) {
          if(t.which==9) {
              return false;
          }
      }

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}


</script>