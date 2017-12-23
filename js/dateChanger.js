$(document).ready(function(){

  // function dateChanger(){

    var currentMonth = document.getElementById('monthTxt').value;
    var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    var sendMonth = 0;
    var sendDay = parseInt(document.getElementById('dayTxt'));
    var sendYear = parseInt(document.getElementById('yearTxt').value);

    console.log(sendDay);
    console.log(sendYear);

    for (var i = 0; i < months.length; i++) {
      if (currentMonth == months[i]) {
        sendMonth = (i + 1);
      }
    }

    var sendDate = sendYear+"/"+sendMonth+"/"+sendDay;

    alert(sendDate);
    console.log(sendDate);

    // sendDate = new Date(Date.parse(sendDate.replace(/-/g,' ')));
    //
    // today = new Date();
  	// today.setHours(0,0,0,0);
  	// if (sendDate < today) {
    //
    // }
  // }
});
