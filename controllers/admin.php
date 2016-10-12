<?php

class Admin extends Query {

	var $data = array();

	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	public function get(){
		$sql = 'SELECT * FROM users WHERE access_level = 10';

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

		$sql = 'INSERT INTO users('.$ins['field'].', access_level) VALUES('.$ins['values'].', 10);';

		$result = Query::save($sql);

		$this->data = $result;

		$this->wantsJSON();
	}

	public function getAdminSettings(){

		$sql = 'SELECT * FROM adminsettings';

		$result = Query::select($sql);

		if($result[0]['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->wantsJSON();

	}

}