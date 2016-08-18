<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;

	$name = $_POST['name'];
    $value = $_POST['value'];
   
   if(!empty($value)) {
	    	switch($name){
	    		case 'client_id':
	    		case 'secret':
	    		case 'webmaster_name':
	    		case 'admin_name':
	    		$res = $page_protect->update_admin_ajax($name,$value);
					if(!$res){
						header('HTTP/1.0 400 Bad Request', true, 400);
						echo "Error in Query.";
						}
	    		break;
	    		case 'webmaster_email':
	    		case 'admin_email':
	    			if(filter_var($value, FILTER_VALIDATE_EMAIL)){
	    				$res = $page_protect->update_admin_ajax($name,$value);
						if(!$res){
							header('HTTP/1.0 400 Bad Request', true, 400);
							echo "Error in Query.";
							}
					}
	    			else{
		    				header('HTTP/1.0 400 Bad Request', true, 400);
							echo "Invalid Email.";	
	    			}
	    		
	    		break;
	    		case 'conversionsvalue':
	    			 if(is_numeric($value)){
	    			 	$res = $page_protect->update_admin_ajax($name,$value);
						if(!$res){
							header('HTTP/1.0 400 Bad Request', true, 400);
							echo "Error in Query.";
							}
				     }				
					else{
						header('HTTP/1.0 400 Bad Request', true, 400);
						echo "Please enter a valid number.";
					}
	    		
	    		break;
	    	}
	
	   }
	else
		{
				header('HTTP/1.0 400 Bad Request', true, 400);
				echo "This field is required.";

		}
?>