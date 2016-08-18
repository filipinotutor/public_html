<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;

 /*   You will get 'pk', 'name' and 'value' in $_POST array.
    */
    $pk = $_POST['pk'];
    $name = $_POST['name'];
    $value = $_POST['value'];
    $user = "applicant";
    /*
     Check submitted value
    */
    if(!empty($value)) {
        /*
          If value is correct you process it (for example, save to db).
          In case of success your script should not return anything, standard HTTP response '200 OK' is enough.
          
          for example:
          $result = mysql_query('update users set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where user_id = "'.mysql_escape_string($pk).'"');
        */
        
        //here, for debug reason we just return dump of $_POST, you will see result in browser console
        //print_r($_POST);
		if($page_protect->has_profile_tutor($pk)) //not found in students table, insert
		{
			$user ="tutor";
		}	
		if($page_protect->has_profile_student($pk))
			{
		$user ="student";	
			}
		if($page_protect->has_profile_supervisor($pk))
			{
				$user ="supervisor";	
			}
		if(!$page_protect->has_profile_user($pk))
			{
				$user ="applicant";	
			}
				
			
		
			switch ($name)
			{
					case "username";
					case "first_name";
					case "last_name";
					case "email";
					case "gender";
					case "skype_id";
					if($user !== "applicant") {
						$page_protect->update_user_info_ajax($pk, $name, $value);
					}
					case "gender";
					case "skype";
					case "access";
					case "nick_name";
					case "phone";
					case "mobile";
					case "photo";
					case "birthday";
					case "ed_level";
					case "level";
					case "school";
					case "attending";
					case "teaching_exp";
					case "self_intro";
					case "hobby";
					case "bank_name";
					case "bank_branch";
					case "accnt_name";
					case "accnt_number";
					case "rate";
							if($user == "student"){
							    $page_protect->update_student_profile_ajax($pk, $name, $value); //not found, insert	
							}
						
							if($user == "tutor"){
								$page_protect->update_tutor_profile_ajax($pk, $name, $value);
							}

							if($user == "supervisor"){
								$page_protect->update_supervisors_profile_ajax($pk, $name, $value);
							}

							if($user == "applicant"){
								$page_protect->update_applicant_profile_ajax($pk, $name, $value);
							}	
							break;
							
					case "password";
					if($page_protect->check_new_password($value, $value)==true) //check password length
					{
						//echo 'ok';
					$page_protect->update_user_info_ajax($pk, $name, md5($value));
					//$page_protect->redirect('../login.php'); //relogin using the new password
					echo '<script>window.location.reload();</script>';
					}
					else
					{		
						//echo 'not ok';
							
							echo "Password should be atleast 4 characters.";
							header('HTTP/1.0 400 Bad Request', true, 400);
					}
					break;
			}
		

    } else if($value == null){
        header('HTTP/1.0 400 Bad Request', true, 400);
        echo "This field is required!";

     }
      else{
        header('HTTP/1.0 400 Bad Request', true, 400);
        echo "This field is required!";
    	}
   

?>