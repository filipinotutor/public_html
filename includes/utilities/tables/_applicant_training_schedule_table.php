	<table class="table table-striped table-bordered table-hover">
	<tr>
	<th>Applicant's Name</th>
	<th>Training Date</th>
	<th class="hidden-xs">Skype ID</th>
	<th></th>
	</tr>
	
	<?php 
	$supervisors = $page_protect->get_supervisors();

	$supervisors_list = '<p style="vertical-align:top; text-align:left;">Assigned Supervisor: <select class="form-control supervisors" name="supervisor_id" style="width: 250px;">';
		$supervisors_list .='<option value="0">-- Select --</option>';
		for($y=0;$y!=$supervisors['count'][0];$y++){
			$supervisors_list .='<option value="'.$supervisors['id'][$y].'">'.$supervisors['name'][$y].'</option>';
			}
	$supervisors_list .= '</select></p>';
	
	$output = $page_protect->get_app_training_sched(NULL);
	for($x=0;$x!=$output['count'][0];$x++){
	echo '
		<tr>
			<td>
				<a href="applicant_profile.php?AppId='.$output[$x]['applicant_id'] .'&t=2B" target="blank" title="View Applicant\'s Profile" data-placement="right" data-toggle="tooltip">
				'.$output[$x]['first_name'].' '.$output[$x]['last_name'].'
				</a>
			</td>
			<td>'.$output[$x]['training_date'].'</td>
			<td class="hidden-xs">'.$output[$x]['skype'].'</td>
			<td>
				<a href="#myModalDecline'.$output[$x]['applicant_id'] .'"  class="btn btn-primary btn-xs icon_applicant_action" data-toggle="modal" data-backdrop="static"> 
				<i class="glyphicon-file glyphicon"></i>
				</a>
			</td>
		</tr>
		<div id="myModalDecline'. $output[$x]['applicant_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 id="myModalLabel">'. $output[$x]['first_name'].' '.$output[$x]['last_name'].'</h4>
				</div>
				<!--<div class="modal-body">
					
				</div>-->
				<div class="modal-footer">
					<form action="'.$_SERVER['PHP_SELF'].'?t=3A&" method="POST" />
					 <p style="vertical-align:top; text-align:left;">Email: '.$output[$x]['email'].'
					</p>
					<p style="vertical-align:top; text-align:left;">Skype ID: '.$output[$x]['skype'].'
					</p>
					
					<input type="hidden" class="btn" name="id" value="'.$output[$x]['applicant_id'].'" />
						'.$supervisors_list.'
						<hr />
						<button type="submit" class="btn btn-success btn_approve_applicant disabled" data-id="'.$output[$x]['applicant_id'].'" name="approve_applicant" > <i class="glyphicon glyphicon-ok"> </i>&nbsp;Approve </button>
						<button type="submit" class="btn btn-warning" name="delete"><i class="glyphicon glyphicon-remove"></i>&nbsp; Decline</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</form>
					
				</div>
			</div>
			</div>
		</div>';
		
	}
	?>
	</table>
    <script>
	$('.supervisors').on('change', function() {
	  if(this.value != 0) {
		  $('.btn_approve_applicant').removeClass("disabled");
		  }
		else {
			$('.btn_approve_applicant').addClass("disabled");
			} 
	icon_applicant_action
			 
	});
	$('.icon_applicant_action').on('click', function() {
		  $('.btn_approve_applicant').addClass("disabled");
	});
	</script>
							  