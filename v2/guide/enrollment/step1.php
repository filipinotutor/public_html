<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Step 1 - Skype Setup & Registration FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">						<div class="row">							<div class="col-sm-4">								<a href="/guide/enrollment/step1.php" class="btn btn-success btn-lg guide-button">1<br />Skype Setup</a>							</div>							<div class="col-sm-4">								<a href="/guide/enrollment/step2.php" class="btn btn-grey btn-lg guide-button">2<br />Registration</a>							</div>							<div class="col-sm-4">								<a href="/guide/enrollment/step3.php"class="btn btn-grey btn-lg guide-button">3<br />Lesson Reservation</a>							</div>						</div>
						<h1>Step 1 - Skype Setup and Registration</h1>
						<strong><i>( Skip this step if you already have a skype account. Proceed to step 2- Enrolment Registration )</i></strong>
						<h3 class="steps-main">I. Skype Installation</h3>
						All classes are being conducted through Skype. Skype is a user-friendly free voice and video chatting software. Here are the steps to install it.
						<ol class="steps">
						<li><strong>Download skype</strong> through <a href="http://www.skype.com/en/download-skype/skype-for-computer/" target="_Blank">http://www.skype.com/en/download-skype/skype-for-computer/</a>
						<img src="/images/skype-dl1.jpg" alt="skype-dl" class="img-responsive">
						</li>
						<li><strong>Choose what device</strong> to use
						<img src="/images/skype-device1.jpg" alt="skype-device" class="img-responsive">
						</li>
						<li>Look for the <strong>download button</strong> and click on it.
						<img src="images/skype-dl-button1.jpg" alt="skype-dl-button" class="img-responsive">
						</li>
						<li><strong>Install Skype</strong> by clicking on the downloaded installer file.</li>
						<li>Follow the <strong>Installation instruction</strong>.</li>
						</ol>

						<h3 class="steps-main">II. Skype Registration</h3>
						After completing the installation, the login screen is displayed. Follow the instruction below to complete registration.
						<ol class="steps">
						<li>Create an Account
						<img src="/images/skype-accnt.jpg" alt="skype-accnt" class="img-responsive">
						</li><li>Fill in the necessary fields.
						<img src="/images/skype-fields.jpg" alt="skype-fields" class="img-responsive"> 
						</li>
						<li>Click the Continue button.
						<img src="/images/skype-cntinue.jpg" alt="skype-cntinue" class="img-responsive">
						</li>
						</ol>

						<h3 class="steps-main">III. Skype Sign In</h3>
						<ol class="steps">
						<li><strong>Enter your Skype Name and Password</strong> that you provided during the skype registration.
						<img src="/images/skype-enter.jpg" alt="skype-enter" class="img-responsive">
						</li>
						<li><strong>Skype setup is complete.</strong><br>Take note of your skype username as seen in the arrow below.
						<img src="/images/skype-cmplt.jpg" alt="skype-cmplt" class="img-responsive"></li>
						</ol>
						

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>