<?php
	include('header-admin.php');

	$isSent = false;
	$res = $page_protect->get_email_logs();
	
	if(isset($_POST['resend_email'])){
		$err_id = $_POST['error_log_id'];
		
		$q = 'SELECT * FROM email_logs WHERE id = '. $err_id. ' AND isSent = 0';
		$res_query = mysql_query($q);

		$res_query = mysql_fetch_array($res_query);

		$e_sender = $res_query['e_sender'];
		$e_receiver = $res_query['e_receiver'];
		$e_message = $res_query['e_message'];
		$e_subject = $res_query['e_subject'];
		
		$isSent = $page_protect->email_notif($e_receiver, $e_message, $e_subject, true);

		if($isSent){
			$q = 'UPDATE email_logs set isSent = 1 WHERE id = '. $err_id;
			mysql_query($q);
		} else {
			echo "<div>Email Sending Failed</div>";
		}
	}

?>

<div class=" container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-7">	
		
			<table class="table">
				<tr>
					<th>Subject</th>
					<th>Body</th>
					<th>Recipient</th>
					<th>Sender</th>
					<th>DateTime</th>
					<th>Action</th>
				</tr>
					<?php 
						while($row = mysql_fetch_array($res)){
							echo '<tr>';
							echo '<td>'.$row['e_subject'].'</td>';							
							echo '<td>'.$row['e_message'].'</td>';
							echo '<td>'.$row['e_recipient'].'</td>';		
							echo '<td>'.$row['e_sender'].'</td>';		
							echo '<td>'.$row['timestamps'].'</td>';
							echo '<td>
							<form action=';
							echo $_SERVER["PHP_SELF"];
							echo ' method="post">
							<input type="hidden" name="error_log_id" value ="'.$row['id'].'"/>
							<input type="submit" class="btn btn-primary" name="resend_email" value="Resend"/>
							</form>
							</td>';		
							echo '</tr>';
						}
					?>
			</table>
		
		
		</div>
		<div class="col-md-3">
		</div>

</div>


<?php
	include('footer-admin.php');
?>   
