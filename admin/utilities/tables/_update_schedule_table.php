<?php
	include('../includes/utilities/functions/update_schedule_tutor.php');
	include('../includes/utilities/tables/notif_update_schedule_table.php');
?>					
<fieldset>
	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		<input type="hidden" name="t" value="2B">
			<div class="btn-group pull-right">
				<button type="reset" class="btn btn-sm" type="button"><i class="glyphicon glyphicon-refresh"></i> RESET</button>
				<a href='#approvemodal' class='btn btn-sm btn-primary' data-value='delete' data-toggle='modal' data-backdrop='static'>
					<i class="glyphicon-ok glyphicon"></i> SUBMIT
				</a>	
			</div>
		<br clear="all" />
		<br clear="all" />
		
		<table class="table table-striped table-bordered table-hover">
			<thead>
            <tr>
				<th>Tutor's Name</th>
				<th>Schedule</th>
				<th class="hidden-xs">Skype ID</th>
				<th style="background-color:rgb(90,210,90);"><input type="checkbox" class="checkall" /> <i class="glyphicon glyphicon-thumbs-up"></i> Approve</th>
			</tr>
            </thead>
            <?php
				$output = $page_protect->get_tut_update_sched_sup(NULL);
				for($x=0;$x!=$output['count'][0];$x++){
				$page_protect->tutor_info_for_sup($output[$x]['tutor_id']);
				echo '<tr>
						<td>
							<a href="tutor_profile.php?TutorId='.$output[$x]['tutor_id'].'&t=2A" title="View Tutor Schedules">
							'.$page_protect->tutor_nick_name.'
							</a>
						</td>
						<td>
							<span class="label label-success">
							'.$output[$x]['time'].'
							</span> &nbsp;
							'.date('M d, Y',$output[$x]['fulldate']).'
						</td>
						<td class="hidden-xs">
							'.$page_protect->tutor_skype_id.'
						</td>
						<td>
							<input type="checkbox" name="schedule_id[]" value="'.$output[$x]['schedule_id'].'" />
						</td>
					</tr>';	
				}
			?>

			<!-- <button type="submit" name="approvesched" class="btn" value="submit" type="button"> -->
        </table>
	
</fieldset>

<div id='approvemodal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'><h4>Approving Schedule
			<button type='button' class='close pull-right' data-dismiss='modal' aria-hidden='true'>&times;</button></h4>
			</div>
			<div class='modal-body'>
			Would you like to Proceed?
			</div>
			<div class='modal-footer'>
			  
		<button type="submit" name="approvesched" class="btn" value="submit" type="button">
			<i class="glyphicon glyphicon-ok"></i>&nbsp;Yes
		</button>
	   		<button class='btn' data-dismiss='modal' aria-hidden='true'>Cancel</button>
			</div>
		</div>
	</div>
</div>	
</form>