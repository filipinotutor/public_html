<?php

class Applicant extends Query {

	var $data = array();
	var $applicant_id = null;

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT applicant_id, first_name, last_name, gender, skype_id, email, mobile, teaching_exp, status, creation_date FROM applicants';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getAppDetails($app_id){
		$sql = 'SELECT applicant_id, birthday, school, attending, self_intro, interview_datetime, training_datetime, resume
				FROM applicants
				WHERE applicant_id = '.$app_id;

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();

	}

}