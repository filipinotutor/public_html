<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Sitemap ";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>Sitemap</h1>
						<ul>
							<li><a href="http://www.filipinotutor.com/">Learn English Online</a>
							<li><a href="http://www.filipinotutor.com/inquire.php">Inquire</a>
							<li><a href="http://www.filipinotutor.com/register.php">Register</a>
							<li><a href="http://www.filipinotutor.com/about/">About FilipinoTutor.com</a>
							<li><a href="http://www.filipinotutor.com/about/mission.php">Our Mission</a>
							<li><a href="http://www.filipinotutor.com/about/value-proposition.php">Value Proposition</a>
							<li><a href="http://www.filipinotutor.com/guide/enrollment/">Enrollment</a>
							<li><a href="http://www.filipinotutor.com/guide/faq.php">Frequently Asked Questions</a>
							<li><a href="http://www.filipinotutor.com/curriculum/">Curriculum</a>
							<li><a href="http://www.filipinotutor.com/curriculum/courses.php">Courses Offered</a>
							<li><a href="http://www.filipinotutor.com/curriculum/advisors.php">Advisors</a>
							<li><a href="http://www.filipinotutor.com/curriculum/learn-english.php">Why Learn English</a>
							<li><a href="http://www.filipinotutor.com/tutors.php">Our Tutors</a>
							<li><a href="http://www.filipinotutor.com/guide/enrollment/step1.php">Enrollment Guide Step 1</a>
							<li><a href="http://www.filipinotutor.com/guide/enrollment/step2.php">Enrollment Guide Step 2</a>
							<li><a href="http://www.filipinotutor.com/guide/enrollment/step3.php">Enrollment Guide Step 3</a>
						</ul>

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>