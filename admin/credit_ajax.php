<?php

include("../includes/main_class.php"); 
$page_protect = new Main_Class;

	$name = $_POST['name'];
    $value = $_POST['value'];
   	$pk = $_POST['pk'];
   
   if(!empty($value)) {
	       		$res = $page_protect->update_credit_pricing_ajax($pk,$name,$value);
					if(!$res){
						echo "Error in Query.";
						header('HTTP/1.0 400 Bad Request', true, 400);	
					}	
	   }
	else
		{
				echo "This field is required.";
				header('HTTP/1.0 400 Bad Request', true, 400);
		}


		
	

?>