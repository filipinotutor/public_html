<?php
	include('../api/Auth.php');
	include('../config/query.php');
	

	$method = $_SERVER['REQUEST_METHOD'];
	$input = json_decode(file_get_contents('php://input'), true);

	if(Auth::guard()) {
		
		$req_method = $_SERVER['REQUEST_METHOD'];
		$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));	
		$route = $_SERVER['PATH_INFO'];
		$table = $request[0];
		// $method = $request[1];

		// $id = (array_key_exists(2, $request) == true) ? $request[2] : 0;

		switch ($req_method) {
			case 'GET':
					switch ($table) {
						case 'user':

							include('../controllers/user.php');
							$user = new User();
							$routes = array(
									'/user' => 'get',
									'/user/loggedin' => 'get_user_info'
								);

							$user->$routes[$route]();
							echo $user->data;

							break;

						case 'student':
							include('../controllers/student.php');
							$student = new Student();
							$routes = array(
									'/student' => 'get',
									'/student/getAll' => 'getAllStudents'
								);

							$student->$routes[$route]();
							echo $student->data;

							break;
						
						case 'tutor':
							include('../controllers/tutor.php');
							$tutor = new Tutor();
							$routes = array(
									'/tutor' => 'get_tutors',
									'/tutor/getAll' => 'getAllTutors'
								);

							$tutor->$routes[$route]();
							echo $tutor->data;

							break;

						default:
							# code...
							break;
					}


					// include('../controllers/'. $table.'.php');
					// $user = new $table();

					// if($id > 0) {
					// 	$user->user_id = $id;
					// }

					// $user->$method();

					// echo $user->data;
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