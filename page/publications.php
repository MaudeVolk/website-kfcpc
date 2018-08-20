<!--

Title: Publication Selection Form

Content: Controls for selecting a publication

Purpose: Selecting a specific publication from past services to view

Written with: HTML5, CSS3, php, Bootstrap, Javascript, JQuery, JQueryUI

Written by: Donald Nash <donaldnash1989@gmail.com>, Maude Volk <maudevolk@gmail.com>

Revised July 6, 2018 by: Maude Volk and Donna Walker <dmwalk.17@gmail.com> 
-->

<h2>Publications</h2>
<!-- jQuery -->
<script>
    $(document).ready(function(){ // ready here is not showing any of the files
		$("#start").show();
        $("#bulletin").hide();
		$("#newsletter").hide();
		$("#special").hide();
	});

	$("#show_bulletin").click(function(){
		$("#start").hide();
        $("#bulletin").show();
		$("#newsletter").hide();
		$("#special").hide();
    });
	$("#show_newsletter").click(function(){
		$("#start").hide();
        $("#bulletin").hide();
		$("#newsletter").show();
		$("#special").hide();
    });
	$("#show_special").click(function(){
		$("#start").hide();
        $("#bulletin").hide();
		$("#newsletter").hide();
		$("#special").show();
    });

</script>

<h4 id='start'>Select Button to Show Items</h4>

<button id="show_bulletin" class="btn2"> Sunday Bulletins</button>
<button id="show_newsletter" class="btn2">Cumberlander Newsletters</button>
<button id="show_special" class="btn2">Special Services</button>

<?php 

/*************************************** GET DATA ********************************************
 We need 3 different arrays to store the 3 different types of publications
 scandir is a php function that creates an array of all the files in a directory(folder)
 and array_slice is a function that slices elements of an array
************************************************************************************************/
$dirBulletins = '../media/pdf/bulletin'; 		// name for files in the bulletin folder
$bulletins = array_slice(scandir($dirBulletins), 2);	//drop the first two files (. and ..)

$dirNewsletters = '../media/pdf/cumberlander';	// name for files in the cumberlander folder
$newsletters = array_slice(scandir($dirNewsletters), 2);//drop the first two files (. and ..)

$dirSpecial = '../media/pdf/special-services';	// name for files in the special-services folder
$services = array_slice(scandir($dirSpecial), 2);		//drop the first two files (. and ..)


/****************************  DISPLAY SUNDAY BULLETINS *****************************************/
echo "<div id='bulletin'>";
echo "<h3>Sunday Bulletins</h3>";
echo "<h5>click to select</h5>";
echo "<hr>";
display_publication_dates($bulletins,$dirBulletins);
echo "</div>"; //end div for bulletins

/**************************** DISPLAY CUMBERLANDER NEWSLETTERS ***********************************/
echo "<div id='newsletter'>";
echo "<h3>The Cumberlander</h3>";
echo "<h5>click to select</h5>";
echo "<hr>";
display_publication_dates($newsletters,$dirNewsletters);
echo "</div>"; //end newsletter

/****************************** DISPLAY SPECIAL SERVICES ***********************************/
echo "<div id='special'>";
echo "<h3>Special Services</h3>";
echo "<h5>click to select</h5>";
echo "<hr>";
display_titles($services,$dirSpecial);
echo "</div>"; //end special

/************************************************************************************************

								FUNCTIONS

**************************************************************************************************/


/*************************** DISPLAY PUBLICATION DATES ***********************************/
function display_publication_dates($filenames,$path)
{	
$i = 0;
	foreach($filenames as $filename) 
	{
		/*  the date is formatted as mmddyy - (1) retrieve it from the filename - (2)format it for the string to time function - (3) make it look nice - (4) store date object for sorting purposes*/
		$date_string = substr($filename, -10, -4); //(1) get the date portion of the filename
		$month = substr($date_string, 0, 2);// get the month substring
	    $day = substr($date_string, 2, 2);// get the day substring
		$year = substr($date_string, 4, 2);// get the year substring
		$input_date = $month."/".$day."/".$year;// (2) input date is a string in a particular format
		$date_object = strtotime($input_date);// turn the string into a date object
		$output_date = date("F j, Y", $date_object);// (3) format the date
		$index_date[$i] = $date_object;// (4) store date object in an array
		$display_date[$i] = $output_date; //store the display date in an array
		$lookup_name[$i] = $path.'/'.$filename; //store file name and location in an array
		$i = $i + 1;
	}
	$count = $i; //total number of files
	array_multisort ($index_date, SORT_DESC, $display_date, $lookup_name);	
	
	for ($j=0; $j<$count; $j++)
	{
		echo "<h4><a href='$lookup_name[$j]' target='_blank'>".$display_date[$j]."</a></h4>";
	}
}  
 /*************************** DISPLAY SPECIAL SERVICES TITLES  ***********************************/
