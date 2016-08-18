<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;
$page_protect->get_user_info();

 /*   You will get 'pk', 'name' and 'value' in $_POST array.
    */
    $pk = $_POST['pk'];
    $name = $_POST['name'];
    $value = $_POST['value'];

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
		if(!$page_protect->has_profile_tutor($page_protect->user_id)) //not found in students table, insert
		{
			$insert=true;
		}

			switch ($name)
			{
					case "username";
					case "first_name";
					case "last_name";
					case "email";
					case "gender";
					case "skype_id";
							$page_protect->update_user_info_ajax($pk, $name, $value);
							break;
					
					case "nick_name";
					case "phone";
					case "photo";
					case "birthday";
					case "ed_level";
					case "school";
					case "attending";
					case "teaching_exp";
					case "self_intro";
					case "hobby";
					case "bank_name";
					case "bank_branch";
					case "accnt_name";
					case "accnt_number";

							if($insert){
								$page_protect->insert_profile_tutor($pk, $name, $value); //not found, insert	
								}
							else{
								$page_protect->update_tutor_profile_ajax($pk, $name, $value);
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
							header('HTTP/1.0 400 Bad Request', true, 400);
							echo "Password should be atleast 4 characters.";
					}
					break;
			}
		

    } else {
        header('HTTP/1.0 400 Bad Request', true, 400);
        echo "This field is required!";
    }

?>