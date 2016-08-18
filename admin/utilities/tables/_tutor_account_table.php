	
	<?php
		$path = $page_protect->get_path();
		switch($path){
			case 'tutors.php':
			$url = '?t=2A';
			$deact = 'user=tutor&t=2A';
		break;
		}
	?>
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right">
				<a href="deactivated_accounts.php?<?php echo $deact; ?>" class="btn btn-sm btn-default">DEACTIVATED ACCOUNTS</a>
				<a href="add-tutor.php" class = "btn btn-sm btn-success"> ADD NEW TUTOR </a>
			</div>
		</div>
	</div>
	<br clear="all" />
	<table class="table table-striped table-bordered table-hover table-condensed DataTable">
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th class="hidden-xs">Skype</th>
			<?php
				$page_protect->get_admin();
				if($page_protect->admin_id == $page_protect->user_id){
					echo " <th>Supervisor</th>";
				}
			?>
			<th style="min-width:115px"></th>
		</tr>
		</thead>
		<?php
		if($filter != ""){
			$output = $page_protect->get_tutor_list_sup($filter,NULL);
		}
		else{
			$output = $page_protect->get_tutor_list_sup("",NULL);
		}
		for($x=0;$x!=$output['count'][0];$x++){
			
			$page_protect->get_tutor_info($output[$x]['user_id']);

		echo'<tr>
				<td>
					<span class="label label-success">'.$output[$x]['user_id'].'</span>
				</td>
				<td>
					'.$output[$x]['last_name'].' '.$output[$x]['first_name'].'
				</td>
				<td class="hidden-xs">
					'.$output[$x]['skype_id'].'
				</td>';

		if($output['ck'][0]){
			$page_protect->get_supervisor_info($output[$x]['supervisor_id']);
				echo "<td>".$page_protect->sup_fname." ".$page_protect->sup_lname."</td>";
			}
		
		echo'
			<td>
				<a href="#myModalViewAccount'. $output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static" data-toggle="tooltip" data-placement="top" title="View" >
					<i class="glyphicon-search  glyphicon"></i>
				</a>	
				<a href="tutor_profile.php?t=2A&TutorId='. $output[$x]['user_id'].'&u=t" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
					<i class="glyphicon-edit glyphicon"></i>
				</a>
				<a href="tutor_schedule.php?TutorId='. $output[$x]['user_id'].'&t=2A" class="btn btn-xs btn-info" target="blank" data-toggle="tooltip" data-placement="top" title="Schedules">
					<i class="glyphicon-calendar glyphicon"></i>
				</a>
				<a href="#myModalViewBookings'.$output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static" data-toggle="tooltip" data-placement="top" title="Delete">
					<i class="glyphicon-trash glyphicon"></i>
				</a>';
		if($output[$x]['active'] == 'n'){
			echo '&nbsp;<a href="#myModalActivateAccount'. $output[$x]['user_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static" data-toggle="tooltip" data-placement="top" title="Activate" ><i class="glyphicon-envelope  glyphicon"></i></a>';
			$f = str_split($output[$x]['first_name']);
			$l = str_split($output[$x]['last_name']);
			$pass = rand(10000,99999);
			$username 	= $f[0].''.$l[0].''.date("mY").''.$output[$x]['user_id'];
			
			$supervisors = $page_protect->get_supervisors();
			$supervisors_list = '<p style="vertical-align:top; text-align:left;"><b>Assign Supervisor:</b><select class="form-control supervisors" name="supervisor_id" style="width: 250px;">';
			$supervisors_list .='<option value="0">-- Select --</option>';
		
			for($y=0;$y!=$supervisors['count'][0];$y++){
				$supervisors_list .='<option value="'.$supervisors['id'][$y].'">'.$supervisors['name'][$y].'</option>';
			}
			
			$supervisors_list .= '</select></p>';
		}

		
		echo '</td>

			</tr>
				<div id="myModalViewAccount'. $output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					
					<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
						</div>
						
						<div class="modal-body">
							<p style "vertical-align:top;"> 
								<img src="'.$page_protect->tutor_photo.'" class="img-rounded  img-responsive" alt="Photo" height="" width="150" />
							</p>
					     	<p style="vertical-align:top;">
							Nickname:
					        	'.$page_protect->tutor_nick_name.'</a>
					        </p>
					        <p style="vertical-align:top;">
							Phone Number:
					        	'.$page_protect->tutor_phone.'
					        </p>
					        <p style="vertical-align:top;">
					        	Email: '.$output[$x]['email'].'
							</p>
							<p style="vertical-align:top;">
								Skype ID: '.$output[$x]['skype_id'].'
							</p>
						</div>
						
						<div class="modal-footer">
							<a href="tutor_profile.php?TutorId='.$output[$x]['user_id'].'&t=2A&u=t" class="btn btn-default">
								View
							</a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">
								Close
							</button>
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
							<p style "vertical-align:top;"> 
								<img src="'.$page_protect->tutor_photo.'" class="img-rounded  img-responsive" alt="Photo" height="" width="150" />
							</p>
				            <p style="vertical-align:top;">
							Nickname:
			                	'.$page_protect->tutor_nick_name.'</a>
			                </p>
			                <p style="vertical-align:top;">
				             	Email: '.$output[$x]['email'].'
							</p>
							<p style="vertical-align:top;">
								Skype ID: '.$output[$x]['skype_id'].'
							</p>
						</div>

						<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=2A" >
						
						<div class="modal-footer">
							<input type="hidden" name="deactivate_id" value="'.$output[$x]['user_id'].'"/>
							<button type="submit" name="deactivate" class="btn" ><i class="glyphicon-trash glyphicon"></i>&nbsp;Deactivate</button>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</div>
						
						</form>	

					</div>
					</div>

				</div>

				<div id="myModalActivateAccount'. $output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					
					<div class="modal-dialog">
					<div class="modal-content">
						<!-- <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
						</div>
						-->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h5 id="myModalLabel"><b>Are you sure you want to activate this tutor?</b></h5>
						</div>
						<div class="modal-body">
							<!-- <p style "vertical-align:top;"> 
								<img src="'.$page_protect->tutor_photo.'" class="img-rounded  img-responsive" alt="Photo" height="" width="150" />
							</p>
					     	<p style="vertical-align:top;">
							Nickname:
					        	'.$page_protect->tutor_nick_name.'</a>
					        </p>
					        <p style="vertical-align:top;">
							Phone Number:
					        	'.$page_protect->tutor_phone.'
					        </p>
					        <p style="vertical-align:top;">
					        	Email: '.$output[$x]['email'].'
							</p>
							<p style="vertical-align:top;">
								Skype ID: '.$output[$x]['skype_id'].'
							</p> -->
							
							<p style="text-align:center;">
								<b>Account Details</b>
							</p>
							<p style="vertical-align:top;">
							<b>Name:</b>
					        	'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'
					        </p>
							<p style="vertical-align:top;">
							<b>Email Address:</b>
					        	'.$output[$x]['email'].'
					        </p>
					        <p style="vertical-align:top;">
							<b>Generated Username:</b>
					        	'.$username.'
					        </p>
					        <p style="vertical-align:top;">
							<b>Password:</b>
					        	'.$pass.'
					        </p>
							<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=2A" >
					        '.$supervisors_list.'
						</div>
						
						
						<div class="modal-footer">
							<input type="hidden" name="a_email" value="'.$output[$x]['email'].'"/>
							<input type="hidden" name="a_user_id" value="'.$output[$x]['user_id'].'"/>
							<input type="hidden" name="a_username" value="'.$username.'"/>
							<input type="hidden" name="a_pass" value="'.$pass.'"/>
							<button type="submit" name="activate" class="btn btn-primary">&nbsp;Confirm</button>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						</div>

					</div>
					</div>

				</div>';
		}	
	?>
	</table>
