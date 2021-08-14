<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Airline management system</title>
  <script>function preventBack() {
    window.history.forward();
  }
  setTimeout("preventBack()",0);
  window.onunload = function() {
    null
  };
  </script>
  <style>
  h2 {
    font-weight: bold;
  }
  </style>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <div class="hero">
  <center><h1>WELCOME TO AIRLINE MANAGEMENT SYSTEM</h1></center>
    <div class="login-page">
      <div class="form">
        <form id="login" class="login-form" autocomplete="off" method="POST">
          <center><h1>LOGIN HERE</h1></center>
          <br></br>
          <input type="email" id="emailId" onblur="validateMail()" class="input-field" name="email" placeholder="Enter Email" autofocus autocomplete="off" required>
          <span id="messageMail" class="errorHeader">Invalid Mail Id</span>
          <input type="password" id="psw" class="input-field" onblur="validatePassword()" name="pass" placeholder="Enter Password" required>
          <span id="messagePsw" class="errorHeader">Password should contain atleast 6 character</span>
          <button type="submit" name="logBtn" class="button-submit">Log in</button>
          <p class="msg">Not Registered? <a href="new.php" >Register</a></p>
        </form>
        <br>
        <p class="msg">Admin Login <a href="admin-login.php" >Admin</a></p>
      </div>
    </div>
  </div>
</body>
</html>';
    session_start();

    include('dbconnect.php');
    if(isset($_POST['logBtn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $sql = "select * from passenger where emailId = '$email' && password = '$pass'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
       if($num == 1) {
            $q1="select * from passenger where emailId = '$email'";
            $result2 = mysqli_query($con, $q1);
            $val2 = mysqli_fetch_array($result2);
            $v2 = $val2['passport_no'];
            $_SESSION['passport'] = $v2;
            echo '<script>alert("Login Successful");
            window.location.href="flight.php";
            </script>';
        } else {
            echo "<script>alert('Invalid Mail Id or Password')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }


?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script>

document.onkeydown = function(t) {
          if(t.which==9) {
              return false;
          }
      }

</script>
<script src="script.js">
</script>

