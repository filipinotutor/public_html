<?php

require_once('../config/constant.php'); // 

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
    
    function get_sched($time, $day, $month, $year, $tutor_id) {
        $query_get = "SELECT status, approved FROM schedules WHERE time = '$time' AND day = '$day' AND month = '$month' AND year = '$year' AND tutor_id ='$tutor_id'";
        $result_get = @mysql_query ($query_get);
        $row_get = mysql_fetch_array ($result_get, MYSQL_NUM); 
        
        if ($row_get) { // A match was made.
            return $row_get;
        }
                  
        else {
            return false;
        }
    }
    function get_student($time, $day, $month, $year, $tutor_id) {
        $query_get = "SELECT user_id FROM schedules WHERE time = '$time' AND day = '$day' AND month = '$month' AND year = '$year' AND tutor_id ='$tutor_id'";
        $result_get = @mysql_query ($query_get);
        $row_get = mysql_fetch_array ($result_get, MYSQL_NUM); 
        
        if ($row_get) { // A match was made.
            return $row_get[0];
        }          
        else {
            return false;
        }
    }
function get_student_info($user_id) {
        $sql_info = sprintf("SELECT first_name, last_name, email, skype_id FROM users WHERE user_id =$user_id");
        $res_info = mysql_query($sql_info);
        $this->student_first_name = mysql_result($res_info, 0, "first_name");
        $this->student_last_name = mysql_result($res_info, 0, "last_name");
        $this->student_email = mysql_result($res_info, 0, "email");
        $this->student_skype_id = mysql_result($res_info, 0, "skype_id");
    }
    
function get_student_profile($student_id) {
        $sql_info = sprintf("SELECT  nick_name, phone, photo, birthday FROM students WHERE student_id =$student_id");
        $res_info = mysql_query($sql_info);
        $this->studentprofile_nick_name = mysql_result($res_info, 0, "nick_name");
        $this->studentprofile_phone = mysql_result($res_info, 0, "phone");
        $this->studentprofile_photo = mysql_result($res_info, 0, "photo");
        $this->studentprofile_birthday = mysql_result($res_info, 0, "birthday");
    }

