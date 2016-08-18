<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;

	$name = $_POST['name'];
    $value = $_POST['value'];
   
   if(!empty($value)) {
	    if(is_numeric($value))
	    {
	 	    	if($name == "conv"){
					$res = $page_protect->conversion_val_update($value);
					if(!$res){
						echo "Error in Query.";
						header('HTTP/1.0 400 Bad Request', true, 400);
						}
					
			}
		}
		else{
				echo "Please enter a valid number.";
				header('HTTP/1.0 400 Bad Request', true, 400);
		}
	   }
	else
		{
				echo "This field is required.";
				header('HTTP/1.0 400 Bad Request', true, 400);

		}
?>