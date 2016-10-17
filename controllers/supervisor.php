<?php

class Supervisor extends Query {

	var $data = array();

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, s.supervisor_id, s.phone, s.photo, s.birthday, s.nick_name  
				FROM users u
				LEFT JOIN supervisors s 
				ON u.user_id = s.supervisor_id
				WHERE u.access_level = 9
				ORDER BY u.user_id ';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function add($input) {
		
		$ins = Query::genInsertQuery($input);

		$sql = 'INSERT INTO supervisors('.$ins['field'].') VALUES('.$ins['values'].');';

		$result = Query::save($sql);

		$this->data = $result;

		$this->wantsJSON();
	}

	public function getSupProfile($userNameOrEmail){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, s.supervisor_id, s.phone, s.photo, s.birthday, s.nick_name  
				FROM users u
				LEFT JOIN supervisors s 
				ON u.user_id = s.supervisor_id
				WHERE u.access_level = 9 AND u.username = "'.  $userNameOrEmail .'" OR u.email = "'. $userNameOrEmail .'"  
				ORDER BY u.user_id ';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getSupList(){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, s.nick_name 
				FROM users u
				LEFT JOIN supervisors s 
				ON u.user_id = s.supervisor_id
				WHERE u.access_level = 9 
				ORDER BY u.user_id ';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

}