function display_titles($filenames,$path)
{
	$i = 0;

	foreach($filenames as $filename)
	{
		$lookup_name[$i] = $path.'/'.$filename; //store path and filename in an array for later use
		$length = strlen($filename) - 4; //length of the filename without the .pdf
	    $service = substr($filename, 0, $length); //obtain filename without .pdf
		
		/* examine each part of the filename - we want to separate dated from undated titles */
		$title_parts = explode(" ", $service); //separate each word in the filename
		$num_parts = count($title_parts); //count the separate words in each filename
		$last_index = $num_parts - 1; //find the index of the last word in the array $title_parts
		$firstChar = substr($title_parts[$last_index], 0, 1); //obtain the first character of the last word in each filename
		
		/* the date is formatted mmddyy - if there is a date the 1st character of mm will be a 0 or 1 */
		if ($firstChar == "0" || $firstChar == "1")
		{
			$date_string = substr($service, -6);//grabbing the date part
			$month = substr($date_string, 0, 2);// get the month substring
	        $day = substr($date_string, 2, 2);// get the day substring
		    $year = substr($date_string, 4, 2);// get the year substring
		    $input_date = $month."/".$day."/".$year;// (2) input date is a string in a particular format
		    $date_object = strtotime($input_date);// turn the string into a date object
		    $output_date = date("F j, Y", $date_object);// (3) format the date
			$title = substr($service, 0, -6).$output_date;// replace date to display 
			
			/* index will be the value sorted on */
			$index = $date_object;
		}
		
		else
		{
			$title = $service;
			
			/* index will be the value sorted on, in this case nothing */
			$index = "";
		}
		
		$display_name[$i] = $title;
		$file_index[$i] = $index;
		
		$i = $i + 1;
	}
	
$i = 0;
	foreach($filenames as $filename) 
	{
		/*  the date is formatted as mmddyy - (1) retrieve it from the filename - (2)format it for the string to time function - (3) make it look nice - (4) store date object for sorting purposes*/
		$date_string = substr($filename, -10, -4); //(1) get the date portion of the filename
		$month = substr($date_string, 0, 2);// get the month substring
	    $day = substr($date_string, 2, 2);// get the day substring
		$year = substr($date_string, 4, 2);// get the year substring
		$input_date = $month."/".$day."/".$year;// (2) input date is a string in a particular format
		$date_object = strtotime($input_date);// turn the string into a date object
		$output_date = date("F j, Y", $date_object);// (3) format the date
		$index_date[$i] = $date_object;// (4) store date object in an array
		$display_date[$i] = $output_date; //store the display date in an array
		$lookup_name[$i] = $path.'/'.$filename; //store file name and location in an array
		$i = $i + 1;
	}
	$count = $i; //total number of files
	array_multisort ($index_date, SORT_DESC, $display_date, $lookup_name);	
	
	for ($j=0; $j<$count; $j++)
	{
		echo "<h4><a href='$lookup_name[$j]' target='_blank'>".$display_date[$j]."</a></h4>";
	}
}  
 /*************************** DISPLAY SPECIAL SERVICES TITLES  ***********************************/
function display_titles($filenames,$path)
{
	$i = 0;

	foreach($filenames as $filename)
	{
		$lookup_name[$i] = $path.'/'.$filename; //store path and filename in an array for later use
		$length = strlen($filename) - 4; //length of the filename without the .pdf
	    $service = substr($filename, 0, $length); //obtain filename without .pdf
		
		/* examine each part of the filename - we want to separate dated from undated titles */
		$title_parts = explode(" ", $service); //separate each word in the filename
		$num_parts = count($title_parts); //count the separate words in each filename
		$last_index = $num_parts - 1; //find the index of the last word in the array $title_parts
		$firstChar = substr($title_parts[$last_index], 0, 1); //obtain the first character of the last word in each filename
		
		/* the date is formatted mmddyy - if there is a date the 1st character of mm will be a 0 or 1 */
		if ($firstChar == "0" || $firstChar == "1")
		{
			$date_string = substr($service, -6);//grabbing the date part
			$month = substr($date_string, 0, 2);// get the month substring
	        $day = substr($date_string, 2, 2);// get the day substring
		    $year = substr($date_string, 4, 2);// get the year substring
		    $input_date = $month."/".$day."/".$year;// (2) input date is a string in a particular format
		    $date_object = strtotime($input_date);// turn the string into a date object
		    $output_date = date("F j, Y", $date_object);// (3) format the date
			$title = substr($service, 0, -6).$output_date;// replace date to display 
			
			/* index will be the value sorted on */
			$index = $date_object;
		}
		
		else
		{
			$title = $service;
			
			/* index will be the value sorted on, in this case nothing */
			$index = "";
		}
		
		$display_name[$i] = $title;
		$file_index[$i] = $index;
		
		$i = $i + 1;
	}
  
	array_multisort ($file_index, SORT_DESC, $display_name, $lookup_name);// this will sort all the dates first	
	
	$count = $i;// the total number of files in the folder
	
	for ($j=0; $j<$count; $j++)
	{
		echo "<h4><a href='$lookup_name[$j]' target='_blank'>".$display_name[$j]."</a></h4>";
	}
}
?>	

