<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;
$page_protect->get_user_info();
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(isset($_POST))
{
	$fileName = $_FILES['ImageFile1']['name'];
    $tmpName = $_FILES['ImageFile1']['tmp_name'];
    $fileSize = $_FILES['ImageFile1']['size'];
    $fileType = $_FILES['ImageFile1']['type'];
	
	$message = "";
	$success = false;
	$response = '';
	
	$uploadDir	= '../audio/tutors/'; //Upload Directory ends with / (slash)

if ($fileType != 'audio/mpeg' && $fileType != 'audio/mpeg3' && $fileType != 'audio/mp3' && $fileType != 'audio/x-mpeg' && $fileType != 'audio/x-mp3' && $fileType != 'audio/x-mpeg3' && $fileType != 'audio/x-mpg' && $fileType != 'audio/x-mpegaudio' && $fileType != 'audio/x-mpeg-3') {
        /*echo('<script>alert("Error! You file is not an mp3 file. Thank You.")</script>');*/
		$message = 'Error! Your file is not an mp3 file. Thank You.';
		$success = false;
    } else if ($fileSize > '2485760') {
        /*echo('<script>alert("File should not be more than 2mb")</script>');*/
		$message = 'File should not be more than 2mb';
		$success = false;
    } 
	else {
    // get the file extension first
    $ext = substr(strrchr($fileName, "."), 1); 

    // make the random file name
    $randName = $_POST['user'].md5(rand() * time());

    // and now we have the unique file name for the upload file
	$new_name = $randName . '.' . $ext;
    $filePath = $uploadDir.$new_name;

    $result = move_uploaded_file($tmpName, $filePath);
    if (!$result) {
		$message = 'Error uploading file';
    exit;
    }

    if(!get_magic_quotes_gpc()) {

    $fileName = addslashes($fileName);
    $filePath = addslashes($filePath);
	
	// insert into DB
		if($page_protect->has_profile_tutor($page_protect->user_id))
		{
			//has profile --update
				$page_protect->update_tutor_profile_ajax($_POST['pk'], "audio", $new_name);
		}
		else
		{
			//no profile --insert
			$page_protect->insert_profile_tutor($_POST['pk'], "audio", $filePath);
		}
		
		$response = '<p><a class="btn btn-info btn-xs" href="#modalImageupload1" role="button" data-toggle="modal" title="Upload mp3 file" data-placement="right" >Change</a><br /></p>';
		$response .='<p><audio src="../audio/tutors/'.$new_name.'" controls="controls"></p>';
		$message = 'File uploaded.';
		$success = true;
    	}
	}
	
	$return_text = array('success' => $success, 'responseTxt' => $response, 'msg' => $message);
	echo json_encode($return_text);
}

