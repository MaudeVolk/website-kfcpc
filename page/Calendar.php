<!--
Title:        "Calendar"
Purpose:      To customize a calendar with particular events
Written with: HTML5, CSS3, Javascript, PHP
Input:        CSV file with:
                column 0 containing the event
                column 1 containing the date
                column 3 containing the start time
Written for:  Knoxville First Cumberland Presbyterian Church
Author:       Maude Volk <maudevolk@gmail.com>
Acknowledgements:
Based on a similar program in Python by Donald Nash <donaldnash1989@gmail.com>
Many thanks for his continued encouragement and the patience of the church
-->

<style>
table {
    border-collapse:collapse;
    font-size: 1em;
}
table tr {

}
table th {
    text-align:center;
    padding:0.75em;
}
table th,td {
    vertical-align: text-top;
    width: 14.28571428571429%;
    border:4px solid black;
}
table td {
    padding: 0;
    margin:0;
    min-height: 15em;
    padding-bottom:1em;
}
 
.btnCalendar {
    width:118%;
	font-size:1.5em;
	font-weight:bold;
	align:left;
	background-color:blue;
	color:white;
	float:left;
}	

<!-- add -->
.btn-group .button {
	float:left;
}

 /* not using tooltip right now but may in the future */
.tooltip {
    position: relative;
    font-family: 'Open Sans', sans-serif;
    font-size: 1em;
    opacity: 1;
    padding: 0;
}

.tooltipCustom .tooltiptext {
    visibility: hidden;
    width: 10em;
    font-size: 1.2em;
    background-color: blue;
    color: #fff;
    text-align: left;
    border-radius: 10px !important;
    padding: 1em;

	 Position the tooltip 
    position: absolute;

    z-index: 1;
    top:5em;
    left: 5%;

}

.tooltipCustom:hover .tooltiptext {
    visibility: visible;
}

</style>

<?php

//*******************************************************************
//****************** INITIALIZE VARIABLES ***************************
//*******************************************************************

// arrays for processed data: $index is used for sorting, $date is date object, $each_day has time and event
$index = $date = $schedule = $lines = array("");

// variables for the function calendar_info($date_data, $month_shift) - both are strings
$date_data = $month_shift = "";

// This variable holds the number of lines in the csv file.
$maxlines = 0;

// initialize variables for the days of the month
$sunday1 = $monday1 = $tuesday1 = $wednesday1 = $thursday1 = $friday1 = $saturday1 = "";
$sunday2 = $monday2 = $tuesday2 = $wednesday2 = $thursday2 = $friday2 = $saturday2 = "";
$sunday3 = $monday3 = $tuesday3 = $wednesday3 = $thursday3 = $friday3 = $saturday3 = "";
$sunday4 = $monday4 = $tuesday4 = $wednesday4 = $thursday4 = $friday4 = $saturday4 = "";
$sunday5 = $monday5 = $tuesday5 = $wednesday5 = $thursday5 = $friday5 = $saturday5 = "";



//*******************************************************************

//     As eachh line in the CSV file is read
//    (A) GET THE DATA AND (B) BUILD EVENTS ARRAY TO SORT LATER 

//*******************************************************************

// (A) The data is in a CSV file; note that php does not recognize headers as special.
// Order is important. Any change in the way the data is entered into the CSV file will cause this script to fail. However, dates and times do not need to be in chronological order because the file is sorted.

$fileCSV = "../schedule/ChurchCalendar.csv"; // give the file a convenient new_month_name
$row = 0; // $row will increment as the lines in the file are read
// arrays for processed data: $index is used for sorting, $date is date object, $each_day has time and event
//$index = $date = $each_day = array("");
// opens the file if it exists
if (($handle = fopen($fileCSV, "r")) != FALSE) {

    // Read the data in the file, $data represents the fields, that is columns, in each line.
    while (($data = fgetcsv($handle)) != FALSE) {
    // Part A, get data
        // We want to process the data as each line is read.
        //$data[0] contains events, $data[1] contains dates, $data[3] contains time of day for the event

        // Combine the date and time into one variable, this is needed for sorting.
        $input_datetime = $data[1]." ".$data[3];

        // Change the date and time from a string into a date-time object so it can be sorted.
        $datetime_object = strtotime($input_datetime);

        // Format the date and time in a user friendly format so that humans can check it.
        $output_datetime =  date("Y-m-d h:ia", $datetime_object);

        // Pull out the date from the output_datetime and format it.
        $date_only = substr($output_datetime, 0, 10);  // get just the date
        $date_only = substr($date_only, 0, 8).ltrim(substr($date_only, 8), 0); // remove the leading zero from the day

        // Pull out the time from the output_datetime. Using lowercase "L" ltrim will take off a leading zero from the time
        // but, only if there is one otherwise it does nothing.
        $time_only = ltrim(substr($output_datetime, 11, 7), 0);

        // Combine the date, time and event.
        $time_and_event = $date_only." ".$time_only." ".$data[0];


    // Part B, build arrays

        // Build the index array for sorting. Remember to use the datetime ojbect!
        // If you use am, pm format it will place 6:30 pm before 8:00 am.
        array_push($index, $datetime_object);

        // Put the date in the array $date
        array_push($date, $date_only);

        // Put time and event into its own array.
        array_push($schedule, $time_and_event);

        $row++;  // Increment the line count; this information will be used later.

    }// end "while"
    fclose($handle);
}// end "if"

