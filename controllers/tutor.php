<?php

class Tutor extends Query {

	var $data = array();
	var $tutor_id = null;
	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get_tutors(){
		if(!$this->tutor_id == null){
			$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, t.nick_name, t.phone, t.photo, t.audio, t.birthday, t.ed_level,
				t.school, t.attending, t.teaching_exp, t.hobby, t.self_intro, t.bank_name, t.bank_branch, t.access, 
				t.accnt_name, t.accnt_number, t.supervisor_id, t.tutor_type_id, t.allow_teach_trial, 
				CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
				FROM users u 
				INNER JOIN tutors t 
				ON u.user_id = t.tutor_id
				LEFT JOIN deactivated_account da
				ON t.tutor_id = da.tutor_id
				WHERE u.access_level = 2 AND u.user_id = '.$this->tutor_id.'
				ORDER BY u.user_id ';
		} else {
			$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, t.nick_name, t.phone, t.photo, t.audio, t.birthday, t.ed_level,
				t.school, t.attending, t.teaching_exp, t.hobby, t.self_intro, t.bank_name, t.bank_branch, t.access, 
				t.accnt_name, t.accnt_number, t.supervisor_id, t.tutor_type_id, t.allow_teach_trial, 
				CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
				FROM users u 
				INNER JOIN tutors t 
				ON u.user_id = t.tutor_id
				LEFT JOIN deactivated_account da
				ON t.tutor_id = da.tutor_id
				WHERE u.access_level = 2
				ORDER BY u.user_id ';
		}

		$result = Query::run($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getTutorProfile($userName) {
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, t.nick_name, t.phone, t.photo, t.audio, t.birthday, t.ed_level,
			t.school, t.attending, t.teaching_exp, t.hobby, t.self_intro, t.bank_name, t.bank_branch, t.access, 
			t.accnt_name, t.accnt_number, t.supervisor_id, t.tutor_type_id, t.allow_teach_trial, ct.credit_type_desc 
			AS "tutor_type",  
			CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
			FROM users u 
			INNER JOIN tutors t 
			ON u.user_id = t.tutor_id
			LEFT JOIN deactivated_account da
			ON t.tutor_id = da.tutor_id
			LEFT JOIN credit_type ct
			ON t.tutor_type_id = ct.credit_id
			WHERE u.access_level = 2 AND u.username = "'.$userName.'"  
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