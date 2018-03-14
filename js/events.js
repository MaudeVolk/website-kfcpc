var pubType = "";
var oldControl = "";

$("#openPub").attr('disabled', true);

$("#controlDropdown").change(function(){
  $(this).attr('disabled', true);
  var control = $(this).val();
  pubType = "/" + control;
    if(pubType == '/bulletin'){
      pubFolder = "bulletin/";
      selectedDay = 0;
    }else if (pubType == '/newsletter') {
      pubFolder = "cumberlander";
      selectedDay = 3;
    }
  if(control == 'bulletin' || control == 'newsletter')control = 'datepickerContainer';
  reset(this, control, function(){
    if(control != ""){
      showControls(control);
      $("#datepicker").datepicker('setDate', null);
      $("#datepicker").datepicker('refresh');
      $("#openPub").attr('disabled', true);
    }
  });
});

$("#controlTwo").change(function(){
  if(oldControl != ""){
    $("#" + oldControl).hide();
  }
  var control = $(this).val();
  oldControl = control;
  if(control != ""){
    showControls(control);
  }
});

$("#openPub").click(function(){
  buildURL(); // get the document, named url, to open
  
  // Use .get function to see if the document is there and if so open it, if not let the user try again.
  $.get( url, function() {
	  window.open(url);  // this command triggers a pop-up and some browsers may block it
    //alert( "success" );
})

  .fail(function() {
	  //window.open("some other file"); or in this case just stay on the page and try again
      alert( "The requested document could not be found. Please choose another document." );  // this command triggers a pop-up and some browsers may block it
  });
	
// see	http://api.jquery.com/jQuery.get/ for the code used here

	return false;
});

function buildURL(){
  url = "media/pdf/" + pubFolder + pubType + " " + dateParts[0] + dateParts[1] + dateParts[2].substring(2,4) + ".pdf";
}

setup();
