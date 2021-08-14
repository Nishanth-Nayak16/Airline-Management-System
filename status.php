<?php
session_start();
$con = new mysqli("localhost","root","","airdbms");
if(isset($_SESSION['resId']) && isset($_SESSION['st'])) {
  echo "<script>alert('Ticket Booking Successful')</script>";
  $reserve = $_SESSION['resId'];
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script>window.history.forward();</script>
    <title>Ticket</title></title>
    <style>
    th {
      text-align: center;
      font-weight: bold;
    }
    h2 {
      font-weight: bold;
    }
    </style>

</head>
<body class="search-body">
<div class="container" style="text-align:left;">
<br>
<br><br>
<center><h2>TICKET DETAILS</h2></center><br>
<table class="table table-hover">
<thead style="background:transparent;">
  <tr style="font-size:15px;">
    <th>RESERVATION ID</th>
    <th>PASSPORT NUMBER</th>
    <th>FLIGHT CODE</th>
    <th>SOURCE</th>
    <th>DESTINATION</th>
    <th>BOOKED SEATS</th>
    <th>TOTAL AMOUNT</th>
    <th>FLIGHT DATE</th>
  </tr>
</thead>
<tbody style="background:transparent"; >';

$q = "SELECT * FROM reservation WHERE reservation_id = '$reserve'";
$r = mysqli_query($con, $q);
$val = mysqli_fetch_array($r);
$cost = $val['amount'];
$passport = $val['passport_no'];
$fcode = $val['f_code'];
$nos = $val['seats'];
$cost = $val['amount'];
$get = "SELECT * FROM flight WHERE fcode = '$fcode'";
$rows = mysqli_query($con, $get);
$values = mysqli_fetch_array($rows);
$src = $values['source'];
$dest = $values['destination'];
$date = $values['fdate'];
  echo '
  <tr style="font-size:15px;text-align:center;font-weight: bold;" name="MyTable">
  <td><input type="hidden" name="resid">'.$reserve.'</td>
  <td><input type="hidden" name="passport">'.$passport.'</td>
  <td><input type="hidden" name="fcode">'.$fcode.'</td>
  <td><input type="hidden" name="src">'.$src.'</td>
  <td><input type="hidden" name="dest">'.$dest.'</td>
  <td><input type="hidden" name="nos">'.$nos.'</td>
  <td><input type="hidden" name="cost">'.$cost.'</td>
  <td><input type="hidden" name="date">'.$date.'</td>
</tr></tbody></table></div>
<br>
<center><form method="post" action="flight.php">
<button type="submit" class="select-btn">BACK</button>
</form></center>';
echo '<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</body>
</html>';
unset($_SESSION['resId']);
unset($_SESSION['st']);
} else {
  echo"<script>window.open('flight.php','_self')</script>";
}
?>