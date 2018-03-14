<div class="jumbotron"><h1>Email reciept</h1></div>
<?php
  $to = "FirstCPC@KFCPC.ComcastBiz.net";
  $subject = "Facility Request";

  $message = "<html><head></head><body>
  <center><h3>Facility Request</h3></center>
  <p>Requested by: <strong>".$_POST["name"]."</strong></p>
  <p>Organization: <strong>".$_POST["organization"]."</strong></p>
  <p>Phone Number: <strong>".$_POST["phone"]."</strong></p>
  <p>Email Address: <strong>".$_POST["email"]."</strong></p>
  <p>Facility requested: <strong>".$_POST["facility"]."</strong></p>
  <p>Date requested: <strong>".$_POST["date"]."</strong></p>
  <p>Time requested: <strong>".$_POST["startTime"]."</strong> to <strong>".$_POST["endTime"]."</strong></p>
  <p>Comments: <strong>".$_POST["comments"]."</strong></p>
  </body><html>";

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <postmaster@first-cumberland.org/>' . "\r\n";
  
// The echo just displays the information that was just sent
  mail($to,$subject,$message,$headers);
  echo '<p>'.$_POST["name"].'</p>';
  echo '<p>'.$_POST["organization"].'</p>';
  echo '<p>'.$_POST["phone"].'</p>';
  echo '<p>'.$_POST["email"].'</p>';
  echo '<p>'.$_POST["facility"].'</p>';
  echo '<p>'.$_POST["date"].'</p>';
  echo '<p>'.$_POST["startTime"].'</p>';
  echo '<p>'.$_POST["endTime"].'</p>';
  echo '<p>'.$_POST["comments"].'</p>';
?>
