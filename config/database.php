<?php

class Database {

	public $url = ''; 
	
	/* for local development */
	
	public $user_name = "root";
    public $database = "filipino_tutor";
    public $pw = "";

	public function __construct() {

		$this->url = $_SERVER['HTTP_HOST'];

		$isProd = preg_match("/\bfilipinotutor\b/", $this->url);

		if($isProd) {
		    $this->user_name = "filipino_tutor";
		    $this->database = "filipino_tutor";
		    $this->pw = "NdZVnxahGIhZ";
		}

		$mysql_connect = mysql_connect("localhost", 
                                          $this->user_name, 
                                           $this->pw); 

		$mysql_db = mysql_select_db($this->database); 
	}
}



?>