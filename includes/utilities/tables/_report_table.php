<?php
	include("../includes/utilities/functions/report.php");
?>

<table class="table table-striped table-bordered table-hover DataTable">
		<thead>
        <tr>
			<th>Tutor's Name</th>
			<th>Student</th>
	        <th>Attendance</th>
	        <th class="hidden-xs">Material</th>
	        <th class="hidden-xs">Date</th>
	        <th class="hidden-xs">Time</th>
			<th class="hidden-xs">Action</th>
		</tr>
        </thead>
		<?php 
		$output = $page_protect->get_tutor_report_sup(NULL);
		for ($x=0; $x != $output['count'][0] ; $x++) { 
		
			$page_protect->get_tutor_info($output[$x]['tutor_id']);
			$page_protect->student_info_for_sup($output[$x]['student_id']);
			$page_protect->get_materials_info($output[$x]['material_id']);
			
			echo '<tr>';
			if($page_protect->check_if_active($output[$x]['tutor_id']) == 'y'){
				echo'<td>
						<a href="tutor_schedule.php?TutorId='. $output[$x]['tutor_id'].'&t=2A" title="View Tutor Schedules" data-placement="right" data-toggle="tooltip">
							'.$page_protect->tutor_nick_name.'</a>
					</td>';
			}
			else{
				echo'<td style="color:grey;">
						'.$page_protect->tutor_nick_name.'
					</td>';
			}
			if($page_protect->check_if_active($output[$x]['student_id']) == 'y'){
				echo '<td>
						<a href="student_profile.php?StudId='.$output[$x]['student_id'].'&t=1A" title="View Student\'s Profile" target="blank" data-placement="right" data-toggle="tooltip">
						'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'
						</a>
					</td>';
			}
			else{
				echo '<td style="color:grey;">
						'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'
					</td>';
			}
				echo '<td style="color:';
			
			if($output[$x]['attendance'] == 'present'){
				echo 'green;"';
			}
			else{
				echo 'red;"';
			}
			echo
				 	'>
				 		<b>'.strtoupper($output[$x]['attendance']).'</b>
				 	</td>

				<td class="hidden-xs">
					  	<a href="../includes/materials_content.php?mid='.$output[$x]['material_id'].'&t=4B" title="View Material" target="blank" data-placement="right" data-toggle="tooltip">
					  	'.$page_protect->m_title.'
					  	</a>
				  	</td>
				<td class="hidden-xs">
				 		'.$output[$x]['date'].'
				 	</td>
				<td class="hidden-xs">
				 		'.$output[$x]['time'].'
				 	</td>
				<td width="15%" class="hidden-xs">
					<input type="hidden" name="schedule_id" />
					<a href="view_report.php?report='.$output[$x]['report_id'].'&t=2C" class="btn btn-xs btn-primary">
						<i class="glyphicon-search glyphicon"></i>
					</a>
					<a href="#ModalApprove'.$output[$x]['report_id'].'" class="btn btn-xs btn-primary" data-toggle="modal" data-backdrop="static">
						<i class="glyphicon-ok glyphicon"></i>
					</a>
					<a href="#ModalDelete'.$output[$x]['report_id'].'" class="btn btn-xs btn-primary" data-toggle="modal" data-backdrop="static">
						<i class="glyphicon-remove glyphicon"></i>
					</a>
				</td>
			</tr>

				<div id="ModalDelete'.$output[$x]['report_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">Report</h4>
					</div>
					
					<div class="modal-body">
						<p style "vertical-align:top;"> 
						Are you sure you want to delete this report?
						</p>
					</div>
					
					<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=2C" >
					<div class="modal-footer">
						<input type="hidden" name="deleteReport_id" value="'.$output[$x]['schedule_id'].'"/>
						<button type="submit" name="deleteReport" class="btn"/><i class="glyphicon glyphicon-trash"></i>&nbsp;Yes</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
					</div>
					</form>
					</div>
					</div>
				</div>

				<div id="ModalApprove'.$output[$x]['report_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class= "modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">Report</h4>
					</div>
					
					<div class="modal-body">
						<p style "vertical-align:top;"> 
						Do you want appove this report?
						</p>
					</div>
					
					<div class="modal-footer">
						<a href="tutors.php?schedid='.$output[$x]['schedule_id'].'&action=approve_report&t=2C">
						<button class="btn"><i class="glyphicon glyphicon glyphicon-ok"></i>&nbsp;Yes</button>
						</a>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				
				</div>
				</div>
				</div>';
			}
		?>
</table>