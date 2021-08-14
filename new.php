<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Passenger Registration</title>
    <script>window.history.forward();</script>
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body class="hero1">
    <div>
        <div class="form">
            <center>
                <h2 style="font-weight: bold;">ENTER YOUR DEATILS</h2>
            </center>
            <form id="new" onsubmit="return validation()" autocomplete="off" method="POST" action="passanger.php" >
                <title>NEW PASSENGER REGISTRATION</title>
                <input type="text" onblur="validatePassport()" id="passportNo" class="input-field" name="passportNo" placeholder="Passport number" autofocus required>
                <span id="messagePassport" class="errorHeader">Invalid Passport Number</span>
                <input type="text" id="fname" onblur="validateFname()"  class="input-field" name="fname" placeholder="First name" required>
                <span id="messageFname" class="errorHeader">Invalid First Name</span>
                <input type="text" id="lname" onblur="validateLname()" class="input-field" name="lname" placeholder="Last name" required>
                <span id="messageLname" class="errorHeader">Invalid Last Name</span>
                <input type="text" id="street" name="street" onblur="validateEmpty()" class="input-field" placeholder="City" required>
                <br></br>
                <input type="text" id="state" name="state" onblur="validateEmpty()" class="input-field" placeholder="State" required>
                <br></br>
                <input type="number" id="phoneNo" onblur="validatePhone()" class="input-field" name="phone" placeholder="Phone number" required>
                <span id="messagePhone" class="errorHeader">Invalid Phone Number</span>
                <center>
                    <input type="radio" class="block-tab" name="gender" value="male" required>
                    <label style="font-weight:bold;color:lightgray;">Male</label>
                    <input type="radio" name="gender" value="Female" required>
                    <label style="font-weight:bold;color:lightgray;">Female</label>
                </center>
                <br>
                <input type="date" class="input-field" id="bdate" name="date" required>
                <br></br>
                <input type="email" id="emailId" onblur="validateMail()" class="input-field" name="email" placeholder="Enter Email" autofocus required>
                <span id="messageMail" class="errorHeader">Invalid Mail Id</span>
                <input type="password" id="psw" class="input-field" onblur="validatePassword()" name="pass" placeholder="Enter Password" required>
                <span id="messagePsw" class="errorHeader">Password should contain atleast 6 character</span>
                <button type="submit" name="new" class="button-submit">Submit</button>
            </form>
            <p class="msg" style="color: white;">Already Registered? Click Here  <a href="index.php" >Login</a></p>
        </div>
    </div>
    <script>

      document.onkeydown = function(t) {
          if(t.which==9) {
              return false;
          }
      }

        let today = new Date(),
        day = today.getDate(),
        month = today.getMonth()+1, //January is 0
        year = today.getFullYear();
            if(day<10){
                    day='0'+day;
                } 
            if(month<10){
                month='0'+month;
            }
        year = year - '18';
        today = year+'-'+month+'-'+day;

        document.getElementById("bdate").setAttribute("max", today);
    </script>
</body>
</html>