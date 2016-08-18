<?php
/*
  Script outputs data in json format suitable for 'source' option in X-editable
*/
  

$groups = array(
  array('value' => 'Elementary', 'text' => 'Elementary'),
  array('value' => 'High School', 'text' => 'High School'),
  array('value' => 'College', 'text' => 'College'),
  array('value' => 'Masters', 'text' => 'Masters'),
);

echo json_encode($groups);  