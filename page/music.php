<!-- This is the page that is displayed -->


<?php

$dir    = '../media/audio/music';
$all_files = scandir($dir); // collects all files and puts them in an array
$music = array_slice($all_files, 2); // makes a new array without the first two elements, the . and the .. files
$music_number = sizeof($music); // get the number of music in the array - W3schools

// the "for" loop below builds a datetime object to sort the arrays: $datetime_object and $music
for($i=0; $i<$music_number; $i++){
	$name_parts = explode(" ", $music[$i]); // we are tokenizing the file name using the delimiter of the space, " "
	$yr[$i] = $name_parts[0]; // just the  year
	$month[$i] = $name_parts[1]; // just the month - it doesn't matter the length of the month
	$day[$i] = $name_parts[2];
	$performer[$i] = $name_parts[3];
	if (count($name_parts)>4){
		$performer[$i] = $performer[$i]." ".$name_parts[4];
	}
	$performer[$i] = substr($performer[$i],0,-4);
	$date_string[$i] = $month[$i]." ".$day[$i].", ".$yr[$i]; // we needed the spaces for this to work
	$datetime_object[$i] = strtotime($date_string[$i]); // this is the array to use as the index of the sort
	$output_datetime[$i] =  date("M. d, Y", $datetime_object[$i]); // this just formats the date for human consumption
	$publish[$i]=$performer[$i]." from ".$output_datetime[$i];
	//echo nl2br($date_string[$i]."\n"); // use nl(as in el)2br with "\n" or "<br />" to get a new line	
}

//  sort the arrays indexed on $datetime_object
array_multisort ($datetime_object, SORT_DESC, $music, $output_datetime, $date_string, $publish);

//$num_parts = count($name_parts);
//echo "<h2>".$num_parts."</h2>";
$classCurrent = 'current';
$isFirst = TRUE;

?>

<link rel="stylesheet" type="text/css" href="css/sermons.css">

<h2>MUSIC</h2>
<!-- Audio tags just print the message they enclose if the browser does no support the format of the audio. https://www.w3schools.com/TAGS/tag_audio.asp -->
<audio controls id="sermonPlayer">
  Your browser does not support .wav files
</audio>

<div id="playlistContainer">
  <ul id="playlist">
    <?php
    for ($i=0; $i<$music_number; $i++){ //foreach ($music as $soundFile){
      if(!$isFirst){
        $classCurrent = '';
      }
	  else{
        $isFirst = FALSE;
      }
      ?>
	  <!--
      <li class="<?php echo $classCurrent ?>"><a href="media/audio/music/<?php echo $soundFile ?>"> <?php echo $soundFile ?></a></li>
	  -->
	  <li class="<?php echo $classCurrent ?>"><a href="media/audio/music/<?php echo $music[$i] ?>"> <?php echo $publish[$i] ?></a></li>
    <?php } ?>
  </ul>
</div> <!-- close the playlistContainer container -->
<script src="js/sermonPlayer.js"></script>
