<?php 

require('user.php');

class StudentCredits {

	public function get_credits($user_id = null){
		$user = new User;
		if($user_id == null) {
			$user_id = $user->get_user_id();
		}
		
		$sql = 'SELECT credit_value FROM studentcredits WHERE student_id = '.$user_id.' AND status = 1 AND expiration > NOW()';
		$res = mysql_query($sql);

		return mysql_result($res, 0, "credit_value");
	}

	public function update_credit_incr($user_id, $inc_value){
		$curr_credits = $this->get_credits($user_id);
		$sql = 'UPDATE studentcredits SET credit_value ='.$curr_credits + $inc_value.' WHERE student_id = '. $user_id;

		$res = mysql_query($sql);

		if($res) {
			return true;
		} else {
			return false;
		}
	}

	public function update_credit_decr($user_id, $decr_value){
		$curr_credits = $this->get_credits($user_id);
		$sql = 'UPDATE studentcredits SET credit_value ='.$curr_credits + $decr_value.' WHERE student_id = '. $user_id;

		$res = mysql_query($sql);

		if($res) {
			return true;
		} else {
			return false;
		}

	}
	
}


