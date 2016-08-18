<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/career/";

	$title = "Apply As a Tutor - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>

<script>
		$(function() {
		var tooltips = $( "[title]" ).tooltip();
		$(document)(function() {
		tooltips.tooltip( "open" );
		})
		.insertAfter( "form" );
		});
	</script>
	
	<script>
		$(function() {
		//$( ".datepickerto" ).datepicker();
		//$( ".datepickerto" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		var today = new Date();
		var dd = today.getDay();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getYear();
		dd += 1;
		if(dd<10) {
			dd='0'+dd
			} 
		if(mm<10) {
			mm='0'+mm
		} 
		today = yyyy+'-'+mm+'-'+dd;
		$( ".datepickerto" ).datepicker({
		dateFormat: "mm-dd-yy",
		/*showOn: "button",
		buttonImage: "../img/cal.png",
		buttonImageOnly: true,*/
		changeMonth: true,
		changeYear: true,
		yearRange:'1920:1997'
		});
		$( ".datepickerfrom" ).datepicker({
		dateFormat: "yy-mm-dd",
		/*showOn: "button",
		buttonImage: "../img/cal.png",
		buttonImageOnly: true,*/
		changeMonth: true,
		changeYear: true,
		minDate: today
		});
		});
	</script>

<div id="inner">
	<div id="content-sidebar-wrap">
		<div id="content" class="hfeed">
			<div class="inner">
						<div>
							<div class="form-horizontal">
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

								
								require_once('../includes/recaptchalib.php');
							  $privatekey = "6Le1X-ESAAAAADct8U7Wy2FhIc4Hz2rl3LKnuJjU";
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

								//captcha
								  if (!$resp->is_valid) {
									$errors .= 'Please enter the correct Verification code.';
								  } 

								if (!$errors) {  //check for errors

								//save


							/* $firstname=$_POST[inputFirstName];
							$lastname =$_POST[inputLastName];
							$gender   =$_POST[inputGender];
							$skype    =$_POST[inputSkypeID];
							$email    =$_POST[inputEmail];
							$mobile   =$_POST[inputMobile];
							$bmonth   =$_POST[bMonth];
							$bday     =$_POST[bDay];
							$byear    =$_POST[bYear];
							$level    =$_POST[level];
							$school   =$_POST[inputSchool];
							$attending=$_POST[inputAttending];
							$teaching_exp=$_POST[inputTeachingExp];
							$self_intro=$_POST[selfIntro];
							$interview=$_POST[inputInterview];*/
								   $page_protect->insert_applicant($firstname, $lastname, $gender, $skype, $email, $mobile, $birthday, $level, $school, $attending, $teaching_exp, $self_intro, $interview_time,$intDate);
									echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Registration complete.<br/></div>';  
								} else {  

									echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $errors . '<br/></div>';  

								}  
						} //submit

						?>
							

							<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
							<div class="col-lg-12">
							<h3 class="form-signin-heading">Tutor's Application</h3>
							<div>Asterisk (<span class="asterisk">*</span>) indicates a required field.</div>
							</div>
							<div class="personal-info">
							<div class="col-lg-12">
							<legend>Personal Information</legend>
							</div>
							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="inputFirstName">First Name<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="text" name="inputFirstName" placeholder="" value="<?php echo (isset($_POST['inputFirstName'])) ? $_POST['inputFirstName'] : ""; ?>" title="Enter your First Name">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputFirstName">Last Name<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="text" name="inputLastName" placeholder="" value="<?php echo (isset($_POST['inputLastName'])) ? $_POST['inputLastName'] : ""; ?>" title="Enter your Last Name">
									</div>
								</div>

								

								<div class="control-group">
									<label class="control-label" for="inputSkypeID">Skype ID<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="text" name="inputSkypeID" placeholder="" value="<?php echo (isset($_POST['inputSkypeID'])) ? $_POST['inputSkypeID'] : ""; ?>" title="Enter your Skype ID">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputGender">Gender<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="radio" name="inputGender" value="Male" checked="checked" title="Select if you are a male"> Male &nbsp;&nbsp;<input type="radio" name="inputGender" value="Female" title="Select if you are a female"> Female
									</div>
								</div>
                            </div>
							<div class="col-lg-6">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Email Address<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="text" name="inputEmail" placeholder="" value="<?php echo (isset($_POST['inputEmail'])) ? $_POST['inputEmail'] : ""; ?>" title="Enter a valid email address">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputMobile">Mobile Number<span class="asterisk">*</span></label>
									<div class="controls">
									<input type="text" name="inputMobile" placeholder="" value="<?php echo (isset($_POST['inputMobile'])) ? $_POST['inputMobile'] : ""; ?>" title="Enter mobile number">
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputBirthday">Birthday<span class="asterisk">*</span></label>
									<div class="controls">	
										<input type= "text" name="birthdate" class="datepickerto" title="Enter your birthdaÿ" value="<?php echo @$_POST['birthdate']; ?>" />
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
								<div class="col-lg-12">
								<legend>Educational Background and Experience</legend>
								</div>
								<div class="col-lg-6">
									<div class="control-group">
										<label class="control-label" for="inputMobile">Highest Educational Level</label>
										<div class="controls">
										<select name="level" class="selectBox" title="Please select">
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
											<input type="text" name="inputSchool" placeholder="" value="<?php echo (isset($_POST['inputSchool'])) ? $_POST['inputSchool'] : ""; ?>" title="Enter your School/University attended/attending">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputSchool"></label>
										<div class="controls">
										<label class="checkbox">
										<input type="checkbox" name="inputAttending" placeholder="" value="attending" <?php echo (isset($_POST['inputAttending'])) ? "checked" : ""; ?> title="Still going to the school you provided?">Currently Attending?</label>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="inputTeachingExp">Teaching Experience</label>
										<div class="controls">
										<select name="inputTeachingExp" class="selectBox" title="Please select">
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
										<textarea name="selfIntro" title="Tell us something about yourself" rows="5"><?php echo (isset($_POST['selfIntro'])) ? $_POST['selfIntro'] : ""; ?></textarea>
										</div>
									</div>
                                </div>
								
                                <div class="col-lg-6">
									<div class="control-group">
										<label class="control-label" for="inputMobile"Select a schedule for Interview</label>
										<div class="controls">
										<input  name="interviewdate" class="datepickerfrom" title="Interview Date" value=" <?php echo @$_POST['interviewdate']; ?> "/>
										</div>
									</div>

									<div class="control-group">
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
										<label class="control-label" for="inputPassword">Verification code</label>
										<div class="controls">
											<?php
											  require_once('../includes/recaptchalib.php');
											  $publickey = "6Le1X-ESAAAAAIkXlOaBrxfNktmDXnBbGMlrhtL1 "; // you got this from the signup page
											  echo recaptcha_get_html($publickey);
											?>
										</div>
									</div>
								</div>
								<div class="col-lg-12 text-left">
								<div class="control-group">
									<div class="controls">
										<input type="submit" class="btn btn-large btn-primary" name="submit" id="submit" value="Submit" />
									</div>
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
</div>
<?php include($path.'footer.php'); ?>