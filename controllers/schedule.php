<?php

class Schedule extends Query {

	var $data = array();

	var $table = 'schedules_1';

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT * FROM '.$this->table;

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}

	public function getUserSchedule($user_id) {
		$sql = 'SELECT * FROM schedules WHERE tutor_id ='. $user_id .' OR student_id = '.$user_id.'; ';

		$result = Query::select($sql);

		$this->data = $result;

		$this->wantsJSON();
	}

	public function add($input) {

		$qValues = Query::genInsertQuery($input);

		$sql = 'INSERT INTO schedules_1('.$qValues['fields'].') VALUES('.$qValues['values'].'); ';

		$result = Query::save($sql);

		$this->data = $result;

		$this->wantsJSON();
	}

	public function update($input) {
		
		$schedule_id = $input['schedule_id'];
		$schedule_datetime = $input['schedule_datetime'];
		$user_id = $input['user_id'];
		$tutor_id = $input['tutor_id'];
		$status = $input['status'];


		
	}

}