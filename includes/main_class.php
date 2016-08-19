<?php
/************************************************************************

*************************************************************************/
header("Cache-control: private"); // //IE 6 Fix
// error_reporting (E_ALL); // this is only for testing

$root = $_SERVER['DOCUMENT_ROOT'];
include($root.'/vendor/autoload.php');


//require_once($_SERVER['DOCUMENT_ROOT']."/FilipinoTutor.com/includes/db_config.php"); // this path works on local server, change when on the production server
require_once("db_config.php"); // this path works on local server, change when on the production server

include($root.'/includes/user.php');

// new since version 1.92: storage of sessions in MySQL

if (USE_MYSQL_SESSIONS) {
	include_once("session_handler.php");

} else {
	session_start();
}

class Main_Class {

	var $table_name = USER_TABLE;
	var $supervisor_page = SUPERVISOR_PAGE;
	var $tutor_page = TUTOR_PAGE;
	var $user;
	var $user_pw;
	var $user_full_name;
	var $user_info;
	var $user_email;
	var $save_login = "yes";
	var $cookie_name = COOKIE_NAME;
	var $cookie_path = COOKIE_PATH;
	var $is_cookie;

	var $count_visit;

	var $id;
	var $language = "en"; // change this property to use messages in another language
	var $the_msg;
	var $auto_activation; // use this variable in your login script
	var $send_copy = true; // send a mail copy (after activation) to the administrator

	var $webmaster_mail = WEBMASTER_MAIL;
	var $webmaster_name = WEBMASTER_NAME;
	var $admin_mail = ADMIN_MAIL;
	var $admin_name = ADMIN_NAME;

	var $id_for_applicant_to_tutor;
	var $login_page = LOGIN_PAGE;
	var $main_page = START_PAGE;
	var $password_page = ACTIVE_PASS_PAGE;
	var $deny_access_page = DENY_ACCESS_PAGE;
	var $admin_page = ADMIN_PAGE;

