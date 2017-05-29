$(document).ready(function(){
	var theDaysBox  = $("#numdays");
	var theHoursBox = $("#numhours");
	var theMinsBox  = $("#nummins");
	var theSecsBox  = $("#numsecs");
	
	var refreshId = setInterval(function() {
	  var currentSeconds = theSecsBox.text();
	  var currentMins    = theMinsBox.text();
	  var currentHours   = theHoursBox.text();
	  var currentDays    = theDaysBox.text();
	  
	  if(currentSeconds == 0 && currentMins == 0 && currentHours == 0 && currentDays == 0) {
	  	// if everything rusn out our timer is done!!
	  	// do some exciting code in here when your countdown timer finishes
	  	
	  } else if(currentSeconds == 0 && currentMins == 0 && currentHours == 0) {
	  	// if the seconds and minutes and hours run out we subtract 1 day
	  	theDaysBox.html(currentDays-1);
	  	theHoursBox.html("23");
	  	theMinsBox.html("59");
	  	theSecsBox.html("59");
	  } else if(currentSeconds == 0 && currentMins == 0) {
	  	// if the seconds and minutes run out we need to subtract 1 hour
	  	theHoursBox.html(currentHours-1);
	  	theMinsBox.html("59");
	  	theSecsBox.html("59");
	  } else if(currentSeconds == 0) {
	  	// if the seconds run out we need to subtract 1 minute
	  	theMinsBox.html(currentMins-1);
	  	theSecsBox.html("59");
	  } else {
      	theSecsBox.html(currentSeconds-1);
      }
   }, 1000);
});