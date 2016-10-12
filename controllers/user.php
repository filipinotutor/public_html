<?php 

class User extends Query{

	var $data = array();
	var $user_id = null;


	public function wantsJSON() {
		$this->data = json_encode($this->data);
	}

	// used in WeeklyClass.php
	public function get_access_level($username) {
		$username = $_SESSION['user'];
		$sql = 'SELECT access_level FROM users WHERE username ='.$username;
		if (!$result = mysql_query($sql)) {
		   $this->the_msg = $this->messages(14);
		} else {
			return mysql_result($result, 0, "access_level");
		}
	}

	public function get_user_id(){
		$sql = 'SELECT user_id FROM users WHERE username ="'.$_SESSION['user'].'"';
		$res = mysql_query($sql);
		return mysql_result($res, 0, "user_id");
	}


	public function get_user_info() { 
		$sql = 'SELECT user_id, username, first_name, last_name, email, gender, skype_id, access_level, active';
		$sql = $sql . ' FROM users WHERE username ="'.$_SESSION['user'].'"';

		$result = Query::select($sql);
		if($result[0]['success']) {
			$this->data = $result;		
		} else {
			$this->data = $result;
		}

		$this->wantsJSON();
	}

	public function get() {
		if(!$this->user_id == null) {
			$sql = 'SELECT * FROM users WHERE user_id ='. $this->user_id;
		} else {
			$sql = 'SELECT * FROM users';
		}

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

		$sql = 'INSERT INTO users ('.$ins['field'].') VALUES('.$ins['values'].');';

		$result = Query::save($sql);

		$this->data = $result;

		$this->wantsJSON();
	}


	public function deactivateAccount($input){

		$user_id = $input['user_id'];
		$deactivator_id = $input['deactivator_id'];

		$sql = 'INSERT INTO deactivated_account(user_id, deactivator_id) VALUES('.$user_id.','.$deactivator_id.');';
		$result = Query::save($sql);

		if($result['success']){
			$this->data = $result;
		} else {
			$this->data = $result;
		}
		
		$this->data = $result;

		$this->wantsJSON();
	}

	public function activateAccount($input){
		
		$user_id = $input['user_id'];
		$deactivator_id = $input['deactivator_id'];

		$sql = 'DELETE FROM deactivated_account WHERE user_id = '.$user_id.' AND deactivator_id ='.$deactivator_id;

		$result = Query::delete($sql);

		if($result['success']) {
			$this->data = $result;
		} else {
			$this->data = $result;
		}	

		$this->wantsJSON();
	}

	public function changePassword($input){

		$user_id = $input['user_id'];
		$oldpw = md5($input['oldpw']);
		$newpw = md5($input['newpw']);

		$table = "users";
		$where = ' user_id = '.$user_id.' AND password ="'. $oldpw .'" ';

		$isFound = Query::search($table, $where);

		if($isFound) {
			$sql = 'UPDATE users SET password ="'. $newpw .'" WHERE user_id ='.$user_id;
			
			$res = Query::update($sql);

			if($res['success']){
				$this->data = $res;
			} else {
				$this->data = $res;
			}

		} else {
			$res = array('success' => false);
			$this->data = $res;
		}

		
		$this->wantsJSON();

	}

}


