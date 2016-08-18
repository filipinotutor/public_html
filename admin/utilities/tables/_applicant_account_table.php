<table class="table table-striped table-bordered table-hover table-condensed DataTable">
	<thead>
    <th>Name</th>
	<th class="hidden-xs">Email</th>
	<th class="hidden-xs">Skype</th>
    <th class="hidden-xs">Mobile Number</th>
    <th>
    <span class="hidden-xs">date of interview</span>
    <span class="visible-xs-block"><i class="glyphicon-calendar glyphicon"></i></span>
    </th>
	<th style="min-width:115px;"></th>
    </thead>
	<?php $output = $page_protect->get_applicant_list(NULL);
	$resume_icon='';		
	for($x=0;$x!=$output['count'][0];$x++){
		if($output[$x]['resume'] =='') {
			$resume_icon='';
			}
		else {
			$resume_icon='<a href="../'.$output[$x]['resume'].'"  class="btn btn-xs btn-info"><i class="glyphicon-cloud-download glyphicon"></i></a>';
			}	
	echo'
			<tr>
				<td>'.$output[$x]['last_name'].' '.$output[$x]['first_name'].'</td>
				<td class="hidden-xs">'.$output[$x]['email'].'</td>
				<td class="hidden-xs">'.$output[$x]['skype'].'</td>
				<td class="hidden-xs">'.$output[$x]['mobile'].'</td>
				<td>'.$output[$x]['interviewdate'].'</td>
				<td>
					<a href="#myModalViewAccount'. $output[$x]['applicant_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static"><i class="glyphicon-search glyphicon"></i></a>
					<a href="#myModalViewBookings'. $output[$x]['applicant_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static"><i class="glyphicon-calendar glyphicon"></i></a>
					<a href="applicant_profile.php?AppId='.$output[$x]['applicant_id'].'&t=3A"  class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static"><i class="glyphicon-edit glyphicon"></i></a>
					'.$resume_icon.'	
					<a href="#myModalDeleteAccount'. $output[$x]['applicant_id'].'" class="btn btn-xs btn-info" data-toggle="modal" data-backdrop="static"><i class="glyphicon-trash glyphicon"></i></a>	
				</td>
			</tr>
				
			<div id="myModalViewAccount'. $output[$x]['applicant_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
					</div>
					
					<div class="modal-body">
						<p style="vertical-align:top;">Email: '.$output[$x]['email'].'
						</p>
						<p style="vertical-align:top;">Skype ID: '.$output[$x]['skype'].'
						</p>
					</div>
					
					<div class="modal-footer">
						<a href="applicant_profile.php?AppId='.$output[$x]['applicant_id'].'&t=3A" ><button class="btn">View</button></a>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</div>
				</div>
			</div>

			<div id="myModalViewBookings'. $output[$x]['applicant_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
					</div>

					<div class="modal-body">
						<h4>Schedule Applicant for training:</h4>'.$output[$x]['training_date'].'
						<form action="'.$_SERVER['PHP_SELF'].'?t=3A" method="post">
						<input type="hidden" name="app_id" value="'.$output[$x]['applicant_id'].'" />
						Select Time:&nbsp;<select name="hh" class="dropdown-toggle">
						';
						for($y=1;$y!=13;$y++)
						{
							echo'<option value="'.$y.'">'.$y.'</option>';
						}
						echo'</select> : 
						<select name="mm" class="dropdown-toggle">
						<option value="00">00</option>
						';
						for($y=15;$y!=60;$y+=15)
						{
							echo'<option value="'.$y.'">'.$y.'</option>';
						}
						
						echo'</select>
						<select name="set">
							<option value="am">am</a>
							<option value="pm">pm</a>
						</select>
						<br><br>
						Select date:&nbsp;
						<input type="text" class="datepickerto" name="training_date"/>
					</div>

					<div class="modal-footer">
						<button class="btn" name="train_sched" type="submit" ><i class=" glyphicon-ok-sign"> </i>&nbsp;Save</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						</form>
					</div>
				</div>
				</div>
			</div>

			<div id="myModalDeleteAccount'. $output[$x]['applicant_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
					</div>
					
					<div class="modal-body">
						<p style="vertical-align:top;">Email: '.$output[$x]['email'].'
						</p>
						<p style="vertical-align:top;">Skype ID: '.$output[$x]['skype'].'
						</p>
					</div>
					
					<div class="modal-footer">
						<form action="'.$_SERVER['PHP_SELF'].'?t=3A&" method="POST" /> 
						<a href="applicant_profile.php?AppId='.$output[$x]['applicant_id'].'&t=3A" ><button class="btn"><i class=" glyphicon-search"> </i>&nbsp;View</button></a>
						<input type="hidden" class="btn" name="id" value="'.$output[$x]['applicant_id'].'" />
						<button type="submit" class="btn" name="delete" ><i class=" glyphicon-remove"> </i>&nbsp;Delete</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</form>
					</div>
				</div>
				</div>
			</div>';
		}		
				
			?>
</table>