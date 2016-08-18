<?php
if(isset($_POST['conversion_submit_filter'])){
 	$ytoday = date("Y" , strtotime("now"));
 	$month = $_POST['from'];
  	$year = $_POST['to'];
	
	$from =  date('Y-m-01',strtotime(''.$year.'-'.$month.'-01')) . '<br/>';
	$to =  date('Y-m-t',strtotime(''.$year.'-'.$month.'-01')) . '<br/>';

  	//$from = date("Y-m-d",strtotime("".$ytoday."-".$from_m."-01"));
  	//$to = date("Y-m-d",strtotime("".$ytoday."-".$to_m."-01"));
  
  	$filter = " `tutorconversions`.`date_approved` <= '$to' AND `tutorconversions`.`date_approved` >= '$from' ";
}
?>