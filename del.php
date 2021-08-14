<?php
include('dbconnect.php');
if(isset($_POST['cancel-ticket'])) {
    $user = $_POST['resid'];
    $fcode = $_POST['fcode'];
    $date = date('Y/m/d');
    $sql = "DELETE FROM reservation WHERE reservation_id = '$user' && res_date > $date";
    $result = mysqli_query($con, $sql);
    if($result) {
        echo "<script>alert('Cancellation successful')</script>";
        echo"<script>window.open('flight.php','_self')</script>";
    } else {
        echo "<script>alert('Cancellation Unsuccessful')</script>";
        echo"<script>window.open('flight.php','_self')</script>";
    }
}
if(isset($_POST['flight-cancel'])) {
    $fcode = $_POST['fcode'];
    $date = date('Y/m/d');
    $sql = "DELETE FROM flight WHERE fcode = '$fcode'";
    $result = mysqli_query($con, $sql);
    if($result) {
        echo "<script>alert('Cancellation successful')</script>";
        echo"<script>window.open('info.php','_self')</script>";
    } else {
        echo "<script>alert('Cancellation Unsuccessful')</script>";
        echo"<script>window.open('info.php','_self')</script>";
    }
}
?>