	function Main_Class($redirect = true) {
		$this->connect_db();
		
		if (empty($_SESSION['logged_in'])) {
			$this->login_reader();
			if ($this->is_cookie) {
				$this->set_user($redirect);
			}
		}
		if (isset($_SESSION['user'], $_SESSION['pw'])) {
			$this->user = $_SESSION['user'];
			$this->user_pw = $_SESSION['pw'];
		}
	}
	// removed check for encoded var $this->user_pw
	// replaced in default case var $password with $this->user_pw
	// added MD5 to sql statement for "new_pass"
	function check_user($pass = "") {
		switch ($pass) {
			case "email":
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE email = %s", $this->table_name, $this->ins_string($this->user_email));
			break;
			case "username":
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE username = %s", $this->table_name, $this->ins_string($this->user));
			break;
			case "lost":
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE email = %s AND active = 'y'", $this->table_name, $this->ins_string($this->user_email));
			break;
			// new login name based check before new password activation
			case "new_pass":
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE MD5(CONCAT(username, %s)) = %s", $this->table_name, $this->ins_string(SECRET_STRING), $this->ins_string($this->check_user));
			break;
			case "active":
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE user_id = %d AND active = 'n'", $this->table_name, $this->id);
			break;
			case "validate":
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE user_id = %d AND tmp_mail <> ''", $this->table_name, $this->id);
			break;
			default:
			$sql = sprintf("SELECT COUNT(*) AS test FROM %s WHERE BINARY username = %s AND password = %s AND active = 'y'", $this->table_name, $this->ins_string($this->user), $this->ins_string($this->user_pw));
		}
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_result($result, 0, "test") >= 1) {
			return true;
		} else {
			return false;
		}
	}
	// New methods to handle the access level
	function get_access_level() {
		$sql = sprintf("SELECT access_level FROM %s WHERE username = %s AND active = 'y'", $this->table_name, $this->ins_string($this->user));
		if (!$result = mysql_query($sql)) {
		   $this->the_msg = $this->messages(14);
		} else {
			return mysql_result($result, 0, "access_level");
		}
	}
	function set_user($goto_page) {
		$_SESSION['user'] = $this->user;
		$_SESSION['pw'] = $this->user_pw;
		$_SESSION['logged_in'] =  time(); // to offer a time limited access (later)

		if (!empty($_SESSION['referer'])) {
			$next_page = $_SESSION['referer'];
			unset($_SESSION['referer']);
		} else {
			$next_page = $this->main_page;
			$access_level=$this->get_access_level();
			if($access_level==10)
			{
				$next_page=ADMIN_PAGE;
			}
			if($access_level==9)
			{
				$next_page=SUPERVISOR_PAGE;
			}
			if($access_level==2)
			{
				$next_page=TUTOR_PAGE;
			}
			if($access_level==1)
			{
				$next_page=STUDENT_PAGE;
			}

		}
		//redirect here
		//echo "NEXT: ".$next_page;
		
		if ($goto_page) {
			header("Location: ".$next_page);
			exit;
		}
	}
	function connect_db() {
		// $conn_str = mysql_connect(DB_SERVER, "root", "");
		$conn_str = mysql_connect("localhost", "filipino_tutor", "NdZVnxahGIhZ");
		mysql_select_db(DB_NAME); // if there are problems with the tablenames inside the config file use this row
	}
	// added md5 to var $password
	// changed argument for req_visit to $this->user_pw
	function login_user($user, $password) {
		if ($user != "" && $password != "") {
			$this->user = $user;
			$this->user_pw = md5($password);
			if ($this->check_user()) {
				$this->login_saver();
				if ($this->count_visit) {
					$this->reg_visit($user, $this->user_pw);
				}
				$this->set_user(true);
			} else {
				$this->the_msg = $this->messages(10);
			}
		} else {
			$this->the_msg = $this->messages(11);
		}
	}
	function login_saver() {
		if ($this->save_login == "no") {
			if (isset($_COOKIE[$this->cookie_name])) {
				$expire = time()-3600;
			} else {
				return;
			}
		} else {
			$expire = time()+2592000;
		}
		$cookie_str = $this->user.chr(31).base64_encode($this->user_pw);
		setcookie($this->cookie_name, $cookie_str, $expire, $this->cookie_path);
	}
	function login_reader() {
		if (isset($_COOKIE[$this->cookie_name])) {
			$cookie_parts = explode(chr(31), $_COOKIE[$this->cookie_name]);
			$this->user = $cookie_parts[0];
			$this->user_pw = base64_decode($cookie_parts[1]);
			if ($this->check_user()) {
				$this->is_cookie = true;
			} else {
				unset($this->user);
				unset($this->user_pw);
			}
		}
	}
	// removed the md5 from var $pass
	function reg_visit($login, $pass) {
		$visit_sql = sprintf("UPDATE %s SET extra_info = '%s' WHERE username = %s AND pw = %s", $this->table_name, date("Y-m-d H:i:s"), $this->ins_string($login), $this->ins_string($pass));
		mysql_query($visit_sql);
	}
	function log_out() {
		unset($_SESSION['user']);
		unset($_SESSION['pw']);
		unset($_SESSION['logged_in']);
		session_destroy(); // new in version 1.92
		//header("Location: ".LOGOUT_PAGE);
		$this->redirect(LOGOUT_PAGE);
		exit;
	}
	function access_page($refer = "", $qs = "", $level = DEFAULT_ACCESS_LEVEL) {
		$refer_qs = $refer;
		$refer_qs .= ($qs != "") ? "?".$qs : "";
		if (!$this->check_user()) {
			$_SESSION['referer'] = $refer_qs;
			header("Location: ".$this->login_page);
			exit;
		}
		if ($this->get_access_level() != $level) {
			header("Location: ".$this->deny_access_page);
			exit;
		}
	}

	function get_tutor_conversions_count($uid,$stat,$filter) {
		if($stat != "") {
			$query_get = 'SELECT COUNT(report_id) FROM classhistory  WHERE '.$filter.' AND status = "'.$stat.'" AND tutor = "'.$uid.'"';
		} else {
			$query_get = 'SELECT COUNT(report_id) FROM classhistory  WHERE '.$filter.' AND tutor = "'.$uid.'"';
		}

		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
			return $row_get[0];
		} else {
			return "0";
		}
	}


	function conversion_val_update($value){
		$sql = 'UPDATE adminsettings SET conversionsvalue ='.$value;

		$res = MySQL_query($sql);

		return true;
	}

	function get_user_info() {
		$sql_info = sprintf("SELECT first_name, last_name, email, user_id, username, password, skype_id, gender, access_level FROM %s WHERE username = %s AND password = %s", $this->table_name, $this->ins_string($this->user), $this->ins_string($this->user_pw));
		$res_info = mysql_query($sql_info);
		$this->user_id = mysql_result($res_info, 0, "user_id");
		$this->username = mysql_result($res_info, 0, "username");
		$this->password = mysql_result($res_info, 0, "password");
		$this->user_first_name = mysql_result($res_info, 0, "first_name");
		$this->user_last_name = mysql_result($res_info, 0, "last_name");
		$this->user_email = mysql_result($res_info, 0, "email");
		$this->user_skype_id = mysql_result($res_info, 0, "skype_id");
		$this->user_gender = mysql_result($res_info, 0, "gender");
		$this->user_al = mysql_result($res_info, 0, "access_level");
	}

	function get_user_id() {
		$sql = "SELECT user_id FROM users WHERE username = '". $_SESSION['user'] ."' LIMIT 1 ";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);
		return $row['user_id'];
	}

	function get_fullname($id) {
		$sql_info = sprintf("SELECT * FROM users WHERE user_id =$id");
		$res_info = mysql_query($sql_info);
		$this->fname = 	mysql_result($res_info, 0, "first_name");
		$this->lname = 		mysql_result($res_info, 0, "last_name");
	}

	function get_materials_info($MatId) {
		$sql_info = sprintf("SELECT * FROM materials WHERE material_id = ".$MatId." ORDER BY material_order ASC");
		$res_info = mysql_query($sql_info);
		$this->m_title = mysql_result($res_info, 0, "title");
		$this->m_content = mysql_result($res_info, 0, "content");
	}
	
	//-------------------------------------updated (july 10 2014)--------------------------------------
	function identify_who($id) {
		$sql = 'SELECT student_id FROM students WHERE student_id = $id';
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
				return "student";
		}
		$sql2 = 'SELECT tutor_id FROM tutors WHERE tutor_id = $id';
		$res=mysql_query($sql2) or die(mysql_error());

 			if($res)
		{
				return "tutor";
		}

	}


	function applicant_to_tutor($id, $supervisor_id)
{
	$sql = sprintf("SELECT * FROM applicants WHERE applicant_id = ".$id."");
	$res = mysql_query($sql) or die(MySqL_Error());

	$fname 			= 	MySQL_Result($res,0,"first_name");
	$lname			=	MySQL_Result($res,0,"last_name");
	$gen			=	MySQL_Result($res,0,"gender");
	$skype			=	MySQL_Result($res,0,"skype");
	$email			=	MySQL_Result($res,0,"email");
	$mobile			=	MySQL_Result($res,0,"mobile");
	$bday			=	MySQL_Result($res,0,"birthday");
	$lev			=	MySQL_Result($res,0,"level");
	$school			=	MySQL_Result($res,0,"school");
	$att			=	MySQL_Result($res,0,"attending");
	$t_exp			=	MySQL_Result($res,0,"teaching_exp");
	$s_intro		=	addslashes(MySQL_Result($res,0,"self_intro"));
	$f = str_split($fname);
	$l = str_split($lname);
	$id = $this->get_last_user_id();
	$id += 1;
	$pass = md5("12345");
	$username 	= $f[0].''.$l[0].''.date("mY").''.$id;

	$sql = sprintf("INSERT INTO users(`user_id`,`username`,`password`,`first_name`,`last_name`,`email`,`gender`,`skype_id`,`access_level`,`active`)
							VALUES ($id,'".$username."', '".$pass."', '".$fname."', '".$lname."', '".$email."', '".$gen."' , '".$skype."', 2, 'y' ) ");
	$ins_res=mysql_query($sql) or die("Error in user:".mysql_error());

	$sql = sprintf("INSERT INTO tutors(`tutor_id`,`nick_name`,`phone`,`birthday`,`ed_level`,`school`,`teaching_exp`,`self_intro`,`photo`, `supervisor_id`)
							VALUES (".$id.",'".$fname."','".$mobile."','".$bday."','".$lev."','".$school."','".$t_exp."','".$s_intro."','../pictures/noimg.gif',".$supervisor_id.") ");
	$res=mysql_query($sql) or die("Error in tutor:".mysql_error());
	
	//return true;

		if($res){
			$msg ="Congratulation! You've passed your training.\n <br /><br /><b>Please login here:</b><br /> 
			<a href='http://www.filipinotutor.com/login.php'>http://www.filipinotutor.com/login.php</a><br />
			<b>Username:</b>".$username."<br />
			<b>password:</b>12345
			<br /><br />Make sure that you copy and secure your username and password. 
			<br /><br />Thank you very much and have a nice day.<br /><br /> - FilipinoTutor.com Admin";
			
			$subj ="FilipinoTutor.com : Training Result";
			$emailed = $this->email_notif($email,$msg,$subj,"true");
				if($emailed){
					return true;
				}
				else{
					return false;
				}
			}
		else{
			return false;
		}
	}
function email_notif($mail_address, $msg, $subj, $send_admin) {
		if (USE_PHP_MAILER) {
			$mail = new PHPMailer();
			if (PHP_MAILER_SMTP) {
				$mail->IsSMTP();
				$mail->Host = SMTP_SERVER;
				$mail->SMTPAuth = true;
				$mail->Username = SMTP_LOGIN;
				$mail->Password = SMTP_PASSWD;
			} else {
				$mail->IsSendmail();
			}
			$mail->From = $this->webmaster_mail;
			$mail->FromName = $this->webmaster_name;
			$mail->AddAddress($mail_address);
			if ($send_admin) $mail->AddBCC(ADMIN_MAIL);
			$mail->Subject = $subj;
			$mail->Body = $msg;
			if($mail->Send()) {
				return true;
			} else {
				return false;
			}
		} else {
			//	$header = "From: \"".$this->webmaster_name."\" <".$this->webmaster_mail.">\n";
			$headers = 'From: admin@filipinotutor.com' . "\r\n" .
			'Reply-To: admin@filipinotutor.com' . "\r\n";
			
			if ($send_admin) $header .= "Bcc: ".ADMIN_MAIL."\n";
			$header .= "MIME-Version: 1.0\n";
			$header .= "Content-Type: text/plain; charset=UTF-8\n";
			$header .= "Content-Transfer-Encoding: 7bit\n";
			if (mail($mail_address, $subj, $msg, $header)) {
				return true;
			} else {
				return false;
			}
		}
	}

    function get_last_user_id(){
		$sql  = sprintf("SELECT `user_id` FROM users ORDER BY `user_id` DESC");
		$res = MySQL_Query($sql) or die("Error in last id: ".MySqL_Error());
		$id  = MySQL_Result($res,0,"user_id");
		return $id;
	}


	function student_info_for_sup($student_id) {
		$sql_info = sprintf("SELECT first_name, last_name, email, skype_id, gender FROM users WHERE user_id = $student_id ");
		$result = mysql_query($sql_info);

		if (mysql_num_rows($result)) {
    	$result = mysql_fetch_assoc($result);
    	$this->student_first_name= $result['first_name'];
		$this->student_last_name = $result['last_name'];
		$this->student_email = $result['email'];
		$this->student_skype_id = $result['skype_id'];
		$this->student_gender = $result['gender'];

		$sql= sprintf("SELECT * FROM students WHERE student_id = $student_id ");
		$res =  mysql_query($sql);
		$this->student_nick_name = 	mysql_result($res, 0, "nick_name");
		$this->student_phone = 		mysql_result($res, 0, "phone");
		$this->student_photo = 		mysql_result($res, 0, "photo");
		$this->student_birthday = 	mysql_result($res, 0, "birthday");


		}
	}
	function app_info_for_sup($app_id){
		$sql_info =sprintf("SELECT * FROM applicants WHERE applicant_id = $app_id");
		$res_info = mysql_query($sql_info);
		$this->app_phone 		= 	mysql_result($res_info, 0, "mobile");
		$this->app_self_intro 	= 	mysql_result($res_info, 0, "self_intro");
		$this->app_school 		= 	mysql_result($res_info, 0, "school");
		$this->app_birthday 	= 	mysql_result($res_info, 0, "birthday");
		$this->app_gender	 	= 	mysql_result($res_info, 0, "gender");
		$this->app_skype	 	= 	mysql_result($res_info, 0, "skype");
		$this->app_attending 	= 	mysql_result($res_info, 0, "attending");
		$this->app_teaching_exp = 	mysql_result($res_info, 0, "teaching_exp");
		$this->app_ed_level		= 	mysql_result($res_info, 0, "level");
		$this->app_first_name 	= 	mysql_result($res_info, 0, "first_name");
		$this->app_last_name 	= 	mysql_result($res_info, 0, "last_name");
		$this->app_email		= 	mysql_result($res_info, 0, "email");
		$this->app_id 			=	$app_id;

	}
		function tutor_info_for_sup($tutor_id) {
		$sql_info = sprintf("SELECT * FROM tutors WHERE tutor_id =$tutor_id");
		$res_info = mysql_query($sql_info);
		$res_info = mysql_fetch_array($res_info);
		$this->tutor_nick_name = 	$res_info["nick_name"];
		$this->tutor_phone = 		$res_info["phone"];
		$this->tutor_photo = 		$res_info["photo"];
		$this->tutor_hobby = 		$res_info["hobby"];
		$this->tutor_self_intro = 	$res_info["self_intro"];
		$this->tutor_school = 		$res_info["school"];
		$this->tutor_birthday = 	$res_info["birthday"];
		$this->tutor_attending = 	$res_info["attending"];
		$this->tutor_teaching_exp = $res_info["teaching_exp"];
		$this->tutor_ed_level = 	$res_info["ed_level"];
		$this->tutor_bank_name 	= 	$res_info["bank_name"];
		$this->tutor_bank_branch = 	$res_info["bank_branch"];
		$this->tutor_accnt_name = 	$res_info["accnt_name"];
		$this->tutor_accnt_number = $res_info["accnt_number"];
		$this->tutor_access	 = 		$res_info["access"];
		$this->allow_teach_trial = 	$res_info["allow_teach_trial"];
		$this->tutor_audio = 		$res_info["audio"];
		$this->tutor_rate = 		$res_info["rate"];


		$sql_info = sprintf("SELECT * FROM users WHERE user_id =$tutor_id");
		$res_info = mysql_query($sql_info);
		$res_info = mysql_fetch_array($res_info);
		$this->tutor_id 		= 	$tutor_id;
		$this->tutor_username 	= 	$res_info["username"];
		$this->tutor_first_name = 	$res_info["first_name"];
		$this->tutor_last_name 	= 	$res_info["last_name"];
		$this->tutor_gender 	= 	$res_info["gender"];
		$this->tutor_email 		= 	$res_info["email"];
		$this->tutor_skype_id 	= 	$res_info["skype_id"];
	}

	function update_user($new_password, $new_confirm, $new_mail) {
		if ($new_password != "") {
			if ($this->check_new_password($new_password, $new_confirm)) {
				$ins_password = md5($new_password);
				$update_pw = true;
			} else {
				return;
			}
		} else {
			$ins_password = $this->user_pw;
			$update_pw = false;
		}
		if (trim($new_mail) <> $this->user_email) {
			if  ($this->check_email($new_mail)) {
				$this->user_email = $new_mail;
				if (!$this->check_user("lost")) {
					$update_email = true;
				} else {
					$this->the_msg = $this->messages(31);
					return;
				}
			} else {
				$this->the_msg = $this->messages(16);
				return;
			}
		} else {
			$update_email = false;
			$new_mail = "";
		}
		$upd_sql = sprintf("UPDATE %s SET password = %s, tmp_mail = %s WHERE user_id = %d",
			$this->table_name,
			$this->ins_string($ins_password),
			$this->ins_string($new_name),
			$this->id);
		$upd_res = mysql_query($upd_sql);
		if ($upd_res) {
			if ($update_pw) {
				$_SESSION['pw'] = $this->user_pw = $ins_password;
				if (isset($_COOKIE[$this->cookie_name])) {
					$this->save_login = "yes";
					$this->login_saver();
				}
			}
			$this->the_msg = $this->messages(30);
			if ($update_email) {
				if ($this->send_mail($new_mail, 33)) {
					$this->the_msg = $this->messages(27);
				} else {
					mysql_query(sprintf("UPDATE %s SET tmp_mail = ''", $this->table_name));
					$this->the_msg = $this->messages(14);
				}
			}
		} else {
			$this->the_msg = $this->messages(15);
		}
	}
	function check_new_password($pass, $pw_conform) {
		if ($pass == $pw_conform) {
			if (strlen($pass) >= PW_LENGTH) {
				return true;
			} else {
				$this->the_msg = $this->messages(32);
				return false;
			}
		} else {
			$this->the_msg = $this->messages(38);
			return false;
		}
	}
	function create_supervisor($first,$last,$user,$nick,$gen,$pass,$email,$skype,$bday,$phone)
	{
		$result = "";
		if(!empty($first) &&
			!empty($last) &&
			!empty($user) &&
			!empty($nick) &&
			!empty($gen) &&
			!empty($pass) &&
			!empty($email) &&
			!empty($skype) &&
			!empty($phone) &&
			!empty($bday))
		{
			$res = $this->check_email($email);
			if(!$res){
				$result .= 	'<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Error in email.</div>';
			}
			$res = $this->user_check($user);

			if($res){
				$result .= 	'<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Username is already taken.</div>';
			}

			if($result == ""){

				$sql = "INSERT INTO users(`user_id`,`username`,`password`,`first_name`,`last_name`,`email`,`skype_id`,`access_level`,`active`,`gender`)
									VALUES(NULL,'".$user."','".$pass."','".$first."','".$last."','".$email."','".$skype."','9','y','".$gen."')
						";
				$res_info=MySQL_Query($sql) or die("SQL ERROR: (QUERY) - ".MySqL_Error());
				if($res_info){
					$sql = "SELECT user_id FROM users WHERE username = '".$user."'";
					$res_info=MySQL_Query($sql) or die("SQL ERROR: (QUERY) - ".MySqL_Error());
					$supid = MySQL_Result($res_info,0,'user_id');

					$sql = "INSERT INTO supervisors(`supervisorid`,`birthday`,`nick_name`,`photo`,`phone`)
										VALUES('".$supid."','".$bday."','".$nick."','../pictures/noimg.gif','".$phone."')
							";
					$res_info=MySQL_Query($sql) or die("SQL ERROR: (QUERY) - ".MySqL_Error());

					if($res_info){
					$result .= '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Supervisor Created.</div>';
			 		}
				}
			}
		}
		else
		{
				$result .= '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please complete the form.</div>';
		}
		return $result;
	}
function user_check($user){
	$sql = "SELECT COUNT(*) AS test FROM users WHERE username = '".$user."'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_result($result, 0, "test") >= 1) {
			return true;
		} else {
			return false;
		}

}
	function check_email($mail_address) {
		if (preg_match("/^[0-9a-z]+(([\.\-_])[0-9a-z]+)*@[0-9a-z]+(([\.\-])[0-9a-z-]+)*\.[a-z]{2,4}$/i", $mail_address)) {
			return true;
		} else {
			return false;
		}
	}
	function ins_string($value) {
		if (preg_match("/^(.*)(##)(int|date|eu_date)$/", $value, $parts)) {
			$value = $parts[1];
			$type = $parts[3];
		} else {
			$type = "";
		}
		$value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;
		switch ($type) {
			case "int":
			$value = ($value != "") ? intval($value) : NULL;
			break;
			case "eu_date":
			$date_parts = preg_split ("/[\-\/\.]/", $value);
			$time = mktime(0, 0, 0, $date_parts[1], $date_parts[0], $date_parts[2]);
			$value = strftime("'%Y-%m-%d'", $time);
			break;
			case "date":
			$value = "'".preg_replace("/[\-\/\.]/", "-", $value)."'";
			break;
			default:
			$value = ($value != "") ? "'" . $value . "'" : "''";
		}
		return $value;
	}

	function register_user($first_login, $first_name, $last_name, $first_email, $confirm_email, $first_password, $confirm_password, $gender, $skypeid) {
		if ($this->check_new_password($first_password, $confirm_password)) {
			if (strlen($first_login) >= LOGIN_LENGTH) {
				if ($this->check_email($first_email)) {
					$this->user_email = $first_email;
					$this->user = $first_login;
					if ($this->check_user("email")) {
						$this->the_msg = $this->messages(12);
						return;
					} else {
						if ($this->check_user("username")) {
							$this->the_msg = $this->messages("username");
							return;
						} else {
							$sql = sprintf("INSERT INTO %s (user_id, username, password, first_name, last_name, email, gender, skype_id, access_level, active) VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %d, 'n')",
								$this->table_name,
								$this->ins_string($first_login),
								$this->ins_string(md5($first_password)),
								$this->ins_string($first_name),
								$this->ins_string($last_name),
								$this->ins_string($this->user_email),
								$this->ins_string($gender),
								$this->ins_string($skypeid),
								DEFAULT_ACCESS_LEVEL);

							$ins_res = mysql_query($sql) or die(mysql_error());
							if ($ins_res) {
								$this->id = mysql_insert_id();
								$this->user_pw = md5($first_password);
								
								/* send student registration email */
								if ($this->send_mail($this->user_email, 29, 28)) {
									$this->the_msg = $this->messages(13);
								} else {
									mysql_query(sprintf("DELETE FROM %s WHERE user_id = %d", $this->table_name, $this->id));
									$this->the_msg = $this->messages(14);
								}
							} else {
								$this->the_msg = $this->messages(15);
							}
						}
					}
				} else {
					$this->the_msg = $this->messages(16);
				}
			} else {
				$this->the_msg = $this->messages(17);
			}
		}
	}


	function validate_email($validation_key, $key_id) {
		if ($validation_key != "" && strlen($validation_key) == 32 && $key_id > 0) {
			$this->id = $key_id;
			if ($this->check_user("validate")) {
				$upd_sql = sprintf("UPDATE %s SET email = tmp_mail, tmp_mail = '' WHERE id = %d AND MD5(pw) = %s", $this->table_name, $key_id, $this->ins_string($validation_key));
				if (mysql_query($upd_sql)) {
					$this->the_msg = $this->messages(18);
				} else {
					$this->the_msg = $this->messages(19);
				}
			} else {
				$this->the_msg = $this->messages(34);
			}
		} else {
			$this->the_msg = $this->messages(21);
		}
	}
	// upd. version 1.97 only activate status active = 'n', update the database table:
	// ALTER TABLE `users` CHANGE `active` `active` ENUM( 'y', 'n', 'b' ) DEFAULT 'n' NOT NULL
	function activate_account($activate_key, $key_id) {
		if ($activate_key != "" && strlen($activate_key) == 32 && $key_id > 0) {
			$this->id = $key_id;
			if ($this->check_user("active")) {
				if ($this->auto_activation) {
					$upd_sql = sprintf("UPDATE %s SET active = 'y' WHERE user_id = %d AND MD5(password) = %s AND active = 'n'", $this->table_name, $key_id, $this->ins_string($activate_key));

					// create 2 free credits

					$currdate = date("Y-m-d H:i:s", time());
					//$expiration=$currdate+30;
					$expiration=date('Y-m-d H:i:s', strtotime("+30 days"));
					$this->insert_student_credit($key_id, $credit_value=2, $expiration, $currdate, $status=1, 4);

					if (mysql_query($upd_sql)) {
						if ($this->send_confirmation($key_id)) {
								$this->email_notif_users(1,$key_id,$key_id);
								$insert = "INSERT INTO students (`student_id`,`photo`,`nick_name`,`phone`) VALUES (".$key_id.",'../pictures/noimg.gif','MyNickname','1234567890')";
								MySQL_query($insert) or die(MySQL_Error());

							$this->get_admin();
							$this->create_notification($this->admin_id, "new student", $key_id, "Newly Registered Student");
							$this->create_notification($key_id, "welcome note", $key_id, "welcome note");
							$this->the_msg = $this->messages(18);
						} else {
							$this->the_msg = $this->messages(14);
						}
					} else {
						$this->the_msg = $this->messages(19);
					}
				} else {
					if ($this->send_mail($this->admin_mail, 40, 39)) {
						$this->the_msg = $this->messages(36);
					} else {
						$this->the_msg = $this->messages(14);
					}
				}
			} else {
				$this->the_msg = $this->messages(20);
			}
		} else {
			$this->the_msg = $this->messages(21);
		}
	}
	function forgot_password($forgot_email) {
		if ($this->check_email($forgot_email)) {
			$this->user_email = $forgot_email;
			if (!$this->check_user("lost")) {
				$this->the_msg = $this->messages(22);
			} else {
				// changed from pw to login for verification string
				$forgot_sql = sprintf("SELECT username FROM %s WHERE email = %s", $this->table_name, $this->ins_string($this->user_email));
				if ($forgot_result = mysql_query($forgot_sql)) {
					$this->user = mysql_result($forgot_result, 0, "username");
					if ($this->send_mail($this->user_email, 35, 26)) {
						$this->the_msg = $this->messages(23);
					} else {
						$this->the_msg = $this->messages(14);
					}
				} else {
					$this->the_msg = $this->messages(15);
				}
			}
		} else {
			$this->the_msg = $this->messages(16);
		}
	}
	function check_activation_password($controle_str) {
		if ($controle_str != "" && strlen($controle_str) == 32) {
			$this->check_user = $controle_str;
			if ($this->check_user("new_pass")) {
				// this is a fix for version 1.76
				// we need this login name that teh user will remember the name too
				$sql_get_user = sprintf("SELECT username FROM %s WHERE MD5(CONCAT(username, %s)) = %s", $this->table_name, $this->ins_string(SECRET_STRING), $this->ins_string($this->check_user));
				$get_user = mysql_query($sql_get_user);
				$this->user = mysql_result($get_user, 0, "username"); // end fix
				return true;
			} else {
				$this->the_msg = $this->messages(21);
				return false;
			}
		} else {
			$this->the_msg = $this->messages(21);
			return false;
		}
	}
function activate_new_password($new_pass, $new_confirm, $verif_str) {
		if ($this->check_new_password($new_pass, $new_confirm)) {
			// new password is set based on user name now
			$sql_new_pass = sprintf("UPDATE %s SET password = '%s' WHERE MD5(CONCAT(username, %s)) = %s", $this->table_name, md5($new_pass), $this->ins_string(SECRET_STRING), $this->ins_string($verif_str));
			if (mysql_query($sql_new_pass)) {
				$this->the_msg = $this->messages(30);
				return true;
			} else {
				$this->the_msg = $this->messages(14);
				return false;
			}
		} else {
			return false;
		}
	}

		function send_confirmation($id) {
		$sql = sprintf("SELECT first_name, email FROM %s WHERE user_id = %d", $this->table_name, $id);
		$res = mysql_query($sql);
		$user_email = mysql_result($res, 0, "email");
		$this->user_full_name = mysql_result($res, 0, "first_name");
		if ($this->user_full_name == "") $this->user_full_name = "User"; // change "User" to whatever you want, it's just a default name
		if ($this->send_mail($user_email, 37, 24, $this->send_copy)) {
			return true;
		} else {
			return false;
		}
	}
	// new in version 1.99 support for phpmailer as alternative mail program
	function send_mail($mail_address, $msg = 29, $subj = 28, $send_admin = false) {
		
		$subject = $this->messages($subj);
		$body = $this->messages($msg);
		$isSent = false;
		$header = "";

		if (USE_PHP_MAILER) {
			$mail = new PHPMailer();
			if (PHP_MAILER_SMTP) {
				$mail->IsSMTP();
				$mail->Host = SMTP_SERVER;
				$mail->SMTPAuth = true;
				$mail->Username = SMTP_LOGIN;
				$mail->Password = SMTP_PASSWD;
			} else {
				$mail->IsSendmail();
			}
			$mail->From = $this->webmaster_mail;
			$mail->FromName = $this->webmaster_name;
			$mail->AddAddress($mail_address);
			if ($send_admin) $mail->AddBCC(ADMIN_MAIL);
			$mail->Subject = $subject;
			$mail->Body = $body;
			if($mail->Send()) {
				$isSent = true;
			} else {
				$isSent = false;
			}
		} else {
			//$header = "From: \"".$this->webmaster_name."\" <".$this->webmaster_mail.">\n";
			$headers = 'From: admin@filipinotutor.com' . "\r\n" .
			'Reply-To: admin@filipinotutor.com' . "\r\n";
	
			if ($send_admin) 
			{	$header .= "Bcc: ".ADMIN_MAIL."\n";
				$header .= "MIME-Version: 1.0\n";
				$header .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
				$header .= "Content-Transfer-Encoding: 7bit\n";
			}

			$isSent = mail($mail_address, $subject, $body, $header);
		}

		$body = mysql_real_escape_string($body);
		$subject = mysql_real_escape_string($subject);
		$header = mysql_real_escape_string($header);

		$datetime = date("Y-m-d h:m:s");

		$query = "INSERT INTO email_logs(e_message, e_subject, e_recipient, e_sender, e_header, isSent, timestamps) 
					  VALUES('".$body."', '".$subject."', '".$mail_address."', '".$this->admin_mail."', '".mysql_real_escape_string($header)."', '$isSent', '".$datetime."')";

		mysql_query($query) or die(mysql_error());

		return $isSent;
	}

	function get_email_logs(){
		$q = 'SELECT * FROM email_logs WHERE isSent = 0';
		$res = MySQL_query($q) or die(mysql_error());

		return $res;
	}
	
	//gmlainez@radixsys.com
	// $Bimbo@601

	// message no. 35 is changed because the verification string based in the user name now
	function messages($num) {
		$host = "http://".$_SERVER['HTTP_HOST'];
		switch ($this->language) {

			case "fr":

			$msg[26] = "Votre adresse email est modifiée.";
			break;
			default:
			$msg["username"] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, username already exist.</div>';
			$msg[10] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Login and/or password did not match to the database.</div>';
			$msg[11] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Login and/or password is empty!</div>';
			$msg[12] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, a user with this e-mail address already exist.</div>';
			$msg[13] = '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Please check your e-mail and follow the instructions.</div>';
			$msg[14] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, an error occurred please try it again.</div>';
			$msg[15] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, an error occurred please try it again later.</div>';
			$msg[16] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>The e-mail address is not valid.</div>';
			$msg[17] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>The field username (min. '.LOGIN_LENGTH.' char.) is required.</div>';
			$msg[18] = 'Your request is processed. Login to continue.';
			$msg[19] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, cannot activate your account.</div>';
			$msg[20] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>There is no account to activate.</div>';
			$msg[21] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, this activation key is not valid!</div>';
			$msg[22] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, there is no active account which match with this e-mail address.</div>';
			$msg[23] = '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Please check your e-mail to get your new password.</div>';
			
			/* student register - email subject on account activation */
			$msg[24] = 'Your account is activated.';
			
			$msg[25] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Sorry, cannot activate your password.</div>';
			$msg[26] = "Your forgotten password...";
			$msg[27] = '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Please check your e-mail and activate your modification(s).</div>';
			
			/* student register - email subject on registration */
			$msg[28] = "Welcome to FilipinoTutor.com";
			
			/* $msg[29] = "Hello,\r\n\r\nto activate your request click the following link:\r\n".$host.$this->login_page."?ident=".$this->id."&activate=".md5($this->user_pw)."&language=".$this->language."\r\n\r\nkind regards\r\n".$this->admin_name;
			*/

			$registeremail = "<p>以下のリンクをクリックしてアカウントを作動して下さい:<br />".$host.$this->login_page."?ident=".$this->id."&activate=".md5($this->user_pw)."&language=".$this->language."</p>";
			
			/* japanese email */
			
			$japmsg = "<p>生徒の皆様へ：<br /><br /></p>
			<p>FilipinoTutor.com Incへようこそ。私たちのプログラムを登録して下さり有難うございます。 スカイプでマンツーマンでお会いできるのを楽しみにしています。<br /><br /></p>
			<p>Filipino tutor Incでは、私たちのレッスンに満足して頂けるように最善をつくします。あなた の学習目標に届くように、熱心に教えます。<br /><br /></p>
			<p>Filipino Tutor Incは、あなたの英語学習をサポートするために、価値のあるレッスンとその他<br /><br /></p>
			<p>の財産を供給します。私たちのオフィスとチューターは全ての生徒さんが私たちの提供する全 ての教育の機会を得ることができるよう最善を尽くします。<br /><br /></p>
			<p>もし何かご不明な点があったり、詳細が必要な場合は、お気軽にいつでもご連絡下さい。す ぐにお返事致します。<br /><br /></p>
			<p>ようこそ、そしてあなたがこのコミュニティーの一員となれることを大変嬉しく思っていま す。<br /><br /></p>".$registeremail."
			<p>FilipinoTutor.com Incのスタッフ一同より</p>";
			
			$content = '';
			$content .= '<html>';
			$content .= '<body>';
			$content .= '<table align="center" width="650" border="0" cellpadding="8" cellspacing="8" style="font-family:Calibri, Helvetica, sans-serif; border:1px solid #317bd0;">';
			$content .= '<tr>';
			$content .= '<th colspan="4" style="background:#317bd0;" align="left">WELCOME to FilipinoTutor.com!</th>';
			$content .= '</tr>';
			$content .= '<tr>';
			$content .= '<td>'.$japmsg.'</td>';
			$content .= '</tr>';
			$content .= '</table>';
			$content .= '</body>';
			$content .= '</html>';

			$msg[29] = $content;
			$msg[30] = '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Your account is modified.</div>';
			$msg[31] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>This e-mail address already exist, please use another one.</div>';
			$msg[32] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>The field password (min. '.PW_LENGTH.' char) is required.</div>';
			$msg[33] = "Hello,\r\n\r\nthe new e-mail address must be validated, click the following link:\r\n".$host.$this->login_page."?id=".$this->id."&validate=".md5($this->user_pw)."&language=".$this->language."\r\n\r\nkind regards\r\n".$this->admin_name;
			$msg[34] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>There is no e-mail address to validate.</div>';
			$msg[35] = "Hello,\r\n\r\nEnter your new password next, please click the following link to enter the form:\r\n".$host.$this->password_page."?activate=".md5($this->user.SECRET_STRING)."&language=".$this->language."\r\n\r\nkind regards\r\n".$this->admin_name;
			$msg[36] = "Your request is processed and is pending for validation by the admin. \r\nYou will get an e-mail if it's done.";
			
			/* student registration - email sent after student activated account */
			
			$actmsg = "Hello ".$this->user_full_name.",<br /><br/>The account is active and it's possible to login now. <br/><br/>Click on this link to access the login page:<br/>".$host.$this->login_page."<br /><br />kind regards\r\n".$this->admin_name;
			
			$content = "";
			$content .= '<html>';
			$content .= '<body>';
			$content .= '<table align="center" width="650" border="0" cellpadding="8" cellspacing="8" style="font-family:Calibri, Helvetica, sans-serif; border:1px solid #317bd0;">';
			$content .= '<tr>';
			$content .= '<th colspan="4" style="background:#317bd0;" align="left">Account is now activated!</th>';
			$content .= '</tr>';
			$content .= '<tr>';
			$content .= '<td>'.$actmsg.'</td>';
			$content .= '</tr>';
			$content .= '</table>';
			$content .= '</body>';
			$content .= '</html>';

			$msg[37] = $content;
			
			
			$msg[38] = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>The confirmation password does not match the password. Please try again.</div>';
			$msg[39] = "A new user...";
			$msg[40] = "There was a new user registration on ".date("Y-m-d").":\r\n\r\nClick here to enter the admin page:\r\n\r\n".$host.$this->admin_page."?login_id=".$this->id;
			$msg[41] = "Validate your e-mail address..."; // subject in e-mail
			$msg[42] = '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Your e-mail address is modified.</div>';	
		}
		return $msg[$num];
	}

	// fail-safe JS redirect
function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location=\'' . $url . '\';</script>');
    }else{
      header('Location: ' . $url);
      die();
    }
	}

