<?php 

class User extends Query {

	var $data = array();
	var $user_id = null;

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	// used in WeeklyClass.php
	public function get_access_level($username) {
		$username = $_SESSION['user'];
		$sql = 'SELECT access_level FROM users WHERE username ='.$username;
		if (!$result = mysql_query($sql)) {
		   $this->the_msg = $this->messages(14);
		} else {
			return mysql_result($result, 0, "access_level");
		}
	}

	public function get_user_id(){
		$sql = 'SELECT user_id FROM users WHERE username ="'.$_SESSION['user'].'"';
		$res = mysql_query($sql);
		return mysql_result($res, 0, "user_id");
	}


	public function get_user_info() { 
		$sql = 'SELECT user_id, username, first_name, last_name, email, gender, skype_id, access_level, active';
		$sql = $sql . ' FROM users WHERE username ="'.$_SESSION['user'].'"';

		$result = Query::run($sql);
		if($result[0]['success']) {
			$this->data = $result;		
		} else {
			$this->data = $result;
		}

		$this->wantsJSON();
	}

	public function get() {
		if(!$this->user_id == null) {
			$sql = 'SELECT * FROM users WHERE user_id ='. $this->user_id;
		} else {
			$sql = 'SELECT * FROM users';
		}

		$result = Query::run($sql);
		
		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function update(){
		$sql = "UPDATE users SET first_name = 'KAMOTE' where user_id = 23";
		$result = Query::run($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();

	}


}


