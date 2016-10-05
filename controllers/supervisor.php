<?php

class Supervisor extends Query {

	var $data = array();

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, s.supervisorid, s.phone, s.photo, s.birthday, s.nick_name  
				FROM users u
				LEFT JOIN supervisors s 
				ON u.user_id = s.supervisorid
				WHERE u.access_level = 9
				ORDER BY u.user_id ';

		$result = Query::run($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getSupProfile($sup_id){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, s.supervisorid, s.phone, s.photo, s.birthday, s.nick_name  
				FROM users u
				LEFT JOIN supervisors s 
				ON u.user_id = s.supervisorid
				WHERE u.access_level = 9 AND s.supervisorid = '. $sup_id .' 
				ORDER BY u.user_id ';

		$result = Query::run($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

}