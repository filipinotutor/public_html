<?php
include("includes/main_class.php"); 

require_once('includes/recaptchalib.php');

$page_protect = new Main_Class;

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US" prefix="og: http://ogp.me/ns#">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>English Tutors Apply Online -</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<link rel="icon" href="/wp-content/themes/executive/images/favicon.ico" type="image/x-icon">

<meta name="viewport" content="width=device-width, initial-scale=0.8">
		<!-- Bootstrap -->
		<link href="/careers/theme/css/bootstrap.css" rel="stylesheet">	
		<link href="/careers/theme/style.css" rel="stylesheet">	
		<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/images/favicon.ico" type="image/x-icon">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

	<link href="/careers/theme/style.css" rel="stylesheet">
	<link href="/careers/theme/mobile.css" rel="stylesheet">

	<script src="../js/jquery.1.9.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery.plugin.js"></script>
	<script src="../js/jquery.datepick.js"></script>
	<link href="../js/jquery.datepick.css" rel="stylesheet">

	
	<script type="text/javascript">
		$(function(){
		$('#idate').datepick({dateFormat: 'yyyy-mm-dd'});
		$('#bdate').datepick({dateFormat: 'yyyy-mm-dd',minDate: new Date(1960, 1 - 1, 26), 
                             maxDate: new Date(1996, 12 - 1, 26)});
				});
	</script>

</head>

<body>
    <header>
		<div class="container">
			<div class="row">
			    <div class="col-md-4" id="logo">
					<a href="/careers/"><img src="/careers/theme/images/logo.png" class="center-block img-responsive" alt=""></a>
				</div>
				<div class="col-md-8 hidden-xs" id="nav">
				    <nav class="text-right">
					   <p class="pull-right"><a href="http://filipinotutor.com/apply.php" class="header-btn btn">Apply Now</a></p>
					    <ul class="pull-right">
					    	<li><a href="/careers/process/">Requirements &amp; Hiring Process</a></li>
					    	<li><a href="/careers/contact/">Contact</a></li>
					    </ul>
						
					</nav>
				</div>
			</div>
		</div>
	</header>
	
	<nav class="navbar navbar-default visible-xs" role="navigation">
		<div class="container-fluid">
			 <div class="navbar-header">	 
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobile-nav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
			<div class="collapse navbar-collapse" id="mobile-nav">
				<ul>
					<li><a href="/careers/process/">Requirements &amp; Hiring Process</a></li>
					<li><a href="http://filipinotutor.com/apply.php">Apply Now</a></li>
					<li><a href="/careers/contact/">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
