<?php


$url = $_SERVER['HTTP_REFERER']; 

$isProd = preg_match("/filipinotutor/", $url);

if($isProd) {
    $user_name = "filipino_tutor";
    $database = "filipino_tutor";
    $pw = "NdZVnxahGIhZ";
} else {
    $user_name = "root";
    $database = "filipino_tutor";
    $pw = "";
}

define("DB_SERVER", "localhost");
// define("DB_NAME", "filipinotutor");
define("DB_NAME", $database);
define ("DB_USER", $user_name);
define ("DB_PASSWORD", $pw);

?>