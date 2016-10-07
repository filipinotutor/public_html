<?php

class Database {

	public $url = ''; 
	
	/* for local development */
	
	public $user_name = "root";
    public $database = "filipino_tutor";
    public $pw = "";

	public function __construct() {

		$this->url = $_SERVER['HTTP_HOST'];

		$isProd = ($_SERVER['SERVER_NAME'] == 'filipinotutor.com');
		$isDev = ($_SERVER['SERVER_NAME'] == 'dev.filipinotutor.com');

		if($isProd) {
		    $this->user_name = "filipino_tutor";
		    $this->database = "filipino_tutor";
		    $this->pw = "NdZVnxahGIhZ";
		} else if($isDev) {
			$this->user_name = "filipino_dev";
		    $this->database = "filipino_dev";
		    $this->pw = "development";
		} 

		$mysql_connect = mysql_connect("localhost", 
                                          $this->user_name, 
                                           $this->pw); 

		$mysql_db = mysql_select_db($this->database); 
	}
}



?>
