<?php

class Supervisor extends Query {

	var $data = array();

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get_superisors(){
		$sql = 'SELECT * FROM supervisors '. $filter;

		$result = Query::run($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();
	}
}