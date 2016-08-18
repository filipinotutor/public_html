<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;
 	$pk = $_POST['pk'];
    $name = $_POST['name'];
    $value = $_POST['value'];
   
   if(!empty($value)) {
	    
	    	switch ($name)
			{
					case "title":
					case "content":
						$page_protect->update_guide_ajax($pk, $name, $value);
					break;
			}
	    }
	else
		{
				echo "This field is required.";
				header('HTTP/1.0 400 Bad Request', true, 400);

		}
?>