$maxlines = $row;

// ***** SORT THE ARRAYS BY DATE AND TIME 

// Test the sorting by intentionally our of order dates, times, and events.
//echo "before";
//echo "<p>".$index[12]." ".$schedule[12]."</p>";
//echo "<p>".$index[21]." ".$schedule[21]."</p>";
//(3) Sort the schedule by date and time using the $index array as the index, just in case something was entered out of order.
array_multisort ($index, $date, $schedule);
//echo $row;
//echo "after";
//echo "<p>".$index[12]." ".$schedule[12]."</p>";
//echo "<p>".$index[21]." ".$schedule[21]."</p>";

//*****************************************************************
//******************** MAIN PROGRAM *******************************
//*****************************************************************
// Enter the number corresponding to month where 0 is the current month, 1 next month, -1 last month.
//print_r("<p>Here ".calendar_info("year-month","0 Month")." ".calendar_info("start-day","0 Month")." ".first_week("Sunday1", "0 Month")."</p>");
//.calendar_info("month-name","0 Month").calendar_info("year","0 Month").calendar_info("start-day","0 Month").first_week("Sunday1", "0 Month");

// Last month
$month_last= month_table("-1 Month", $maxlines, $date, $schedule);

// Current month
$month_current = month_table("0 Month", $maxlines, $date, $schedule);

// Next month
$month_next = month_table("+1 Month", $maxlines, $date, $schedule);

// Two months from now
$month_plus2 = month_table("+2 Month", $maxlines, $date, $schedule);

// Three months from now
$month_plus3 = month_table("+3 Month", $maxlines, $date, $schedule);

$last_month_name = calendar_info("month-name", "-1 Month").". ".calendar_info("year", "-1 Month");
$current_month_name = calendar_info("month-name", "0 Month").". ".calendar_info("year", "0 Month");
$next_month_name = calendar_info("month-name", "+1 Month").". ".calendar_info("year", "+1 Month");
$month_plus2_name = calendar_info("month-name", "+2 Month").". ".calendar_info("year", "+2 Month");
$month_plus3_name = calendar_info("month-name", "+3 Month").". ".calendar_info("year", "+3 Month");
?>
<!-- The following script displays different months depending on which button is clicked -->
<script>
$(document).ready(function(){
    $("#last_month").hide();
    $("#this_month").show();
    $("#next_month").hide();
    $("#month_plus2").hide();
    $("#month_plus3").hide();
    });
$("#show_last_month").click(function(){
    $("#last_month").show();
    $("#this_month").hide();
    $("#next_month").hide();
    $("#month_plus2").hide();
    $("#month_plus3").hide();
});
$("#show_this_month").click(function(){
    $("#last_month").hide();
    $("#this_month").show();
    $("#next_month").hide();
    $("#month_plus2").hide();
    $("#month_plus3").hide();
});
$("#show_next_month").click(function(){
    $("#last_month").hide();
    $("#this_month").hide();
    $("#next_month").show();
    $("#month_plus2").hide();
    $("#month_plus3").hide();
});
$("#show_month_plus2").click(function(){
    $("#last_month").hide();
    $("#this_month").hide();
    $("#next_month").hide();
    $("#month_plus2").show();
    $("#month_plus3").hide();
});
$("#show_month_plus3").click(function(){
    $("#last_month").hide();
    $("#this_month").hide();
    $("#next_month").hide();
    $("#month_plus2").hide();
    $("#month_plus3").show();
});
</script>

              <!-- Button 1, "glyphicon glyphicon-chevron-down"- make the little dropdown arrow removed id="nav-item" in btn-group-->
                <div class="btn-group" >
				  
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="font-size:1.4em; float:left; color:white; margin-bottom:1em">
				  
                      Choose a month <span class="glyphicon glyphicon-chevron-down" ></span>
                  </button><!-- end button -->

                    <!-- Button 1's list -->
                    <ul class="dropdown-menu" role="menu">
                        <li><button id="show_last_month" class="btnCalendar"><?php print_r($last_month_name) ?></button></li>
						<li><button id="show_this_month" class="btnCalendar"><?php print_r($current_month_name) ?></button></li>
                        <li><button id="show_next_month" class="btnCalendar"><?php print_r($next_month_name) ?></button></li>
                        <li><button id="show_month_plus2" class="btnCalendar"><?php print_r($month_plus2_name) ?></button></li>
						<li><button id="show_month_plus3" class="btnCalendar"><?php print_r($month_plus3_name) ?></button></li>
                    </ul>
                </div><!-- end button 1 group -->

