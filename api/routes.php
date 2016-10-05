<?php
	include('../api/Auth.php');
	include('../config/query.php');
	

	$method = $_SERVER['REQUEST_METHOD'];
	$input = json_decode(file_get_contents('php://input'), true);

	if(Auth::guard()) {
		
		$req_method = $_SERVER['REQUEST_METHOD'];
		
		$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));	
		
		$route = $_SERVER['PATH_INFO'];

		$id = (array_key_exists(2, $request) == true) ? $request[2] : 0;

		$routes = array(
					'/user' => 'get',
					'/user/loggedin' => 'get_user_info',


					'/student' => 'get',
					'/student/getById/'.$id => 'getStudentProfile@'.$id,


					'/tutor' => 'get_tutors',
					'/tutor/getById/'.$id => 'getTutorProfile@'.$id,

					
					'/supervisor' => 'get',
					'/supervisor/getById/'.$id => 'getSupProfile@'.$id,

					
					'/applicant' => 'get',


					'/admin'	=> 'get',
					'/admin/getById/'.$id => 'getAdminProfile@'.$id
				);

		if(strpos($routes[$route],"@") > 0){
			$atIndex = strpos($routes[$route],"@");
			$argument = substr($routes[$route], $atIndex + 1);

			$call_func = substr($routes[$route], 0, $atIndex);
		} else {
			$call_func = $routes[$route];
			$argument = '';
		}

		// user student tutor supervisor
		$table = $request[0];
		

		switch ($req_method) {
			case 'GET':
					include('../controllers/'. $table.'.php');

					$model = new $table();

					$model->$call_func($argument);

					echo $model->data;
			break;

			case 'POST':
				$user = new User();
				$user->update();

				echo 'kamote';
				break;

			case 'PUT':
					
				break;

			case 'DELETE':

				break;
			default:
					  header('HTTP/1.1 405 Method Not Allowed');
				      header('Allow: GET, POST, PUT, DELETE');
				break;
		} 
	} else {
		echo "kamote";
	}
	

	/*

		HTTP Responses
			200 - OK
			201 - Created for PUT and POST Method
			400 - Bad Request (PUT and POST)
			404 - Url Not found
			401 - Unauthorized
			405 - method not allowed
			409 - conflig in PUT method
			500 - internal server error
	
	*/


	// if(Auth::guard()){
	// 	$user = new User();

	// 	$user->get_user_info();
	// 	echo $user->data;
	// } else {
	// 	echo json_encode(array('success' => false ,'error' => 'Authentication Failed', 'auth' => false));
	// }