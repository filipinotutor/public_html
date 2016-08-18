<?php
include("../../main_class.php"); 
$page_protect = new Main_Class;

$test = $page_protect->get_conversion_details($_GET['tutor_id']);

//echo json_encode(array('success' => true, 'Response' => $test));
echo $test;

?>