<?php
	include('../api/Auth.php');
	include('../config/query.php');
	

	$method = $_SERVER['REQUEST_METHOD'];

	if(Auth::guard()) {
		
		$req_method = $_SERVER['REQUEST_METHOD'];
		
		$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));	
		
		$route = $_SERVER['PATH_INFO'];

		$id = (array_key_exists(2, $request) == true) ? $request[2] : 0;

		$routes = array(

			// User 
					'/user' => '@get',
					'/user/loggedin' => '@get_user_info',
 					'/user/deactivate' => 'deactivateAccount',
					'/user/activate' => 'activateAccount',

			// Student 
					'/student' => '@get',
					'/student/getByUserOrMail/'.$id => 'getStudentProfile@'.$id,

			// Tutor
					'/tutor' => '@get_tutors',
					'/tutor/getByUserOrMail/'.$id => 'getTutorProfile@'.$id,

			
			// Supervisor
					'/supervisor' => '@get',
					'/supervisor/getByUserOrMail/'.$id => 'getSupProfile@'.$id,
					'/supervisor/list' => '@getSupList',


			// Applicant
					'/applicant' => '@get',
					'/applicant/getAppDetails/'.$id => 'getAppDetails@'.$id,

			// Admin
					'/admin'	=> '@get',
					'/admin/settings' => '@getAdminSettings',
			
			// Classhistory
					'/classhistory' => '@get',
					'/classhistory/tutor/'.$id => 'getTutorCHistory@'.$id,
					'/classhistory/student/'.$id => 'getStudentCHistory@'.$id,

			// Conversions
					'/conversion' => '@get',
					'/conversion/tutor/'.$id => 'getTutorConversion@'.$id


				);

		// @ -> get method without parameters
		// method@id -> get method with parameters
		// method -> post method with inputs

		$atIndex = strpos($routes[$route] ,"@");

		if($atIndex > 0){

			$argument = substr($routes[$route], $atIndex + 1);
			$call_func = substr($routes[$route], 0, $atIndex);

		} elseif($atIndex == "") {

			$call_func = substr($routes[$route], 1);
			$argument = '';

		}

		if($req_method == 'POST') {
			$call_func = $routes[$route];
			$argument = json_decode(file_get_contents('php://input'), true);
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
					include('../controllers/'. $table.'.php');
					$model = new $table();
					$model->$call_func($argument);
					echo $model->data;
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