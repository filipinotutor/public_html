<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/ftcareers/";

	$title = "Apply As a Tutor - FilipinoTutor.com";
	$metad = "";
	
	include($path.'/theme/header.php');
?>

	<div id="banner">
	    <div class="container">
			<div class="col-lg-7 col-lg-offset-5" id="banner-text">
				<div class="row">
					<h1>A rewarding experience with </br>great income potential.</h1>
					<h2>Join our team today!</h2>
					<p>"The best teachers teach from the heart, not from the book." <br /> <span>~ Author Unknown</span></p>
				</div>
			</div>
	    </div>
	</div>
	
	<div id="home-about">
	   <div class="container">
	       <div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<p>FilipinoTutor.com is an online English tutoring service offering </br> the highest quality service at an affordable price.</p>
					<p>We offer English tutoring to students around the world who </br> enjoy being able to take advantage of our convenient online</br> lessons and exceptional service.</p>
				</div>
		   </div>
	   </div>
	</div>
	
	<div class="clearfix"></div>
	
	<div id="why-us">
	    <div class="container">
	    	<div class="row">
			    <div class="col-md-6">
					<div class="top">
					    <div class="inner">
							<h3>Work from anywhere</h3>
							<p>No more commuting means no more traffic. Teach English lessons from the comfort of your own home. All you need is a computer with internet connection and you're good to go.</p>
						</div>
					</div>
					<div class="bottom">
						<div class="inner">
							<h3>Take control of your income</h3>
							<p>Teach full time or only a few hours a week. The more hours you teach the more money you make. Your income is dependent on your availability. Compensation is based on performance, experience and education.</p>
						</div>
					</div>
				</div>
			    <div class="col-md-6">
				    <div class="top">
						<div class="inner">
							<h3>Pick your hours</h3>
							<p>Work around your busy schedule and choose when to teach. Day shifts and night shifts available. Perfect for busy moms, dads, new graduates and senior 
                             level college students.</p>
						</div>					
					</div>
					<div class="bottom">
						<div class="inner">
							<h3>Get paid</h3>
							<p>Our tutors get paid on time through their bank accounts using our easy payroll system.</p>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="cta">
	    <div class="container">
		    <div class="row">
			    <div class="col-md-7">
				<h2>Start Building your <b>Career</b> with Us.</h2>
				<p>We want our tutors to be successful with their careers. If you have the desire to teach and have an excellent command of the English language, we have an opening for you. Contact us or submit an application.</p>
				</div>
			    <div class="col-md-5">
				<p class="pull-right"><a href="http://filipinotutor.com/apply.php" class="btn cta-btn">Apply Now</a></p>
				</div>
			</div>
		</div>
	</div>

<?php include($path.'/theme/footer.php'); ?>