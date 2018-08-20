<!--
Knoxville First Cumberland Presbyterian Church website

  This website was built as a much needed update to the old multi-page pure html
website that the church used to have. It was built with a few key concepts in
mind. Those concepts are:

  1) Quick and easy information updates
  2) Accessible to future developers
  3) Easy to navigate
  4) Priority driven user interface

These priorities mean that there are no external frameworks and everything is
built with hand-typed code excluding Bootstrap and JQuery.

  Any future modifications should stick as close to these design concepts as
possible.

Authors: Donald Nash <donaldnash1989@gmail.com>, Maude Volk <maudevolk@gmail.com>
Edited by: Andrew Berger <meatberger@gmail.com>

Version 2.0.0.1

first release: July 21, 2017

-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Demo site for Knoxville First Cumberland Presbyterian Church">
	<meta name="keywords" content="Church, Presbyterian, Cumberland, Christian School, Jazzercise, Knoxville, Service, Rocky Hill, West Town Mall, Fellowship">
    <meta name="author" content="Donald Nash and Maude Volk and Donna Walker">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <title>KFCPC</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<style>
	.dropdown-submenu{ position: relative; }

.dropdown-submenu>.dropdown-menu{
  top:0;
  left:100%;
  margin-top:-6px;
  margin-left:-1px;
  -webkit-border-radius:0 6px 6px 6px;
  -moz-border-radius:0 6px 6px 6px;
  border-radius:0 6px 6px 6px;
}

.dropdown-submenu>a:after{
  display:block;
  content:" ";
  float:right;
  width:0;
  height:0;
  border-color:transparent;
  border-style:solid;
  border-width:5px 0 5px 5px;
  border-left-color:#cccccc;
  margin-top:5px;margin-right:-10px;
}
.dropdown-submenu:hover>a:after{
  border-left-color:#555;
}
.dropdown-submenu.pull-left{ float: none; }
.dropdown-submenu.pull-left>.dropdown-menu{
  left: -100%;
  margin-left: 10px;
  -webkit-border-radius: 6px 0 6px 6px;
  -moz-border-radius: 6px 0 6px 6px;
  border-radius: 6px 0 6px 6px;
}

	</style>
</head>

