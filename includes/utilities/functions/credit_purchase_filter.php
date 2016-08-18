<?php
if(isset($_POST['credit_filter'])){
	$ytoday = date("Y" , strtotime("now"));
  $from_m = $_POST['from'];
  $to_m = $_POST['to'];
  /*
  $from =  date("Y-m-d H:i:s",strtotime("".$ytoday."-".$from_m."-01"));
  $to =    date("Y-m-d H:i:s",strtotime("".$ytoday."-".$to_m."-01"));
  */
  $filter = ' AND (`studentcredits`.`date_paid` <= "'.$to_m.' 23:59:59" AND `studentcredits`.`date_paid` >= "'.$from_m.' 23:59:59") ';

}
?>