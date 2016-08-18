<?php
	if(isset($_POST['sub']))
	{
		$tid = $_POST['tutor_id'];
		
		$sid = $_POST['sup_id'];

		$ins_res=$page_protect->update_assigned_sup($tid, $sid);

		if($ins_res) {
			 echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Successfully Assigned</div>';
		}	
		else {
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
		}	
	}
?>