function get_history($student_id){
    
    $sql = "SELECT a.tutor_id, a.nick_name, b.schedule_id, b.attendance, b.status, b.date, b.time FROM tutors a INNER JOIN classhistory b ON a.tutor_id = b.tutor WHERE b.user_id = $student_id";
    
    $res = mysql_query($sql);
    
    $output = '<table class="table"><tr><th>Tutor Name</th><th>Attendance</th><th>Status</th><th>Date/Time</th></tr>';
    
    while($row = mysql_fetch_array($res)){
        $output .= '<tr>';
        $output .= '<td>'. $row['nick_name'] . '</td>'; 
        $output .= '<td>'. $row['attendance'] . '</td>'; 
        $output .= '<td>'. $row['status'] . '</td>'; 
        $output .= '<td>'. $row['date'] . ' / ' . $row['time'] .'</td>'; 
        $output .= '</tr>';
    }
    
    $output .= "</table>";

   return $output;
}
    
    // end database ---------------------------------------------
    function WeeklyCalClass ($day, $month, $year, $user_id) {
        
        $this->user_id=$user_id;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->date = $this->showDate ($hour, $min, $sec, $month, $day, $year);
    }


    function showCalendar ($user_id,$purpose,$addid) {
    
        $Output .= $this->buttonsWeek ($this->day, $this->month, $this->year, $this->date["numdaysmonth"],$purpose,$addid);
        $Output .= $this->buttons ($this->day, $this->month, $this->year, $this->date["numdaysmonth"]);
        $Output .= "
                    <div class='row'>
                        <div class='col-md-11'>
                        <div class='table-responsive'>
                            <table id='sched-calendar' class='table table-striped table-bordered table-hover' width='95%'>
                    ";
        $Output .= $this->WeekTable ($this->date ["daymonth"], $this->date ["dayWeek"], $this->date["numdaysmonth"], $this->date["monthName"], $this->day, $this->month, $this->year, $user_id,$purpose);
        $Output .= "
                            </table>
                        </div>
                        </div>
                    </div>";

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
    


    function WeekTable ($daymonth, $dayWeek, $numdaysmonth, $monthName, $day, $month, $year, $user_id,$purpose) {
        
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
            }
            else{
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
        {
            $Output .="<tr>";
            
            foreach ($min as $v)
            {
                $outtime=$i.':'.$v;
                $Output .="<td style='text-align:center;'><b>".$outtime."</b></td>";
    
                for ($n=0; $n<=6; $n++) {
                    $Output .= "<td style='text-align:center;'>";
                    
                    $got = $this->get_sched($outtime, $dayLink[$n]["day"], $dayLink[$n]["month"], $dayLink[$n]["year"], $user_id);
                    $rowdatetime=$dayLink[$n]["year"]."-".$dayLink[$n]["month"]."-".$dayLink[$n]["day"];

                    (strtotime($rowdatetime) <= strtotime("now")) ? $disableselect="disabled" : $disableselect=""; // add/edit a day before today
                    
                    
                    if($got[0]=="closed")
                    {
                        $student_id=$this->get_student($outtime, $dayLink[$n]["day"], $dayLink[$n]["month"], $dayLink[$n]["year"], $user_id);
                        $this->get_student_info($student_id);
                        $this->get_student_profile($student_id);

                        $Output .= "<span style='color:red; padding-left:5px;padding-right:5px;'><a href=\"#myModal".$student_id."\" role=\"button\" class=\"btn btn-xs btn-success\" data-toggle=\"modal\" title='view student info'><strong>CLOSED</strong></a></span>";
                        
                        $Output .= '
                        <!-- Modal -->
                        <div id="myModal'. $student_id.'" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="myModalLabel">'.$this->student_first_name.' '.$this->student_last_name.'</h4>
                        </div>
                        <div class="modal-body">
                        <img src="'. $this->studentprofile_photo.'" class="img-polaroid pull-left" style="margin-right:20px;" />
                        <table cellpadding="5px">
                            <tr>
                                <td>Nickname:  </td><td><strong>'.$this->studentprofile_nick_name.'</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>'.$this->studentprofile_phone.'</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>'.$this->student_email.'</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>'.$this->student_skype_id.'</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong>'.$this->studentprofile_birthday.'</strong></td>
                            </tr>
                            -->
                            </table>
                        <br/>
                        <br/>
                            '. $this->get_history($student_id) .'
                        </div>
                        <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                ';
                    }
//----------------------------------------------july 14, 2014-------------------------------------------//
                if($purpose != "view"){
                        if($got[0]=="open")
                        {
                            if($got[1] == 'yes'){
                                $Output .= "<select name='hoursselected[]' ".$disableselect." class='selectBox-cal' style='width:98%; background-color:green; color:white;'>";
                                $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a'>-</option>";
                                $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open' selected>Open</option>";//selected
                                $Output .= "<select>";
                            } else {
                                $Output .= "<select name='hoursselected[]' ".$disableselect." class='selectBox-cal' style='width:98%; background-color:#FFC400; color: #000;'>";
                                $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a'>-</option>";
                                $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open' selected>For Approval</option>";//selected
                                $Output .= "<select>";
                            }
                            
                        }
                        if($got[0]=="n/a")
                        {
                            $Output .= "<select name='hoursselected[]' ".$disableselect." class='selectBox-cal' style='width:98%;'>";
                            $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a' selected>-</option>";
                            $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open'>Open</option>";//selected
                            $Output .= "<select>";
                        }
                        if($got[0]==FALSE)
                        {
                            $Output .= "<select name='hoursselected[]' ".$disableselect." class='selectBox-cal' style='width:98%;'>";
                            
                            
                            
                            //$Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a'>". $currdatetime."</option>";
                            
                            
                            $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&n/a'>-</option>";
                            $Output .= "<option value='".$outtime."&".$dayLink[$n]["day"]."&".$dayLink[$n]["month"]."&".$dayLink[$n]["year"]."&open'>Open</option>";
                            $Output .= "<select>";
                        }
                    }
                    else
                    {
                        if($got[0]=="open")
                        {
                            $Output .= "<span style='color:GREEN; padding-left:5px;padding-right:5px;'><strong>OPEN</strong></span>";//selected

                        }
                        if($got[0]=="n/a")
                        {
                            $Output .= "BOOKED";
                        }
                        if($got[0]==FALSE)
                        {
                            
                            
                            $Output .= "- - -";
                        }



                    }
                    

                    $Output .= "</td>";
    
                }
            
          $Output .="</tr>";
          }
          
//      end hourly                                 TABLE -----------------------------------------------------------------------------------------------------------------------    
        }
        return $Output;
    }



    function buttonsWeek ($day, $month, $year, $numdaysmonth,$purpose,$addid) {
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
    
    $Output.=" 
    <div class='row'>
    <div class='col-md-11'>
    <div class=''>
        <ul class='pagination'>
            <li class='pages'>
                <a href='".$PHP_SELF."?day=".$ant."&month=".$monthAnt."&year=".$yearAnt."&".$addid."'>
                    &laquo; previous week
                </a>
            </li>
            <li class='pages active' >
                <a href='".$_SERVER['PHP_SELF']."'>
                    " .$week['start']."-".$week['end'] .",".$year."
                </a>
            </li> 
            <li class='pages'>
                <a href='".$PHP_SELF."?day=".$post."&month=".$monthPost."&year=".$yearPost."&".$addid."'>
                    next week &raquo;
                </a>
            </li></ul>";
       
    if($purpose != "view") {
        $Output .= "<button  style='margin-top:0px;' class='btn btn-primary pull-right' type='submit' name='send' value='Save'>
        <i class='glyphicon-ok-sign glyphicon'></i> Update</button>";
    } 
    
    
   /*  $Output .= "
    
    </div>
    
    <div class=' visible-xs-block'>
    <ul class='pagination'  style='width:100%;'>
    <li class='pages' >
            <a href='".$PHP_SELF."?day=".$ant."&month=".$monthAnt."&year=".$yearAnt."&".$addid."' style='width:15%;'>
                <i class='glyphicon glyphicon-chevron-left'></i>
            </a>
    </li>
    <li class='pages active'>
            <a href='".$_SERVER['PHP_SELF']."' style='width:70%;text-align:center;'>
                " .$week['start']."-".$week['end'] .",".$year."
            </a>
    </li> 
    <li class='pages'>
            <a href='".$PHP_SELF."?day=".$post."&month=".$monthPost."&year=".$yearPost."&".$addid."' style='width:15%;text-align:right;'>
                <i class='glyphicon glyphicon-chevron-right'></i>
            </a>
    </li>";
    
    if($purpose != "view"){
        $Output .= "
        <li class='pages'>
            <button style='margin-top:0px;' class='btn btn-primary form-control'  type='submit' name='send' value='Save' >
                <i class='glyphicon-ok-sign glyphicon'></i> Update
            </button>
        </li>";
    } */
   $Output.="
   </ul>
   </div>
    </div>
    </div>";
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