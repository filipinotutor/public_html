<table class="table table-striped table-bordered table-hover DataTable">
	<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th class="hidden-xs">Skype</th>
		<th class="hidden-xs">Email</th>
		<th>Action</th>
		
	</tr>
	</thead>
	<tbody>
			<?php
			if(isset($_POST['submit_filter'])){
			$output = $page_protect->supervisors_table($_POST['filter'],NULL);
			}
			else{
			$output = $page_protect->supervisors_table(NULL,NULL);
			}
			for($x=0;$x!=$output['count'][0];$x++){
			echo '
				<tr>
					<td><span class="label label-success">'.$output[$x]['user_id'].'</span></td>
					<td>'.$output[$x]['last_name'].' '.$output[$x]['first_name'].'</td>
					<td class="hidden-xs">'.$output[$x]['skype_id'].'</td>
					<td class="hidden-xs">'.$output[$x]['email'].'</td>
					<td>
				 		<a href="#myModalViewAccount'. $output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static"><i class="glyphicon-search glyphicon"></i></a>	
						<a href="supervisor_profile.php?t=7A&SupId='.$output[$x]['user_id'].'" class="btn btn-xs btn-info"><i class="glyphicon-edit glyphicon"></i></a>
						<a href="#myModalViewBookings'.$output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static"><i class="glyphicon-trash glyphicon"></i></a>
					</td>
				</tr>
				';
			$page_protect->get_supervisor_info($output[$x]['user_id']);
			echo' 
				<div id="myModalViewAccount'.$output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">	
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
					</div>
				
					<div class="modal-body">
						<p style "vertical-align:top;"> 
							<img src="'.$page_protect->sup_photo.'" class="img-rounded img-responsive" alt="Photo" height="" width="150" />
						</p>
			            <p style="vertical-align:top;">
							Nickname:
		                   	'.$page_protect->sup_nickname.'</a>
		                </p>
		                <p style="vertical-align:top;">
							Phone Number:
		                    '.$page_protect->sup_phone.'
			            </p>
		                <p style="vertical-align:top;">
			               	Email: '.$output[$x]['email'].'
						</p>
						<p style="vertical-align:top;">
							Skype ID: '.$output[$x]['skype_id'].'
						</p>
					</div>
					
					<div class="modal-footer">
						<a href="supervisor_profile.php?SupId='.$output[$x]['user_id'].'&t=7A"><button class="btn">View</button></a>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</div>
				</div>
				</div>

				<div id="myModalViewBookings'.$output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">	
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
					</div>
					
					<div class="modal-body">
						<p style "vertical-align:top;"> 
							<img src="'.$page_protect->sup_photo.'" class="img-rounded  img-responsive" alt="Photo" height="" width="150" />
						</p>
		            	<p style="vertical-align:top;">
						Nickname:
	            		'.$page_protect->sup_nickname.'</a>
	            		</p>
	            		<p style="vertical-align:top;">
					 	Phone Number:
	            		'.$page_protect->sup_phone.'
		            	</p>
	            		<p style="vertical-align:top;">
		                Email: '.$output[$x]['email'].'
						</p>
						<p style="vertical-align:top;">
							Skype ID: '.$output[$x]['skype_id'].'
						</p>
					</div>
					
					<div class="modal-footer">
						<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=7A" >
							<input type="hidden" name="deactivate_id" value="'.$output[$x]['user_id'].'"/>
							<input type="submit" name="deactivate" class="btn" value="Deactivate"/>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</form>	
					</div>
				</div>
				</div>
				</div>'
			;
		}
			?>
			</tbody>
	</table>