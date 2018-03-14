<!--

Title: Publication Selection Form

Content: Controls for selecting a publication

Purpose: Selecting a specific publication from past services to view

Written with: HTML5, CSS3, Bootstrap, Javascript, JQuery, JQueryUI

Written by: Donald Nash <donaldnash1989@gmail.com>, Maude Volk <maudevolk@gmail.com>

-->
<h2>Publications</h2>

<p style="text-indent:0px">Choose from Sunday Worship, The Cumberlander,
  and Special Services such as the SonRise Service. </p>
<p style="text-indent:0px">  Begin by clicking on the desired publication type in the box below. </p>
<br />


<form id="pubsForm" class="form-horizontal" >

<div id="controlSetZero" class="form-group" >
<!--
  <div class="col-lg-10 col-xs-12">
    <label for="controlDropdown"></label>
  </div>
  -->
  <!-- Drop down for publication type -->
  <div class="col-lg-5 col-xs-12">
    <p style="text-indent:0px">Select a publication type: </p>
    <select class="form-control" id="controlDropdown" size="3" style="color:black;  font-size:1.2em">
	  <!-- not using select because showing all 3 options-->
      <!--<option value="">Select</option>-->
      <option value="bulletin">Sunday Worship</option>
      <option value="newsletter">The Cumberlander</option>
      <option value="specialServicesDropdown">Special Services</option>
    </select>
	<p>Please disable pop-up blockers to fully access publications.</p>
  </div>
</div>
<br />

<!-- This form is invisible until a publication that uses it is selected -->
<div id="datepickerContainer" class="form-group control" hidden>


 <div class="col-lg-5 col-xs-12">
 
    <p style="text-indent:0px">Select the date: </p>

    <input placeholder="click here to open calendar " 
    class="form-control" type="text" id="datepicker">
	
	<button class="btn btn-primary" id="openPub">
      Open Publication
    </button>

 </div>
  
  
  
</div>

<div id="specialServicesDropdown" class="form-group control" hidden>
    
    <div class="col-lg-5 col-xs-12">
	<p style="text-indent:0px">Select a year: </p>
      <select id="controlTwo" class="form-control" size="2">
        <!--<option value="">Select one</option>-->
        <option value="this-year">Current Year</option>
        <option value="last-year">Last Year</option>
      </select>
    </div>
</div>

<div id="this-year" class="control" hidden>
  <p>Maundy Thursday: March 29, 2018</p>
  <p>Good Friday Combined Service with Sacred Heart Cathedral 711 S. Northshore Drive: March 30, 2018</p>
  <p>Easter: April 1, 2018</p>
  <p>Candlelight Communion Service: December 24, 2018</p>
</div>

<div id="last-year" class="control" hidden>
  <p><a href = "media/pdf/special-services/bulletin He Lives 040217.pdf" target = "_blank">He Lives! April 2, 2017</a></p>
  <p><a href = "media/pdf/special-services/bulletin He Lives 040917.pdf" target = "_blank">He Lives! April 9, 2017</a></p>
  <p><a href = "media/pdf/special-services/bulletin 041317.pdf" target = "_blank">Maundy Thursday, April 13, 2017</a></p>
  <p><a href = "media/pdf/special-services/bulletin 041617SR.pdf" target = "_blank">Easter Sunrise Service</a></p>
  <p><a href = "media/pdf/special-services/bulletin 041617.pdf" target = "_blank">Easter</a></p>
</div>

</form>

<br />

<script src="js/datepickerController.js"></script>
<script src="js/controlManager.js"></script>
<script src="js/events.js"></script>