function rangeMonth($datestr) {
    date_default_timezone_set(date_default_timezone_get());
    $dt = strtotime($datestr);
    $res['start'] = date('Y-m-d', strtotime('first day of this month', $dt));
    $res['end'] = date('Y-m-d', strtotime('last day of this month', $dt));
    return $res;
    }

  function rangeWeek($datestr) {
    date_default_timezone_set(date_default_timezone_get());
    $dt = strtotime($datestr);
    $res['start'] = date('N', $dt)==1 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('last monday', $dt));
    $res['end'] = date('N', $dt)==7 ? date('Y-m-d', $dt) : date('Y-m-d', strtotime('next sunday', $dt));
    return $res;
    }

/********************************start INSERTS--------------------------------------------------- */
function insert_schedule_tutor($tutor_id, $day, $month, $year, $time, $status, $approved)
	{
		$strtotime = strtotime($year.'-'.$month.'-'.$day);
		// Conversion date("Y-m-d H:i:s", $time);
		$sql = 'INSERT INTO schedules (schedule_id, time, day, month, year, fulldate, user_id, tutor_id, status) VALUES(NULL, "'.$time.'", "'.$day.'", "'.$month.'", "'.$year.'", "'.$strtotime.'", NULL,  '.$tutor_id.', "'.$status.'") '; //added fulldate
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			$query = 'SELECT schedule_id
					FROM schedules
					ORDER BY schedule_id DESC';
			$res = MySQL_Query($query) or die("Error in selecting schedule id: ".MySQL_Error());
			$this->email_notif_users(4,$tutor_id,MySQL_Result($res,0,"schedule_id"));
			return true;
		}
		else
		{
			return false;
		}
	}
function insert_applicant($firstname, $lastname, $gender, $skype, $email, $mobile, $birthday, $level, $school, $attending, $teaching_exp, $self_intro, $interview_time, $interviewdate, $resume)
	{
			$sql = 'INSERT INTO `applicants` (`applicant_id`, `first_name`, `last_name`, `gender`, `skype`, `email`, `mobile`, `birthday`, `level`, `school`, `attending`, `teaching_exp`, `self_intro`, `interview_time`, `status`,`interviewdate`,`resume`) VALUES (NULL, "'.$firstname.'", "'.$lastname.'", "'.$gender.'", "'.$skype.'", "'.$email.'", "'.$mobile.'", "'.$birthday.'", "'.$level.'", "'.$school.'", "'.$attending.'", "'.$teaching_exp.'", "'.$self_intro.'", "'.$interview_time.'", "new","'.$interviewdate.'" , "'.$resume.'") ';
			$ins_res=mysql_query($sql) or die(mysql_error());
			if($ins_res)
			{
				$query = "SELECT applicant_id FROM applicants ORDER BY applicant_id DESC";
				$result= MySQL_Query($query) or die("Error in Selecting Last Id of Applicant: ".MySQL_Error());
				$key_id = MySQL_Result($result,0,'applicant_id');
				$this->email_notif_users(2,false,$key_id);

				return true;
			}
			else
			{
				return false;
			}

	}
