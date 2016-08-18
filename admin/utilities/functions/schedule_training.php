<?php
	if(isset($_POST['train_sched']))
	{
		$hh = $_POST['hh'];
		$mm = $_POST['mm'];
		$set = $_POST['set'];
		$date = $_POST['training_date'];
		$time = $hh.":".$mm." ".$set;
		$app_ids=$_POST['app_id'];
		if(isset($app_ids))
		{
			
		$res = $page_protect->update_training_sched($date,$time,$app_ids);
		if(isset($res)) //success
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