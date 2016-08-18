
<table class="table table-striped table-bordered DataTable">
<thead>	
	<tr>
	    <th>Tutor's Name</th>
	    <th>Total Points</th>
	    <th>Amount</th>
	    <th>Details</th>
 	</tr>
</thead>
<tbody>	
 	<?php
 	if(isset($filter)){
		$output = $page_protect->get_tutor_conversion_sup($filter,NULL);
	} else {
	    $output = $page_protect->get_tutor_conversion_sup(true,NULL);
	}
	    for($x=0;$x!=$output['count'][0];$x++){

	    	echo '<tr>
	    			<td class="col-1">
	    				<a href="tutor_profile.php?TutorId='.$output[$x]['tutor_id'].'&t=2A&u=t" target="_blank">'.$output[$x]['tutor_name'].'</a>
	    			</td>
		            <td>'.$output[$x]['points'].'</td>
		            <td>'.number_format($output[$x]['value'],2).'</td>
					<td><button class="btn btn-sm btn-info view-conversions" data-toggle="modal" data-target="#id'.$output[$x]['tutor_id'].'"><i class="glyphicon-search glyphicon"></i> View</button></td>
					<td><div class="modal fade" id="id'.$output[$x]['tutor_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Tutor: <span id="tutor_name"></span></h4>
						      </div>
						      <div class="modal-body">
						      		<div class="row">
						      			<table class="table table-striped table-bordered table-hover"><tr><th>Date</th><th>Time</th><th>Student Nickname</th><th>Report</th></tr>';
								      		
								      		$row = $page_protect->get_conversion_details($output[$x]['tutor_id']);
								      		
								      		$tmp = json_decode($row);

								      		foreach ($tmp->Response as $key => $value) {
								      			echo '<tr>';
								      			echo '<td>'.$value->fulldate.'</td>';
								      			echo '<td>'.$value->time.'</td>';
								      			echo '<td>'.$value->student_nickname.'</td>';
								      			if($value->report_id == null) {
													// echo '<td><a href="" class="btn btn-default btn-sm disabled" title="No report found">View</a></td>';
												} else {
													// echo '<td><a href="./view_report.php?report='.$value->student_nickname.'&t=2C" class="btn btn-default btn-sm" target="_blank">View</a></td>';
												}
								      			echo '</tr>';
								      		}

						      		echo '</table></div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
					</td>';
	    }
	?>   
</tbody>	
</table>