function insert_profile_student($pk, $name, $value)
	{
		$sql = 'INSERT INTO students (student_id, '.mysql_real_escape_string($name).') VALUES('.mysql_real_escape_string($pk).', "'.mysql_real_escape_string($value).'")';
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function insert_profile_tutor($pk, $name, $value)
	{
		$sql = 'INSERT INTO tutors (tutor_id, '.mysql_real_escape_string($name).') VALUES('.mysql_real_escape_string($pk).', "'.mysql_real_escape_string($value).'")';
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function insert_tutor_report($schedule_id, $material, $materials_covered, $attendance, $grammar, $pronunciation, $vocabulary, $listening, $reading, $vocabulary, $vocabulary_review, $remarks, $sched_tutor_id, $sched_date, $sched_time, $user_id )
	{
		$sql = 'INSERT INTO classhistory (`report_id`, `schedule_id`, `material`, `materials_covered`, `attendance`, `grammar`, `pronunciation`, `vocabulary`, `listening`, `reading`, `vocabulary_review`, `remarks`, `status`, `tutor`, `date`, `time`, `user_id`) VALUES(NULL, "'.$schedule_id.'", "'.$material.'", "'.$materials_covered.'", "'.$attendance.'", "'.$grammar.'", "'.$pronunciation.'", "'.$vocabulary.'", "'.$listening.'", "'.$reading.'", "'.$vocabulary_review.'", "'.$remarks.'", "new","'.$sched_tutor_id.'","'.$sched_date.'","'.$sched_time.'","'.$user_id.'") ';
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			$sql = 'UPDATE schedules SET report="yes" WHERE schedule_id='.mysql_real_escape_string($schedule_id);
			$ins_res=mysql_query($sql) or die(mysql_error());
			return true;
		}
		else
		{
			return false;
		}
	}
function insert_student_credit($student_id, $credit_value, $expiration, $date_paid, $status, $credit_type_id) //default 2 free credits
	{
		$sql = 'INSERT INTO studentcredits(`credit_id`, `student_id`, `credit_value`, `expiration`, `date_paid`, `status`,`credit_type_id`) VALUES
		(NULL, '.$student_id.', '.$credit_value.', "'.$expiration.'", "'.$date_paid.'", '.$status.', '.$credit_type_id.');';
		$ins_res=mysql_query($sql) or die("Error in insert_Student_credit: ".mysql_error() . " " . $sql);
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function insert_student_payment($student_id, $paypal_payment_id, $sale_id, $paypal_email, $amount_paid, $currdate)
	{
		$sql = 'INSERT INTO payments(`payment_id`, `student_id`, `paypal_payment_id`, `sale_id`, `paypal_email`, `amount_paid`, `payment_date`) VALUES (NULL, '.$student_id.', "'.$paypal_payment_id.'", "'.$sale_id.'", "'.$paypal_email.'", '.$amount_paid.', "'.$currdate.'")';
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res){
			return true;
			}else{
				return false;
				}
	}
function insert_credit_usage($credit_id, $sched_id, $status)
	{
		$sql = 'INSERT INTO credits_usage (credit_id, sched_id, status) VALUES('.$credit_id.', '.$sched_id.', "'.$status.'")';
		$ins_res=mysql_query($sql) or die("Error in insert_credit_usage: ".


			mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function create_credit($v,$p,$t,$d, $name, $description, $price_description, $credit_type){
	$sql = 'INSERT INTO credits (`id`,`credit_value`, `credit_price`,`duration`, `date`, `name`, `description`, `price_description`, `credit_type`) VALUES(NULL,'.$v.', '.$p.', "'.$t.'", "'.$d.'", "'.$name.'", "'.$description.'", "'.$price_description.'", "'.$credit_type.'")';
		$ins_res=mysql_query($sql) or die("Error in Creating Credits: ".mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
}

function global_insert($table_name, $columns, $values){
	$sql = "INSERT INTO ". $table_name ."(".$columns.") VALUES(".$values.")";
	$ins_res = mysql_query($sql) or die("Error in Creating ".$table_name.": " .mysql_error());
	if($ins_res){
		return $ins_res;
	}
	else{
		return false;
	}
}




/********************************end INSERTS--------------------------------------------------- */
/********************************start SELECTS***************************************************/
function get_active_tutor(){
	$sql = "SELECT  *
			FROM users
			WHERE active='y' AND access_level=2
	";
	$res =MySQL_query($sql) or die("Error in Selecting Available tutor- Query: ".MySQL_Error());
	$result = array();
	$x=0;
	while($row = MySQL_Fetch_Array($res)){
		$result['user_id'][$x] = $row['user_id'];
		$result['first_name'][$x] = $row['first_name'];
		$result['last_name'][$x] = $row['last_name'];
		$result['skype_id'][$x] = $row['skype_id'];
		$result['email'][$x] = $row['email'];
		$result['gender'][$x] = $row['gender'];
		$x++;
	}
	$result['count'][0] = $x;
	if($res){
		return $result;
	}
	else{
		return false;
	}
}
//-------------------------table with modals------------------------------------//
function supervisors_table($filter,$pagelimit){
	$x = 0;
	$output = array();

	if(isset($filter)){
		$filter = 'AND (`first_name` LIKE "%'.$filter.'%" || `last_name` LIKE "%'.$filter.'%" || `email` LIKE "%'.$filter.'%")';
	}
	$sql='	SELECT *
			FROM users
			WHERE access_level = "9" AND active = "y"
			'.$filter.'
			ORDER BY `last_name` ASC, `first_name` ASC '.$pagelimit;

	$res=MySQL_Query($sql) or die("Error in Query/SUpervisor table: ".MySqL_Error());

	while($row = mysql_fetch_array($res)){
			$output[$x]['user_id'] 		= $row['user_id'];
			$output[$x]['first_name'] 	= $row['first_name'];
			$output[$x]['last_name']	= $row['last_name'];
			$output[$x]['skype_id'] 	= $row['skype_id'];
			$output[$x]['email'] 		= $row['email'];
    		$x++;
		}
		$output['count'][0] = $x;
	if($res){
		return $output;
	}
	else{
		return false;
	}
}
function replace_symbols($strng){
	$strng = str_replace('`','&rsquo;',str_replace('"','&quot;',str_replace("'","&lsquo;",$strng)));
	return $strng;
}
function ann_read_and_update(){
	$sql = "SELECT * FROM announcement ORDER BY `date` DESC";
	$res = MySQL_Query($sql);
	$output='';
	while($row = mysql_fetch_array($res)){
        $row['msg']		=	$this->replace_symbols($row['msg']);
        $row['title']	=	$this->replace_symbols($row['title']);
	$output .="
	<b><a href='#' id='title'  data-type='text' data-pk='".$row['id']."' data-value='".
$row['title']."' title='Change Title'></a>
    </b>	  <br/>
   <div style='width:100%;word-wrap:break-word;margin:auto 0;'>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='#' id='msg'  data-type='textarea' data-pk='".$row['id']."' data-value='".$row['msg']."' protect- title='Change Content'></a>
        </div>
	<i style='color:grey;font-size:10px;'>".$row['date']." ".$row['time']."</i>
	<br><a href='#deletemodal".$row['id']."' class='btn btn-xs btn-primary' data-value='delete' data-toggle='modal' data-backdrop='static'></a>
    <br/>
	<hr/>
	<br/>
        ";
        $output .= "
        <div id='deletemodal".$row['id']."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
		<div class='modal-content'>
				<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 id='myModalLabel'>Delete Announcement</h4>
				</div>

				<div class='modal-body'>
				Title: ".$row['title']."<br/>Message:  ".$row['msg']."<br><i>".$row['date']." ".$row['time']."</i>
				</div>
					<div class='modal-footer'>
						 <form action='' method='POST'>
	       				 <input name='id' type='hidden' value='".$row['id']."'/>
	        			 <input name='del' type='submit' class='btn' value='delete'/>
	       			<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button></form>
					</div>
		</div>
		</div>
					</div>
        ";
        }
        if($output == ""){
        $output = "<i style='color:gray;'>No announcement made yet.</i>";
        }
      	return $output;
}
function user_guide_update($user){
	$sql="SELECT * FROM userguide WHERE `user` = '".$user."'";
	$res = MySQL_Query($sql) or die("Error in SQL".MySQL_Error());
	while($row = mysql_fetch_array($res)){
	$output = '
	<form method="POST" class="hidden-xs" action="'.$_SERVER['PHP_SELF'];
	if($user=="student"){$output.="?t=8B";}else{$output.="?t=8A";}
    $output .='" >
	<input type="text" value="'.$row['title'].'" name="title" class="form-control" />
	<div contenteditable="true" id="';
	if($user=="student"){$output.="student";}else{$output.="tutor";}
	$output.='" >
    '.$row['content'].'
    </div>
	<textarea name="content" style="display:none;" id="';
	if($user=="student"){$output.="student";}else{$output.="tutor";}
	$output.='_guide">'.$row['content'].'</textarea>
    <input type="hidden" name="id" value="'.$row['id'].'"/>
    <br>Date and Time:<span class="label label-success">'.$row['date'].'&nbsp;&nbsp;'.$row['time'].'</span><br>
    <button name="update" type="submit" class="btn btn-primary"  onmouseover="get_ck_value(\''.$user.'\',\''.$user.'_guide\');"><i class="glyphicon-ok glyphicon"></i>&nbsp;Update</button>
    </form>';

    $output .='
	<form method="POST" class="visible-xs-block" action="'.$_SERVER['PHP_SELF'];
	if($user=="student"){$output.="?t=8B";}else{$output.="?t=8A";}
    $output .='" >
	<input type="text" value="'.$row['title'].'" class="form-control" name="title" />
	<textarea name="content" style="min-height:300px;" class="form-control">'.$row['content'].'</textarea>
    <input type="hidden" name="id" value="'.$row['id'].'"/>
    <div class="input-group">
    <span class="input-group-addon">
    Date and Time:</span>
    <input class="form-control" readonly="true" type="text" value="'.$row['date'].'&nbsp;&nbsp;'.$row['time'].'"/>
    </div>
    <button name="update" type="submit" class="btn btn-primary form-control"><i class="glyphicon-ok glyphicon"></i>&nbsp;Update</button>
    </form>
    ';
	}
	return $output;
}
function check_if_active($id){
		$sql = "SELECT active from users WHERE user_id =".$id;
		$ins_res=mysql_query($sql) or die(mysql_error());
		$active = MySQL_Result($ins_res,0,"active");
		if($ins_res)
		{
			return $active;
		}
		else
		{
			return false;
		}
	}

	function check_user_access($id,$u_id){
		$sql = "SELECT COUNT(*) AS test FROM tutors WHERE tutor_id =".$id." AND supervisor_id = ".$u_id;
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_result($result, 0, "test") >= 1) {
			return true;
		} else {
			return false;
		}
	}
	function check_user_access_student($id,$u_id){
		$sql = 'SELECT COUNT(*) AS test  FROM schedules,tutors,students
		WHERE (`schedules`.`user_id` = '.$id.' AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
			  (`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')';

		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_result($result, 0, "test") >= 1) {
			return true;
		} else {
			return false;
		}
	}
function get_sched_info($sched_id) {
		$sql_info = "SELECT user_id, fulldate, time, tutor_id, day, month, year  FROM schedules WHERE schedule_id = '$sched_id' ";
		$result = @mysql_query($sql_info);

		if (mysql_num_rows($result)) {
    	$result = mysql_fetch_assoc($result);
    	$this->sched_user_id= $result['user_id'];
		$this->sched_fulldate = $result['fulldate'];
		$this->sched_time = $result['time'];
		$this->sched_tutor_id = $result['tutor_id'];
		$this->sched_day = $result['day'];
		$this->sched_month = $result['month'];
		$this->sched_year = $result['year'];
		return true;
		}
		else {
			return false;
			}
	}
function get_sched_id($time, $day, $month, $year, $tutor_id) {
		$sql_info = "SELECT status, schedule_id  FROM schedules WHERE time = '$time' AND day = '$day' AND month = '$month' AND year = '$year' AND tutor_id= $tutor_id";
		$result = @mysql_query($sql_info);

		if (mysql_num_rows($result)) {
    	$result = mysql_fetch_assoc($result);
    	$this->status= $result['status'];
		$this->schedule_id = $result['schedule_id'];
		return true;
		}
		else {
			return false;
			}
	}

function get_sched($time, $day, $month, $year) {
		$query_get = "SELECT * FROM schedules WHERE time = '$time' AND day = '$day' AND month = '$month' AND year = '$year'";
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return $row_get[0];
				  }

		else {
			return false;
		}
	}
function get_new_student_cnt($al){
		if($al == 10){
		$sql = "	SELECT *
						FROM students
						WHERE viewed = 0
					 ";
		}
		else{
		$sql = "	SELECT *
						FROM students,tutors,schedules,users
						WHERE viewed = 0 AND
							  (`users`.`access_level`=1 AND `active`='y' AND `students`.`student_id` = `users`.`user_id` ) AND
							  (`schedules`.`user_id` = `users`.`user_id` AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
							  (`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = ".$this->user_id.")
				 		GROUP BY `users`.`user_id`
					 ";

		}
		$res =mysql_query ($sql) or die("Error in new student cnt: ".MySQL_Error());
		while($row = mysql_fetch_array($res)){
			$x++;
		}
		if ($x) { // A match was made.
					return $x;
				  }

		else {
			return 0;
		}
	}
function get_student_sched($id,$page){
			$sql=sprintf("SELECT * FROM schedules WHERE user_id = '$id' ORDER BY `year` DESC, `month` DESC ,   `day` DESC LIMIT $page , 10");
			$res = mysql_query($sql) or die (mysql_error());
			$x=0;
			$result ="";
			while($row = mysql_fetch_array($res))
			{
				$this->tutor_info_for_sup($row['tutor_id']);
				$result .= '<tr>
							<td><a href="tutor_profile.php?TutorId='.$row['tutor_id'].'&t=2A&u=t" target="blank">'.$this->tutor_first_name.'</a></td>
							<td>'.$row['month'].'-'.$row['day'].'-'.$row['year'].'</td>';
				$result .= '<td>'.$row['time'].'</td>';
				$result .= '<td>'.$row['report'].'</td>';
				$result .= '<td>'.$row['approved'].'</td>
							</tr>
							';
				$x+=1;
			}

			return $result;
}

function get_tutor_sched($id){

	$q = 'SELECT a.username, a.skype_id, b.time, b.day, b.month, b.year, FROM_UNIXTIME(b.fulldate, "%m-%d-%Y") as `datetime` FROM users a INNER JOIN schedules b ON a.user_id = b.user_id WHERE tutor_id = '.$id.' AND month >= MONTH(NOW())';
	
	$res = mysql_query($q) or die (mysql_error());

	return $res;
}

function get_student_class_history($id){
	$sql = "SELECT a.*, b.title, c.nick_name, c.tutor_id FROM classhistory a LEFT JOIN materials b on a.material = b.material_id
			LEFT JOIN tutors c ON a.tutor = c.tutor_id WHERE a.user_id = ". $id ." ORDER BY date, time desc;";

	$res = mysql_query($sql) or die ("Error in get_student_c_history" . mysql_error());
	
	return $res;
}


function get_student_sched_mon($id,$page){
			$sql=sprintf("SELECT * FROM schedules WHERE user_id = '$id' ORDER BY `year` DESC, `month` DESC ,   `day` DESC LIMIT $page , 10");
			$res = mysql_query($sql) or die (mysql_error());
			$x=0;
			$result ="";
			while($row = mysql_fetch_array($res))
			{
				$this->tutor_info_for_sup($row['tutor_id']);
				$result .= '<tr>
							<td>'.$row['month'].'-'.$row['day'].'-'.$row['year'].'</td>';
				$result .= '<td>'.$row['time'].'</td>';
				$result .= '<td>'.$row['report'].'</td>';
				$result .= '<td>'.$row['approved'].'</td>
							</tr>
							';
				$x+=1;
			}

			return $result;

}

function get_student_credit($student_id) {
		$query_get = "	SELECT credit_id, credit_value, expiration
						FROM studentcredits
						WHERE status=1 AND student_id=$student_id
						ORDER BY expiration DESC";

		$res_info = mysql_query($query_get) or die("Error in get_student_credit: ".MySQL_Error());

		$this->credit_id = mysql_result($res_info, 0, "credit_id");
		$this->credit_value = mysql_result($res_info, 0, "credit_value");
		
		return $res_info;
	}

function get_total_student_credit(){
	$stud_id = " (SELECT user_id FROM users WHERE username = '". $_SESSION['user'] ."' LIMIT 1) ";
	$sql = "SELECT  CASE WHEN SUM(credit_value) > 2 then true else false end as `isNotTrial` FROM studentcredits WHERE student_id = ". $stud_id ." AND status = 1 AND expiration > NOW();";
	$res = mysql_query($sql);

	return mysql_fetch_object($res);
}

	
function get_tutor_cnt(){
$sql ="SELECT COUNT(*) AS test FROM users,tutors WHERE (`supervisor_id` =".$this->user_id." AND tutor_id = user_id)";
	$res = @mysql_query ($sql);
		$cnt = mysql_fetch_array ($res, MYSQL_NUM);

		if ($cnt) {
			return $cnt[0];
				  }

		else {
			return false;
		}
}
function check_credit_exp(){
	$x=0;
$sql="	SELECT *
		FROM studentcredits
		WHERE student_id =".$this->user_id." AND status=1";
		$res= MySQL_query($sql) or die("Error in Exp: ".MySQL_Error());
		while($row = mysql_fetch_array($res)){
			$date = strtotime("today");
			$exp = strtotime($row['expiration']);
			if($date>$exp){

				$query = "	UPDATE studentcredits
							SET status = 0
							WHERE student_id =".$this->user_id."
							AND credit_id =".$row['credit_id'];
				$result = MySQL_Query($query) or die("Error in Updating Credit: ".MySqL_Error());
			$x++;
			}

		}
	if($x == 0){
		return false;
	}
	else{
		return true;
	}

}
//-------------------------------------------------------------------------------------------------------------
//**************************************admin***FUNCTIONS**********************************************
//-------------------------------------------------------------------------------------------------------------
function get_admin(){
	$sql = "SELECT *
			FROM users
			WHERE access_level = 10 ";
	$res = MySQL_Query($sql) or die("Error in selecting admin".MySqL_Error());
	$this->admin_id = MySQL_Result($res,0,"user_id");
}
function get_admin_settings(){
	$sql = "SELECT *
			FROM adminsettings";
			$result = array();
	$res = MySQL_Query($sql) or die("Error in selecting admin".MySqL_Error());
	$result['client_id'] = MySQL_Result($res,0,"client_id");
	$result['secret'] = MySQL_Result($res,0,"secret");
	$result['conversionsvalue'] = MySQL_Result($res,0,"conversionsvalue");
	$result['webmaster_name'] = MySQL_Result($res,0,"webmaster_name");
	$result['webmaster_email'] = MySQL_Result($res,0,"webmaster_email");
	$result['admin_name'] = MySQL_Result($res,0,"admin_name");
	$result['admin_email'] = MySQL_Result($res,0,"admin_email");

	if($res){
		return $result;
	}
	else{
		return false;
	}
}

//-------------------------------------------------------------------------------------------------------------
//**********************************************END***********************************************************
//**************************************NOTIFICATION***FUNCTIONS**********************************************
//-------------------------------------------------------------------------------------------------------------
function email_notif_users($value,$id,$p_id){

	$isNotifCreated = false;

	switch($value){
		
		case 1:
			$mail_address = $this->admin_mail;
			$subj = "FilipinoTutor.com: Newly Registered Student";
			$msg = "Good day ADMIN:".$this->admin_name.",<br /><br />A new student just registered. Click here to view profile (http://www.filipinotutor.com/admin/student_profile.php?StudId=".$p_id.").<br /><br />Have a nice day.";
			
			$this->get_admin();
			$isNotifCreated = $this->create_notification($this->admin_id, "new student", $p_id, "Newly Registered Student");

			if(!$isNotifCreated){
				$this->email_notif($mail_address,$msg,$subj,true);
			}
		break;
		
		case 2:
			$mail_address = $this->admin_mail;
			$subj = "FilipinoTutor.com: Newly Registered Applicant";
			$msg = "Good day ADMIN:".$this->admin_name.",<br /><br />There is a newly registered Applicant. Click here(http://www.filipinotutor.com/admin/applicant_profile.php?AppId=".$p_id.") to view the profile.<br /><br />Have a nice day.";
			
			$this->get_admin();
			$isNotifCreated = $this->create_notification($this->admin_id, "new applicant", $p_id, "Newly Registered Applicant");

			if(!$isNotifCreated){
				$this->email_notif($mail_address,$msg,$subj,true);
			}

		break;
		
		case 3:
			$mail_address = $this->admin_mail;
			$subj = "FilipinoTutor.com: Newly Booked Student";
			$msg = "Good day ADMIN:".$this->admin_name.",<br /><br />There is a newly booked Student. Click here:(http://www.filipinotutor.com/admin/student_profile.php?studid=".$p_id.") to view the booking.<br /><br />Have a nice day.";
			
			$this->get_admin();
			
			$isNotifCreated = $this->create_notification($this->admin_id, "new booking", $p_id, "Newly Booked Student");

			if(!$isNotifCreated){
				$this->email_notif($mail_address,$msg,$subj,true);
			}

			$sup = $this->get_student_supervisors($id);

			for($x = 0;$x!= $sup['count'][0];$x++){
				$mail_address = $sup['email'][$x];
				$subj = "FilipinoTutor.com: Newly Booked Student";
				$msg = "Good day SUPERVISOR:".$sup['name'][$x].",<br /><br />There is a newly booked Student. Click here: (http://www.filipinotutor.com/supervisor/student_profile.php?studid=".$p_id.") to view the booking.<br /><br />Have a nice day.";
				
				$isNotifCreated = $this->create_notification($sup['id'][$x], "new booking", $p_id, "Newly Booked Student");
				
				if(!$isNotifCreated){
					$this->email_notif($mail_address,$msg,$subj,true);
				}
			}
		break;

		case 4:
			/* REMOVED THIS PART to prevent the system from sending the email twice. Email is only sent to supervisor alone. */
			
			/* $mail_address = $this->admin_mail;
			$subj = "FilipinoTutor.com: Tutor Schedule Update";
			$msg = "Good day ADMIN:".$this->admin_name.",<br /><br />A Tutor Updated a Schedule. Please check it here:(http://www.filipinotutor.com/admin/tutors.php?t=2B) to view the schedule updates.\n Have a nice day.";
			$this->email_notif($mail_address,$msg,$subj,true);
			$this->get_admin();
			$this->create_notification($this->admin_id, "update schedule", $p_id, "Tutor Updated a schedule."); */

				$this->get_tutor_info($id);
				$this->get_supervisor_info($this->tutor_supervisor);
				$mail_address = $this->sup_email;
				$subj = "FilipinoTutor.com: Tutor Schedule Update";
				$msg = "Good day SUPERVISOR:".$this->sup_fname." ".$this->sup_lname.",<br /><br />A Tutor Updated a Schedule. Please check it here:(http://www.filipinotutor.com/supervisor/tutors.php?t=2B)  to view the schedule updates.<br /><br />Have a nice day.";
				
				$isNotifCreated = $this->create_notification($this->tutor_supervisor, "update schedule", $p_id, "Tutor Updated a Schedule.");

				if(!$isNotifCreated){
					$this->email_notif($mail_address,$msg,$subj,true);
				}

				$this->get_admin();
				$isNotifCreated = $this->create_notification($this->admin_id, "update schedule", $p_id, "Tutor Updated a Schedule.");

				if(!$isNotifCreated){
					$this->email_notif($mail_address,$msg,$subj,true);
				}
				

		break;
	}


}
function create_notification($user_id, $process, $p_id, $title){
	
	$search = "SELECT user_id FROM notification WHERE user_id = '$user_id' AND process_name = '$process' AND process_id = '$p_id' AND title = '".$title."'";

	$r = MySQL_query($search) or die("Error in create_notification: search");

	$total_search = mysql_num_rows($r); // 1

	if($total_search <= 0){
		$date= date("Y-m-d");
		$time= date("H:i",time());
		$sql="	INSERT INTO notification
				(`id`,`user_id`,`process_name`,`process_id`,`title`,`viewed`,`date`,`time`) VALUES
				(NULL,'$user_id','$process','$p_id','$title', 0,'$date','$time')
				";
		$res = MySQL_Query($sql) or die("Error in creating a notificaion: ".MySQL_Error());
		if($res){
			return true;
		}
		else{
			return false;
		}
	} else {
		return false; // notification already exists
	}
}


function get_notification($id,$filter,$pagelimit){
	$sql = "SELECT *
			FROM notification
			WHERE user_id =$id
			AND viewed=0
			 ".$filter." ".$pagelimit;
	$result = array();
	$x=0;
	$res = MySQL_Query($sql) or die("Error in getting notification: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){
		$result[$x]['id'] = $row['id'];
		$result[$x]['user_id'] = $row['user_id'];
		$result[$x]['viewed'] = $row['viewed'];
		$result[$x]['title'] = $row['title'];
		$result[$x]['p_name'] = $row['process_name'];
		$result[$x]['p_id'] = $row['process_id'];
		$result[$x]['time'] = $row['time'];
		$result[$x]['date'] = $row['date'];
		$x++;
	}
	$result['count'][0] = $x;
	if($res){
		return $result;
	}
	else{
		return false;
	}
}
function get_notification_list($id,$filter,$pagelimit){
	$sql = "SELECT *
			FROM notification
			WHERE user_id = $id
			".$filter." ".$pagelimit;

	$result = array();
	$x=0;
	$res = MySQL_Query($sql) or die("Error in getting notification: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){
		$result[$x]['id'] = $row['id'];
		$result[$x]['user_id'] = $row['user_id'];
		$result[$x]['viewed'] = $row['viewed'];
		$result[$x]['title'] = $row['title'];
		$result[$x]['p_name'] = $row['process_name'];
		$result[$x]['p_id'] = $row['process_id'];
		$result[$x]['time'] = $row['time'];
		$result[$x]['date'] = $row['date'];
		$x++;
	}
	$result['count'][0] = $x;
	if($res){
		return $result;
	}
	else{
		return false;
	}
}

function get_notification_cnt($id){
	$sql = " SELECT *
			 FROM notification
			 WHERE user_id = ".$id." AND viewed = 0
	";

	$result = array();
	$result['nb'] = '';
	$result['ns'] = '';
	$result['na'] = '';
	$result['us'] = '';
	$x=0;
	$res = MySQL_Query($sql) or die("Error in counting notification: ".MySqL_Error());
	while($row = mysql_fetch_array($res)){
		switch ($row['process_name']) {
			case 'new booking':
				$result['nb'] += 1;
				break;
			case 'new student':
				$result['ns'] += 1;
				break;
			case 'new applicant':
				$result['na'] += 1;
				break;
		case 'update schedule':
				$result['us'] += 1;
				break;
			}
			$x++;
	}
	$result['cnt'] = $x;
	if($res){
		return $result;
	}
	else{
		return false;
	}
}
function notif_seen($pname){
	$sql = "UPDATE notification
			SET `notification`.`viewed` = 1
			WHERE   `notification`.process_name='".$pname."'
			AND  `notification`.`user_id` =".$this->user_id
			;
	$res = MySQL_Query($sql) or die("Error in Seen notification: ".MySQL_Error());
	if($res){
		return true;
	}
	else{
		return false;
	}
}

function get_sched_for_notif($id){
	$sql = "SELECT *
			FROM schedules
			WHERE schedule_id = $id
	";
	$res = MySQL_Query($sql) or die("Error in get_sched_for_notif in Main Class: ".MySQL_Error());
	$result = MySQL_Fetch_Array($res);
	if($res){
		return $result;
	}
	else{
		return false;
	}
}
//-------------------------------------------------------------------------------------------------------------
//*************************************************END*********************************************************
//-------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------
//**************************************+++++++++++CSV+++++++++++**********************************************
//-------------------------------------------------------------------------------------------------------------

function get_report_csv($filter){
	$sql= "	SELECT *
			FROM classhistory
			 ".$filter."
			ORDER BY date DESC,
					 tutor ASC,
					 user_id ASC
		";
	$output ="
		<tr>
			<th>Report ID:</th>
			<th>Schedule ID:</th>
			<th>Tutor's Name:</th>
			<th>Student's Name:</th>
			<th>Attendance:</th>
			<th>Date:</th>
			<th>Time:</th>
		</tr>
		";
	$res = MySQL_Query($sql) or die("Error in report_CSV: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){

		$output .= "
		<tr>
			<th>".$row['report_id']."</th>
			<th>".$row['schedule_id']."</th>
			";
	$this->tutor_info_for_sup($row['tutor']);
	$this->student_info_for_sup($row['user_id']);
	$output.=
		"	<th>".$this->tutor_first_name." ".$this->tutor_last_name."</th>
			<th>".$this->student_first_name." ".$this->student_last_name."</th>
			<th>".$row['attendance']."</th>
			<th>".$row['date']."</th>
			<th>".$row['time']."</th>
		</tr>
		";
	}
	return $output;
}
function get_tutor_conversion_total($tutorid){
	$sql= "	SELECT `tutorconversions`.`conversionnumber`, `tutorconversions`.`con_value`
			FROM tutorconversions
			WHERE `tutorconversions`.`tutorid` = $tutorid
		";
		$total = 0;
	$res =MySQL_Query($sql) or die("Error in get_tutor_conversion_total function: ".MySQL_Error());
	while ($row = MySQL_Fetch_Array($res)) {
		$total = $total + ($row['conversionnumber'] * $row['con_value']);
		$x++;
	}
	$this->total_conversion = $total;
}

function get_conversion_csv($filter){
	$sql = 'SELECT tc.*, SUM(tc.conversionnumber) AS total_points, SUM(tc.con_value) AS total_amount, t.nick_name FROM tutorconversions tc INNER JOIN tutors t ON t.tutor_id = tc.tutorid GROUP BY tc.tutorid ORDER BY tc.tutorid';
	
	$output ="
		<tr>
			<th>Tutor's Name:</th>
			<th>Total Conversion Points</th>
			<th>Total Conversion Amount</th>
		</tr>
		";
	$res = MySQL_Query($sql) or die("Error in conversion_CSV: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){
		$output .= "<tr>";
		$output .= "<td>".$row['nick_name']."</td>";
		$output .= "<td>".$row['total_points']."</td>";
		$output .= "<td>".$row['total_amount']."</td>";
		$output .= "</tr>";

	// 	$output .= "
	// 	<tr>
	// 		<th>".$row['nick_name']."</th>
	// 		";
	// $this->tutor_info_for_sup($row['tutorid']);
	// $output.=
	// 	"	<th>".$this->tutor_first_name." ".$this->tutor_last_name."</th>
	// 		<th>".$row['conversionnumber']."</th>";
	// $this->get_tutor_conversion_total($row['tutorid']);
	// $value =  $this->total_conversion;
	// $value = $row['conversionnumber'] * $row['con_value'];
	// $output.=
	// 		"<th>".number_format($value,2)."</th>
	// 		 <th>".$row['date_approved']."</th>
	// 	</tr>
	// 	";
	}
	return $output;
}
function get_credit_csv(){
	$sql= "	SELECT *
			FROM credits

			ORDER BY date DESC,
					 id ASC
		";
	$output ="
		<tr>
			<th>Credit ID:</th>
			<th>Value:</th>
			<th>Duration:</th>
			<th>Price:</th>
			<th>Date:</th>
		</tr>
		";
	$res = MySQL_Query($sql) or die("Error in credit_CSV: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){

		$output .= "
		<tr>
			<th>".$row['id']."</th>
			<th>".$row['credit_value']."</th>
			<th>".$row['duration']."</th>
			<th>".$row['credit_price']."</th>
			<th>".$row['date']."</th>
		</tr>
		";
	}
	return $output;
}
//-------------------------------------------------------------------------------------------------------------
//*************************************************END CSV*****************************************************
//*******************************Supervisor's functions(Tutors.php and Students.php)***************************
//-------------------------------------------------------------------------------------------------------------
function get_path(){
		$path_parts = pathinfo($_SERVER['PHP_SELF']);
		$fname= $path_parts['filename'].'.php';
		return $fname;

}
function get_tut_update_sched_sup($pagelimit){
	$fname= $this->get_path();
	$output =array();
	$x=0;
	if($this->has_profile_supervisor($this->user_id)){
	$sql = 'SELECT  `schedules`.`schedule_id`,  `schedules`.`time`,  `schedules`.`fulldate`, `schedules`.`tutor_id`, FROM_UNIXTIME(`schedules`.`fulldate`, "%m-%d-%Y") AS `datetime1`
			FROM schedules, tutors
			WHERE 	(`schedules`.`approved`=\'no\' AND `schedules`.`status`=\'open\') AND
		  			(`tutors`.`tutor_id` = `schedules`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
		  			AND `schedules`.`month` >= MONTH(NOW())
			ORDER BY `schedules`.`tutor_id` DESC,`schedules`.`fulldate`  DESC'.$pagelimit;
	}
	else {
		$sql = 'SELECT schedule_id, time, fulldate, tutor_id, FROM_UNIXTIME(fulldate, "%m-%d-%Y") AS \'datetime1\'
				FROM schedules
				WHERE approved=\'no\' AND status=\'open\'
				AND month >= MONTH(NOW())
				ORDER BY schedule_id ASC'.$pagelimit;
		}
		$rsd = mysql_query($sql) or die("Error in Schedule Update-tutor: ".mysql_error());
		while($row = mysql_fetch_array($rsd,MYSQL_NUM))
		{
			$output[$x]['schedule_id'] 		= $row[0];
			$output[$x]['time'] 			= $row[1];
			$output[$x]['fulldate'] 		= $row[2];
			$output[$x]['tutor_id'] 		= $row[3];
			$x++;
		}
		$output['count'][0] = $x;
		if($rsd)
		{
			return $output;
		}
		else{
			return false;
		}

}
function latest_tutor_assigned($pagelimit){
	$output =array();
	$x=0;
	$sql = 'SELECT `users`.`user_id`, `users`.`first_name`, `users`.`last_name`, `users`.`email`, `users`.`skype_id`
			FROM users,tutors
			WHERE 	(`users`.`access_level` =2 AND `users`.`active` =\'y\') AND
					(`tutors`.`supervisor_id` = 0 AND `tutors`.`tutor_id` = `users`.`user_id`)
			ORDER BY `first_name` ASC'.$pagelimit;
		$res = mysql_query($sql) or die(mysql_error());

		while($row = mysql_fetch_array($res,MYSQL_NUM))
		{
		$output[$x]['user_id']		=$row[0];
		$output[$x]['first_name']	=$row[1];
		$output[$x]['last_name']	=$row[2];
		$output[$x]['email']		=$row[3];
		$output[$x]['skype_id']		=$row[4];
		$x++;
		}
		$output['count'][0] = $x;
	if($res){
	return $output;
	}
	else{
	return false;
	}
}
function check_sched($id){
	$sql = " 	 SELECT COUNT(*)
				 AS value
				 FROM classhistory
				 WHERE  status ='approved'
				 AND schedule_id = ".$id."
			";
	$res = MySQL_Query($sql)or die("Error in Checking Schedule: ".MySQL_Error());
	if(MySQL_Result($res,0,"value")>0){
		return false;
	}
	else{
		return true;
	}
}
function get_tutor_conversion_sup($filter,$pagelimit){
	$output	=array();
	$x=0;
	if($this->has_profile_supervisor($this->user_id)){
		$sql = 'SELECT tc.*, SUM(tc.conversionnumber) AS total_points, SUM(tc.con_value) AS total_amount, t.nick_name FROM tutorconversions tc INNER JOIN tutors t ON t.tutor_id = tc.tutorid WHERE t.supervisor_id = '.$this->user_id.' GROUP BY tc.tutorid ORDER BY tc.tutorid ASC '.$pagelimit;
	} else {
		$sql = 'SELECT tc.*, SUM(tc.conversionnumber) AS total_points, SUM(tc.con_value) AS total_amount, t.nick_name FROM tutorconversions tc INNER JOIN tutors t ON t.tutor_id = tc.tutorid GROUP BY tc.tutorid ORDER BY tc.tutorid ASC '.$pagelimit;
	}

	        $rsd = mysql_query($sql) or die(mysql_error());
	        $reccnt=0;

	            while($row = mysql_fetch_array($rsd)) {

	            	$output[$x]['id']		=	$row['conversionid'];
	            	$output[$x]['points']	=	$row['total_points'];
	            	$output[$x]['tutor_id']	=	$row['tutorid'];
	            	$output[$x]['date']		=	$row['date_approved'];
	            	$output[$x]['value']	=	$row['total_amount'];
	            	$output[$x]['tutor_name']	= $row['nick_name'];
					$x++;
				}
				
				$output['count'][0] = $x;
			if($rsd){
	        	return $output;
			}
			else{
				return false;
			}
	}
	function get_conversion_value(){
		$sql = "SELECT conversionsvalue from adminsettings";
		$res = mysql_query($sql);
		$this->convalue = mysql_result($res,0,'conversionsvalue');
	}
	function get_conversion_details($tutor_id){
		
		$output	=array();
		$x=0;
		$tutor_first_name = '';
		$tutor_last_name = '';
		
		$sql = "SELECT *
				FROM tutorconversions
				LEFT JOIN schedules ON tutorconversions.schedule_id = schedules.schedule_id
				LEFT JOIN classhistory ON classhistory.schedule_id = schedules.schedule_id
				LEFT JOIN students ON students.student_id = schedules.user_id
				WHERE tutorconversions.tutorid = ".$tutor_id."";
			
		 $rsd = mysql_query($sql) or die(mysql_error());
	        $reccnt=0;
	            while($row = mysql_fetch_array($rsd,MYSQL_NUM))
	            {
	            	$output[$x]['conversionid']		=	$row[0];
	            	$output[$x]['conversionnumber']	=	$row[1];
	            	$output[$x]['schedule_id']	=	$row[2];
	            	$output[$x]['tutorid']		=	$row[3];
	            	$output[$x]['date_approved']	=	$row[4];
					$output[$x]['con_value']	=	$row[5];
					$output[$x]['status']	=	$row[6];
					$output[$x]['fulldate']	=	$row[11].'-'.$row[10].'-'.$row[9] ;
					$output[$x]['time']	=	$row[8];
					$output[$x]['report_id']	=	$row[18];
					$output[$x]['student_nickname']	=	$row[36];
					$x++;
				}
				//$output['count'][0] = $x;
			if($rsd){
				//get tutor name
				
				$sql_info = '
					SELECT first_name, last_name
					FROM users
					WHERE user_id = '.$tutor_id;
		
				$res_info = @mysql_query($sql_info) or die("Error in get_tutor_info:".MySQL_Error());
		
				if (mysql_num_rows($res_info)) {
				$result 					= mysql_fetch_assoc($res_info);
				$tutor_first_name 		= $result['first_name'];
				$tutor_last_name 			= $result['last_name'];
				}
				
				return	json_encode(array('success' => true, 'Response' => $output, 'tutor_name'=> $tutor_first_name.' '.$tutor_last_name));
			}
			else{
				return false;
			}
			
	}
	function sched_notification_for_tutor($tutor_id){
		$datetoday = strtotime(date("Y-m-d H:i:s", strtotime("now")));
		$datetom = strtotime(date("Y-m-d H:i:s", strtotime("tomorrow")));
		$output = array();
		$x = 0;
		$sql = "SELECT *
				FROM schedules
				WHERE `tutor_id` = $tutor_id
				AND `fulldate` >= $datetoday
				AND `fulldate` < $datetom
				AND `report` 	= ''
				ORDER BY fulldate DESC
		";

		$res =MySQL_query($sql) or die("Error in getting Schedule: ".MySQL_Error());
		while ($row=MySQL_Fetch_Array($res)) {
			$output[$x]['sched_id'] = $row['schedule_id'];
			$output[$x]['fulldate'] = $row['fulldate'];
			$output[$x]['user_id']  = $row['user_id'];
			$output[$x]['tutor_id'] = $row['tutor_id'];
			$output[$x]['time'] 	= $row['time'];
			$x++;
		}
		$output['count'][0] = $x;
		if($res){
			return $output;
		}
		else{
			return false;
		}
	}
function get_tutor_report_list($filter,$pagelimit){
		$output = "";

		$sql = 'SELECT *
				FROM classhistory
				'.$filter.'
				ORDER BY date DESC, time DESC 
				'.$pagelimit;
		$res = MySQL_Query($sql)or die("Error In report List: ".MySQL_Error());
		while($row = mysql_fetch_array($res))
		{
			$this->get_tutor_info($row[13]);
			$this->student_info_for_sup($row[16]);
			$this->get_materials_info($row[2]);
			$output.='<tr>';
			if($this->check_if_active($row[13]) == 'y'){
			$output.='<td><a href="tutor_schedule.php?TutorId='. $row[13].'&t=2A" title="View Tutor Schedules" data-placement="right" data-toggle="tooltip">'.$this->tutor_nick_name.'</a></td>';
			}
			else{
			$output.='<td style="color:grey;">'.$this->tutor_nick_name.'</td>';
			}
			if($this->check_if_active($row[16]) == 'y'){
			$output.='<td ><a href="student_profile.php?StudId='.$row[16].'&t=1A" title="View Student\'s Profile" target="blank" data-placement="right" data-toggle="tooltip">'.$this->student_first_name.' '.$this->student_last_name.'</td>';
			}
			else{
			$output.='<td style="color:grey;">'.$this->student_first_name.' '.$this->student_last_name.'</td>';
			}
			$output.='<td  style="color:';

			if($row[4] == 'present'){
				$output.='green;"';
			}
			else{
				$output.='red;"';
			}
			$output.=
				 '><b>'.strtoupper($row[4]).'</b></td>
				  <td class="hidden-xs"><a href="bookmaterial.php?mid='.$row[2].'&t=4B" title="View Material" target="blank" data-placement="right" data-toggle="tooltip">'.$this->m_title.'</td>
				  <td>'.$row[14].' <span class="visible-xs-block label label-success">'.$row[15].'</span></td>
				  <td class="hidden-xs">'.$row[15].'</td>
			</tr>

				<div id="ModalDelete'.$row[0].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 id="myModalLabel">Report</h4>
				</div>
				<div class="modal-body">

				<p style "vertical-align:top;">
				Are you sure you want to delete this report?
				</p>

				</div>
				<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=2C" >
				<div class="modal-footer">
				<input type="hidden" name="deleteReport_id" value="'.$row[0].'"/>
				<button type="submit" name="deleteReport" class="btn"/><i class="glyphicon-trash"></i>&nbsp;Yes</button></form>

				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				</div>
				</div>
				<div id="ModalApprove'.$row[0].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 id="myModalLabel">Report</h4>
				</div>
				<div class="modal-body">

				<p style "vertical-align:top;">
				Do you want appove this report?
				</p>

				</div>
				<div class="modal-footer">
				<a href="tutors.php?schedid='.$row[1].'&action=approve_report&t=2C">
				<button class="btn"><i class="glyphicon-ok"></i>&nbsp;Yes</button>
				</a>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				</div>
				</div>';
		}
	return $output;
}
function get_tutor_report_sup($pagelimit){
	$output= array();
	$x = 0;
	if($this->has_profile_supervisor($this->user_id)){
		$sql = 'SELECT *
				FROM classhistory,tutors
				WHERE 	(`classhistory`.`status`=\'new\') AND
						(`classhistory`.`tutor` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` ='.$this->user_id.')
				ORDER BY `classhistory`.`date` DESC '.$pagelimit;
	}
	else{
		$sql = 'SELECT *
				FROM classhistory
				WHERE status=\'new\'
				ORDER BY report_id ASC'.$pagelimit;
	}
	$rsd = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($rsd,MYSQL_NUM))
		{
			$output[$x]['report_id'] 	= $row[0];
			$output[$x]['schedule_id'] 	= $row[1];
			$output[$x]['material_id'] 	= $row[2];
			$output[$x]['attendance'] 	= $row[4];
			$output[$x]['tutor_id'] 	= $row[13];
			$output[$x]['date'] 		= $row[14];
			$output[$x]['time'] 		= $row[15];
			$output[$x]['student_id'] 	= $row[16];
			$x++;
		}
		$output['count'][0]=$x;

		if($rsd){
			return $output;
		}
		else{
			return false;
		}
}
function get_tutor_list_sup($filter,$page){

	$output = array();
	$x = 0;
/* because sir bernard want listing in admin and supervisor is the same */
	if($this->has_profile_supervisor($this->user_id)){

			// $sql = 'SELECT user_id, first_name, last_name, email, skype_id, active 
			// 	FROM users,tutors
			// 	WHERE (access_level = 2)
			// 	AND (supervisor_id ='.$this->user_id.' AND tutor_id = user_id)
			// 	'.$filter.'
			// 	ORDER BY last_name ASC '.$page;
			// 	$ck = false;
		$sql = 'SELECT 	user_id, first_name, last_name, email, skype_id, supervisor_id, active 
					FROM 	users,tutors
					WHERE 	access_level=2 AND
							tutor_id = user_id
							'.$filter.'
					ORDER BY last_name ASC '.$page;
				$ck = false;
	} else {
			$sql = 'SELECT 	user_id, first_name, last_name, email, skype_id, supervisor_id, active 
					FROM 	users,tutors
					WHERE 	access_level=2 AND
							tutor_id = user_id
							'.$filter.'
					ORDER BY last_name ASC '.$page;
				$ck = true;
	}
	
	$rsd = mysql_query($sql) or die("Error in Selecting Tutor List: ".mysql_error());
		while($row = mysql_fetch_array($rsd))
		{
		$output[$x]['user_id'] 			= $row['user_id'];
		$output[$x]['first_name'] 		= $row['first_name'];
		$output[$x]['last_name'] 		= $row['last_name'];
		$output[$x]['email'] 			= $row['email'];
		$output[$x]['skype_id'] 		= $row['skype_id'];
		$output[$x]['supervisor_id'] 	= $row['supervisor_id'];
		$output[$x]['active']			= $row['active'];
		
		$x++;
		}
		$output['count'][0] = $x;
		$output['ck'][0] = $ck;

	if($rsd){
		return $output;
		}

	else{
		return false;
	}

}
function get_student_list_sup($filter,$pagelimit) {
	$output = array();
	$x = 0;
	if($this->has_profile_supervisor($this->user_id)){
		$sql = 'SELECT `users`.`user_id`, `users`.`first_name`, `users`.`last_name`, `users`.`email`, `users`.`skype_id`

				FROM users,schedules,tutors,students

				WHERE (`users`.`access_level`=1 AND `active`=\'y\' AND `students`.`student_id` = `users`.`user_id` ) AND
					  (`schedules`.`user_id` = `users`.`user_id` AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
					  (`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
				 '.$filter.'
				GROUP BY user_id DESC

				ORDER BY first_name ASC'.$pagelimit;
			}
	else{
		$sql = 'SELECT `users`.`user_id`, `users`.`first_name`, `users`.`last_name`, `users`.`email`, `users`.`skype_id`
				FROM users
				WHERE (`users`.`access_level`=1 AND `active`=\'y\') '.$filter.'
				ORDER BY first_name ASC'.$pagelimit;

	}
			$rsd = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($rsd,MYSQL_NUM))
			{
				$output[$x]['user_id'] 		= $row[0];
				$output[$x]['first_name'] 	= $row[1];
				$output[$x]['last_name'] 	= $row[2];
				$output[$x]['email'] 		= $row[3];
				$output[$x]['skype_id'] 	= $row[4];
				$x++;
			}
			$output['count'][0] = $x;
			if($rsd){
				return $output;
			}
			else{
				return false;
			}
	}

	function get_student_supervisors($stud){

		$sql = 'SELECT 	`users`.`first_name`, `users`.`last_name`,`users`.`email`,`users`.`user_id`
				FROM users, students, schedules, tutors,supervisors
				WHERE (`users`.`access_level`=9 AND `active`=\'y\' AND `supervisors`.`supervisorid` = `users`.`user_id` ) AND
					  (`schedules`.`user_id` = '.$stud.' AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
                                      (`tutors`.`supervisor_id`=`users`.`user_id`)
				GROUP BY `users`.`user_id`
				ORDER BY `users`.`last_name` ASC
				';
		$x = 0;
		$sup =  array();
		$res = MySQL_Query($sql) or die("Error in student supervisor: ".MySQL_Error());
		while($row = mysql_fetch_array($res)){
			$name =  $row['first_name'].' '.$row['last_name'];
		$sup['name'][$x] = $name;
		$sup['email'][$x] = $row['email'];
		$sup['id'][$x] = $row['user_id'];
		$x++;
		}
		$sup['count'][0] = $x;
		if($res){
		return $sup;
		}
		else{
			return false;
		}
	}
	function get_supervisors(){

		$sql = 'SELECT 	`users`.`first_name`, `users`.`last_name`,`users`.`email`,`users`.`user_id`
				FROM users
				WHERE `users`.`access_level`=9 AND `active`=\'y\'';
		$x = 0;
		$sup =  array();
		$res = MySQL_Query($sql) or die("Error in student supervisor: ".MySQL_Error());
		while($row = mysql_fetch_array($res)){
			$name =  $row['first_name'].' '.$row['last_name'];
		$sup['name'][$x] = $name;
		$sup['email'][$x] = $row['email'];
		$sup['id'][$x] = $row['user_id'];
		$x++;
		}
		$sup['count'][0] = $x;
		if($res){
		return $sup;
		}
		else{
			return false;
		}
	}

	function get_student_tutor($stud){
		$sql = 'SELECT 	`users`.`first_name`, `users`.`last_name`
				FROM users, students, schedules, tutors
				WHERE (`users`.`access_level`=2 AND `active`=\'y\' AND `tutors`.`tutor_id` = `users`.`user_id` ) AND
					  (`schedules`.`user_id` = "'.$stud.'" AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
					  (`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
				GROUP BY `users`.`user_id`
				ORDER BY `users`.`last_name` ASC
				';
		$x = 0;
		$tutors =  array();
		$res = MySQL_Query($sql) or die("Error in New Student list: ".MySQL_Error());
		while($row = mysql_fetch_array($res)){
			$name =  $row['first_name'].' '.$row['last_name'];
		$tutors[$x] = $name;
		$x++;
		}
		if($res){
		return $tutors;
		}
		else{
			return false;
		}
	}
	function get_new_student_list($pagelimit){
		$sql = 'SELECT  `users`.`user_id`,`users`.`first_name`,`users`.`last_name`,
						`users`.`email`  ,`users`.`skype_id`, `users`.`gender`,
						`students`.`student_id`  ,`students`.`nick_name`,
						`students`.`photo`  ,`students`.`phone`, `students`.`birthday`
				FROM students,users,schedules,tutors
				WHERE `students`.`viewed` = 0 AND
					  (`users`.`access_level`=1 AND `active`=\'y\' AND `students`.`student_id` = `users`.`user_id` ) AND
					  (`schedules`.`user_id` = `users`.`user_id` AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
					  (`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
				 GROUP BY `users`.`user_id` '.$pagelimit;
			$x=0;
		$res = MySQL_Query($sql) or die("Error in New Student list: ".MySQL_Error());
		while($row = mysql_fetch_array($res)){
			$output.='
						<tr>
							<td><span class="label label-success">'.$row['user_id'].'</span></td>
							<td>'.$row['first_name'].' '.$row['last_name'].'</td>
							<td class="visible-md-block">'.$row['email'].'</td>
							<td class="hidden-xs">'.$row['skype_id'].'</td>
							<td>
								<a href="#ModalView'.$row['user_id'].'"class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static">
								<i class="glyphicon glyphicon-search"></i>
								</a>
							</td>
						</tr>

				<div id="ModalView'. $row['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'. $row['first_name'].' '.$row['last_name'].'</h4>
					</div>
					<div class="modal-body">
					<div class="row">
					<div class="col-md-6">
						<p style="margin:auto 0;">
						<img src="'.$row['photo'].'" class="img-rounded  img-responsive" alt="Photo" height="" width="150" />
						</p>
						<p class="hidden-xs" style="vertical-align:top;">Gender: '.$row['gender'].'
						</p>
						<p style="vertical-align:top;">Phone: '.$row['phone'].'
						</p>
						<p style="vertical-align:top;">Email: '.$row['email'].'
						</p>

					</div>
					<div class="col-md-6">
					';

						$output.='<p style="vertical-align:top;">Skype ID: '.$row['skype_id'].'
						</p>
						<p class="hidden-xs"  style="vertical-align:top;">Nickname: '.$row['nick_name'].'
						</p>
						<p class="hidden-xs" style="vertical-align:top;">Bithday: '.$row['birthday'].'
						</p>
						<p style="vertical-align:top;">Tutors/Previous Tutors:
						<div class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tutors&nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu" style="border:none;">
						';
						$tutors = $this->get_student_tutor($row['user_id']);
						if($tutors){
							foreach ($tutors as $tutor){
								$output .='
								<li style="text-align:center; color:#999;">
								'.$tutor.'</li>
                          		<li class="divider"></li>
								';
								$x++;

							}
						}
						else{
							$output .="<i style='color:grey'>none</i>";
						}
						$output.='
						</ul>
                      </div>
						</p>';
						$output.='
					</div>
					</div>';
					$output.='
					</div>
					<div class="modal-footer">';
				if($this->check_user_access_student($row['user_id'],$this->user_id)){
				$output .='
						<a href="student_profile.php?StudId='.$row[0].'&t=1A" target="blank">
						<button class="btn" >View</button>
						</a>';
					}
				$output .='
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</div>
				</div>
				</div>
					';
		}
		if($res){
			return $output;
		}
	}
	function get_student_booking_sup($filter,$pagelimit){
		$output = array();
		$x=0;
		if($this->has_profile_supervisor($this->user_id)){
		$sql = 'SELECT `schedules`.`schedule_id`, `schedules`.`time`, `schedules`.`fulldate`, `schedules`.`user_id`, `schedules`.`tutor_id`

		FROM schedules,users,tutors,students

		WHERE 	(`schedules`.`user_id` IS NOT NULL AND `schedules`.`status`="closed" AND `schedules`.`approved`="yes") AND
				(`users`.`access_level`=1 AND `active`=\'y\' AND `students`.`student_id` = `users`.`user_id` ) AND
				(`schedules`.`user_id` = `users`.`user_id` AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
		  		(`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
		  		 '.$filter.'

		ORDER BY `schedules`.`fulldate` DESC '.$pagelimit;
		}
		else{
			$sql = 'SELECT schedule_id, time, fulldate, user_id, tutor_id
					FROM schedules
					WHERE user_id IS NOT NULL
					AND status="closed"
					AND approved="yes"
					 '.$filter.'
					ORDER BY schedule_id DESC'.$pagelimit;

		}
		$rsd = mysql_query($sql) or die("Error in get_student_booking_sup: ".mysql_error());
		while($row = mysql_fetch_array($rsd,MYSQL_NUM))
			{
				$output[$x]['schedule_id'] 	= $row[0];
				$output[$x]['time'] 		= $row[1];
				$output[$x]['fulldate'] 	= $row[2];
				$output[$x]['user_id'] 		= $row[3];
				$output[$x]['tutor_id'] 	= $row[4];
				$x++;
			}
			$output['count'][0] = $x;
		if($rsd){
			return $output;
		}
		else{
			return false;
		}
}
function get_student_credit_purchased_sup($pagelimit){
		$output = array();
		$x=0;
		if($this->has_profile_supervisor($this->user_id)){
		$sql = 'SELECT `studentcredits`.`student_id`, `studentcredits`.`credit_value`, `studentcredits`.`expiration`, `studentcredits`.`date_paid`, `studentcredits`.`status`

				FROM studentcredits,users,schedules, tutors, students

				WHERE (`studentcredits`.`status`<>0 AND `studentcredits`.`student_id` = `users`.`user_id`) AND
					  (`users`.`access_level`=1 AND `active`=\'y\' AND `students`.`student_id` = `users`.`user_id`) AND
					  (`schedules`.`user_id` = `users`.`user_id` AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
				      (`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
				'.$pagelimit.'
				GROUP BY `studentcredits`.`credit_id` DESC
				ORDER BY `studentcredits`.`expiration` DESC ';
		}
		else{
			$sql = 'SELECT student_id, credit_value, expiration, date_paid, status
					FROM studentcredits
					WHERE status<>0
					 '.$pagelimit.'
					ORDER BY student_id ASC ';
			}
		$rsd = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($rsd,MYSQL_NUM))
			{
				$output[$x]['student_id'] 	=$row[0];
				$output[$x]['credit_value'] =$row[1];
				$output[$x]['expiration'] 	=$row[2];
				$output[$x]['date_paid'] 	=$row[3];
				$output[$x]['status'] 		=$row[4];
				$x++;
			}
			$output['count'][0] = $x;
			if($rsd){
				return $output;
			}
			else{
				return false;
			}
}
function get_new_students(){
	$sql = "SELECT *
			FROM users,students
			WHERE `students`.`viewed` = 0
			AND		`students`.`student_id` = `users`.`user_id`
			ORDER BY `users`.`user_id`
			DESC ";
			$output= array();
			$x=0;
	$res = MySQL_Query($sql) or die("Error in Selecting New Student: ".MySQL_Error());
	while ($row = MySQL_Fetch_Array($res)){
		$output['id'][$x] = $row['user_id'];
		$name= $row['first_name'].' '.$row['last_name'];
		$output['name'][$x] = $name;
		$output['email'][$x] = $row['email'];
		$output['skype'][$x] = $row['skype_id'];
		$output['phone'][$x] = $row['phone'];
		$output['active'][$x] = $row['active'];
		$x++;
	}
		$output['count'][0] = $x;

	if($res){
		return $output;
	}
	else{
		return false;
	}

}

function get_sched_updates_cnt() {
		$query_get = 'SELECT COUNT(`schedules`.`schedule_id`)

			FROM schedules,tutors,users

			WHERE 	(`schedules`.`approved` = "no" AND `schedules`.`tutor_id` = `tutors`.`tutor_id`)	AND
					(`tutors`.`tutor_id` = `users`.`user_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')
		';
		$result_get = mysql_query ($query_get) or die("Error in counting sched update: ".MySqL_Error());
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return $row_get[0];
				  }

		else {
			return false;
		}
	}
function get_bookings_cnt() {
		$query_get = 'SELECT COUNT(`schedules`.`schedule_id`)

			FROM schedules,tutors,users,students

			WHERE 	(`schedules`.`user_id` IS NOT NULL AND `schedules`.`status`="closed" AND `schedules`.`approved`="yes" AND `schedules`.`fulldate` > '.strtotime("now").') AND
					(`users`.`access_level`=1 AND `active`=\'y\' AND `students`.`student_id` = `users`.`user_id` ) AND
			  		(`schedules`.`user_id` = `users`.`user_id` AND `schedules`.`tutor_id` = `tutors`.`tutor_id`) AND
		  			(`schedules`.`tutor_id` = `tutors`.`tutor_id` AND `tutors`.`supervisor_id` = '.$this->user_id.')';

		$result_get = mysql_query ($query_get) or die(MySqL_Error());
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return $row_get[0];
				  }

		else {
			return false;
		}
	}
//-------------------------------------------------------------------------------------------------------------
//*******************************Supervisor's functions(Tutors.php and Students.php)***************************
//*************************************************(END)*******************************************************
//-------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------
//*****************Admin and Supervisor's functions(materials.php and applicant.php)***************************
//-------------------------------------------------------------------------------------------------------------

function get_applicant_list($pagelimit){
		$sql = 'SELECT first_name, last_name, email, skype, mobile, applicant_id,training_date,interviewdate,resume
				FROM applicants
				WHERE status=\'new\'
				ORDER BY last_name ASC'.$pagelimit;
		$output = array();
		$x=0;
			$rsd = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($rsd,MYSQL_NUM))
			{
			$output[$x]['first_name'] 		= $row[0];
			$output[$x]['last_name'] 		= $row[1];
			$output[$x]['email'] 			= $row[2];
			$output[$x]['skype'] 			= $row[3];
			$output[$x]['mobile'] 			= $row[4];
			$output[$x]['applicant_id'] 	= $row[5];
			$output[$x]['training_date'] 	= $row[6];
			$output[$x]['interviewdate'] 	= $row[7];
			$output[$x]['resume'] 	= $row[8];
			$x++;
			}
			$output['count'][0] = $x;
			if($rsd){
				return $output;
			}
			else{
				return false;
			}
}
function get_app_training_sched($pagelimit){
		$sql = 'SELECT *
				FROM applicants
				WHERE status = "for training"
				ORDER BY training_date DESC'.$pagelimit;
		$output =array();
		$x=0;
	$rsd = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($rsd))
		{
		$output[$x]['applicant_id']		=	$row['applicant_id'];
		$output[$x]['first_name']		=	$row['first_name'];
		$output[$x]['last_name']		=	$row['last_name'];
		$output[$x]['skype']			=	$row['skype'];
		$output[$x]['training_date']	=	$row['training_date'];
		$output[$x]['email']			=	$row['email'];
		$x++;
		}
		$output['count'][0] = $x;
		if($rsd){
		return $output;
		}
		else{
			return false;
		}
}



function get_categories($pagelimit=null){
	if($pagelimit!=NULL){
		$sql = "SELECT * FROM category ".pagelimit;
	}else{
		$sql = "SELECT * FROM category ";
	}

	$res = mysql_query($sql) or die(mysql_error());
	if($res){
		return $res;
	} else {
		return false;
	}
}

function get_subcategories($pagelimit=null){
	if($pagelimit!=NULL){
		$sql = "SELECT * FROM subcategory ".$pagelimit;
	} else {
		$sql = "SELECT * FROM subcategory ";
	}

	$res = mysql_query($sql) or die(mysql_error());

	if($res){
		return $res;
	}else{
		return false;
	}
}


function get_all_categories(){
	$sql = "SELECT * 
			FROM subcategory
			LEFT JOIN category
			ON subcategory.category_id = category.category_id ORDER BY subcategory.subcategory_order ASC";

	$res = mysql_query($sql) or die(mysql_error());

	if($res){
		return $res;
	}else{
		return false;
	}
}

function get_materials($category=null, $subcategory=null, $pagelimit=null){

	if($category!=NULL){
		if($subcategory!=0 || $subcategory!=NULL){
		$sql = "SELECT a.*, b.category_type, c.subcategory_type
				FROM materials a
				LEFT JOIN category b ON a.category_id = b.category_id 
				LEFT JOIN subcategory c ON a.subcategory_id = c.subcategory_id
				WHERE a.category_id='".$category."'AND a.subcategory_id='".$subcategory."' ORDER BY a.material_order ASC".$pagelimit;
		}else{
		$sql = "SELECT a.*, b.category_type, c.subcategory_type
				FROM materials a
				LEFT JOIN category b ON a.category_id = b.category_id 
				LEFT JOIN subcategory c ON a.subcategory_id = c.subcategory_id
				WHERE a.category_id='".$category."' ORDER BY a.material_order ASC".$pagelimit;	
		}
	} else {
		$sql = "SELECT a.*, b.category_type, c.subcategory_type
				FROM materials a
				LEFT JOIN category b ON a.category_id = b.category_id 
				LEFT JOIN subcategory c ON a.subcategory_id = c.subcategory_id
 				ORDER BY a.material_order ASC".$pagelimit;
	}

	$res = mysql_query($sql) or die(mysql_error());
	if($res){
		return $res;
	}
	else{
		return false;
	}
}

function update_material($mat_id){
	$sql = 'SELECT *
			FROM materials
			WHERE material_id='.$mat_id;
			$output="";
				$res = mysql_query($sql) or die(MySQL_Error());

				if (mysql_num_rows($res)) {
					$result = mysql_fetch_assoc($res);
					$material_id = $result['material_id'];
					$title = $result['title'];
					$content = $result['content'];
					$order = $result['material_order'];
					$category_id = $result['category_id'];
					$subcategory_id = $result['subcategory_id'];
					$visibility = $result['visibility'];
					
					if($visibility=="1") {
						$vislist = '<option value="1" selected>visible</option><option value="0">hidden</option>';
					} else {
						$vislist = '<option value="1">visible</option><option value="0" selected>hidden</option>';
					}
					
					
				}
				

						//Get category list
		                $res1 = $this->get_categories();
            			while($row = mysql_fetch_array($res1,MYSQL_NUM)){
            				$cat[$row[0]] = $row[1];
						}

						//Get subcategory list
						$res2 = $this->get_subcategories();
						while($row =  mysql_fetch_array($res2,MYSQL_NUM)){
							$subcat[$row[0]] = $row[2];
						}

		    			$res3 = $this->get_all_categories();
		                while($row3 = mysql_fetch_array($res3,MYSQL_NUM)){
		                	$list[$row3[1]][$row3[0]]['name']= $row3[2];
		                }
	                	$thisSelected ="";
	                	foreach($cat as $a => $b){
	                		$string .='<option value='.$a.':0 class="cat_optgroup">'.$b.'</option>';
	                		foreach($list[$a] as $c => $d){
	                			if($a == $category_id && $c == $subcategory_id){$thisSelected='selected';}else{$thisSelected ="";}
	                			$string .= '<option value='.$a.':'.$c.' class="sub_cat" '.$thisSelected.'>'.$subcat[$c].'</option>';
	                		}
	                	}
								
			                	
						$output.= '
						<div class="col-md-8">
							<form action="materials.php" method="post"  enctype="multipart/form-data" class="editform">
									<div class="row">
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
													Material Title
												</span>
												<input type="text"  name="title" required="true" class="form-control" value="'.$title.'"/>
											 </div>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												 <span class="input-group-addon">
													Order
												</span>
												<input type="text"  name="order" required="true" class="form-control" value="'.$order.'"/>
											 </div>
										</div>
									</div>

									 <div class="input-group">
										 <span class="input-group-addon">
					                		Category:
					                	</span>
					                	<select name="category_input" class="form-control">'.$string.'</select>
				                	 </div>
									  <div class="input-group">
										 <span class="input-group-addon">
					                		Visibility
					                	</span>
					                	<select name="visibility" class="form-control">
											'.$vislist.'
										</select>
				                	 </div>
									<div class="input-group">
		                      			<span class="btn btn-warning btn-file input-group-addon"> Browser :
			                               	<i class="glyphicon glyphicon-circle-arrow-up"></i>
			                               	<input name="file" type="file" id="file2" onchange="document.getElementById(\'uploadfile\').value = document.getElementById(\'file2\').value;document.getElementById(\'subs\').disabled = false;"/>
		                             	</span>
		                             	<input id="uploadfile" type="text" readonly="true" class="form-control" value="'.$content.'"/>
	                             	</div>
									<input type="hidden" name="material_id" value="'.$material_id.'"/>
									<input type="hidden" name="content" value="'.$content.'"/>
									<input type="hidden" name="t" value="4B"/>
									<button type="submit"  name="save" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Update</button>
									<a href="materials.php?t=4B" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Close</a>
							</form>
						</div>
						';
				return $output;
}


function update_category($cat_id){
	$sql = 'SELECT *
			FROM category
			WHERE category_id='.$cat_id;

	$output="";
		$res = mysql_query($sql) or die(MySQL_Error());

		if (mysql_num_rows($res)) {
			$result = mysql_fetch_assoc($res);
			$category_id = $result['category_id'];
			$category_name = $result['category_name'];
			$category_order = $result['category_order'];
		}

		$output.= '
				<div class="col-md-8">
					<form action="materials.php" method="post"  enctype="multipart/form-data">
							<input type="text"  name="edit_catName" class="form-control" value="'.$category_name.'"/>
							<input type="text"  name="edit_catOrder" class="form-control" value="'.$category_order.'"/>
							<input type="hidden" name="edit_catID" value="'.$category_id.'"/>
							<input type="hidden" name="t" value="4D"/>
							<button type="submit"  name="saveCat" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
					</form>
				</div>
				';
		return $output;
}

function update_subcategory($subcat_id){
	$sql = 'SELECT *
			FROM subcategory
			WHERE subcategory_id='.$subcat_id;

	$output="";
		$res = mysql_query($sql) or die(MySQL_Error());

		if(mysql_num_rows($res)) {
			$result = mysql_fetch_assoc($res);
			$subcategory_id = $result['subcategory_id'];
			$category_id = $result['category_id'];
			$subcategory_name = $result['subcategory_name'];
			$subcategory_order = $result['subcategory_order'];
		}

			//Get category list
			$res1 = $this->get_categories();
			while($row = mysql_fetch_array($res1,MYSQL_NUM)){
				$cat[$row[0]] = $row[1];
			}

			foreach($cat as $a => $b){
				if($category_id == $a){
					$string .= '<option value='.$a.' selected="selected">'.$b.'</option>'; 
				}else{ 
					$string .= '<option value='.$a.'>'.$b.'</option>'; 
				}  
			}

		$output.= '
			<div class="well">
				<form class="form-horizontal" action="materials.php" method="post"  enctype="multipart/form-data">
					<input type="hidden" name="edit_subcatID" value="'.$subcategory_id.'"/>
					<input type="hidden" name="t" value="4F"/>
		 
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-5">
					  <select name="edit_subcatCatID" class="form-control">'.$string.'</select>
					</div>
				  </div>
				 <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Sub-Category</label>
					<div class="col-sm-5">
					  <input type="text"  name="edit_subcatName" class="form-control" value="'.$subcategory_name.'" placeholder="Sub-Category Name" />
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Order</label>
					<div class="col-sm-5">
					  <input type="number"  name="edit_subcatOrder" class="form-control" value="'.$subcategory_order.'" placeholder="Order" />
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit"  name="saveSubcat" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
					</div>
				  </div>
				</form>
			</div>
			';

		return $output;

}

//-------------------------------------------------------------------------------------------------------------
//*****************Admin and Supervisor's functions(materials.php and applicant.php)***************************
//*************************************************(END)*******************************************************
//-------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------
//**********************************CREDIT C.R.U.D for admin module********************************************
//-------------------------------------------------------------------------------------------------------------
function get_affordable_pricing($filter,$pagelimit){ // get_credit_list()
	$sql ="SELECT * FROM credits
		   ".$filter."
		   ORDER BY date DESC
		 ".$pagelimit;
	$res =MySQL_Query($sql) or die("error in Credit_list: ".MySQL_Error());

	$result = array();
	$x=0;
	while($row = mysql_fetch_array($res)){
		$result[$x][0] = $row['duration'];
		$result[$x][1] = $row['date'];
		$result[$x][2] = $row['credit_price'];
		$result[$x][3] = $row['credit_value'];
		$result[$x][4] = $row['id'];
		$result[$x][5] = $row['exp_date'];
		$x++;

	}
	$result['count'][0] = $x;
	if($res){
		return $result;
	}
	else{
		return false;
	}
}
function get_pricing_frontend($filter,$pagelimit){ // get_credit_list()
	$sql ="SELECT * FROM credits
		   ".$filter."
		   ORDER BY date DESC
		 ".$pagelimit;
	$res =MySQL_Query($sql) or die("error in Credit_list: ".MySQL_Error());

	$result = array();
	$x=0;
	while($row = mysql_fetch_array($res)){
		$result[$x]['id'] = $row['id'];
		$result[$x]['name'] = $row['name'];
		$result[$x]['credit_value'] = $row['credit_value'];
		$result[$x]['credit_type'] = $row['credit_type'];
		$result[$x]['credit_price'] = $row['credit_price'];
		$result[$x]['description'] = $row['description'];
		$result[$x]['price_description'] = $row['price_description'];
		$result[$x]['duration'] = $row['duration'];
		$result[$x]['exp_date'] = $row['exp_date'];
		$result[$x]['credit_type_id'] = $row['credit_type_id'];
		$x++;
	}
	$result['count'][0] = $x;
	if($res){
		return $result;
	}
	else{
		return false;
	}
}
function get_credit_list($filter,$pagelimit){
$path = $this->get_path();
$output=array();
$x=0;
	$sql ="SELECT * FROM credits
		   ".$filter."
		   ORDER BY date DESC
		 ".$pagelimit;
	$res =MySQL_Query($sql) or die("error in Credit_list: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){
			//$output[$x]['price'] = number_format($row['credit_price'],2); //for USD
			$output[$x]['price'] = number_format($row['credit_price']); //for JPY
			$output[$x]['id'] = $row['id'];
			$output[$x]['date'] = $row['date'];
			$output[$x]['duration'] = $row['duration'];
			$output[$x]['credit_value'] = $row['credit_value'];
			$output[$x]['exp_date'] = $row['exp_date'];
			$output[$x]['name'] = $row['name'];
			$output[$x]['credit_type'] = $row['credit_type'];
			$output[$x]['description'] = $row['description'];
			$output[$x]['price_description'] = $row['price_description'];
			$output[$x]['credit_type_id'] = $row['credit_type_id'];
		$x++;
	}
	$output['count'][0]=$x;
	return $output;
}

/* Getting all credit type List function */
function get_credit_type_list($filter, $subQ){
	
	$output=array();
	$x=0;
	if($subQ == ""){
		$sql ="SELECT * FROM credit_type";
	} else {
		$sql = $subQ;
	}
	$sql = $sql.$filter;
	$res =MySQL_Query($sql) or die("error in Credit_list: ".MySQL_Error());
	while($row = mysql_fetch_array($res)){
			$output[$x]['credit_id'] =  $row['credit_id']; 
			$output[$x]['credit_type'] = $row['credit_type'];
			$output[$x]['credit_type_desc'] = $row['credit_type_desc'];
			$output[$x]['tutor_type_id'] = $row['tutor_type_id'];
		$x++;
	}
	$output['count'][0]=$x;
	return $output;
}
/*****************************************/



//-------------------------------------------------------------------------------------------------------------
//*************************************************(END)*******************************************************
//-------------------------------------------------------------------------------------------------------------

function get_sched_matched($time, $day, $month, $year, $user_id) {

		$query_get = "SELECT schedule_id FROM schedules WHERE time = '$time' AND day = '$day' AND month = '$month' AND year = '$year' AND user_id = $user_id AND status ='closed' ";
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_num_rows($result_get);

		if ($row_get > 0) { // A match was made.
			return 1;
		}
		return 0;
	}

function get_sched_approved($sched_id) {
		$query_get = "SELECT approved FROM schedules WHERE schedule_id = '$sched_id'";
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
			return true;
		} else {
			return false;
		}
	}
function get_sched_status($sched_id) {
		$query_get = "SELECT status FROM schedules WHERE schedule_id = '$sched_id'";
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return $row_get[0];
				  }

		else {
			return false;
		}
	}

function get_class_page_cnt($id, $user){
	if($user=="student"){ 
		$query_get = 'SELECT COUNT(report_id) FROM classhistory WHERE `user_id` = '.$id;
	}
	elseif($user=="tutor"){
		$query_get = 'SELECT COUNT(report_id) FROM classhistory WHERE `tutor` = '.$id;
	}

		$result_get = @mysql_query ($query_get) or die(mysql_error());
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return $row_get[0];
				  }

		else {
			return false;
		}
}
function get_stud_sched_cnt($id){
		$query_get = 'SELECT COUNT(schedule_id) FROM schedules WHERE `user_id` = '.$id.' ';
		$result_get = @mysql_query ($query_get) or die(mysql_error());
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return $row_get[0];
				  }

		else {
			return false;
		}
}
function has_profile_student($student_id) {
		$query_get = 'SELECT student_id FROM students WHERE student_id ='.$student_id;
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return true;
				  }

		else {
			return false;
		}
	}

function has_profile_supervisor($sup_id) {
		$query_get = 'SELECT supervisorid FROM supervisors WHERE supervisorid ='.$sup_id;
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return true;
				  }

		else {
			return false;
		}
	}

function has_profile_user($user_id) {
		$query_get = 'SELECT user_id FROM users WHERE user_id ='.$user_id;
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return true;
				  }

		else {
			return false;
		}
	}
function has_profile_tutor($tutor_id) {
		$query_get = 'SELECT tutor_id FROM tutors WHERE tutor_id ='.$tutor_id;
		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					return true;
				  }

		else {
			return false;
		}
	}


function get_tutor_info($tutor_id) {
		$sql_info = '
			SELECT *
			FROM tutors
			WHERE tutor_id = '.$tutor_id;

		$res_info = @mysql_query($sql_info) or die("Error in get_tutor_info:".MySQL_Error());

		if (mysql_num_rows($res_info)) {
		$result 					= mysql_fetch_assoc($res_info);
		$this->tutor_nick_name 		= $result['nick_name'];
		$this->tutor_phone 			= $result['phone'];
		$this->tutor_photo 			= $result['photo'];
		$this->tutor_birthday 		= $result['birthday'];
		$this->tutor_ed_level 		= $result['ed_level'];
		$this->tutor_school 		= $result['school'];
		$this->tutor_attending 		= $result['attending'];
		$this->tutor_teaching_exp 	= $result['teaching_exp'];
		$this->tutor_hobby 			= $result['hobby'];
		$this->tutor_self_intro 	= $result['self_intro'];
		$this->tutor_bank_name 		= $result['bank_name'];
		$this->tutor_bank_branch 	= $result['bank_branch'];
		$this->tutor_access 		= $result['access'];
		$this->tutor_accnt_name 	= $result['accnt_name'];
		$this->tutor_accnt_number 	= $result['accnt_number'];
		$this->tutor_supervisor 	= $result['supervisor_id'];
		$this->tutor_audio 			= $result['audio'];
		}
	}

function get_tutor_type(){
	$sql = "SELECT tutor_type_id FROM tutors WHERE tutor_id = (SELECT user_id FROM users WHERE username = '".$_SESSION['user']."')";
	$res = MySQL_query($sql) or die ("Error in getting tutor_type");
	$row = mysql_fetch_array($res);
	return $row[0];
}	


	function get_inactive_acc($user){
		$sql = "SELECT * from users where active ='n'";
		$res = MySQL_Query($sql);
		$x=0;
		$output = array();
		while($row = mysql_fetch_array($res))
		{
			if($this->has_profile_tutor($row['user_id']) && $user =="tutor"){
				$output[$x]['user_id'] 		= $row['user_id'];
				$output[$x]['email'] 		= $row['email'];
				$output[$x]['first_name'] 	= $row['first_name'];
				$output[$x]['last_name'] 	= $row['last_name'];
				$x+=1;
			}
			elseif ($this->has_profile_student($row['user_id']) && $user =="student" ) {
				$output[$x]['user_id'] 		= $row['user_id'];
				$output[$x]['email'] 		= $row['email'];
				$output[$x]['first_name'] 	= $row['first_name'];
				$output[$x]['last_name'] 	= $row['last_name'];
				$x+=1;
			}

			elseif ($this->has_profile_supervisor($row['user_id']) && $user =="supervisor" ) {
				$output[$x]['user_id'] 		= $row['user_id'];
				$output[$x]['email'] 		= $row['email'];
				$output[$x]['first_name'] 	= $row['first_name'];
				$output[$x]['last_name'] 	= $row['last_name'];
				$x+=1;
			}
		}
		$output['count'][0] = $x;

			if($x>0){
				return $output;
			}
			else{
				$output = "<th colspan='3' class='alert-info'>There's no deactivated account yet...</th>";
				return $output;
			}

	}

function get_paypal_auth(){
$sql = "SELECT `client_id`, `secret` FROM adminsettings";
$res = mysql_query($sql) or die("Error in SQL: ".mysql_error());
$id = mysql_result($res,0,"client_id");
$secret = mysql_result($res,0,"secret");

$auth = $id."{combined}".$secret;
return $auth;
}
function get_student_info($user_id) {
		$sql_info = sprintf("SELECT first_name, last_name, email, skype_id, user_id FROM users WHERE user_id =$user_id");

		$result = @mysql_query($sql_info);

		if (mysql_num_rows($result)) {
    	$result = mysql_fetch_assoc($result);
    	$this->student_first_name= $result['first_name'];
		$this->student_last_name = $result['last_name'];
		$this->student_email = $result['email'];
		$this->student_skype_id = $result['skype_id'];
		$this->student_id = $result['user_id'];
		return true;
		}
		else {
			return false;
			}
	}

function get_supervisor_info($user_id) {
		$sql_info = sprintf("SELECT * FROM supervisors WHERE supervisorid = $user_id");
		$result = @mysql_query($sql_info) or die("Error in Query supervisor info: ".MySqL_Error());

		if (($result)) {
    	$result = mysql_fetch_assoc($result);
    	$this->sup_phone 		= 	$result['phone'];
		$this->sup_photo 		= 	$result['photo'];
		$this->sup_birthday 	=	$result['birthday'];
		$this->sup_nickname 	=	$result['nick_name'];

		$sql_info = sprintf("SELECT * FROM users WHERE user_id = $user_id");
		$res = MySQL_Query($sql_info) or die("MySQl Error in Query Supervisor Info2: ".MySqL_Error());

		$this->sup_fname 		= 	MySQL_Result($res,0,'first_name');
		$this->sup_lname 		= 	MySQL_Result($res,0,'last_name');
		$this->sup_skype 		=	MySQL_Result($res,0,'skype_id');
		$this->sup_email 		=	MySQL_Result($res,0,'email');
		$this->sup_username		=	MySQL_Result($res,0,'username');
		$this->sup_password 	=	MySQL_Result($res,0,'password');
		$this->sup_gender 		=	MySQL_Result($res,0,'gender');
		$this->sup_email 		=	MySQL_Result($res,0,'email');

		return true;
		}
		else {
			return false;
			}
	}

function get_student_profile($student_id) {
		$sql_info = sprintf("SELECT  nick_name, phone, photo, birthday FROM students WHERE student_id =$student_id");
		$res_info = mysql_query($sql_info);
		$this->studentprofile_nick_name = mysql_result($res_info, 0, "nick_name");
		$this->studentprofile_phone = mysql_result($res_info, 0, "phone");
		$this->studentprofile_photo = mysql_result($res_info, 0, "photo");
		$this->studentprofile_birthday = mysql_result($res_info, 0, "birthday");
	}
	function get_guide($user){
		$sql = "SELECT * from userguide WHERE user ='".$user."'";
		$res = MySQL_Query($sql);
		$this->g_title = mysql_result($res, 0, "title");
		$this->g_content = mysql_result($res, 0, "content");

	}
	function get_class_history($id){
		$sql = sprintf("SELECT * FROM classhistory WHERE report_id = $id");
		$res = mysql_query($sql);
		while($row = mysql_fetch_array($res))
		{
		$this->sched_id 		= $row['schedule_id'];
		$this->student_id 		= $row['user_id'];
		$this->tutor_id 		= $row['tutor'];
		$this->r_date 			= $row['date'];
		$this->r_time 			= $row['time'];
		$this->r_materials 		= $row['material'];
		$this->r_mat_covered	= $row['materials_covered'];
		$this->r_attendance 	= $row['attendance'];
		$this->r_grammar		= $row['grammar'];
		$this->r_pronoun	 	= $row['pronunciation'];
		$this->r_listen 		= $row['listening'];
		$this->r_read 			= $row['reading'];
		$this->r_vocab 			= $row['vocabulary'];
		$this->r_voc_rev	 	= $row['vocabulary_review'];
		$this->r_remarks 		= $row['remarks'];
		$this->r_status 		= $row['status'];
		}
	}

	function get_tutor_to_student_class_history($page, $data){
		$field = '';
		$sql = '';
		$tutor_id = '(SELECT tutor_id FROM tutors WHERE tutor_id = (SELECT user_id FROM users WHERE username = "'. $_SESSION['user'] .'"))';

		switch ($page) {
			case 'tutor/classes.php':
					$field = ' schedule_id, attendance, status, date, time ';
					$filter = 'user_id = '. $data['student_id'] .' AND tutor ='.$tutor_id;
					$sql ="SELECT $field FROM classhistory WHERE $filter";
				break;
		}

		$res = MySQL_query($sql);
				
		return $res;
	}

	function get_assign_sup($id){
	$sql = "SELECT user_id, first_name, last_name 
			FROM users
			WHERE access_level = 9";

	$res = MySQL_Query($sql) or die("Error in get_assign_sup: ".MYSSQL_Error());
	$output = '
			';
	while($record = mysql_fetch_array($res)){
		$output .= '<form action="'.$_SERVER['PHP_SELF'].'?t=2E" method="POST"><div class="col-md-12">
			'.$record['first_name'].' '.$record['last_name'].'
			<input name="tutor_id" value="'.$id.'" type="hidden" />
			<input name="sup_id" value="'.$record['user_id'].'" type="hidden" />
			<input name="sub" value="Assign" type="submit" class="btn btn-primary pull-right"/>
			</div>
			';
			$output .="</form>";
	}
		
		if($output){
			return $output;
		}
		else{
			return false;
		}
	}
/********************************end SELECTS***************************************************/
/********************************start UPDATES--------------------------------------------------- */
function update_training_sched($date,$time,$app_ids){
$sql= sprintf("UPDATE applicants SET `t_time` = '$time' , `training_date` = '$date', `status` = 'for training' WHERE `applicant_id` ='$app_ids' ");
$res = mysql_query($sql)or die("Error".mysql_error());
if($res){
	$this->app_info_for_sup($app_ids);
	$subj = "FilipinoTutor.com: Schedule for Training";
	$msg = "Good Day ".$this->app_first_name.",<br /><br />You are invited for a training this coming ".$date." at ".$time." via skype.<br /><br />Thank you for showing interest in us and have a nice day. <br /><br />Regards,<br />FilipinoTutor.com - ADMIN";
	$email_address = $this->app_email;
	$res2 = $this->email_notif($email_address, $msg, $subj, false);
	if($res2){
		return true;
	}
	else{
		return false;
	}

}
else{
	return false;
}
}

function get_tutor_points($tid){
	$get = "SELECT COUNT(*)
			AS value
			FROM classhistory
			WHERE  `tutor` =".$tid." AND
			`status` = 'approved'
	";
	$val= MySQL_query($get) or die(MySQL_Error());
	if($val){
	$value  = mysql_result($val, 0, "value");
	return $value;
	}
	else{
		return false;
	}
}
function update_tutor_conversion($id){
	$this->get_sched_info($id);
	$date = date("Y-m-d");
	$this->get_conversion_value();
			$sql = "INSERT INTO tutorconversions
					(conversionid,conversionnumber,schedule_id,tutorid,date_approved,con_value)
					VALUES
					(NULL,'1',".$id." ,".$this->sched_tutor_id." , '".$date."',".$this->convalue.")
					";
			$res = mysql_query($sql) or die("Error in conversion UPDATE: ".mysql_error());
			if($res){
				return true;
			}
			else{
				return false;
			}
}
function update_paypal($client,$secret){
		$sql = "UPDATE adminsettings
				SET `client_id` = '".$client."', `secret` = '".$secret."' ";

		$res = MySQL_Query($sql) or die("Error in SQL Update: ".MySqL_Error());
		if($res){
			return true;
		}
		else{
			return false;
		}
}
function update_conversionvalue($conv){
		$sql = "UPDATE adminsettings
				SET `conversionsvalue` = '".$conv."'";

		$res = MySQL_Query($sql) or die("Error in SQL Update: ".MySqL_Error());
		if($res){
			return true;
		}
		else{
			return false;
		}
}

function update_user_info_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE users
				SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'"
				WHERE user_id='.mysql_real_escape_string($pk);

		//$sql = 'UPDATE schedules SET status="'.$status.'", approved= "'.$approved.'"  WHERE schedule_id='.$schedule_id;

		$ins_res=mysql_query($sql) or die(mysql_error());
	}
function update_student_profile_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE students
				SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'"
				WHERE student_id='.mysql_real_escape_string($pk);

		$ins_res=mysql_query($sql) or die(mysql_error());
	}
function update_credit_pricing_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE credits
				SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'"
				WHERE id='.mysql_real_escape_string($pk);

		$ins_res=mysql_query($sql) or die(mysql_error());
	}
function update_supervisors_profile_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE supervisors
				SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'"
				WHERE supervisorid='.mysql_real_escape_string($pk);

		$ins_res=mysql_query($sql) or die(mysql_error());
	}
function update_ann_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE announcement
				SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'"
				WHERE id='.mysql_real_escape_string($pk);

		$ins_res=mysql_query($sql) or die(mysql_error());
	if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function update_admin_ajax($name, $value)
	{
		$sql = 'UPDATE adminsettings
				SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'"';

		$ins_res=mysql_query($sql) or die(mysql_error());
	if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function update_guide_ajax($id, $title, $content)
	{	$date = date("Y-m-d");
	    $time = date('H:i',time());
	    $content = addslashes($content);
		$sql = 'UPDATE userguide SET `date` = "'.$date.'", `time` = "'.$time.'" , `title`="'.$title.'", `content`="'.$content.'" WHERE id='.$id;
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function update_assigned_sup($t_id,$s_id){
		if($this->has_profile_tutor($t_id)){
		$sql = 'UPDATE tutors
				SET  `supervisor_id`='.$s_id.'
				WHERE tutor_id='.$t_id;
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
		{
		return false;
		}
	}
function update_tutor_profile_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE tutors SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'" WHERE tutor_id='.mysql_real_escape_string($pk);
		$ins_res=mysql_query($sql) or die(mysql_error());
	}
function update_applicant_profile_ajax($pk, $name, $value)
	{
		$sql = 'UPDATE applicants SET '.mysql_real_escape_string($name).'="'.mysql_real_escape_string($value).'" WHERE applicant_id='.mysql_real_escape_string($pk);
		$ins_res=mysql_query($sql) or die(mysql_error());
	}

function return_credit($schedule_id)
	{
		//get credit usage
		$query_get = '	SELECT usage_id, credit_id
						FROM credits_usage
						WHERE sched_id ='.$schedule_id.'
						AND status="booked"';

		$result_get = @mysql_query ($query_get);
		$row_get = mysql_fetch_array ($result_get, MYSQL_NUM);

		if ($row_get) { // A match was made.
					$sql = sprintf("UPDATE studentcredits SET credit_value = credit_value + 1  WHERE credit_id=$row_get[1]");
					$ins_res=mysql_query($sql) or die(mysql_error());

					$sql = sprintf("UPDATE credits_usage SET status = 'cancelled'  WHERE usage_id=$row_get[0]");
					$ins_res=mysql_query($sql) or die(mysql_error());

				  }

		else {
			return false;
		}


	}
	function get_credit($cid){
		$sql= "	SELECT *
				FROM studentcredits
				WHERE credit_id = $cid
		";
		$res = MySQL_query($sql)or die("Error in Selecting credit: ".MySQL_Error());
		$result = MySQL_Fetch_Array($res);
		if($res){
			return $result;
		}
		else{
			return false;
		}
	}
function update_student_credit($credit_id, $credit_value, $status)
	{
		$sql = "UPDATE studentcredits SET status= ".$status." , credit_value = ".$credit_value." WHERE credit_id = ".$credit_id;
		$ins_res=mysql_query($sql) or die("Error in Updating Credits: ".mysql_error());
		if($ins_res)
		{

			return true;
		}
		else
		{
			return false;
		}
	}

function update_schedule($schedule_id, $status, $approved)
	{
		$sql = 'UPDATE schedules
				SET status="'.$status.'", approved= "'.$approved.'"
				WHERE schedule_id='.$schedule_id;

		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function update_schedule_approve($schedule_id)
	{
		$sql = 'UPDATE schedules
				SET approved="yes"
				WHERE schedule_id='.$schedule_id;

		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function update_schedule_cancel($schedule_id, $status)
	{
		$sql = 'UPDATE schedules
				SET status="'.$status.'", user_id=NULL
				WHERE schedule_id='.$schedule_id;

		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

function book_schedule($schedule_id, $user_id)
	{
		$sql = 'UPDATE schedules
				SET status="closed", user_id='.$user_id.'
				WHERE schedule_id='.$schedule_id;

		$ins_res=mysql_query($sql) or die("Error in Booking schedule: ".mysql_error());
		if($ins_res)
		{
			$this->email_notif_users(3,$user_id,$schedule_id);
			return true;
		}
		else
		{
			return false;
		}
	}
function update_report($report_id,$decision)
	{
		$sql = 'UPDATE classhistory
				SET status="'.$decision.'"
				WHERE schedule_id='.$report_id;

		$ins_res=mysql_query($sql) or die("Error in updatig Report: ".mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
/********************************end UPDATES--------------------------------------------------- */
/********************************start DELETE--------------------------------------------------- */
function delete_schedule($schedule_id)
	{
		$sql = 'DELETE FROM schedules WHERE schedule_id='.$schedule_id;
		$ins_res=mysql_query($sql) or die(mysql_error());
		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
function delete_applicant($AppId,$status)
	{
		$sql = 'SELECT first_name, last_name, email
				FROM applicants
				WHERE applicant_id ='.$AppId;

		$rsd = mysql_query($sql) or die("Error in Selecting applicant".mysql_error());

		$name= MySQL_Result($rsd,0,"first_name").' '.MySQL_Result($rsd,0,"last_name");
		$email= MySQL_Result($rsd,0,"email");
		$datetoday = date("Y-m-d");


		$sql = 'INSERT INTO recentapplicant(`id`,`email`,`name`,`status`, `datetoday`)
				VALUES (NULL,"'.$email.'","'.$name.'","'.$status.'","'.$datetoday.'")
				';

		$ins_res=mysql_query($sql) or die("Error in INSERT INTO".mysql_error());

		$sql = 'DELETE
				FROM applicants
				WHERE applicant_id='.$AppId;

		$ins_res=mysql_query($sql) or die("Error in DELETING Applicant".mysql_error());


		if($ins_res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// for activating and deactivating users
	//$active if for the active column(y- for active, n- for not active,b- block)
function delete_activate_user($active,$id){
		$sql = sprintf('UPDATE users SET `active` = "'.$active.'" WHERE user_id ='.$id.'');
		$res = MySQL_query($sql) or die("Error in Query/Deactivate User: ". MySqL_Error());

		if($res){
			return true;
		}
		else{
			return false;
		}

	}
	function delete_Credit($id){
		$sql = sprintf('DELETE FROM credits WHERE id ='.$id.'');
		$res = MySQL_query($sql) or die("Error in Query/DELETE: ". MySqL_Error());

		if($res){
			return true;
		}
		else{
			return false;
		}

	}function delete_announcement($id){
		$sql = sprintf('DELETE FROM announcement WHERE id ='.$id.'');
		$res = MySQL_query($sql) or die("Error in Query/DELETE: ". MySqL_Error());

		if($res){
			return true;
		}
		else{
			return false;
		}

	}




/********************************end DELeTE--------------------------------------------------- */
}
?>