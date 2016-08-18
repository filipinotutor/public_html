<h4>Latest Tutor</h4> 
	<table class="table table-striped table-bordered table-hover DataTable">
		<thead>
        <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Skype</th>
			<th></th>
		</tr>
       </thead> 
		<?php 
		$output= $page_protect->latest_tutor_assigned(NULL);
		for($x=0;$x!=$output['count'][0];$x++){
		echo '
		<tr>
			<td>
				<span class="label label-success">'.$output[$x]['user_id'].'</span>
			</td>
			<td>
				'.$output[$x]['first_name'].' '.$output[$x]['last_name'].'
			</td>
			<td>
				'.$output[$x]['skype_id'].'
			</td>
			<td>
				<a href="#ModalAssignSup'. $output[$x]['user_id'].'" class="btn btn-xs btn-primary" data-toggle="modal" data-backdrop="static">
					<i class="glyphicon-file glyphicon"></i>
				</a>	
			</td>
		</tr>

		<div id="ModalAssignSup'. $output[$x]['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 id="myModalLabel">Assign a Supervisor</h4>
				</div>
				<div class="modal-body" style="overflow-y:scroll; col-md-12">
				';
			echo $page_protect->get_assign_sup($output[$x]['user_id']);
			echo '
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
			</div>
			</div>
		</div>
		';
		}
		?>
	</table>	