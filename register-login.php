<script>window.history.forward();</script>
<?php
    session_start();
    include('dbconnect.php');

    if(isset($_POST['logBtn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $check_username= "/admin@gmail.com/";
        $check_password= "/root/";
        if(preg_match_all($check_username,$email)&&preg_match_all($check_password,$pass))
            echo"<script>window.open('admin.php','_self')</script>";
        $sql = "select * from passanger where emailId = '$email' && password = '$pass'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
       if($num == 1) {
            $q1="select * from passanger where emailId = '$email'";
            $result2 = mysqli_query($con, $q1);
            $val2 = mysqli_fetch_array($result2);
            $v2 = $val2['passport_no'];
            $_SESSION['passport'] = $v2;
            echo "<script>alert('Login Successfull')</script>";
            echo"<script>window.open('flight.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid User Id or Password')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
$con->close();
?>
