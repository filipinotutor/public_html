<table class="table table-striped table-bordered table-hover table-condensed DataTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th> 
			<th class="hidden-xs">Skype</th>
			<th style="min-width:120px"></th>
		</tr>
	</thead>
	<tbody>
	<?php
		if($filter !=""){
			$output = $page_protect->get_student_list_sup($filter,NULL);
		}
		else{
			$output = $page_protect->get_student_list_sup(NULL,NULL);
		}
		for($x=0; $x != $output['count'][0]; $x++){
			echo'
			<tr>
				<td>
					<span class="label label-success">
						'.$output[$x]['user_id'].'
					</span>
				</td>
	
				<td>
					'.$output[$x]['first_name'].' '.$output[$x]['last_name'].'
				</td>
				
				<td class="hidden-xs">
					'.$output[$x]['skype_id'].'
				</td>
				
				<td>
					<a href="#myModalViewAccount'. $output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static">
						<i class="glyphicon-search glyphicon"></i>
					</a>
					<a href="student_schedule.php?StudId='. $output[$x]['user_id'].'&t=1A&page=N-0" class="btn btn-xs btn-info" data-backdrop="static">
						<i class="glyphicon-calendar  glyphicon"></i>
					</a>
					<a href="student_profile.php?StudId='. $output[$x]['user_id'].'&t=1A"target="blank" class="btn btn-xs btn-info" >
						<i class="glyphicon-edit  glyphicon"></i>
					</a>	
					<a href="#myModalViewBookings'.$output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static">
						<i class="glyphicon-trash  glyphicon"></i>
					</a>	
				</td>
			</tr>

				<div id="myModalViewAccount'. $output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					
					<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
						</div>
						
						<div class="modal-body">
							<p style="vertical-align:top;">Email: '.$output[$x]['email'].'
							</p>
							<p style="vertical-align:top;">Skype ID: '.$output[$x]['skype_id'].'
							</p>
						</div>
						
						<div class="modal-footer">
							<a href="student_profile.php?StudId='.$output[$x]['user_id'].'&t=1A" target="blank"><button class="btn" >View</button></a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</div>

					</div>
					</div>

				</div>
				
				<div id="myModalViewBookings'. $output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					
					<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
						</div>
						
						<div class="modal-body">
							<p style="vertical-align:top;">Email: '.$output[$x]['email'].'
							</p>
							<p style="vertical-align:top;">Skype ID: '.$output[$x]['skype_id'].'
							</p>
						</div>
						
						<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=1A" >
							<div class="modal-footer">
								<input type="hidden" name="deactivate_id" value="'.$output[$x]['user_id'].'"/>
								<button type="submit" name="deactivate" class="btn"><i class="glyphicon glyphicon-ok"> </i>&nbsp; Deactivate</button></form>	
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
							</div>
						</form>

					</div>
					</div>

				</div>';
		}
	?>
	</tbody>
</table>