<!-- tables for last month, this month, next month -->
<!-- Each button id works with its #id in the script above -->
<div id="last_month"><?php print_r($month_last)?></div>
<div id="this_month"><?php print_r($month_current)?></div>
<div id="next_month"><?php print_r($month_next)?></div>
<div id="month_plus2"><?php print_r($month_plus2)?></div>
<div id="month_plus3"><?php print_r($month_plus3)?></div>				

<?php

//************************************************************************************************
//***************************************** FUNCTIONS ********************************************
// (I) calendar_info, (II) first_week, (III) following_weeks, (IV) day_schedule, (V) month_table 
//************************************************************************************************

// (I) calendar_info, a function to gather facts about the month *******************

// The function calendar_info takes two strings:(1) as seen in the "if" statements
// and (2) $month_shift has to be in the form of "0 Month" for the current month,
// "+1 Month" for the next month or +2, etc for forward months or "-1 Month" for the last month
// also -2 or more to go backwards in time. See mktime function for other options.
function calendar_info($date_data, $month_shift){
  $desired_month = strtotime($month_shift);
  $the_year = date("Y", $desired_month);
  $month_num = date("m", $desired_month);
  // Below yields the year and month formated for use elsewhere.
  $yr_month = $the_year."-".$month_num."-";
  $month_name = date("M", $desired_month); // get the month in 3-letter abbreviation
  $some_time= mktime(0, 0, 0, $month_num, 1, $the_year); // for some reason $start_day does not always work like the other functions
  $start_day = date("l", $some_time);
  $max_days = cal_days_in_month(CAL_GREGORIAN, $month_num, $the_year); // find out maximum number of days in the month

  if ($date_data == "year"){
    return $the_year;
  }

  if ($date_data == "month-num"){
    return $month_num;
  }

  if ($date_data == "month-name"){
    return $month_name;
  }

  if ($date_data == "start-day"){
    return   $start_day;
  }

  if ($date_data == "year-month"){
    return   $yr_month;
  }

  if ($date_data == "max-days"){
    return $max_days;
  }

} // end function calendar_info


// (II) first_week **********************************************

