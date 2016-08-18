<?php
	include('header-admin.php');

	if(isset($_POST['submit_tutor'])){
		//aaaddedd comment
		$fname = $_POST['inFirstName'];
		$lname = $_POST['inLastName'];
		$skypeid = $_POST['inSkypeID'];
		$gender = $_POST['inGender'];
		$email = $_POST['inEmail'];
		$mobile = $_POST['inMobile'];
		$birthdate = $_POST['birthdate'];
		$school = $_POST['inSchool'];
		$high_ed_lvl = $_POST['inHighEdLvl'];
		$attending = ($_POST['inAttending'] == 'attending' ? 'yes' : 'no');
		$teaching_exp = $_POST['inTeachingExp'];
		$self_intro = $_POST['inSelfIntro'];
		$bank_name = $_POST['inBankName'];
		$bank_branch = $_POST['inBankBr'];
		$acc_name = $_POST['inAccName'];
		$acc_no = $_POST['inAccNo'];

		$target_resume = '../resume/';
		$target_prof_pic = '../pictures/tutors/';
		$target_audio = '../audio/tutors/';

		$randName = $fname.md5(rand() * time());

		$temp = explode(".", $_FILES["resume_file"]["name"]);
		$resumename = $fname . $lname .'-resume' .'-'. date('m-d-Y'). '.' . end($temp);
		move_uploaded_file($_FILES["resume_file"]["tmp_name"], $target_resume . $resumename);

		$temp = explode(".", $_FILES["audio_file"]["name"]);
		$audioname = str_replace(' ', '', $randName.".". end($temp));
		move_uploaded_file($_FILES["audio_file"]["tmp_name"], $target_audio . $audioname);

		if(empty($_FILES['image_file']["name"])){
			$imagename = "../pictures/noimg.gif";
		} else {
			$temp = explode(".", $_FILES["image_file"]["name"]);
			$imagename =  $target_prof_pic . $_FILES["image_file"]["name"];	
		}

		move_uploaded_file($_FILES["image_file"]["tmp_name"], $imagename);

		$id = ($page_protect->get_last_user_id() + 1);
		$tmppw = md5('12345');

		$table = "users";
		$columns = "`username`, `password`, `first_name`, `last_name`, `email`, `tmp_mail`, `gender`, `skype_id`, `access_level`, `active`";
		$values = "'".$id.$fname.$lname. "', '".$tmppw."', '".$fname."', '".$lname."', '".$email."', '', '".$gender."', '".$skypeid."', 2, 'n'";

		$res = $page_protect->global_insert($table, $columns, $values);

		$table = "tutors";
		$columns = "`tutor_id`, `nick_name`,`phone`,`photo`,`audio`,`birthday`,`ed_level`,`school`,`attending`,`teaching_exp`,`hobby`,`self_intro`,";
		$columns .= "`bank_name`,`bank_branch`,`accnt_name`,`accnt_number`,`supervisor_id`,`access`,`tutor_type_id`,`allow_teach_trial`";
		
		$values = $id.", '".$fname." ".$lname."', '".$mobile."', '".$imagename."','".$audioname."','".$birthdate."', '";
		$values .= $high_ed_lvl."', '".$school."','".$attending."', '".$teaching_exp."','None','".$self_intro."', '";
		$values .= $bank_name."', '".$bank_branch."', '".$acc_name."', '".$acc_no."', 0, 1, 2, 0";

		$res = $page_protect->global_insert($table, $columns, $values);

		echo '<script type="text/javascript"> window.location = "/admin/tutors.php?t=2A"; </script>';



		// $newfilename = $firstname . $lastname .'-resume' .'-'. date('m-d-Y'). '.' . end($temp);
		// $target_file = $target_dir . $newfilename;

		// if ($_FILES["file"]["size"] > 500000) {
		//  	$errors .= 'Sorry, your file is too large.<br/>';
		//     $uploadOk = 0;
		// }
		// if($fileType != "doc" && $fileType != "docx" && $fileType != "pdf" && $fileType != "gif" ) {
		// 	$errors .= 'Please upload a .doc or .pdf file.<br/>';	
		//     $uploadOk = 0;
		// }
		// if ($uploadOk == 0) {
		// 	$errors .= 'Your file was not uploaded.<br/>';	
		// } else {
		// }
	// }

	// function echooed($string){
	// 	echo "<script>alert('". $string ."');</script>";
	// }

	// if(isset($_POST['submit'])){
	
	}
