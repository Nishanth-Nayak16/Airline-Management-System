<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details</title>
</head>
<body class="search-body">
<?php
session_start();
include('dbconnect.php');
if(isset($_SESSION['resId']) && isset($_SESSION['resId'])) {
  $reserve = $_SESSION['resId'];
  unset($_SESSION['st']);
  $st=0;
  $qq = "DELETE FROM reservation WHERE reservation_id = '$reserve'";
  $qqq = mysqli_query($con,$qq);
  if(!$qqq) {
    echo "<script>alert('No Details Available')</script>";
  }
  unset($_SESSION['resId']);
}
  $source = $_POST['source'];
  $destination = $_POST['destination'];
  $date = $_POST['date'];
  
  $query="SELECT * FROM flight WHERE source='$source' && destination='$destination' && fdate >= '$date';";
  $result=mysqli_query($con,$query);
  $num = mysqli_num_rows($result);
  
  if($num == 0) {
    echo "<script>alert('Sorry! No Flights Available')</script>";
    echo "<script>window.open('flight.php','_self')</script>";
  }
  
  
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
    th {
      text-align: center;
    }
    th {
      font-weight: bold;
    }
    </style>
  </head>
  <body class="search-body">
  <div class="container">
  <center><h2>FLIGHT DEATILS</h2></center><br>
  <table class="table table-hover">
  <thead style="background:transparent;">
    <tr style="font-size:medium;">
      <th>FLIGHT CODE</th>
      <th>SOURCE</th>
      <th>DESTINATION</th>
      <th>FARE</th>
      <th>AVAILABLE SEATS</th>
      <th>TIME</th>
      <th>DATE</th>
      <th>ENTER NUMBER OF SEATS</th>
      <th></th>
    </tr>
  </thead>
  <tbody style="background:transparent"; >
  ';
  while($row=mysqli_fetch_array($result)){
    $airid=$row['airplane_id'];
    $fcode=$row['fcode'];
    $source=$row['source'];
    $destination=$row['destination'];
    $cost=$row['cost'];
    $nos=$row['no_of_seats'];
    if($nos < 9) {
      $max = $nos;
    } else {
      $max = 9;
    }
    $time=$row['ftime'];
    $date=$row['fdate'];
    echo '
    <form method="POST" action="reserve1.php">
    <tr style="font-size:medium;text-align:center;font-weight: bold;" name="MyTable">
    <td><input type="hidden" name="fcode" value="'.$fcode.'">'.$fcode.'</td>
    <td><input type="hidden" name="source" value="'.$source.'">'.$source.'</td>
    <td><input type="hidden" name="destination" value="'.$destination.'">'.$destination.'</td>
    <td><input type="hidden" name="cost" value="'.$cost.'">'.$cost.'</td>
    <td><input type="hidden" name="nos">'.$nos.'</td>
    <td><input type="hidden" name="time">'.$time.'</td>
    <td><input type="hidden" name="date" value="'.$date.'">'.$date.'</td>
    <td><input type="number" class="num" min="1" max="'.$max.'" id="nos" name="nos" placeholder="Enter Number of Seats" required></td>
    <td><button type="submit" name="submit" class="book-btn">BOOK</button></td>
  </tr>
    </form>
    ';
  }
  echo '</tbody></table></div> 
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <form action="flight.php">
      <center>
      <button type="submit" class="select-btn">BACK</button>
      </center>
    </form>
    </body>
    </html>';
?>
