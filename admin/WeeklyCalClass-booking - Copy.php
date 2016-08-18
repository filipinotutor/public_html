<?php

require_once("db_config.php"); // 

class WeeklyCalClass {

    var $day;
    var $month;
    var $year;
    var $date;
	var $weekTitle;
	
	// start database functions --------------------------------
	function connect_db() {
		$conn_str = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_NAME); // if there are problems with the tablenames inside the config file use this row 
	}
	
	function get_sched($time, $day, $month, $year, $user_id) {
		$query_get = "SELECT status FROM schedules WHERE time = '$time' AND day = '$day' AND month = '$month' AND year = '$year' AND user_id ='$user_id'";
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM); 
		
		if ($row_get) { // A match was made.
					return $row_get[0];
				  }
				  
		else {
			return false;
		}
	}
	
	// end database ---------------------------------------------
    function WeeklyCalClass ($day, $month, $year, $user_id) {
		
		$this->user_id=$user_id;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->date = $this->showDate ($hour, $min, $sec, $month, $day, $year);
    }


    function showCalendar ($user_id) {
    
        $Output .= $this->buttonsWeek ($this->day, $this->month, $this->year, $this->date["numdaysmonth"]);
        $Output .= $this->buttons ($this->day, $this->month, $this->year, $this->date["numdaysmonth"]);
        $Output .= "<table class='table table-striped table-bordered table-hover' width='95%'>";
        $Output .= $this->WeekTable ($this->date ["daymonth"], $this->date ["dayWeek"], $this->date["numdaysmonth"], $this->date["monthName"], $this->day, $this->month, $this->year, $user_id);
        $Output .= "</table>";

        return $Output;
    }
    
    
    function WeeksInMonth ($month, $leapYear, $firstDay){
        if ($month == 1 or $month == 3 or $month == 5 or $month == 7 or $month == 8 or $month == 10 or $month == 12) {
    
            if ($firstDay > 5) {
                return 6;
            } else {
                return 5;
            }
        
        } else if ($month == 4 or $month == 6 or $month == 9 or $month == 11) {
        
            if ($firstDay == 7) {
                return 6;
            } else {
                return 5;
            }
        
        
        } else if ($month == 2) {
            
            if ($leapYear == "0" and $firstDay == 1) {
                return 4;
            }else{
                return 5;
            }
            
        }
        
    
    }


    function showDate ($hour, $min, $sec, $month, $day, $year){
        $fecha = mktime ($hour, $min, $sec, $month, $day, $year);

        $cal ["daymonth"] = date ("d", $fecha);
        $cal ["monthName"] = date ("F", $fecha);
        $cal ["numdaysmonth"] = date ("t", $fecha); 
        
        if (date ("w", $fecha) == "0")
        {
            $cal ["dayWeek"] = 7;
        } else {
            $cal ["dayWeek"] = date ("w", $fecha);
        }
        
        $cal ["nombredaySem"] = date ("l", $fecha);
        $cal ["leapYear"] = date ("L", $fecha);
       
        
       
        return $cal;
    }
    

    function dayName ($day) {
    
        if ($day == 1)
        {
            $Output = "MON";
        } else if ($day == 2) {
            $Output = "TUE";
        } else if ($day == 3) {
            $Output = "WED";
        } else if ($day == 4) {
            $Output = "THU";
        } else if ($day == 5) {
            $Output = "FRI";
        } else if ($day == 6) {
            $Output = "SAT";
        } else if ($day == 7) {
            $Output = "SUN";
        }

        return $Output;
    }
           

    function previousMonth ($day, $month, $year){
        $month = $month-1;
        $month= $this->showDate ($hour, $min, $sec, $month, $day, $year);
        return $month;
    }
    

    function nextMonth ($day, $month, $year){
        $month = $month+1;
        $month= $this->showDate ("10", "00", "00", $month, 1, $year);
        return $month;
    }
        
    
  
    function numberOfWeek ($day, $month, $year) {
        $firstDay = $this->showDate ($hour, $min, $sec, $month, 1, $year);
        $numberOfWeek = ceil (($day + ($firstDay ["dayWeek"]-1)) / 7);
        return $numberOfWeek;
    }
   


    function WeekTable ($daymonth, $dayWeek, $numdaysmonth, $monthName, $day, $month, $year, $user_id) {

        
        if ($dayWeek == 0)
        {
            $dayWeek = 7;
        }
            
        $n = 0;
        
        /*NUMBER OF WEEKS AND WEEK NUMBER*/      
        $WeekNumber = $this->showDate ($hour, $min, $sec, $month, 1, $year);    
        $WeeksInMonth = $this->WeeksInMonth ($month, $WeekNumber["leapYear"], $WeekNumber["dayWeek"]); 
        $numberOfWeek = $this->numberOfWeek ($day, $month, $year);
        
        $Output .="<tr>
        <td>Week ".$numberOfWeek." of ".$WeeksInMonth."</td>";
		
		
		
		
		
		
		$Output .="</td>";
		
		
		

        $resta = $dayWeek - 1;
        $daymonth = $daymonth - $resta;

        //Hasta llegar al day seleccionado
        for ($i=1; $i < $dayWeek; $i++)
        {

            if ($daymonth < 1)
            {
                $previousMonth = $this->previousMonth ($day, $month, $year);
                $daysBefore = $previousMonth ["numdaysmonth"];
                $nameBefore = $previousMonth ["monthName"];

                if ($month == 1)
                {
                    $monthVar = 12;
                    $yearVar = $year - 1;
                    
                } else {
                
                    $monthVar = $month - 1;
                    $yearVar = $year;
                }

                $cambio = 1;
                $daymonth = $daysBefore + $daymonth;
                
            } else {
            
                if ($cambio != 1)
                {
                    $nameBefore = $monthName;
                    $monthVar = $month;
                    $yearVar = $year;
                }
            }


            if ($daymonth == $day)
            {
            
            $Output .="<th style='background:#ffeedd; text-align:center;'>".$this->dayName ($i).", ".$nameBefore." de ".$daymonth."</th>";
                
            }else{
            
            $Output .="<th style='text-align:center;'>".$nameBefore." ".$daymonth."<br />(".$this->dayName ($i).")</th>";
            }


            $dayLink[$n]["day"] = $daymonth;
            $dayLink[$n]["month"] = $monthVar;
            $dayLink[$n]["year"] = $yearVar;


            if ($daymonth == $previousMonth["numdaysmonth"])
            {
                $daymonth = 1;
                $cambio = 0;
            }else{
                $daymonth ++;
            }

            $n++;

        }



        for ($dayWeek; $dayWeek <= 7; $dayWeek++)
        {

            if ($daymonth > $numdaysmonth)
            {
                $monthS = $this->nextMonth ($day, $month, $year);
                $monthNext = $monthS ["monthName"];
                if ($month == 12)
                {
                    $monthVar = 1;
                    $yearVar = $year + 1;
                } else {
                    $monthVar = $month + 1;
                }

                $cambio = 1;
                $daymonth = 1;

            } else {

                if ($cambio != 1)
                {
                    $monthNext = $monthName;
                    $monthVar = $month;
                    $yearVar = $year;
                }
            }



            if ($daymonth == $day)
            {
                $Output .="<th style='background:#ffeedd; text-align:center;'>".$monthNext." ".$daymonth."<br /><strong>(".$this->dayName ($dayWeek).")</strong></th>";
            }else{
                $Output .="<th style='text-align:center;'>".$monthNext." ".$daymonth."<br /><strong>(".$this->dayName ($dayWeek).")</strong></th>";
            }

            $dayLink[$n]["day"] = $daymonth;
            $dayLink[$n]["month"] = $monthVar;
            $dayLink[$n]["year"] = $yearVar;
            $n++;

            $daymonth ++;
            
        }


        $Output .="</tr>";
		$Output .="<tr>";

       //     hourly                                     TABLE ------------------------------------------------------------------------------------------------------------------------
		$min=array("00","30");
		
		for($i=6;$i<24;$i++)
		  //foreach ($min as $v)
		//	print "$i:$v";
        {
            $Output .="<tr>";
			
			foreach ($min as $v)
			{
				$outtime=$i.':'.$v;
				$Output .="<td style='text-align:center;'><b>".$outtime."</b></td>";
	
				for ($n=0; $n<=6; $n++)
				{
	
					$Output .= "<td style='text-align:center;'>";
					
					$got=$this->get_sched($outtime, $dayLink[$n]["day"], $dayLink[$n]["month"], $dayLink[$n]["year"], $user_id);
					
					
					
					if($got=="closed")
					{
						$Output .= "<span style='color:red; padding-left:5px;padding-right:5px;'><strong>CLOSED</strong></span>";
					}
					if($got=="open")
					{
						$Output .= "<select name='hoursselected[]' style='width:98%; background-color:green; color:white;'>";
						$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a'>-</option>";
						$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open' selected>Open</option>";//selected
						$Output .= "<select>";
					}
					if($got=="n/a")
					{
						$Output .= "<select name='hoursselected[]' style='width:98%;'>";
						$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a' selected>-</option>";
						$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open'>Open</option>";//selected
						$Output .= "<select>";
					}
					if($got==FALSE)
					{
						$Output .= "<select name='hoursselected[]' style='width:98%;'>";
						$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a'>-</option>";
						$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open'>Open</option>";
						$Output .= "<select>";
					}
					
					

					$Output .= "</td>";
	
				}
			
	      $Output .="</tr>";
		  }
		  
//      end hourly                                 TABLE -----------------------------------------------------------------------------------------------------------------------	
        }
        return $Output;
    }



	function buttonsWeek ($day, $month, $year, $numdaysmonth) {
		$thisMonth= $this->showDate ($hour, $min, $sec, $month, $day, $year);
		$thisMontOne = $this->showDate ($hour, $min, $sec, $month, 1, $year);
	    $previousMonth = $this->previousMonth ($day, $month, $year);
        $WeeksInMonth = $this->WeeksInMonth ($month, $thisMonth["leapYear"], $thisMonth["dayWeek"]);
        $numberOfWeek = $this->numberOfWeek ($day, $month, $year);      
        $daysRestan = (7 - $thisMonth["dayWeek"]);
  

        //BOTON ANT
        if ($day <= 7)
        {
        
         $ant = $previousMonth["numdaysmonth"] - (($thisMontOne["dayWeek"]-1)) + 1;
            $monthAnt = $month - 1;

            if ($month == 1)
            {
                $yearAnt = $year-1;
                $monthAnt = 12;
            } else {
                $yearAnt = $year;
            }


        }else{
        
            $ant = $day - ($thisMonth["dayWeek"] + 6);
            $monthAnt= $month;
            $yearAnt = $year;
        }




        //BOTON POST
        if ($numberOfWeek == $WeeksInMonth)
        {
            $post="1";
            $monthPost=$month+1;

            if ($month == 12)
            {
                $yearPost = $year+1;
                $monthPost = 1;
            } else {
                $yearPost = $year;
            }

        }else{

            $post=$day+($daysRestan+1);
            $monthPost=$month;
            $yearPost = $year;
        }

		$ddate = $year.'-'.$month.'-'.$day;
		$duedt = explode("-",$ddate);
		$date = mktime(0, 0, 0, $duedt[1], $duedt[2],$duedt[0]);
		$weeknum = (int)date('W', $date);
		$week=$this->date_Range_For_Week($weeknum-1,$year);
	
	$Output.="<div class='navbar'> <div class='navbar-inner'>  <div class='pagination pagination-centered pagination-large'>
    <ul>
    <li ><a href='".$PHP_SELF."?day=".$ant."&month=".$monthAnt."&year=".$yearAnt."'>&laquo; previous week</a></li>";
    $Output .= "<li class='active'><a href='".$_SERVER['PHP_SELF']."'>" .$week['start'].'-'.$week['end'] .','.$year."</a></li> ";
    $Output.="<li ><a href='".$PHP_SELF."?day=".$post."&month=".$monthPost."&year=".$yearPost."'>next week &raquo;</a></li>
    
	</ul>
	<button style='margin-top:0px;' class='btn btn-primary btn-large navbar-form pull-right' type='submit' name='send' value='Save' ><i class='icon-ok-sign icon-white'></i> Update</button></div></div></div>";
	
        return $Output;
	
	}




    function buttons ($day, $month, $year, $numdaysmonth){
        $previousMonth = $this->previousMonth ($day, $month, $year);
        $nextMonth = $this->nextMonth ($day, $month, $year);

        $ant= $day-1;


        //BOTON ANT
        if ($day == 1)
        {
            $ant = $previousMonth ["numdaysmonth"];
            $monthAnt = $month - 1;

            if ($month == 1)
            {
                $yearAnt = $year-1;
                $monthAnt = 12;
            } else {
                $yearAnt = $year;
            }


        }else{
            $ant = $day - 1;
            $monthAnt= $month;
            $yearAnt = $year;
        }




        //BOTON POST
        if ($day == $numdaysmonth)
        {
            $post="1";
            $monthPost=$month+1;

            if ($month == 12)
            {
                $yearPost = $year+1;
                $monthPost = 1;
            } else {
                $yearPost = $year;
            }

        }else{

            $post=$day+1;
            $monthPost=$month;
            $yearPost = $year;
        }


        /*$Output .= "<p style='font-weight:bold; font-size:0.8em;'>

<a href='".$PHP_SELF."?day=".$ant."&month=".$monthAnt."&year=".$yearAnt."'>&laquo; previous</a> |

<a href='".$PHP_SELF."?day=".$post."&month=".$monthPost."&year=".$yearPost."'>next &raquo;</a>
</p>";*/

        return $Output;
    }
