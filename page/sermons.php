<!-- This is the page that is displayed -->


<?php

$dir    = '../media/audio/sermons';
$all_files = scandir($dir); // collects all files and puts them in an array
$sermons = array_slice($all_files, 2); // makes a new array without the first two elements, the . and the .. files
$sermonData = []; // an array to store the sermon data

// Handle the elements in the array, $sermons is the array, $sermon takes the place of $sermons[i] in a loop
foreach($sermons as $sermon)
{
	$name_parts = explode(" ", $sermon);
	$yr = $name_parts[0];
	$month = $name_parts[1];
	$day = $name_parts[2];
	$datetime_object = strtotime("$month. $day, $yr"); // the string to time function will be used as the index of the sort
	$output_datetime =  date("M. d, Y", $datetime_object); // formated date that appears in the list
	$sermonData[] = array($datetime_object, $output_datetime, $sermon); // take the parts and make a new array 
}

// see https://www.w3schools.com/Php/func_array_usort.asp for how to use usort
usort($sermonData, function($a,$b){return $a[0] < $b[0];}); // sort array in decending order as per the function
$classCurrent = 'current';
$isFirst = TRUE;

?>

<link rel="stylesheet" type="text/css" href="css/sermons.css">

<h2>SERMONS</h2>
<!-- Audio tags just print the message they enclose if the browser does no support the format of the audio. https://www.w3schools.com/TAGS/tag_audio.asp -->
<audio controls id="sermonPlayer">
  Your browser does not support .wav files
</audio>

<div id="playlistContainer">

  <ul id="playlist">
    <?php
	foreach($sermonData as $current_sermon)
	  echo '<li class="' . $classCurrent . '"><a href="media/audio/sermons/' . $current_sermon[2] . '">' . $current_sermon[1] . '</a></li>';
    ?>
  </ul>
</div> <!-- close the playlistContainer container -->

<script src="js/sermonPlayer.js"></script>
