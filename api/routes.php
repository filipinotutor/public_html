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
					'/user/changepw' => 'changePassword',

			// Student 
					'/student' => '@get',
					'/student/getByUserOrMail/'.$id => 'getStudentProfile@'.$id,

			// Tutor
					'/tutor' => '@get_tutors',
					'/tutor/getByUserOrMail/'.$id => 'getTutorProfile@'.$id,
					'/tutor/add' => 'add',
					'/tutor/update' => 'update',
			
			// Supervisor
					'/supervisor' => '@get',
					'/supervisor/getByUserOrMail/'.$id => 'getSupProfile@'.$id,
					'/supervisor/list' => '@getSupList',
					'/supervisor/add' => 'add',
					'/supervisor/update' => 'update',


			// Applicant
					'/applicant' => '@get',
					'/applicant/getAppDetails/'.$id => 'getAppDetails@'.$id,

			// Admin
					'/admin'	=> '@get',
					'/admin/settings' => '@getAdminSettings',
					'/admin/add' => 'add',
					'/admin/update' => 'update',

			// Classhistory
					'/classhistory' => '@get',
					'/classhistory/user/'.$id => 'getClassHistory@'.$id,

			// Conversions
					'/conversion' => '@get',
					'/conversion/tutor/'.$id => 'getTutorConversion@'.$id,

			// Schedules
					'/schedule' => '@get',
					'/schedule/user/'.$id => 'getUserSchedule@'.$id,
					'/schedule/add' => 'add',
					'/schedule/delete' => 'delete',
					'/schedule/update' => 'update'

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
					// echo json_encode($argument);

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