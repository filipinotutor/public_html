<?php

include('database.php');

class Query extends Database {
		
	public static function run($query){

		$result = array(); // Data storage
		$tmp_result = array();

		$res = mysql_query($query);

		if($res) {
			$result[] = array('success' => true);
			while($row = mysql_fetch_object($res)){
				$tmp_result[] = $row;
			}
		} else {
			$result[] = array('success' => false, 'error' => mysql_error());
		}

		// so success = $result[0]['success'];
		
		$result[1] = $tmp_result;

		return $result; 
	}

}
