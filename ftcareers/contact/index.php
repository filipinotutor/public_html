<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/ftcareers/";

	$title = "Contact - FilipinoTutor.com";
	$metad = "";
	
	include($path.'/theme/header.php');

?>

<div id="content" class="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-6">
						<div id="left">
							<h3>Contact Form</h3> 
							
							<?php	
								if($_POST['submit']) {
									$name = $_POST['fullname'];
									$emailad = $_POST['emailad'];
									$phone = $_POST['phone'];
									$message = $_POST['message'];
								
									$to = "admin@filipinotutor.com";
									
									$subject = "Contact Form Submission from $email";
										
									$mailbody = "
									<html>
									<head>
									<title>Contact Form Submission</title>
									</head>
									<body>
									
									<table>
									<tr>
										<td>Name: </td>
										<td>$name</td>
									</tr>
									<tr>
										<td>Email: </td>
										<td>$emailad</td>
									</tr>
									<tr>
										<td>Phone: </td>
										<td>$phone</td>
									</tr>
									<tr>
										<td>Message: </td>
										<td>$message</td>
									</tr>
									</table>
									</body>
									</html>
									";

									// Always set content-type when sending HTML email
									$headers = "MIME-Version: 1.0" . "\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

									// More headers
									$headers .= 'From: <admin@filipinotutor.com>' . "\r\n";
									//$headers .= 'Cc: myboss@example.com' . "\r\n";

									mail($to,$subject,$mailbody,$headers);
								}
							?>
							<div class="inner">
								<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label" for="">Name<span class="asterisk">*</span></label>
										<div class="controls">
										<input class="form-control" type="text" name="fullname" required placeholder="" title="Enter your Full Name">
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label" for="inputEmail">Email Address<span class="asterisk">*</span></label>
										<div class="controls">
										   <input class="form-control" type="email" name="emailad" required name="" placeholder="" title="Enter your Email Address">
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label" for="">Phone/Mobile<span class="asterisk">*</span></label>
										<div class="controls">
											 <input class="form-control" type="text" name="phone" required placeholder="" title="Enter your Contact Number">
										</div>
									</div>
									
								
									<div class="control-group">
										<label class="control-label" for="inputMobile">Message</label>
										<div class="controls">
											 <textarea class="form-control" name="message" title="Enter your Message" rows="20"></textarea>
										</div>
									</div>
									<br>
									<br>
									<div class="controls">
										<input type="submit" class="btn" name="submit" id="submit" value="Submit" />
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="right col-lg-6">
						<div id="right">
							<h3>Application Team</h3> 
							<div class="inner">
								<p>
								<b>Email:</b> <a href="mailto:inquire@filipinotutor.com">inquire@filipinotutor.com</a><br><br>
								<b>Mobile:</b> +639328329038<br><br>
								<b>Phone:</b> ( 046 ) 4329038<br><br>
								<b>Skype Account:</b> filipinotutor.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



	
<?php include($path.'/theme/footer.php'); ?>