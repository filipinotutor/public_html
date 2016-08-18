<?php 
if(IsSet($_POST['deactivate']))	{
	$s_id = $_POST['deactivate_id'];
	$approvedids = $page_protect->delete_activate_user('n', $s_id);
		if(($approvedids)) //success
				{
					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected user deactivated.</div>';			
				}
		else
				{
					echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>There is an error in deactivating user.</div>';
				}
	}
		
if(isset($_GET['acc'])){	
	$x = $_GET['acc'];
		if($x === "f")
				{
					echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Account is not active.</div>';
				}
		if($x === "n")
				{
					echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Access denied.</div>';
				}
	}

if(isset($_POST['activate'])){
	
	$email = $_POST['a_email'];
	$user_id = $_POST['a_user_id'];
	$username = $_POST['a_username'];
	$tmppw = rand(10000,99999);
	$pw = md5($tmppw);
	$supervisor_id = $_POST['supervisor_id'];
	
	$msg ="Congratulations! <br /><br /><b>Please login here:</b><br /> 
	<a href='http://www.filipinotutor.com/login.php'>http://www.filipinotutor.com/login.php</a><br />
	<b>Username: </b> ".$username."<br />
	<b>password: </b> ".$tmppw."
	<br /><br />Make sure that you copy and secure your username and password. 
	<br /><br />Thank you very much and have a nice day.<br /><br /> - FilipinoTutor.com Admin";
	
	$subj ="FilipinoTutor.com : Account Activation";
	$emailed = $page_protect->email_notif($email,$msg,$subj,"true");

	if($emailed){
		// return true;
		$page_protect->update_user_info_ajax($user_id, "active", "y");
		$page_protect->update_user_info_ajax($user_id, "password", $pw);
		$page_protect->update_user_info_ajax($user_id, "username", $username);
		$page_protect->update_tutor_profile_ajax($user_id, "supervisor_id", $supervisor_id);
		$page_protect->update_tutor_profile_ajax($user_id, "tutor_type_id", 2);
		echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Success.</div>';
	}
	else{
		// return false;	
		echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Failed</div>';	
	}
}
?>							