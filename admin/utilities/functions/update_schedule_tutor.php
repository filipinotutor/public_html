<?php
	if(isset($_POST['approvesched']))
	{
		$scheduleids = $_POST['schedule_id'];
		if(isset($scheduleids))
		{	
			$approvedids = null;

			foreach($scheduleids as $schedule_id)
			{
				$approved=$page_protect->update_schedule_approve($schedule_id);
				if($approved)	
				{
					$approvedids .= $schedule_id.', ';
				}
			}
			if(isset($approvedids))
			{
				echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected schedule/s approved.</div>';			
			}
		}
		else
		{
			echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please select schedules to approve.</div>';
		}
	}
?>