// Function first_week adjusts the dates for the first week of the month; $number is the numerical representation of month.
function first_week($day_of_week, $month_shift, $maxlines, $date, $schedule){
    $year_month = calendar_info("year-month", $month_shift);
    $startday = calendar_info("start-day", $month_shift);

    switch($startday){
      case "Sunday":
        if($day_of_week == "Sunday1"){
          $day = 1;
        }
        if($day_of_week == "Monday1"){
          $day = 2;
        }
        if($day_of_week == "Tuesday1"){
          $day = 3;
        }
        if($day_of_week == "Wednesday1"){
          $day = 4;
        }
        if($day_of_week == "Thursday1"){
          $day = 5;
        }
        if($day_of_week == "Friday1"){
          $day = 6;
        }
        if($day_of_week == "Saturday1"){
          $day = 7;
        }
      break;
      case "Monday":
        if($day_of_week == "Sunday1"){
          $day = "";
        }
        if($day_of_week == "Monday1"){
          $day = 1;
        }
        if($day_of_week == "Tuesday1"){
          $day = 2;
        }
        if($day_of_week == "Wednesday1"){
          $day = 3;
        }
        if($day_of_week == "Thursday1"){
          $day = 4;
        }
        if($day_of_week == "Friday1"){
          $day = 5;
        }
        if($day_of_week == "Saturday1"){
          $day = 6;
        }
        break;
        case "Tuesday":
          if($day_of_week == "Sunday1"){
            $day = "";
          }
          if($day_of_week == "Monday1"){
            $day = "";
          }
          if($day_of_week == "Tuesday1"){
            $day = 1;
          }
          if($day_of_week == "Wednesday1"){
            $day = 2;
          }
          if($day_of_week == "Thursday1"){
            $day = 3;
          }
          if($day_of_week == "Friday1"){
            $day = 4;
          }
          if($day_of_week == "Saturday1"){
            $day = 5;
          }
          break;
          case "Wednesday":
            if($day_of_week == "Sunday1"){
              $day = "";
            }
            if($day_of_week == "Monday1"){
              $day = "";
            }
            if($day_of_week == "Tuesday1"){
              $day = "";
            }
            if($day_of_week == "Wednesday1"){
              $day = 1;
            }
            if($day_of_week == "Thursday1"){
              $day = 2;
            }
            if($day_of_week == "Friday1"){
              $day = 3;
            }
            if($day_of_week == "Saturday1"){
              $day = 4;
            }
            break;
            case "Thursday":
              if($day_of_week == "Sunday1"){
                $day = "";
              }
              if($day_of_week == "Monday1"){
                $day = "";
              }
              if($day_of_week == "Tuesday1"){
                $day = "";
              }
              if($day_of_week == "Wednesday1"){
                $day = "";
              }
              if($day_of_week == "Thursday1"){
                $day = 1;
              }
              if($day_of_week == "Friday1"){
                $day = 2;
              }
              if($day_of_week == "Saturday1"){
                $day = 3;
              }
              break;
              case "Friday":
                if($day_of_week == "Sunday1"){
                  $day = "";
                }
                if($day_of_week == "Monday1"){
                  $day = "";
                }
                if($day_of_week == "Tuesday1"){
                  $day = "";
                }
                if($day_of_week == "Wednesday1"){
                  $day = "";
                }
                if($day_of_week == "Thursday1"){
                  $day = "";
                }
                if($day_of_week == "Friday1"){
                  $day = 1;
                }
                if($day_of_week == "Saturday1"){
                  $day = 2;
                }
                break;
                case "Saturday":
                  if($day_of_week == "Sunday1"){
                    $day = "";
                  }
                  if($day_of_week == "Monday1"){
                    $day = "";
                  }
                  if($day_of_week == "Tuesday1"){
                    $day = "";
                  }
                  if($day_of_week == "Wednesday1"){
                    $day = "";
                  }
                  if($day_of_week == "Thursday1"){
                    $day = "";
                  }
                  if($day_of_week == "Friday1"){
                    $day = "";
                  }
                  if($day_of_week == "Saturday1"){
                    $day = 1;
                  }
                  break;
    } // end "switch" for $startday

    $this_day = $day.day_schedule($year_month."$day", $maxlines, $date, $schedule);
    return $this_day;
    } // end function first_week
	

// (III) following_weeks ********************************************

// $month_shift has the format "0 Month" where the number represents month(s) before, current month, or month(s) ahead
function following_weeks($day_of_week, $month_shift, $maxlines, $date, $schedule){
  $day; // the number for the day of the week
  $month_end = calendar_info("max-days", $month_shift);
  $year_month = calendar_info("year-month", $month_shift);

  //$test = substr(first_week("Saturday1", "0 Month", $maxlines, $date, $schedule), 0, 1);
  //$add = $test + 5;
  //echo "<p>".$test." ".$add."</p>";

  $end_week1 = substr(first_week("Saturday1", $month_shift, $maxlines, $date, $schedule), 0, 1);; // int(substr($Saturday1, 0, 0));

    if($day_of_week == "Sunday2"){
      $day = $end_week1  + 1;
    }

    if($day_of_week == "Monday2"){
      $day = $end_week1  + 2;
    }

    if($day_of_week == "Tuesday2"){
      $day = $end_week1  + 3;
    }

    if($day_of_week == "Wednesday2"){
      $day = $end_week1  + 4;
    }

    if($day_of_week == "Thursday2"){
      $day = $end_week1  + 5;
    }

    if($day_of_week == "Friday2"){
      $day = $end_week1  + 6;
    }

    if($day_of_week == "Saturday2"){
      $day = $end_week1  + 7;
    }

    if($day_of_week == "Sunday3"){
      $day = $end_week1  + 8;
    }

    if($day_of_week == "Monday3"){
      $day = $end_week1  + 9;
    }

    if($day_of_week == "Tuesday3"){
      $day = $end_week1  + 10;
    }

    if($day_of_week == "Wednesday3"){
      $day = $end_week1  + 11;
    }

    if($day_of_week == "Thursday3"){
      $day = $end_week1  + 12;
    }

    if($day_of_week == "Friday3"){
      $day = $end_week1  + 13;
    }

    if($day_of_week == "Saturday3"){
      $day = $end_week1  + 14;
    }

    if($day_of_week == "Sunday4"){
      $day = $end_week1  + 15;
    }

    if($day_of_week == "Monday4"){
      $day = $end_week1  + 16;
    }

    if($day_of_week == "Tuesday4"){
      $day = $end_week1  + 17;
    }

    if($day_of_week == "Wednesday4"){
      $day = $end_week1  + 18;
    }

    if($day_of_week == "Thursday4"){
      $day = $end_week1  + 19;
    }

    if($day_of_week == "Friday4"){
      $day = $end_week1  + 20;
    }

    if($day_of_week == "Saturday4"){
      $day = $end_week1  + 21;
    }

    if($day_of_week == "Sunday5"){
      $day = $end_week1 + 22;
    }

    if($day_of_week == "Monday5"){
      $day = $end_week1  + 23;
      }

    if($day_of_week == "Tuesday5"){
      $day = $end_week1 + 24;
    }

    if($day_of_week == "Wednesday5"){
      $day = $end_week1 + 25;
    }

    if($day_of_week == "Thursday5"){
      $day = $end_week1 + 26;
    }

    if($day_of_week == "Friday5"){
      $day = $end_week1 + 27;
    }

    if($day_of_week == "Saturday5"){
      $day = $end_week1 + 28;
    }

    if($day <= $month_end){
      $this_day = $day.day_schedule($year_month."$day", $maxlines, $date, $schedule);
      return $this_day;
    }

    else{
      return "";
    }

} // end function following_weeks

