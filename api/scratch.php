<?php

include('../config/database.php');

// include('../config/query.php');

// $d = new Database();
// $pw = md5("12345");

// $sql = 'UPDATE users SET password = "'.$pw.'" WHERE user_id =23 ';


// $res = mysql_query($sql);

// echo json_encode($res);
// echo mysql_error();
// $table = "users";
// $where = 'username = "adin" ';

// $isFound = Query::search($table, $where);

// echo $isFound;

// echo $d->user_name;
// echo '<br/>';
// echo $d->database;
// echo '<br/>';
// echo $d->pw;
// $sql = 'INSERT INTO deactivated_account(user_id, deactivator_id) valus(56,23)';

// $q = new Query();

// echo $q::update("asdf")->where();
// echo '<br/>';
// echo $q::run2('asdf1');


// $result = mysql_query($sql);

// $res = mysql_free_result();

// $res = mysql_affected_rows();

// echo $result;



echo '<br/>';
// echo mysql_error();

function apple(){
	echo '<br/> apple';
	function apple2(){
		echo '<br/> apple2';
	}
}



function one($id){
	echo 'ONE: '. $id;
}


function two(){
	echo 'TWO';
}

function three($id){
	echo 'THREE: '. $id;
}


	$route = '/tutor/getById/123';
	$id = 123;

	$routes = array(
		'/tutor' => 'two',
		'/tutor/getById/'.$id => 'three@'.$id
	);

	// if(strpos($routes[$route],"@") > 0){
	// 	$atIndex = strpos($routes[$route],"@");
	// 	$argument = substr($routes[$route], $atIndex + 1);
	// 	$call_func = substr($routes[$route], 0, $atIndex);
	// } else {
	// 	$argument = '';
	// }

	// echo strpos($routes['/tutor'], "@");


	// $call_func($argument);



// echo $argument;
// echo '<br>'. $routes[$route];
// echo '<br>';
// echo $call_func;
// echo '<br>';

// $request =  trim($_SERVER['PATH_INFO'],'/');	

// echo $request;

$json = '{"username": "apple","password":"orange"}';



$array = json_decode($json, true);


// echo $array['username']();

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

$a = 'asdf'."'";

echo $a;
	// echo 'INSERT INTO TABLE1('.$field.') VALUES('.$values.');';
	// echo '<br/>';
	// echo '<br/>';
	// echo '<br/>';
	// echo 'UPDATE TABLE1 SET '. $upd . ' WHERE username =1';





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