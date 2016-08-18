<?php 

class User {

	public function get_access_level($username) {
		$username = '"'.$username.'"';
		$sql = 'SELECT access_level FROM users WHERE username ='.$username;
		if (!$result = mysql_query($sql)) {
		   $this->the_msg = $this->messages(14);
		} else {
			return mysql_result($result, 0, "access_level");
		}
	}
}


