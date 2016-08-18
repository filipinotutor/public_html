<?php
include('../includes/ValidationClass.php');
$val = new validation;
$val->addSource($_GET);
$val->addRule('t', 'numeric', true, 1, 255, true);
$val->run();

/*** if there are errors show them ***/
if(sizeof($val->errors) > 0)
{
    print_r($val->errors);
}

/*** show the array of validated and sanitized variables ***/
var_dump($val->sanitized);
die();
