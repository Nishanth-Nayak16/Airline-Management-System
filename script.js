function validateMail() {
    //Regular Expressions
    var regexMail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+(\.[a-zA-Z]{2,4})$/;

    //Values from input fields
    var mail = document.getElementById("emailId").value; 

    //Validate
    if(mail == '') {
        document.getElementById("emailId").focus();
    } else if(regexMail.test(mail) == false) {
        document.getElementById("messageMail").style.visibility = "visible"; 
        document.getElementById("emailId").focus();     
    } else {
        document.getElementById("messageMail").style.visibility = "hidden";
    } 
}



function validatePassword() {
    var password = document.getElementById("psw").value;

    if(password == '') {
        document.getElementById("psw").focus(); 
    } else if(password.length <= 5) {
        document.getElementById("messagePsw").style.visibility = "visible"; 
        document.getElementById("psw").focus();  
    } else {
        document.getElementById("messagePsw").style.visibility = "hidden";
    }
}


function signupValidation() {
    var password = document.getElementById("psw").value;

    if (password.length <= 5 ) {
        document.getElementById("psw").focus();
        document.getElementById("messagePsw").style.visibility = "visible";  
        return false;
    } else {
        document.getElementById("messagePsw").style.visibility = "hidden"; 
    } 
}


function validatePassport() {
    var passportNumber = document.getElementById("passportNo").value;

    var regexPassport = /[A-Z][0-9]{7}/;

    if(passportNumber == '') {
        document.getElementById("passportNo").focus(); 
    } else if(regexPassport.test(passportNumber) == false || passportNumber.length > 8) {
        document.getElementById("passportNo").focus();
        document.getElementById("messagePassport").style.visibility = "visible";  
    } else {
        document.getElementById("messagePassport").style.visibility = "hidden"; 
    }
}

function validateFname() {
    var fName = document.getElementById("fname").value;

    var regexName = /^[a-zA-Z]+$/;

    if(fName == '') {
        document.getElementById("fname").focus();
    } else if(regexName.test(fName) == false) {
        document.getElementById("fname").focus();
        document.getElementById("messageFname").style.visibility = "visible";  
    } else {
        document.getElementById("messageFname").style.visibility = "hidden"; 
    }
}

function validateLname() {
    var lName = document.getElementById("lname").value;

    var regexName = /^[a-zA-Z]+$/;

    if(lName == '') {
        document.getElementById("lname").focus();
    } else if(regexName.test(lName) == false) {
        document.getElementById("lname").focus();
        document.getElementById("messageLname").style.visibility = "visible";  
    } else {
        document.getElementById("messageLname").style.visibility = "hidden"; 
    }
}

function validatePhone() {
    var phone = document.getElementById("phoneNo").value;

    var regexPhone = /[9,8,7][0-9]{9}/;

    if(phone == '') {
        document.getElementById("phoneNo").focus();
    } else if(regexPhone.test(phone) == false || phone.length > 10){
        document.getElementById("phoneNo").focus();
        document.getElementById("messagePhone").style.visibility = "visible";
    } else {
        document.getElementById("messagePhone").style.visibility = "hidden"; 
    }    
}


function validateNation() {
    var Nation = document.getElementById("nation").value;

    var regexName = /^[a-zA-Z]+$/;

    if(Nation == '') {
        document.getElementById("nation").focus();
    } else if(regexName.test(Nation) == false) {
        document.getElementById("nation").focus();
        document.getElementById("messageNation").style.visibility = "visible";  
    } else {
        document.getElementById("messageNation").style.visibility = "hidden"; 
    }
}

function validateFlight() {
    var fCode = document.getElementById("flight").value;

    var regexAir = /[A,R]{2}[0-9]{4}/;

    if(fCode == '') {
        document.getElementById("flight").focus();
    }else if(fCode.length != 6 || regexAir.test(fCode) == false) {
        document.getElementById("flight").focus();
        document.getElementById("messageFlight").style.visibility = "visible"; 
    } else {
        document.getElementById("messageFlight").style.visibility = "hidden"; 
    }
}


/*
function resValidation() {
    var passportNumber = document.getElementById("passportNo").value;
    var fCode = document.getElementById("flight").value;
    var regexPassport = /[A-Z][0-9]{7}/;
    var regexAir = /[A,R]{2}[0-9]{4}/;
     if(regexPassport.test(passportNumber) == false || passportNumber.length > 8) {
        alert("Enter Valid Passport Number");
        document.getElementById("passportNo").style.border = "solid 1px red";
        return false;
    } else {
        document.getElementById("passportNo").style.border = "solid 1px #999";
    } 

    if(fCode.length != 6 || regexAir.test(fCode) == false) {
        alert("Enter Valid Flight Code");
        document.getElementById("flight").style.border = "solid 1px red";
        return false;
    } else {
        document.getElementById("flight").style.border = "solid 1px #999";
    }
    alert("Reservation Successful");
}
*/

function validateAirlineName() {
    var air = document.getElementById("airlineN").value;

    var regexName = /^[A-Z A-Z]+$/;

    if(air == '') {
        document.getElementById("airlineN").focus();
    } else if(regexName.test(air) == false) {
        document.getElementById("airlineN").focus();
        document.getElementById("messageAname").style.visibility = "visible";  
    } else {
        document.getElementById("messageAname").style.visibility = "hidden"; 
    }
}

function validateSource() {
    var src = document.getElementById("source").value;

    var regexName = /^[A-Z]+$/;

    if(src == '') {
        document.getElementById("source").focus();
    } else if(regexName.test(src) == false) {
        document.getElementById("source").focus();
        document.getElementById("messageSource").style.visibility = "visible";  
    } else {
        document.getElementById("messageSource").style.visibility = "hidden"; 
    }
}

function validateDestination() {
    var dest = document.getElementById("destination").value;

    var regexName = /^[A-Z]+$/;

    if(dest == '') {
        document.getElementById("destination").focus();
    } else if(regexName.test(dest) == false) {
        document.getElementById("destination").focus();
        document.getElementById("messageDestination").style.visibility = "visible";  
    } else {
        document.getElementById("messageDestination").style.visibility = "hidden"; 
    }
}

function validateType() {
    var type = document.getElementById("airplaneType").value;

    var regexType = /^[A-Z0-8]+$/;

    if(type == '') {
        document.getElementById("airplaneType").focus();
    } else if(regexType.test(type) == false) {
        document.getElementById("airplaneType").focus();
        document.getElementById("messageType").style.visibility = "visible";  
    } else {
        document.getElementById("messageType").style.visibility = "hidden"; 
    }
}







