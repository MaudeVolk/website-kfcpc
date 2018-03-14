/**
Title: Datepicker controller Script

Purpose: Ensure the datepicker has the correct selectable range and splits the
date into a usable format

Written with: Javascript, JQuery, JQueryUI

Written by: Donald Nash <donaldnash1989@gmail.com>, Maude Volk <maudevolk@gmail.com>
*/

var url = "";
var pubFolder = "";
var dateParts = [];
var selectedDay = 0;
var searchMinDate = "-1y";
var searchMaxDate = "-1d";

// #openPub ties into id="openPub" in publications.php
$( "#datepicker" ).datepicker({
    minDate: searchMinDate,
    maxDate: searchMaxDate,
  beforeShowDay: function(date){
    var day = date.getDay();
    return [day == selectedDay,""];
  },
  onSelect: function(dateText){
    dateParts = dateText.split("/");
    $("#openPub").attr('disabled', false);
  }
});
