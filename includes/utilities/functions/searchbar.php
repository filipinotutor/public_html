<?php
$path = $page_protect->get_path();
if(IsSet($_POST['submit_filter'])){
	$filter= $_POST['filter'];
	$filter = 'AND (`first_name` LIKE "%'.$filter.'%" || `last_name` LIKE "%'.$filter.'%" || `email` LIKE "%'.$filter.'%")';
}
?>