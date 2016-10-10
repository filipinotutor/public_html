<?php

class ClassHistory extends Query {

	var $data = array();

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT ch.*, t.nick_name, u.first_name, u.last_name
		FROM classhistory ch
		LEFT JOIN tutors t
		ON  ch.tutor_id = t.tutor_id
		LEFT JOIN users u 
		ON ch.student_id = u.user_id
		';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getClassHistory($user_id) {
		$sql = 'SELECT ch.*, t.nick_name, u.first_name, u.last_name
				FROM classhistory ch
				LEFT JOIN tutors t
				ON  ch.tutor_id = t.tutor_id
				LEFT JOIN users u 
				ON ch.student_id = u.user_id
				WHERE ch.tutor_id = '.$user_id.' OR ch.student_id = '.$user_id;

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

}