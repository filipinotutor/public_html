<?php

include('database.php');

class Query extends Database {

	 function select($sql) {
		
		$result = array(); // Data storage
		$tmp_result = array();

		$res = mysql_query($sql);


		if($res) {
			$result[] = array('success' => true);
			while($row = mysql_fetch_object($res)){
				$tmp_result[] = $row;
			}
		} else {
			$result[] = array('success' => false, 'error' => mysql_error());
		}

		$result[1] = $tmp_result;
		
		return $result;
	}

	 function update($sql) {
		
		$result = mysql_query($sql);

		if($result) {
			$result = array('success' => true);
		} else {
			$result = array('success' => false, 'error' => mysql_error());
			return $result;
		}

		return $result;
	}

	function search($table, $where) {

		$sql = 'SELECT COUNT(*) AS `search_results` FROM '. $table .' WHERE '.$where;
		try {

			$result = mysql_query($sql);
			$row = mysql_fetch_object($result);

			$result = $row->search_results;

		} catch (Exception $e) {
			$result =  array('success' => false, 'error' => mysql_error());
		}

		return $result;
	}


	 function save($sql) {
		$result = mysql_query($sql);

		if($result) {
			$result = array('success' => true);
		} else {
			$result = array('success' => false, 'error' => mysql_error());
			return $result;
		}

		return $result;
	}

	 function delete($sql){
		$result = mysql_query($sql);

		if($result) {
			$result = array('success' => true);
		} else {
			$result = array('success' => false, 'error' => mysql_error());
			return $result;
		}

		return $result;
	}
}