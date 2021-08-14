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


  let today = new Date(),
  day = today.getDate(),
  month = today.getMonth()+1, //January is 0
  year = today.getFullYear();
      if(day<10){
              day='0'+day
          } 
      if(month<10){
          month='0'+month
      }
  year = year - '18';
  today = year+'-'+month+'-'+day;

  document.getElementById("bdate").setAttribute("max", today);