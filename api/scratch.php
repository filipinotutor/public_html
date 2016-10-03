<?php

function apple(){
	echo 'PPLEPEN<br/>';
}


$request =  trim($_SERVER['PATH_INFO'],'/');	

// echo $request;

$json = '{"username": "apple","password":"orange"}';



$array = json_decode($json, true);


echo $array['username']();

// $array = array(
//     'username' => 'apple',
//     'password' => 'orange',
//     'last_name' => 'grape',
//     'first_name' => 'apple',
//     'middle_name' => 'apple');

$field = '';
$values = '';

$upd = '';





$last_key = end(array_keys($array));

foreach ($array as $key => $value) {

	if($key == $last_key){
		
		$upd = $upd.$key.' = '.$value.' ';


		$values = $values.$value.' ';
		$field = $field.$key. ' ';
	} else {

		$upd = $upd.$key.' = '.$value.', ';

		$values = $values.$value.', ';
		$field = $field.$key. ', ';
	}
}

	echo 'INSERT INTO TABLE1('.$field.') VALUES('.$values.');';
	echo '<br/>';
	echo '<br/>';
	echo '<br/>';
	echo 'UPDATE TABLE1 SET '. $upd . ' WHERE username =1';





	// echo $values;

// this cycle echoes all associative array
// key where value equals "apple"
// while ($fruit_name = current($array)) {
//     if ($fruit_name == 'apple') {
//         echo key($array).'<br />';
//         echo $array;
//     }
//     next($array);
// }

?>