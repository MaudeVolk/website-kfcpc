<!--

Title: Publication Selection Form

Content: Controls for selecting a publication

Purpose: Selecting a specific publication from past services to view

Written with: HTML5, CSS3, Bootstrap, Javascript, JQuery, JQueryUI, PHP

Written by: Donald Nash <donaldnash1989@gmail.com>

-->

<link rel="stylesheet" type="text/css" href="css/gallery.css">

<?php
$dir    = '../images/gallery';
$files1 = scandir($dir);
$files2 = array_slice($files1, 2);

foreach($files2 as $imageFile){
?>
<div class="gallery-border"><img class="img-responsive gallery" src="images/gallery/<?php echo $imageFile ?>" /></div>
<?php
}
?>