<div id="content">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="post">
				<div class="inner">
					
						<div class="container form-horizontal">
						<?php
						if(isset($_POST['submit']))
						{
							$firstname=$_POST[inputFirstName];
							$lastname =$_POST[inputLastName];
							$gender   =$_POST[inputGender];
							$skype    =$_POST[inputSkypeID];
							$email    =$_POST[inputEmail];
							$mobile   =$_POST[inputMobile];
							$birthday =$_POST[birthdate];
							$intDate  =$_POST[interviewdate];
							$level    =$_POST[level];
							$school   =$_POST[inputSchool];
							$attending=$_POST[inputAttending];
							$teaching_exp=$_POST[inputTeachingExp];
							$self_intro=$_POST[selfIntro];
							$interview_time=$_POST[inputInterview];

							
						

  $privatekey = "6LcOFyQTAAAAABTeAlOvnOHs-YeAgJHKC0E8iLll";

  $resp = recaptcha_check_answer ($privatekey,

                                $_SERVER["REMOTE_ADDR"],

                                $_POST["recaptcha_challenge_field"],

                                $_POST["recaptcha_response_field"]);
							// if you don't like the confirm feature use a copy of the password variable
							//$page_protect->register_user($_POST['inputUsername'], $_POST['inputFirstName'], $_POST['inputLastName'],  $_POST['inputEmail'],  $_POST['inputConfirmEmail'], $_POST['inputPassword'], $_POST['inputConfirmPassword'], $_POST['inputGender'], $_POST['inputSkypeID']); // the register method
							//print_r($_POST);
						//	 [inputFirstName] => [inputLastName] => [inputGender] => Male [inputSkypeID] => [inputEmail] => [inputMobile] => [bMonth] => 1 [bDay] => 1 [bYear] => 2013 [level] => elementary [inputSchool] => [inputAttending] => attending [selfIntro] => [inputInterview] 

						/*
							echo preg_match('/\S/', $firstname);
							if (preg_match('!^[\w @.-]*$!', $firstname)) {
							echo 'valid';
							}
						*/	
							//firstname
							if ($firstname != "") {  
								$firstname = filter_var($firstname, FILTER_SANITIZE_STRING);  
								if ($firstname == "") {  
									$errors .= 'Please enter a valid First Name.<br/><br/>';  
								}  
							} else {  
								$errors .= 'Please enter your First Name.<br/>';  
							}  

							//email

							if ($email != "") {  
								$email = filter_var($email, FILTER_SANITIZE_EMAIL);  
								if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
								   $errors .= "$email is <strong>NOT</strong> a valid email address.<br/><br/>";  
								} 
							} else {  
								$errors .= 'Please enter your email address.<br/>';  
							}  

							//lastname
							if ($lastname != "") {  
								$lastname = filter_var($lastname, FILTER_SANITIZE_STRING);  
								if ($lastname == "") {  
									$errors .= 'Please enter your First Name.<br/>';  
								}  
							} else {  
								$errors .= 'Please enter your Last Name.<br/>';  
							} 
							//skype

							if ($skype != "") {  
								$skype = filter_var($skype, FILTER_SANITIZE_STRING);  
								if ($skype == "") {  
									$errors .= 'Please enter your Skype ID.<br/>';  
								}  
							} else {  
								$errors .= 'Please enter your Skype ID.<br/>';  
							} 

							//mobile
							if ($mobile != "") {  
								$mobile = filter_var($mobile, FILTER_SANITIZE_STRING);  
								if ($mobile == "") {  
									$errors .= 'Please enter your Mobile Number.<br/>';  
								}  
							} else {  
								$errors .= 'Please enter your Mobile Number.<br/>';  
							}  

							//birthday
							if ($bmonth != "1" || $bday != "1" || $byear !="2013") {  
								if (intval($byear) > 1997) {  
									$errors .= 'You must be at least 16 years old.<br/>';  
								}  
							} else {  
								$errors .= 'Please enter your correct birthday.<br/>';  
							} 

							/* insert validation for resume */
							
							/* if( $_FILES["file"]["name"] != ""){
								if (( $_FILES["file"]["type"] == "application/pdf") && ($_FILES["file"]["size"] < 20000000)){
									if ($_FILES["file"]["error"] > 0) {
										echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $_FILES["file"]["error"] . '<br></div>';
									}
									if (file_exists("../resume/" . $_FILES["file"]["name"])) {
										$_FILES["file"]["name"] = str_replace(".pdf","",$_FILES["file"]["name"])."1.pdf";
									}

											move_uploaded_file($_FILES["file"]["tmp_name"],"resume/" . basename($_FILES["file"]["name"]));
											$resume = '../resume/'.$_FILES["file"]["name"].'';
											//$resume = filter_var($resume, FILTER_SANITIZE_STRING);
									}
								else if (( $_FILES["file"]["type"] == "application/docx") && ($_FILES["file"]["size"] < 20000000)){
									if ($_FILES["file"]["error"] > 0) {
										echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $_FILES["file"]["error"] . '<br></div>';
									}
									if (file_exists("../resume/" . $_FILES["file"]["name"])) {
										$_FILES["file"]["name"] = str_replace(".docx","",$_FILES["file"]["name"])."1.docx";
									}

											move_uploaded_file($_FILES["file"]["tmp_name"],"resume/" . basename($_FILES["file"]["name"]));
											$resume = '../resume/'.$_FILES["file"]["name"].'';
											//$resume = filter_var($resume, FILTER_SANITIZE_STRING);
									}
								else {
									echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';goto a;
								}
							}
							else {
								echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';goto a;
							}
							 */
							// test upload
							$target_dir = "resume/";
	$temp = explode(".", $_FILES["file"]["name"]);
	$newfilename = $firstname . $lastname .'-resume' .'-'. date('m-d-Y'). '.' . end($temp);

	//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);

									
	//$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$target_file = $target_dir . $newfilename;

	$uploadOk = 1;
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

	/*
	if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["file"]["tmp_name"]);
	if($check !== false) {
	echo "File is valid - " . $check["mime"] . ".";
	$uploadOk = 1;
	} else {
	echo "File is not an image.";
	$uploadOk = 0;
	}
	}
	*/
	// Check if file already exists
	/*if (file_exists($target_file)) {
	//echo "Sorry, file already exists.";
	$errors .= 'Sorry, file already exists.<br/>';
	$uploadOk = 0;
	}*/

	// Check file size
	if ($_FILES["file"]["size"] > 500000) {
	//echo "Sorry, your file is too large.";
	$errors .= 'Sorry, your file is too large.<br/>';
	$uploadOk = 0;
	}
	// Allow certain file formats
	if($fileType != "doc" && $fileType != "docx" && $fileType != "pdf"
	&& $fileType != "gif" ) {
	//echo "Please upload a .doc or .pdf file.";
	$errors .= 'Please upload a .doc or .pdf file.<br/>';

	$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	//echo "Sorry, your file was not uploaded.";
	$errors .= 'Your file was not uploaded.<br/>';

	// if everything is ok, try to upload file
	} else {
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	/*   echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded."; */
	$resume = $target_file;




	} else {
	//echo "Sorry, there was an error uploading your file.";
	$errors .= 'Sorry, there was an error uploading your file.<br/>';
	}
	}
							//


							//captcha
							  if (!$resp->is_valid) {
								$errors .= 'Please enter the correct Verification code.';
							  } 

							if (!$errors) {  //check for errors

							//save

								$page_protect->insert_applicant($firstname, $lastname, $gender, $skype, $email, $mobile, $birthday, $level, $school, $attending, $teaching_exp, $self_intro, $interview_time, $intDate, $resume);
							   
							   
							   
								//$email = "archersmark@gmail.com";
								
								$to  = $email;

								$subject = 'Filipino Tutor Application';

								$message = "Dear ".$firstname. ", <br />"; 
								$message .= '<p>Thank you for applying for a tutor position at FilipinoTutor.com,Inc.  We sincerely appreciate your interest and are currently reviewing your application.  Expect to receive an email from us in the next couple of weeks for your Skype interview and training schedule.  If you are selected, we will notify you immediately thru email and we will give you a list of requirements to accomplish.  Thank you.</p><br />';
								$message .= "Regards, <br />The HR Team at FilipinoTutor.com, Inc.";

								$headers  = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers .= 'From: FilipinoTutor.com Team <apply@filipinotutor.com>';

								mail($to, $subject, $message, $headers);
								
						

								echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Registration complete.<br/></div>';  
							} else {  

								echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $errors . '<br/></div>';  

							}  
					} //submit
					?>
						

						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
							<div class="col-lg-12">
							<h3 class="form-signin-heading">Tutors' Application</h3>	
							</div>
						<div class="personal-info">
						<div class="col-lg-12">
						<legend>Personal Information</legend>
							<p class="small">Asterisk (<span class="asterisk">*</span>) indicates a required field.</p>
						</div>
							<div class="col-lg-6">
							
								<div class="control-group">
									<label class="control-label" for="inputFirstName">First Name<span class="asterisk">*</span></label>
									<div class="controls">
									<input class="form-control" type="text" name="inputFirstName" placeholder="" value="<?php echo (isset($_POST['inputFirstName'])) ? $_POST['inputFirstName'] : ""; ?>" title="Enter your First Name">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputFirstName">Last Name<span class="asterisk">*</span></label>
									<div class="controls">
									<input class="form-control" type="text" name="inputLastName" placeholder="" value="<?php echo (isset($_POST['inputLastName'])) ? $_POST['inputLastName'] : ""; ?>" title="Enter your Last Name">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputSkypeID">Skype ID<span class="asterisk">*</span></label>
									<div class="controls">
									<input class="form-control" type="text" name="inputSkypeID" placeholder="" value="<?php echo (isset($_POST['inputSkypeID'])) ? $_POST['inputSkypeID'] : ""; ?>" title="Enter your Skype ID">
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputGender">Gender<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="radio" name="inputGender" value="Male" checked="checked" title="Select if you are a male"> Male &nbsp;&nbsp;<input type="radio" name="inputGender" value="Female" title="Select if you are a female"> Female
									</div>
								</div>
								
							
							</div>
							</div>
							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Email Address<span class="asterisk">*</span></label>
									<div class="controls">
									<input class="form-control" type="text" name="inputEmail" placeholder="" value="<?php echo (isset($_POST['inputEmail'])) ? $_POST['inputEmail'] : ""; ?>" title="Enter a valid email address">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputMobile">Mobile Number<span class="asterisk">*</span></label>
									<div class="controls">
									<input class="form-control" type="text" name="inputMobile" placeholder="" value="<?php echo (isset($_POST['inputMobile'])) ? $_POST['inputMobile'] : ""; ?>" title="Enter mobile number">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputBirthday">Birthday<span class="asterisk">*</span></label>
									<div class="controls">	
										<input class="form-control" type= "text" name="birthdate" class="datepickerto" id="bdate" title="Enter your birthday" value="<?php echo @$_POST['birthdate']; ?>" readonly="readonly" style="cursor:text;" />
										<?php /*				
										<select name="bMonth"  class="selectBox">
											<?php
											for($m=1; $m<=12; $m++)
											{
												echo '<option value="'.$m.'">'.date("F", mktime(0, 0, 0, $m, 10)).'</option>';
											}
											?>
										</select>

										<select name="bDay"  class="selectBox">
											<?php
											for($d=1; $d<=31; $d++)
											{
												echo '<option value="'.$d.'">'.$d.'</option>';
											}
											?>
										</select>
										
										<select name="bYear"  class="selectBox">
											<?php
											$startdate = 1960;
											$enddate = date("Y");
											$years = range ($enddate,$startdate);
											foreach($years as $year)
											{
											  echo '<option value="'.$year.'">'.$year.'</option>';
											}
											?>
											</select>*/
										?>
									</div>
								</div>
							</div>
                            
							<div class="clearfix"></div>
                            <br />
							<div class="col-lg-12">
							<legend>Educational Background and Experience</legend>
							</div> 	
							<div class="col-lg-6">
							
							
							<div class="control-group">
								<label class="control-label" for="inputMobile">Highest Educational Level</label>
								<div class="controls">
								<select  class="form-control" name="level" class="selectBox" title="Please select">
									<option value="-">-</option>
									<option value="elementary">Elementary</option>
									<option value="highschool">High School</option>
									<option value="college">College</option>
									<option value="master's">Master's</option>
								</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputSchool">School/University</label>
								<div class="controls">
									<input class="form-control" type="text" name="inputSchool" placeholder="" value="<?php echo (isset($_POST['inputSchool'])) ? $_POST['inputSchool'] : ""; ?>" title="Enter your School/University attended/attending">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputSchool"></label>
								<div class="controls" style="padding: 5px 20px;">
								<label class="checkbox">
								<input  type="checkbox" name="inputAttending" placeholder="" value="attending" <?php echo (isset($_POST['inputAttending'])) ? "checked" : ""; ?> title="Still going to the school you provided?">Currently Attending?</label>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputTeachingExp">Teaching Experience</label>
								<div class="controls">
								<select class="form-control" name="inputTeachingExp" class="selectBox" title="Please select">
									<option value="none">None</option>
									<option value="less6months">Less than 6 months</option>
									<option value="morethan6">6 months to 1 year</option>
									<option value="1to3">1 to 3 years</option>
									<option value="morethan3">over 3 years</option>
								</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputMobile">Self Introduction</label>
								<div class="controls">
								<textarea class="form-control" name="selfIntro" title="Tell us something about yourself" rows="5"><?php echo (isset($_POST['selfIntro'])) ? $_POST['selfIntro'] : ""; ?></textarea>
								</div>
							</div>
							
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Verification code</label>
								<div class="controls table-responsive">
											<?php

											  $publickey = "6LcOFyQTAAAAANfy3v39v8G0ZAXPJPYXfcXSBhX_"; // you got this from the signup page

											  echo  recaptcha_get_html($publickey);

											?>
								</div>
							</div>	
							
							</div>
						</div>
		
						<div class="col-lg-6">											
							<div class="control-group">
								<label class="control-label" for="inputMobile">Select a schedule for Interview</label>
								<div class="controls">
								<input class="form-control" name="interviewdate" id="idate" title="Interview Date" value=" <?php echo @$_POST['interviewdate']; ?> " readonly="readonly" style="cursor:text;"/>
								</div>
							</div>

							<div class="control-group" style="padding: 10px 20px;">
								<label class="control-label" for="inputInterview">Interview</label>
								<div class="controls">
								<label class="radio"><input type="radio" name="inputInterview" value="8-10am" <?php if(@$_POST['inputInterview']=="8-10am") echo "checked"; ?>>8:00 AM - 10:00 AM</label>
								<label class="radio"><input type="radio" name="inputInterview" value="10-12pm" <?php if(@$_POST['inputInterview']=="10-12pm") echo "checked"; ?>>10:00 AM - 12:00 AM</label>
								<label class="radio"><input type="radio" name="inputInterview" value="12-2pm" <?php if(@$_POST['inputInterview']=="12-2pm") echo "checked"; ?>>12:00 PM - 2:00 PM</label>
								<label class="radio"><input type="radio" name="inputInterview" value="2-4pm" <?php if(@$_POST['inputInterview']=="2-4pm") echo "checked"; ?>>2:00 PM - 4:00 PM</label>
								<label class="radio"><input type="radio" name="inputInterview" value="4-6pm" <?php if(@$_POST['inputInterview']=="4-6pm") echo "checked"; ?>>4:00 PM - 6:00 PM</label>
								<label class="radio"><input type="radio" name="inputInterview" value="6-8pm" <?php if(@$_POST['inputInterview']=="6-8pm") echo "checked"; ?>>6:00 PM - 8:00 PM</label>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="file"> Your Resume </label>
									<input name="file" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;" />
									<input id="upfile" type="hidden" class="form-control" readonly/>
									<br />
									<br />
							</div>
							
						</div>
						<br />
						<div class="col-lg-12 text-left">
							<div class="control-group">
								<div class="controls">
									<input type="submit" class="btn btn-large btn-primary" name="submit" id="submit" value="Submit" />
								</div>
							</div>
						</div>
					</form>

						</div> <!-- /container -->
					</div>
				</div>
			</div>
		
		
	</div>
</div>
</div>

	<footer>
	    <div class="container">
		    <div class="row">
			    <div class="col-md-4 col-sm-6 left">
					<p>FilipinoTutor Philippines, Inc</p>
					</br>
					</br>
					<p><span>Skype Account:</span> filipinotutor.com</p>
					<p><span>Mobile:</span> +639328329038</p>
					<p><span>Phone:</span> ( 046 ) 4329038</p>
					<p><span>Email:</span> <a href="mailto:inquire@filipinotutor.com" class="email">inquire@filipinotutor.com</a></p>
				</div>
			    <div class="col-md-8 col-sm-6 right">
				    <ul class="text-right">
				    	<li><a href="/careers/">Home</a></li>
				    	<li><a href="/careers/process/">Requirements & Process</a></li>
				    	<li><a href="/careers/contact/">Contact Us</a></li>
				    	<li class="last"><a href="http://filipinotutor.com/apply.php">Apply Now</a></li>
				    </ul>
					
					<div id="logo-bottom">
					    <a href="/careers/"><img src="/careers/theme/images/logo-bottom.png" class="img-responsive pull-right" alt=""></a>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-lg-12">
				    <div id="copyright">
				        <p>&copy; Copyright 2016. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer>	
	


  </body>
</html>