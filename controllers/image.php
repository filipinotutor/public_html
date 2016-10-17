
<?php

class ImageHandler extends Query {

	public function uploadImage() {
		
		if (!empty($_FILES) && isset($_POST['user_id']) && isset($_POST['flag']) && isset($_POST['photo_path'])) {
			
				$user_id = $_POST['user_id'];
				$flag = $_POST['flag'];
				$old_photo_path = $_POST['photo_path'];

				// $old_photo_path = '/display_pictures/tutors/136_1476685435.jpg';

				// if($routes[$route] == 'uploadimage') {

				 // separation of student , tutor, supervisor admin pictures
				     
					$ds = DIRECTORY_SEPARATOR;  //1
 
					$img_types = array('jpeg', 'jpg', 'png');

					$tempFile = $_FILES['file']['tmp_name'];          //3             

				    $temp = explode(".", $_FILES["file"]["name"]);

				    // $isSupportedImgFile = false;

				    // not yet working

				    // for($i = 0; $i < sizeof($img_types) - 1; $i++) {
				    // 	if($temp == $img_types[$i]) {
				    // 		$isSupportedImgFile = true;
				    // 	}	
				    // }

				    $isSupportedImgFile = true;

				    if($isSupportedImgFile) {

						$newfilename = $user_id .'_'.round(microtime(true)) . '.' . end($temp);

					    switch($flag) {
					    	case 'student':
					    		$dir = '/display_pictures/students';
					    		$table = 'students';
						    	$where = ' student_id ='.$user_id;
					    	break;
					    	case 'tutor':
						    	$dir = '/display_pictures/tutors';
					    		$table = 'tutors';
						    	$where = ' tutor_id ='.$user_id;
					    	break;
					    	case 'supervisor':
						    	$dir = '/display_pictures/supervisors';
						    	$table = 'supervisors';
						    	$where = ' supervisor_id ='.$user_id;
					    	break;
					    }

					    $targetPath = dirname( __FILE__ ) . $ds.'..'.$dir . $ds;  //4
					     
					    $targetFile =  $targetPath.$newfilename;  //5
				    	
				    	if(move_uploaded_file($tempFile,$targetFile)) {

				    		if(file_exists('..'.$old_photo_path)){
					    		unlink('..'.$old_photo_path);
				    		}

				    		$new_path = $dir.'/'.$newfilename;

				    		$sql = 'UPDATE '.$table. ' SET photo ="'.$new_path.'" WHERE '.$where;
				    		
				    		$result = Query::save($sql);

				    		$response = array('success' => true, 'new_path' => $new_path);
				    		
				    		$response = json_encode($response);

				    		echo $response;

				    	} else {
							
							$response = array('success' => false, 'error' => 'Error occured');		
							echo json_encode($response);		    		
				    	
				    	}

				    } else {
				    	$response = array('success' => false, 'error' => 'File not supported');
				    	echo json_encode($response);
				    }
									     
				// } else {

				// 	$newfilename = $user_id .'_'.round(microtime(true)) . '.' . end($temp);
				// 	$targetPath = dirname( __FILE__ ) . $ds. $dir . $ds;  //4
				     
				//     $targetFile =  $targetPath.$newfilename;  //5
				// 	if(move_uploaded_file($tempFile,$targetFile)) {
			 //    		$response = array('success' => true);
			 //    		echo json_encode($response);
			 //    	} else {
				// 		$response = array('success' => false, 'error' => 'Error occured');		
				// 		echo json_encode($response);		    		
			 //    	}
				// }

			} else {
				$response = array('success' => false, 'error' => 'Failed for parsing sent data to server');	
			}
	}


}