<?php
/*
  Script outputs data in json format suitable for 'source' option in X-editable
*/
  

$groups = array(
  array('value' => 'yes', 'text' => 'Yes'),
  array('value' => 'no', 'text' => 'No'),
);

echo json_encode($groups);  