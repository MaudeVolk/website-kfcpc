<?php
// This counter code found at http://www.stevedawson.com/scripts/text-counter.php
  if (file_exists("count_file.txt"))
    {
	  $fil = fopen("count_file.txt","r"); // count_file.txt is the storage file
	  $dat = fread($fil, filesize("count_file.txt")); // get the number
	  echo $dat + 1; // print the number of visits including the current one
	  fclose($fil);
	  $fil = fopen("count_file.txt","w"); // open the storage file
	  fwrite($fil, $dat + 1); // store the new number
	  fclose($fil);
	}
  else
  {
	$fil = fopen("count_file.txt","w"); // creates a storage file in case there isn't one 
	fwrite($fil, 1); // initialize the storage file
	echo 1;
	fclose($fil);
  }
?>