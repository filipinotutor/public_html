<?php
if(isset($_POST['student_filter'])){
	$ytoday = date("Y" , strtotime("now"));
  $from_m = $_POST['from'];
  $to_m = $_POST['to'];
  
  $from = strtotime("".$ytoday."-".$from_m."-01");
  $to =   strtotime("".$ytoday."-".$to_m."-31");
  
  $filter = ' AND (`schedules`.`fulldate` <= "'.$to.'" AND `schedules`.`fulldate` >= "'.$from.'") ';
  
}
?>