//////////////////////////////////////////////////////////////////////// calculate week range
function date_Range_For_Week($W,$Y){

// where $W = %W returned from strftime
//       $Y = %Y returned from strftime

    // establish 1st day of 1/1/YYYY

    $first_Day_Of_Year = mktime(0,0,0,1,1,$Y);

    // establish the first monday of year after 1/1/YYYY    

    $first_Monday_Of_Year = strtotime("Monday this week",(mktime(0,0,0,1,1,$Y)));   

    // Check for week 00 advance first monday if found
    // We could use strtotime "Monday next week" or add 604800 seconds to find next monday
    // I have decided to avoid any potential strtotime overhead and do the arthimetic

    if (strftime("%W",$first_Monday_Of_Year) != "01"){
        $first_Monday_Of_Year += (60 * 60 * 24 * 7);
    }

    // create array to ranges for the year. Note 52 wks is the norm but it is possible to have 54 weeks
    // in a given yr therefore allow for this in array index

    $week_Start = array();
    $week_End = array();        

    for($i=0;$i<=53;$i++){

        if ($i == 0){   
            if ($first_Day_Of_Year != $first_Monday_Of_Year){
                $week_Start[$i] = $first_Day_Of_Year;
                $week_End[$i] = $first_Monday_Of_Year - (60 * 60 * 24 * 1);
            } else {
                // %W returns no week 00
                $week_Start[$i] = 0;
                $week_End[$i] = 0;                              
            }
            $current_Monday = $first_Monday_Of_Year;
        } else {
            $week_Start[$i] = $current_Monday;
            $week_End[$i] = $current_Monday + (60 * 60 * 24 * 6);
            // find next monday
            $current_Monday += (60 * 60 * 24 * 7);
            // test for end of year
            if (strftime("%W",$current_Monday) == "01"){ $i = 999; };
        }
    };

    $result = array("start" => strftime("%b %d", $week_Start[$W]), "end" => strftime("%b %d", $week_End[$W]));
	//$result = strftime("%a on %d, %b, %Y", $week_End[$W]);

    return $result;

    }   
//////////////////////////////////////////////////////////////////////////


}//End of WeeklyCalendar Class


?>