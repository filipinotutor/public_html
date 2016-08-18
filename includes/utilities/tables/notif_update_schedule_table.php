	<?php
		if(IsSet($_POST['up_sched'])){
		$pname = $_POST['pname'];
	?>	
		<div class="alert alert-info"><a class="close"  data-dismiss="alert">&times;</a>
			<table class="table table-bordered table-striped">
				<thead>
						<th>Tutor's Name</th>
						<th>Schedule</th>
						<th>Skype ID</th>
				</thead>
				<tbody>
					<?php
						$get = $page_protect->get_notification($page_protect->user_id,"AND `process_name`='update schedule'",NULL);
						$page_protect->notif_seen($pname);
						for($x=0;$x!=$get['count'][0];$x++){
							$page_protect->get_sched_info($get[$x]['p_id']);
							$page_protect->tutor_info_for_sup($page_protect->sched_tutor_id);
							echo"<tr>	
									<td>".$page_protect->tutor_first_name." ".$page_protect->tutor_last_name."</td>
									<td>".$page_protect->sched_year."-".$page_protect->sched_month."-".$page_protect->sched_day."</td>
									<td>".$page_protect->tutor_skype_id."</td>
								</tr>
								";
								}
					?>
				</tbody>
			</table>	
		</div>
	<?php 
		}
	?>