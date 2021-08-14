<?php
session_start();
include('dbconnect.php');

if(isset($_SESSION['passport'])) {
  $v2 = $_SESSION['passport'];
}

$resid = $_POST['resid'];
$query="SELECT * FROM reservation WHERE reservation_id = '$resid' && passport_no = '$v2'";
$result=mysqli_query($con,$query);
$num = mysqli_num_rows($result);
if($num == 0) {
  echo "<script>alert('No Details Available')</script>";
  echo "<script>window.open('flight.php','_self')</script>";
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Ticket Details</title>
    <style>
    th {
      text-align: center;
    }
    h2 {
      font-weight:bold;
    }
    </style>
    <style>
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: relative;
  bottom: 0;
  right: 15px;
  border: 3px solid transparent;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background: transparent;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
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
.form-container .cancel {
  background-color: #4CAF50;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

</head>
<body class="search-body">
<div class="container">
<center><h2>TICKET DETAILS</h2></center><br>
<table class="table table-hover">
<thead style="background:transparent;">
  <tr style="text-align:left;font-size:14px;">
    <th>RESERVATION ID</th>
    <th>FLIGHT CODE</th>
    <th>PASSPORT NUMBER</th>
    <th>SOURCE</th>
    <th>DESTINATION</th>
    <th>SEATS</th>
    <th>TOTAL AMOUNT</th>
    <th>FLIGHT DATE</th>
    <th>RESERVATION DATE</th>
    <th></th>
  </tr>
</thead>
<tbody style="background:transparent"; >';
$val=mysqli_fetch_array($result);
$cost = $val['amount'];
$fcode = $val['f_code'];
$nos = $val['seats'];
$resDate = $val['res_date'];

$sql = "SELECT * FROM flight WHERE fcode='$fcode'";
$res=mysqli_query($con,$sql);
$value=mysqli_fetch_array($res);
$src = $value['source'];
$dest = $value['destination'];
$date = $value['fdate'];
  echo '
  <tr style="font-size:14px;text-align:center;font-weight:bold" name="MyTable">
  <td>'.$resid.'</td>
  <td>'.$fcode.'</td>
  <td>'.$v2.'</td>
  <td>'.$src.'</td>
  <td>'.$dest.'</td>
  <td>'.$nos.'</td>
  <td>'.$cost.'</td>
  <td>'.$date.'</td>
  <td>'.$resDate.'</td>
  <td></td>
</form></center>
</tr>';

echo '</tbody></table></div>
<center>
<button class="select-btn" onclick="openForm()">Cancel</button>
<br>
<form method="post" action="flight.php">
<button type="submit" class="select-btn">BACK</button>
</form>
</center>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</body>
<body>
<div class="form-popup" id="myForm">
<center>  <form action="del.php" method="POST" class="form-container">
<h4>Are You Sure You Want To Cancel Ticket?</h4>
<input type="hidden" name="resid" value="'.$resid.'">
<input type="hidden" name="fcode" value="'.$fcode.'">
<button type="submit" name="cancel-ticket" class="btn">Yes</button>
<button type="button" class="btn cancel" onclick="closeForm()">No</button>
</form></center>
</div>
</body>
</html>';
?>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>