?>
<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<div class="col-lg-12">
		<h3 class="form-signin-heading">Add Tutor</h3>
		<div>Asterisk (<span class="asterisk">*</span>) indicates a required field.</div>
	</div>
	<div class="personal-info">
		<div class="col-lg-12">
			<legend>Personal Information</legend>
		</div>
		<div class="col-lg-6">				
			<div class="control-group">
				<label class="control-label" for="inFirstName">First Name<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inFirstName" placeholder="" value="<?php echo (isset($_POST['inFirstName'])) ? $_POST['inFirstName'] : ""; ?>" title="Enter your First Name" required>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inFirstName">Last Name<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inLastName" placeholder="" value="<?php echo (isset($_POST['inLastName'])) ? $_POST['inLastName'] : ""; ?>" title="Enter your Last Name" required>
				</div>
		    </div>
            
			<div class="control-group">
				<label class="control-label" for="inSkypeID">Skype ID<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inSkypeID" placeholder="" value="<?php echo (isset($_POST['inSkypeID'])) ? $_POST['inSkypeID'] : ""; ?>" title="Enter your Skype ID" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inGender">Gender<span class="asterisk">*</span></label>
				<div class="controls">
				<input type="radio" name="inGender" value="Male" checked="checked" title="Select if you are a male"> Male &nbsp;&nbsp;
				<input type="radio" name="inGender" value="Female" title="Select if you are a female"> Female
				</div>
			</div>						
		</div>
	</div>
	<div class="col-lg-6">
		<div class="control-group">
			<label class="control-label" for="inEmail">Email Address<span class="asterisk">*</span></label>
			<div class="controls">
			<input class="form-control" type="text" name="inEmail" placeholder="" value="<?php echo (isset($_POST['inEmail'])) ? $_POST['inEmail'] : ""; ?>" title="Enter a valid email address" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inMobile">Mobile Number<span class="asterisk">*</span></label>
			<div class="controls">
			<input class="form-control" type="text" name="inMobile" placeholder="" value="<?php echo (isset($_POST['inMobile'])) ? $_POST['inMobile'] : ""; ?>" title="Enter mobile number" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inBirthday">Birthday<span class="asterisk">*</span></label>
			<div class="controls">	
				<input class="form-control" type= "text" name="birthdate" class="datepickerto" id="bdate" title="Enter your birthday" value="<?php echo @$_POST['birthdate']; ?>" id="inBirthDay" readonly="readonly" style="cursor:text;"/>
		    </div>
	    </div>
    </div>

		<div class="clearfix"></div>
		<div class="col-lg-12">
			<legend>Educational Background and Experience</legend>
		</div> 	
		<div class="col-lg-6">											
			<div class="control-group">
				<label class="control-label" for="inHighEdLvl">Highest Educational Level</label>
				<div class="controls">
				<select  class="form-control" name="inHighEdLvl" name="level" class="selectBox" title="Please select">
					<option value="Elementary" selected>Elementary</option>
					<option value="Highschool">High School</option>
					<option value="College">College</option>
					<option value="Masters">Master's</option>
				</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inSchool">School/University</label>
				<div class="controls">
					<input class="form-control" type="text" name="inSchool" placeholder="" value="<?php echo (isset($_POST['inSchool'])) ? $_POST['inSchool'] : ""; ?>" title="Enter your School/University attended/attending" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inSchool"></label>
				<div class="controls">
				<label class="checkbox">
					<input  type="checkbox" name="inAttending" placeholder="" value="attending" <?php echo (isset($_POST['inAttending'])) ? "checked" : ""; ?> title="Still going to the school you provided?">Currently Attending?
				</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inTeachingExp">Teaching Experience</label>
				<div class="controls">
				<select class="form-control" name="inTeachingExp" class="selectBox" title="Please select">
					<option value="none">None</option>
					<option value="less6months">Less than 6 months</option>
					<option value="months6-year1">6 months to 1 year</option>
					<option value="year1-year3">1 to 3 years</option>
					<option value="over3yrs">over 3 years</option>
				</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inMobile">Self Introduction</label>
				<div class="controls">
				<textarea class="form-control" name="inSelfIntro" title="Tell us something about yourself" rows="5" required><?php echo (isset($_POST['selfIntro'])) ? $_POST['selfIntro'] : ""; ?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="file"> Your Resume </label>
					<input name="resume_file" type="file" id="fil" onchange="document.getElementById('resume_file').value = document.getElementById('fil').value;" />
					<input id="resume_file" type="hidden" class="form-control" readonly/>
					<br />
					<br />
			</div>
			<div class="control-group">
				<label class="control-label" for="file"> Tutor's Audio </label>
					<input name="audio_file" type="file" id="fil" onchange="document.getElementById('audio_file').value = document.getElementById('fil').value;" />
					<input id="audio_file" type="hidden" class="form-control" readonly/>
					<br />
					<br />
			</div>		
		</div>
		<div class="col-lg-6">
			<div class="control-group">
				<label class="control-label" for="inEmail">Bank Name<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inBankName" placeholder="" value="<?php echo (isset($_POST['inEmail'])) ? $_POST['inEmail'] : ""; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inEmail">Bank Branch<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inBankBr" placeholder="" value="<?php echo (isset($_POST['inEmail'])) ? $_POST['inEmail'] : ""; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inEmail">Account Name<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inAccName" placeholder="" value="<?php echo (isset($_POST['inEmail'])) ? $_POST['inEmail'] : ""; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inEmail">Account No.<span class="asterisk">*</span></label>
				<div class="controls">
				<input class="form-control" type="text" name="inAccNo" placeholder="" value="<?php echo (isset($_POST['inEmail'])) ? $_POST['inEmail'] : ""; ?>" required>
				</div>
			</div>
			<!-- <div class="control-group">
				<label class="control-label" for="inEmail">Supervisor<span class="asterisk">*</span></label>
				<select class="form-control" name="inSuperId" class="selectBox" title="Please select">
					<option value="none">None</option>
					<option value="less6months">Less than 6 months</option>
					<option value="morethan6">6 months to 1 year</option>
					<option value="1to3">1 to 3 years</option>
					<option value="morethan3">over 3 years</option>
				</select>
			</div> -->
			<div class="control-group">
				<div id="message" class="danger"></div>
				<div id="image_preview"><img id="previewing" src="" /></div>
					<hr id="line">
					<div id="selectImage">
						<label>Select Your Image</label><br/>
						<input type="file" name="image_file" id="file"/>
					</div>
			</div>
		</div>
		<div class="col-lg-12 text-left">
		<div class="control-group">
			<div class="controls">
				<input type="submit" class="btn btn-large btn-primary" name="submit_tutor" value="Save" />
			</div>
		</div>
		</div>
	</form>
</div>
<?php
	include('footer-admin.php');
?>   