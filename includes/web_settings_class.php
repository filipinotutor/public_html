<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root.'/config/database.php');

class admin_web_settings {

    public $webmaster_name = '';
    public $webmaster_email = '';
    public $admin_name = '';
    public $admin_email = '';

    public function __construct() {  

            $res = mysql_query("SELECT * FROM adminsettings");

            $this->webmaster_name = mysql_result($res,0,"webmaster_name");
            $this->webmaster_email = mysql_result($res,0,"webmaster_email");
            $this->admin_name = mysql_result($res,0,"admin_name");
            $this->admin_email = mysql_result($res,0,"admin_email");
    }
}
?>