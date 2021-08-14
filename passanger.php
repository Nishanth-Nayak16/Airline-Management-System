<?php
session_start();
if(isset($_POST['new'])){
    $passportNo = $_POST['passportNo'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $street = $_POST['street'];
    $state = $_POST['state'];
    $phoneNo = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];

    include('dbconnect.php');
    $s = "SELECT * FROM passenger WHERE passport_no = '$passportNo'";
    $q = mysqli_query($con,$s);
    $r=mysqli_fetch_array($q);
    $pass=$r['passport_no'];
    $ph=$r['phone'];
    $mail=$r['emailId'];
    $password = $_POST['pass'];
    if($pass == $passportNo) {
        echo "<script>alert('Passport Number Already Exits')</script>";
        echo"<script>window.open('new.php','_self')</script>";
    } else if ($ph == $phoneNo) {
        echo "<script>alert('Phone Number Already Exits')</script>";
        echo"<script>window.open('new.php','_self')</script>";
    } else if($mail == $email) {
        echo "<script>alert('Mail Id Already Exits')</script>";
        echo"<script>window.open('new.php','_self')</script>";
    } else {
        $sql="insert into passenger (passport_no,fname,lname,city,state,phone,gender,dob,emailId,password) values ('$passportNo','$fname','$lname','$street','$state','$phoneNo','$gender','$date','$email','$password')";
        $query=mysqli_query($con,$sql);
        if($query) {
            $q1="SELECT * FROM passenger WHERE passport_no = '$passportNo'";
            $result2 = mysqli_query($con, $q1);
            $val2 = mysqli_fetch_array($result2);
            $v2 = $val2['passport_no'];
            $_SESSION['passport'] = $v2;
            echo '<script>alert("Registration Successful");
            window.location.href="flight.php";
            </script>';
        } else {
            echo "<script>alert('Wrong Data')</script>";
            echo"<script>window.open('new.php','_self')</script>";
        }
    }
}
?>