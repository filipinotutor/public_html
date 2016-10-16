<?php

class Tutor extends Query {

	var $data = array();
	var $tutor_id = null;
	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get_tutors(){
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, u.last_update, u.last_update_id, t.tutor_id, t.nick_name, t.phone, t.photo, t.audio, t.birthday, t.ed_level, t.school, t.attending, t.teaching_exp, t.hobby, t.self_intro, t.bank_name, t.bank_branch, t.access, t.accnt_name, t.accnt_number, t.supervisor_id, t.tutor_type_id, t.allow_teach_trial, t.rate, 
			CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
			FROM users u 
			INNER JOIN tutors t 
			ON u.user_id = t.tutor_id
			LEFT JOIN deactivated_account da
			ON t.tutor_id = da.user_id
			WHERE u.access_level = 2
			ORDER BY u.user_id ';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function add($input){
		$ins = Query::genInsertQuery($input);

		$sql = 'INSERT INTO tutors ('.$ins['fields'].') VALUES('.$ins['values'].');';

		$result = Query::save($sql);

		$this->data = $result;

		$this->wantsJSON();
	}

	public function update($input){

		$tutor_id = $input['tutor_id'];
		$in = Query::genUpdateQuery($input);

		$sql = 'UPDATE tutors SET '. $in .' WHERE tutor_id ='.$tutor_id;

		$result = Query::update($sql);

		$this->data = $result;

		$this->wantsJSON();
	}

	public function getTutorProfile($userNameOrEmail) {
		$sql = 'SELECT u.user_id, u.username, u.first_name, u.last_name, u.email, u.tmp_mail, u.gender, u.skype_id, u.access_level, u.creation_date, u.last_login, u.last_update, u.last_update_id, t.tutor_id, t.nick_name, t.phone, t.photo, t.audio, t.birthday, t.ed_level,
			t.school, t.attending, t.teaching_exp, t.hobby, t.self_intro, t.bank_name, t.bank_branch, t.access, 
			t.accnt_name, t.accnt_number, t.supervisor_id, t.tutor_type_id, t.allow_teach_trial, ct.credit_type_desc 
			AS "tutor_type",  t.rate, 
			CASE WHEN da.id > 0 THEN 1 ELSE 0 END AS "deactivated"
			FROM users u 
			INNER JOIN tutors t 
			ON u.user_id = t.tutor_id
			LEFT JOIN deactivated_account da
			ON t.tutor_id = da.user_id
			LEFT JOIN credit_type ct
			ON t.tutor_type_id = ct.credit_id
			WHERE u.access_level = 2 AND u.username = "'.$userNameOrEmail.'" OR u.email ="'.$userNameOrEmail.'"  
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