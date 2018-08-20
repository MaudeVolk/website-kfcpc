<!--

Title: Youth Group content

Content: Information about the Youth Group Program

Purpose: Inform the reader about the church's Youth Group Program

Written with: HTML5, CSS3, Javascript, JQuery

Written by: Donna Walker 

-->
<link rel="stylesheet" type="text/css" href="css/youth.css">
<div id="content4" class="right-margin"></div>
<script type="text/javascript" phpFile="youth" textFile="YouthGroup_text" src="js/contentLoader4.js"></script>
<!--<div id="content" class="container" style="float:left;font-size:1.2em">
<script type="text/javascript" phpFile="YouthGroup" textFile="YouthGroup_text" src="js/contentLoader.js"></script>
<div class="gallery" > -->
    <?php
   // <link rel="stylesheet" type="text/css" href="css/gallery.css">

$dir    = '../images/youth/thumbnail';
$files1 = scandir($dir);
$files2 = array_slice($files1, 2);

foreach($files2 as $imageFile){
?>
    <div class="gallery-border"><a href="images/youth/<?php echo $imageFile ?>"><img class="img-responsive youth" src="images/youth/thumbnail/<?php echo $imageFile ?>" /></a></div>
<?php
}
?>

