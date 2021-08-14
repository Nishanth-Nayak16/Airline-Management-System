<?php
include('dbconnect.php');

$query="SELECT * FROM airplane";
$result=mysqli_query($con,$query);
$num = mysqli_num_rows($result);
$sql = "SELECT * FROM aircraft_type";
$res1=mysqli_query($con,$sql);


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
  <title>Airplane Details</title>
</head>
<body class="search-body">
<div class="container" style="text-align:center;">
<center><h2>AIRPLANE DEATILS</h2></center><br>
<table class="table table-hover">
<thead style="background:transparent;">
  <tr style="font-size:large;">
    <th>AIRPLANE ID</th>
    <th>AIRCRAFT TYPE</th>
    <th>MANUFACTURER NAME</th>
    <th>MAX CAPACITY</th>
    <th>YEAR OF COMMISSION</th>
  </tr>
</thead>
<tbody style="background:transparent"; >
';
if($num != 0) {
  while($row=mysqli_fetch_array($result)){
    $air_id=$row['airplane_id'];
    $air_name=$row['aircraft_type'];
    $year=$row['year_of_commission'];
    $q = "SELECT * FROM aircraft_type WHERE aircraft_type_name = '$air_name'";
    $query = mysqli_query($con, $q);
    $arr = mysqli_fetch_array($query);
    $man = $arr['manufacturer'];
    $max = $arr['max_capacity'];
    echo '
    <tr style="font-size:large;font-weight: bold;text-align:center;" name="MyTable">
    <td><input type="hidden" name="fcode">'.$air_id.'</td>
    <td><input type="hidden" name="source">'.$air_name.'</td>
    <td><input type="hidden" name="source">'.$man.'</td>
    <td><input type="hidden" name="source">'.$max.'</td>
    <td><input type="hidden" name="destination">'.$year.'</td>
  </tr>
    ';
  }
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
  <center><button class="add-btn" onclick="openForm()">ADD AIRPLANE</button></center>
<br>
<div class="form-popup" id="myForm">
<form id="airId" class="form" action="admin-flight.php" method="POST" autocomplete="off">
<center>
<h3>ENTER NEW AIRPLANE DEATILS</h3>
</center>
<input type="text" id="airplaneId" onblur="validateAirid()" class="input-field" name="airId" placeholder="Enter Airplane Id" style="text-transform:uppercase" autocomplete="off" autofocus required>
<span id="messageAirid" class="errorHeader">Invalid Airplane Id</span>
<input type="text" list="browsers" id="type" class="input-field" name="type" placeholder="Enter Airplane type" style="text-transform:uppercase" id="browser" required>
<datalist id="browsers">';
while($row1=mysqli_fetch_array($res1)) {
$type = $row1['aircraft_type_name'];
echo '<option name="type" value="'.$type.'">';
}
echo '</datalist>
<br></br>
<input type="number" id="year" min="2000" max="2022" class="input-field" name="year" placeholder="Enter Year of commission" style="text-transform:uppercase" autocomplete="off" required>
<br></br>
<button type="submit" name="airplane" class="btn">SUBMIT</button>
<button type="button" class="cancel" onclick="closeForm()">CLOSE</button>
</form>
</div>
</body>
</html>';
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

function validateAirid() {
    var id = document.getElementById("airplaneId").value;

    var regexAir = /[G,O]{2}[0-9]{3}/;

    if(id == '') {
        document.getElementById("airplaneId").focus();
    }else if(id.length != 5 || regexAir.test(id) == false) {
        document.getElementById("airplaneId").focus();
        document.getElementById("messageAirid").style.visibility = "visible"; 
    } else {
      console.log("in");
        document.getElementById("messageAirid").style.visibility = "hidden"; 
    }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<script src="script.js"></script>