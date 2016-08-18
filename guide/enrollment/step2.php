<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Step 2 - Registration - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">						<div class="row">							<div class="col-sm-4">								<a href="/guide/enrollment/step1.php" class="btn btn-grey btn-lg guide-button">1<br />Skype Setup</a>							</div>							<div class="col-sm-4">								<a href="/guide/enrollment/step2.php" class="btn btn-primary btn-lg guide-button">2<br />Registration</a>							</div>							<div class="col-sm-4">								<a href="/guide/enrollment/step3.php"class="btn btn-grey btn-lg guide-button">3<br />Lesson Reservation</a>							</div>						</div>
						<h1>Step 2 - Registration</h1>
						<h3 class="steps-main">I. Create your Student Account</h3>
						<ol class="steps">
							<li>Click <strong>Sign Up</strong> link from the site navigation. <img alt="sign-up" src="/images/sign-up.jpg" class="img-responsive"></li>
							<li>Fill in all fields. On the Skype ID field, use your skype username as referred to <strong>Step 1: Skype Sign In</strong>. <img alt="student-reg" src="/images/studnt-reg.jpg"class="img-responsive"></li>
							<li>Check your email. Click the <strong>confirmation link</strong> sent to your email address.</li>
						</ol>
						

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>