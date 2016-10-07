<?php

class Database {

	public $url = ''; 
	
	/* for local development */
	
	public $user_name = "root";
    public $database = "filipino_tutor";
    public $pw = "";

	public function __construct() {

		$this->url = $_SERVER['HTTP_HOST'];

		$isProd =  strpos($this->url,"https") > 0 ? true : false;
		$isDev = strpos($this->url, "dev") > 0 ? true :false ;

		if($isProd) {
		    $this->user_name = "filipino_tutor";
		    $this->database = "filipino_tutor";
		    $this->pw = "NdZVnxahGIhZ";
		} else if($isDev) {
			$this->user_name = "filipino_tutor";
		    $this->database = "filipino_devtutor";
		    $this->pw = "NdZVnxahGIhZ";
		} 

		$mysql_connect = mysql_connect("localhost", 
                                          $this->user_name, 
                                           $this->pw); 

		$mysql_db = mysql_select_db($this->database); 
	}
}



?>