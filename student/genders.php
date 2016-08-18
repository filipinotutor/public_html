<?php
/*
  Script outputs data in json format suitable for 'source' option in X-editable
*/

sleep(1);   

$groups = array(
  array('value' => 'Male', 'text' => 'Male'),
  array('value' => 'Female', 'text' => 'Female'),
);

echo json_encode($groups);  