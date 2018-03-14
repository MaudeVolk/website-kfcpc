
<!--
<div style="background-image:url(images/prayer.jpg);background-repeat:no-repeat;background-position:center">
-->
<h2 >Prayer List</h2>


<!--<img src="images/home.jpg" id="homeImage">-->
<?php
  // create an array to hold names
  $people = [];
  
  // open the file and give it a convenient name
  $prayers = fopen("../docs/prayer_concerns.txt", "r") or die ("Unable to open file");
  
  // $prayer_list is an array of characters
  $prayer_list =  fread($prayers, filesize("../docs/prayer_concerns.txt")); 
  
  // separate the $prayer_list by semi-colon and store in $people
  // now $people is an array of the now separated characters  
  $people = explode(";",$prayer_list); 
  
  // loop through the $people array and print each element on a separate line
  foreach($people as $person){
	echo "<h4>".$person."</h4>";
  }
  
  // Always remember to close the file! 
  fclose ($prayers); 
  
?>
</div>