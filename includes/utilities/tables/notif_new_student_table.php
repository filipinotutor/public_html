<?php
if(IsSet($_POST['new_stud'])){
	$pname = $_POST['pname'];
	?>	<br/>
		<div class="alert alert-warning"><a class="close"  data-dismiss="alert">&times;</a>
		<table class="table table-bordered table-striped">
		<thead>
			<th>ID:</th>
			<th>Name:</th>
			<th class="hidden-xs">Email:</th>
			<th class="hidden-xs">Skype ID:</th>
		</thead>
		<tbody>
			<?php
			$get = $page_protect->get_notification($page_protect->user_id,"AND `process_name`='new student' ",NULL);
			$page_protect->notif_seen($pname);
			for($x=0;$x!=$get['count'][0];$x++){
				$page_protect->student_info_for_sup($get[$x]['p_id']);
				echo"<tr>	
					<td>".$get[$x]['p_id']."</td>
					<td>".$page_protect->student_first_name." ".$page_protect->student_last_name."</td>
					<td class='hidden-xs'>".$page_protect->student_email."</td>
					<td class='hidden-xs'>".$page_protect->student_skype_id."</td>
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