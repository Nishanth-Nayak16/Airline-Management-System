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
    <div class="login-page">
      <div class="form">
        <form id="login" class="login-form" autocomplete="off" method="POST">
          <center><h1>ADMIN LOGIN</h1></center>
          <br></br>
          <input type="email" id="emailId" onblur="validateMail()" class="input-field" name="email" placeholder="Enter Email" autofocus autocomplete="off" required>
          <span id="messageMail" class="errorHeader">Invalid Mail Id</span>
          <input type="password" id="psw" class="input-field" onblur="validatePassword()" name="pass" placeholder="Enter Password" required>
          <span id="messagePsw" class="errorHeader">Password should contain atleast 6 character</span>
          <button type="submit" name="adminLogBtn" class="button-submit">Log in</button>
          <p class="msg">Click here to go back? <a href="index.php" >BACK</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>';
    session_start();

    include('dbconnect.php');
    if(isset($_POST['adminLogBtn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $s = "select * from admin where admin_id = '$email' && password = '$pass'";
        $res = mysqli_query($con, $s);
        $num1 = mysqli_num_rows($res);
        if($num1 == 1) {
          $_SESSION['admin'] = $email;
          echo '<script>alert("Login Successful");
          window.location.href="admin.php";
          </script>';
        } else {
            echo "<script>alert('Invalid User Id or Password')</script>";
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

