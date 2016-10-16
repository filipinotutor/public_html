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

					'/uploadimage' => 'uploadimage',
					'/uploadfile' => 'uploadFile',

			// User 
					'/user' => '@get',
					'/user' => 'update',
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


		if(!($routes[$route] == 'uploadimage' || $routes[$route] == 'uploadfile')) {
			
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
			
			if($routes[$route] == 'uploadimage') {

				 // separation of student , tutor, supervisor admin pictures
				if (!empty($_FILES) && isset($_POST['user_id']) && isset($_POST['flag'])) {
				     
					$ds = DIRECTORY_SEPARATOR;  //1
 
					$img_types = array('jpeg', 'jpg', 'png');

					$tempFile = $_FILES['file']['tmp_name'];          //3             

				    $temp = explode(".", $_FILES["file"]["name"]);

				    $isSupportedImgFile = false;

				    for($i = 0; $i < sizeof($img_types) - 1; $i++) {
				    	if($temp == $img_types[$i]) {
				    		$isSupportedImgFile = true;
				    	}	
				    }

				    if($isSupportedImgFile) {
						$newfilename = $user_id .'_'.round(microtime(true)) . '.' . end($temp);

						$user_id = $_POST['user_id'];
						$flag = $_POST['flag'];

					    switch($flag) {
					    	case 'student':
					    		$dir = '../display_pictures/students';
					    	break;
					    	case 'tutor':
						    	$dir = '../display_pictures/tutors';
					    	break;
					    	case 'supervisor':
						    	$dir = '../display_pictures/supervisors';
					    	break;
					    }

					    $targetPath = dirname( __FILE__ ) . $ds. $dir . $ds;  //4
					     
					    $targetFile =  $targetPath.$newfilename;  //5
				    	
				    	if(move_uploaded_file($tempFile,$targetFile)) {
				    		$response = array('success' => true);
				    		echo json_encode($response);
				    	} else {
							$response = array('success' => false, 'error' => 'Error occured');				    		
				    	}

				    } else {
				    	$response = array('success' => false, 'error' => 'File not supported');
				    }

				    

									     
				}

			} else {
				// uploadfile
			}
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