<?php
session_start();
if(isset($_POST['submit'])) {
  if(isset($_SESSION['passport'])) {
    $v2 = $_SESSION['passport'];
    $fcode = $_POST['fcode'];
    $nos = $_POST['nos'];
    $cost = $_POST['cost'];
    $date = date('Y/m/d');
    include('dbconnect.php');
  
    $sql="INSERT INTO reservation (passport_no,f_code,seats,res_date) VALUES ('$v2','$fcode','$nos','$date')";
    $query=mysqli_query($con,$sql);
    
    if($query) {
      $last_id = mysqli_insert_id($con);
      $call = "CALL calc_cost('$cost', '$last_id')";
      $_SESSION['resId'] = $last_id;
      $_SESSION['st'] = 1;
      if($con->query($call) == TRUE) {
        echo" <script>window.open('reserve.php','_self')</script>";
      } else {
        echo "<script>alert('Reservation Unsuccessful')</script>";
        echo" <script>window.open('search.php','_self')</script>";
      }
    } else {
      echo "<script>alert('Reservation Unsuccessful')</script>";
      echo" <script>window.open('search.php','_self')</script>";
    }
  }
}
?>