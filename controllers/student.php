<?php

class Student extends Query {

	var $data = array();
	var $student_id = null;

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, s.student_id, s.nick_name, s.phone, s.photo, s.birthday, s.viewed,
			CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
			FROM users u 
			INNER JOIN students s 
			ON u.user_id = s.student_id 
			LEFT JOIN deactivated_account da
			ON s.student_id = da.user_id
			WHERE u.access_level = 1
			ORDER BY u.user_id ';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getStudentProfile($userNameOrEmail) {
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, s.student_id, s.nick_name, s.phone, s.photo, s.birthday, s.viewed,
				CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
				FROM users u 
				INNER JOIN students s 
				ON u.user_id = s.student_id 
				LEFT JOIN deactivated_account da
				ON s.student_id = da.user_id
				WHERE u.access_level = 1 AND u.userName = "'.$userNameOrEmail.'" OR u.email= "'.$userNameOrEmail.'"
				 AND active = "y" ORDER BY u.user_id ';

		$result = Query::select($sql);
		
		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

}