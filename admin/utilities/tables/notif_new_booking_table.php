<?php
if(IsSet($_POST['new_book'])){
$pname = $_POST['pname'];
?>
<div class="alert alert-success">
<a class="close" data-dismiss="alert">&times;</a>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<th>Date</th>
		 	<th>Time</th>
		 	<th>Student Name</th>
		 	<th class="hidden-xs">Tutor Name</th>
		</thead>
		<tbody>
		<?php	
		$get = $page_protect->get_notification($page_protect->user_id,"AND `process_name`='new booking'",NULL);
			$page_protect->notif_seen($pname);
			for($x=0;$x!=$get['count'][0];$x++){
				$row = $page_protect->get_sched_for_notif($get[$x]['p_id']);
				$page_protect->student_info_for_sup($row['user_id']);
				$page_protect->tutor_info_for_sup($row['tutor_id']);
				echo "	<tr>
							<td>".$row['year']."-".$row['month']."-".$row['day']."</td>
							<td>".$row['time']."</td>
							<td>".$page_protect->student_first_name." ".$page_protect->student_last_name."</td>
							<td class='hidden-xs'>
							".$page_protect->tutor_first_name." ".$page_protect->tutor_last_name."
							</td>
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