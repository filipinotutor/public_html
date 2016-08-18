<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Affordable Pricing FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						
						<h1>問い合せ</h1>
						<?php
								
								if (isset($_REQUEST['Submit']))  {
								  
									$to = 'inquire@filipinotutor.com';
			
									$name = $_REQUEST['fullname'];
									$email = $_REQUEST['email'];
									$message = $_REQUEST['message'];
									
									$headers = "From: " . strip_tags($to) . "\r\n";
									$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
									$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
									
									$subject = 'FilipinoTutor.com Inquiry from '.$name;
									
									$body = "<table>
									<tr>
										<td>Name: </td>
										<td>".$name."</td>
									</tr>
									<tr>
										<td>Email: </td>
										<td>".$email."</td>
									</tr>
									<tr>
										<td>Message: </td>
										<td>".$message."</td>
									</tr>
									</table>";
									
									if(  mail($to, $subject, $body, $headers) ) {
										
										echo '<div class="alert alert-success" role="alert">Thank you for contacting us! We will reply to your query as soon as we can</div>';
									}

									
								}
								 
								?>

						<div class="row">
							
							<div class="col-sm-9">
								
								<form class="form-horizontal" method="POST" role="form" name="formInquire">
								<div class="form-group">
									<label for="name" class="col-sm-3 control-label">お名前</label>
									<div class="col-sm-7">
									  <input type="text" class="form-control" id="name" name="fullname"required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-3 control-label">メールアドレス</label>
									<div class="col-sm-7">
									  <input type="email" name="email" class="form-control" id="email" required>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-sm-3 control-label">お問い合わせ内容</label>
									<div class="col-sm-7">
									  <textarea class="form-control" rows="5" name="message" required></textarea>
									</div>
								</div>	
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<input type="submit" class="btn btn-primary" value="送信" name="Submit"/>
								</div>							
								</form>
							</div>
						
						
						</div>
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>