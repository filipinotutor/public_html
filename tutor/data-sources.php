<?php
/*
  Script outputs data in json format suitable for 'source' option in X-editable
*/
  

if(isset($_GET))
{
	if($_GET['v']=="teaching-exp")	
	{
	$groups = array(
	  array('value' => 'none', 'text' => 'None'),
	  array('value' => 'less6months', 'text' => 'Less than 6 months'),
	  array('value' => 'months6-year1', 'text' => '6 months to 1 year'),
	  array('value' => 'year1-year3', 'text' => '1 year to 3 years'),
	  array('value' => 'over3yrs', 'text' => 'over 3 years'),
	);
	}
}


echo json_encode($groups);  