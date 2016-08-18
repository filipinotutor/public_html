<?php
	if(isset($_GET['schedid']) && isset($_GET['action']))
		{
			$id= filter_var($_GET['schedid'], FILTER_SANITIZE_STRING);  
			if($page_protect->check_sched($_GET['schedid'])){
				$page_protect->update_report($id,"approved");
					$ins_res = $page_protect->update_tutor_conversion($id);
					if($ins_res)
						{
							 echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Report has been approved.</div>';
						}	
					else
						{
							echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
						}		
				}
			else{
					echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>This Report has been approved already.</div>';
			}
		}
?>
<?php /*Reports ----------------------------------------------*/ 
	if(isset($_POST['deleteReport']))
		{
			$id= filter_var($_POST['deleteReport_id'], FILTER_SANITIZE_STRING);  
			$ins_res =  $page_protect->update_report($id,"disapproved");
		if($ins_res)
			{
				 echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Report has been disapproved.</div>';
			}	
		else
			{
				echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
			}			
	}
?>
