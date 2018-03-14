
<p style="text-align: center;color: red">Requird fields are marked with a '*' !</p>
<br />
<form id="reservationForm" class="form-horizontal" method="post" onsubmit="return validateForm()" action="cgi/sendMail.php">

  <!--Label and conrol for NAME-->
  <div class="form-group">
    <div class="required col-lg-2 col-xs-12">
      <label for="inputName">Name</label>
    </div>
    <div class="col-lg-10 col-xs-12">
      <input type="text" name="name" class="form-control required" id="inputName" aria-describedby="nameHelp" placeholder="John Doe">
    </div>
  </div>

  <!--Label and conrol for ORGANIZATION-->
  <div class="form-group">
    <div class="col-lg-2 col-xs-12">
      <label for="inputOrganization">Organization</label>
    </div>
    <div class="col-lg-10 col-xs-12">
      <input type="text" name="organization" class="form-control" id="inputOrganization" aria-describedby="organizationHelp" placeholder="Organization">
    </div>
  </div>

  <!--Label and conrol for PHONE NUMBER-->
  <div class="form-group">
    <div class="required col-lg-2 col-xs-12">
      <label for="inputPhone">Phone number</label>
    </div>
    <div class="col-lg-10 col-xs-12">
      <input type="tel" name="phone" class="form-control"  id="inputPhone" aria-describedby="phoneHelp" placeholder="(555) 555-5555">
    </div>
  </div>

  <!--Label and conrol for EMAIL-->
  <div class="form-group">
    <div class="required col-lg-2 col-xs-12">
      <label for="inputEmail">Email address</label>
    </div>
    <div class="col-lg-10 col-xs-12">
      <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Someone@email.com">
    </div>
  </div>

  <!--Label and conrol for FACILITY-->
  <div class="form-group">
    <div class="required col-lg-2 col-xs-12">
      <label for="inputFacility">Select a facility</label>
    </div>
    <div class="col-lg-10 col-xs-12">
      <select class="form-control" name="facility" id="inputFacility">
        <option value="">Select a facility</option>
		<option value="conference">Chapel</option>
		<option value="conference">Keene Room</option>
		<option value="conference">Conference</option>
        <option value="gym">Gym</option>
        <option value="courtyard">Courtyard</option>
        <option value="picnic">Picnic Area</option>
      </select>
    </div>
  </div>

  <!--Label and conrol for DATE WANTD-->
  <div class="form-group">
    <div class="required col-lg-2 col-xs-12">
      <label for="inputDateWanted">Date Wanted</label>
    </div>
    <div class="col-lg-10 col-xs-12">
      <input  name="date" class="form-control" id="inputDateWanted" aria-describedby="dateWantedHelp" placeholder="">
    </div>
  </div>

    <!--Label and conrol for TIME WANTED-->
    <div class="form-group">
      <div class="required col-lg-2 col-xs-12">
        <label for="inputTime">Time</label>
      </div>
      <div class="col-lg-10 col-xs-12">
        <input type="time" name="startTime" class="form-control small" id="inputStartTime" aria-describedby="timeHelp">
        <span class="left">to</span>
        <input type="time" name="endTime" class="form-control small" id="inputEndTime" aria-describedby="timeHelp">
      </div>
    </div>

      <!--Label and conrol for COMMENTS-->
      <div class="form-group">
        <div class="col-lg-2 col-xs-12">
          <label for="inputComments">Comments:</label>
        </div>
        <div class="col-lg-10 col-xs-12">
          <textarea name="comments" class="form-control required" id="inputComments" aria-describedby="commentsHelp" placeholder=""></textarea>
        </div>
      </div>

  <!--Conrol for SUBMIT-->
  <button type="submit" class="btn btn-primary" id="inputSubmit">Submit</button>

</form>

<script>


$( "#inputDateWanted" ).datepicker({
  minDate: "+1d",
  onSelect: function(dateText){
  }
});

function validateForm() {
  var isValid = true;
  var validMessage = "";
  var x = "";

  for(var i=0; i < document.forms["reservationForm"].length; i++){
    x = document.forms["reservationForm"][i].value;
    inputId = document.forms["reservationForm"][i].id;
    if (inputId != "inputOrganization" && inputId != "inputComments" && inputId != "inputSubmit" && x == "") {
        isValid = false;
        validMessage += inputId.substring(5,inputId.length) + " must be filled out\n\r";
    }
  }

  if(!isValid){
    alert(validMessage);
  }
  return isValid;
}
</script>