<body>
  <div class="container-fluid">
    <!-- Row 1, the top of each page -->
    <div class="row title-bar replaceContent" name="home">
	
      <!-- Column 1 of row 1 -->     
      <div id="logoImage" class="col-sm-1 col-xs-12 text-left">
        <!--<img src="images/cplogotallcolor.bmp" />-->
      </div>
	  
      <!-- Column 2 of row 1 -->
        <div class="col-sm-11 col-xs-12">
          <h1 id="titleText">Knoxville First Cumberland Presbyterian Church</h1>
        </div>

    </div> <!-- end row 1-->

    <!--Row 2, the Navbar - There are 6 buttons: Directory, Publications, Calendar, Programs, Connections, and Support Us. All 6 buttons are in the same column all the way across the page -->
	
    <div class="row nav-bar-custom">
	
      <div class="btn-group" id="nav-bar">

        <div class="btn-group" id="nav-item"> <!-- Home button -->
          <button type="button" class="btn btn-primary replaceContent" name="home">
            <span class="glyphicon glyphicon-home"></span> 
			  Home
          </button>
        </div> <!-- end Home button -->

        <!-- About button group, "glyphicon glyphicon-chevron-down"- make the little dropdown arrow -->
        <div class="btn-group" id="nav-item"> 
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <!-- About button -->
            About & Programs
		    <span class="glyphicon glyphicon-chevron-down"></span>
          </button> <!-- end About button -->

            <!-- About button's list -->
			
            <ul class="dropdown-menu" role="menu">
              <li><a class="replaceContent" name="mission"><span class="glyphicon glyphicon-ok"></span> Mission</a></li>
              <li><a class="replaceContent" name="about"><span class="glyphicon glyphicon-book"></span> Who we are</a></li>
              <li><a class="replaceContent" name="staff"><span class="glyphicon glyphicon-user"></span> Staff</a></li>
			  <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" ></span> Programs</a>
			  
			    <ul class="dropdown-menu">
                          <li><a class="replaceContent" name="musicprogram">Music</a></li>
                          <li><a class="replaceContent" name="sundayschool">Sunday School</a></li>
                          <li><a class="replaceContent" name="youth">Youth Group</a></li>
                          <!--<li><a href="#">Dropdown Submenu 4.4</a></li>-->
                 </ul>
				 
			 </li>
            </ul>
        </div><!-- end About button group -->

        <!-- Media & Publications button group -->
        <div class="btn-group" id="nav-item">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <!-- Media & Publications button -->
            Media & Publications <span class="glyphicon glyphicon-chevron-down"></span>
          </button> <!-- end Media & Publications button -->

            <!-- Media & Publications button's list -->
              <ul class="dropdown-menu" role="menu">
                <li><a class="replaceContent" name="prayer-list"><span class="glyphicon glyphicon-list"></span> Prayer List</a></li>
                <li><a class="replaceContent" name="sermons"><span class="glyphicon glyphicon-music"></span> Listen to Sermons</a></li>
                  <li><a class="replaceContent" name="music"><span class="glyphicon glyphicon-music"></span> Listen to Music</a></li>
                <li><a class="replaceContent" name="publications"><span class="glyphicon glyphicon-file"></span> Cumberlander/Bulletin</a></li>
                <li><a class="replaceContent" name="gallery"><span class="glyphicon glyphicon-picture"></span> Picture Gallery</a></li>
              </ul>      
		</div>  <!-- end Media & Publications button group -->

        <!-- Calendar button group -->
        <div class="btn-group" id="nav-item">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><!-- Calendar button -->
                Calendar <span class="glyphicon glyphicon-chevron-down"></span>
          </button><!-- end Calendar button -->

            <!-- Calendar button's list -->
            <ul class="dropdown-menu" role="menu">
              <li><a class="replaceContent" name="reservation"><span class="glyphicon glyphicon-send"></span> Reserve a room/area</a></li>
              <li><a class="replaceContent" name="calendar"><span class="glyphicon glyphicon-calendar"></span> Calendar</a></li>
			  <!--<li><a name="special_events" href="special_event_PDF/special_event.pdf" target = "_blank"><span class="glyphicon glyphicon-calendar"></span> Special Event </a></li>-->	  
            </ul>
        </div> <!-- end Calendar button group -->

        <!-- Connections button group -->
        <div class="btn-group" id="nav-item">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Connections <span class="glyphicon glyphicon-chevron-down"></span>
          </button><!-- end Connections button -->

          <!-- Connections button's list -->
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://cumberlandchristianacad.org/" target="_blank">Cumberland Christian Academy</a></li>
              <li><a href="https://www.classicalconversations.com/" target="_blank">Classical Conversations</a></li>
			  <li><a href="http://www.thursdayconnection.org/" target="_blank">Thursday Connection</a></li>
              <li><a href="http://www.petn.org/" target="_blank">Presbytery of East Tennessee</a></li>
              <li><a href="http://www.cumberland.org/center/CPC_Home_Page/Home.html" target="_blank">Cumberland Presbyterian Denomination</a></li>
			  <li><a href="https://www.camcabincrafts.com/" target="_blank">CAM Cabin Crafts</a></li>
              <li><a href="http://cpcmc.org/evotions/" target="_blank">eVotions</a></li>
			  <li><a href="http://jcls.jazzercise.com/facility/jazzercise-knoxville-first-cumberland-presbyterian-church" target="_blank">Jazzercise</a></li>
              <li><a href="http://www.pack20knoxville.scoutlander.com/publicsite/unithome.aspx?UID=19373" target="_blank">Cub Scouts</a></li>
              <li><a href="http://troop20knoxville.scoutlander.com/publicsite/unithome.aspx?UID=23394" target="_blank">Boy Scouts</a></li>
            </ul>
         </div><!-- end Connections button group -->

         <!-- Support Us button group -->
		 <!--
		 -->
         <div class="btn-group" id="nav-item">
           <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><!-- Support Us button -->
             Support Us <span class="glyphicon glyphicon-chevron-down"></span>
           </button><!-- end Support Us button -->

             <!-- Support Us button's list -->
               <ul class="dropdown-menu" role="menu">
			     <li><a class="replaceContent" name="support"><span class="glyphicon glyphicon-heart"></span> Support Us</a></li>
                 <li><a class="replaceContent" name="contact"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
               </ul>
         </div><!-- end Support Us button group -->
                
      </div><!-- end nav-bar button groups -->
    
    </div><!-- end row 2-->

    <!-- Row 3, sidebar and main content -->
    <div class="row content-section">

      <!-- Column 1 of row 3 -->
      <div class="col-lg-2 col-md-3 col-sm-3 sidebar-plain-service">
	  
        <h3 class="increaseTop">Services</h3>
        <div class="sidebar-content">
		
          <ul>
            <li>Sunday Service</li>
            <li class="increaseBottom">10:45 AM</li>
            <li>Sunday School</li>
            <li class="increaseBottom">9:30 AM</li>
            <li><a class="replaceContent" style="color:white" name="publications">Cumberlander/Bulletin</a></li>
            <!--  <li><a style="color:white" href="images/easter.jpg">Easter Schedule</a></li> -->

          </ul>
		  
        </div><!-- end sidebar content -->
          <footer>
              <a class="replaceContent social-link" name="contact">Contact</a> |
              <a href="https://www.facebook.com/Knoxville-First-Cumberland-Presbyterian-Church-219987585273/" class="social-link" target="_blank"><img src="images/logo/facebook-icon-preview-1-400x400.png" class="social-link-img"/></a> |
              <a class="replaceContent social-link" name="map">Map</a> |
              <a href="#" class="social-link">Give</a>
              <!-- count.php is a counter and count_file.txt holds the number for count.php to access -->
              <p style="color:blue"><?php include "count.php" ?> visitors</p>
              <!-- Close the footer for the page -->
          </footer>
      </div><!-- end Column 1 of row 3 -->

      <!-- Column 2 of row 3 -->
        <div id="mainContent" class="col-lg-10 col-md-9 col-sm-9 main-content">
        </div><!-- end main content -->
            
    </div><!-- end row 3 -->

    <!-- Row 4, footer -->

   
</div><!-- close container-->

  <script src="js/pageLoader.js"></script>
  <script>
  (function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
  </script>

</body>

</html>
