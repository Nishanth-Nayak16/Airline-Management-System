<?php
session_start();
    if(isset($_SESSION['resId'])) {
      $reserve = $_SESSION['resId'];
      include('dbconnect.php');
      $s = "SELECT * FROM reservation WHERE reservation_id = '$reserve'";
      $q=mysqli_query($con,$s);
        $val = mysqli_fetch_array($q);
        $pass = $val['passport_no'];
        $fcode = $val['f_code'];
        $nos = $val['seats'];
        $cost = $val['amount'];
        $date = $val['res_date'];
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
      <script>window.history.forward();
      function noBack() {
        window.history.forward();
      }
      </script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <style>
      th {
          text-align: center;
          font-weight: bold;
      }
      h2 {
        font-weight: bold;
      }
      </style>
      <title>Payment Details</title>
    </head>
    <body class="search-body" onload="noBack();">
    <div class="container";">
    <center><h2>PAYMENT DEATILS</h2></center><br>
    <table class="table table-hover">
    <thead style="background:transparent;">
      <tr style="font-size:medium;">
        <th>FLIGHT CODE</th>
        <th>PASSPORT NUMBER</th>
        <th>SEATS BOOKED</th>
        <th>TOTAL AMOUNT</th>
        <th>DATE</th>
        <th></th>
      </tr>
    </thead>
    <tbody style="background:transparent"; >
    ';
      echo '
      <form method="post" action="status.php">
      <tr style="font-size:medium;text-align: center;font-weight:bold;" name="MyTable">
      <td><input type="hidden" name="fcode" value="'.$fcode.'">'.$fcode.'</td>
      <td><input type="hidden" name="pass" value="'.$pass.'">'.$pass.'</td>
      <td><input type="hidden" name="nos" value="'.$nos.'">'.$nos.'</td>
      <td><input type="hidden" name="cost" value="'.$cost.'">'.$cost.'</td>
      <td><input type="hidden" name="date">'.$date.'</td>
      <td><button type="submit" name="submit" class="book-btn">PAY</button></td>
    </tr>
      </form>
      ';
    echo '</tbody></table></div> 
    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      </body>
      </html>';
    } else {
      echo "<script>alert('No Details Available')</script>";
      echo"<script>window.open('flight.php','_self')</script>";
    }
?>