// (IV) day_schedule ********************************************

function day_schedule($particular_date, $maxlines, $date, $schedule){
  $activity = "";
  // $line is the line number in the CSV file
  $line = 1;


  // $maxlines is the total lines
  for ($line; $line <= $maxlines; $line++){

    if($date[$line] == $particular_date){
      // The "substr($schedule[$line], 10)" removes the date from the frontend.
      $activity = $activity."<br />".substr($schedule[$line], 10);
      //$activity = $activity."<br />".$schedule[$line]; // Return this to confirm dates.
    } // end "if"

  } // end "for"

  return $activity;
} // end function day_schedule

// (V) month_table *****************************************************

// The variable $number is the month in numerical form, $name is the month in its 3-letter abbreviation.
// The function month_table returns a table for the desired month.
  function month_table($month_shift, $maxlines, $date, $schedule){
    $name = calendar_info("month-name", $month_shift);
    $year = calendar_info("year", $month_shift);
    $year_month = calendar_info("year-month", $month_shift);

    // Use the end of the first week to calculate the dates for the rest of the month.
    $end_of_week1 = first_week("Saturday1", $month_shift, $maxlines, $date, $schedule);
    //day_schedule("2017-10-01", $maxlines, $date, $schedule)
    $max = $maxlines; // the number of lines in the csv file

    //day_schedule($year_month.first_week("Sunday1", $ms), $maxlines, $date, $schedule)
    $print_this = "<table>
    <tr>
    <td colspan = 7><h3>".$name.".  ".$year."</h3></td>
    </tr>
    <tr>
    <th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th>
    </tr>
    <tr>
    <td>".first_week("Sunday1", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".first_week("Monday1", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".first_week("Tuesday1", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".first_week("Wednesday1", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".first_week("Thursday1", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".first_week("Friday1", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".first_week("Saturday1", $month_shift, $maxlines, $date, $schedule)."</td>
    </tr>

    <tr>
    <td>".following_weeks("Sunday2", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Monday2", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Tuesday2", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Wednesday2", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Thursday2", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Friday2", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Saturday2", $month_shift, $maxlines, $date, $schedule)."</td>
    </tr>
    <tr>
    <td>".following_weeks("Sunday3", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Monday3", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Tuesday3", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Wednesday3", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Thursday3", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Friday3", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Saturday3", $month_shift, $maxlines, $date, $schedule)."</td>
    </tr>
    <tr>
    <td>".following_weeks("Sunday4", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Monday4", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Tuesday4", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Wednesday4", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Thursday4", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Friday4", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Saturday4", $month_shift, $maxlines, $date, $schedule)."</td>
    </tr>
    <tr>
    <td>".following_weeks("Sunday5", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Monday5", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Tuesday5", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Wednesday5", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Thursday5", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Friday5", $month_shift, $maxlines, $date, $schedule)."</td>
    <td>".following_weeks("Saturday5", $month_shift, $maxlines, $date, $schedule)."</td>
    </tr>
    </table>";
    return $print_this;
  }
?>               