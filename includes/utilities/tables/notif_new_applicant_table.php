<?php
if(IsSet($_POST['new_app'])){
$pname = $_POST['pname'];
?>	
	<div class=" alert-danger"><a class="close"  data-dismiss="alert">&times;</a>
	<table class="table table-bordered table-striped">
	<thead>
		<th>ID:</th>
		<th>Name:</th>
		<th>Email:</th>
		<th>Skype ID:</th>
	</thead>
	<tbody>
		<?php
		$get = $page_protect->get_notification($page_protect->user_id,"AND `process_name`='new applicant'",NULL);
		$page_protect->notif_seen($pname);
		for($x=0;$x!=$get['count'][0];$x++){
			$page_protect->app_info_for_sup($get[$x]['p_id']);
			echo"<tr>	
				<td>".$get[$x]['p_id']."</td>
				<td>".$page_protect->app_first_name." ".$page_protect->app_last_name."</td>
				<td>".$page_protect->app_email."</td>
				<td>".$page_protect->app_skype."</td>
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