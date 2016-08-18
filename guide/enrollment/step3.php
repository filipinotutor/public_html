<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Step 3 - Lesson Reservation - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">						<div class="row">							<div class="col-sm-4">								<a href="/guide/enrollment/step1.php" class="btn btn-grey btn-lg guide-button">1<br />Skype Setup</a>							</div>							<div class="col-sm-4">								<a href="/guide/enrollment/step2.php" class="btn btn-grey btn-lg guide-button">2<br />Registration</a>							</div>							<div class="col-sm-4">								<a href="/guide/enrollment/step3.php"class="btn btn-warning btn-lg guide-button">3<br />Lesson Reservation</a>							</div>						</div>
						<h1>Step 3 - Lesson Reservation</h1>
						<p>I. Login to your Account by clicking the login icon.</p>
						<p>II. Click <strong>Book Classes</strong> button.</p>
						<p><img class="img-responsive" alt="book" src="/images/book.jpg"></p>
						<p>III. Select a Tutor by Clicking <strong>Select</strong> button or clicking the Picture.</p>
						<p><img class="img-responsive" alt="tutor" src="/images/tutor.jpg"></p>
						<p>IV. The <strong>tutors schedule</strong> will be displayed below.<br>Choose the desired date and time for your class. Open schedules means that the tutor is available in that certain day and time.</p>
						<p>V. Select schedules and click <strong>Save</strong>.</p>
						<p>VI. Check your class schedule by Clicking the <strong>"Class schedule”</strong> button on the top menu or the <strong>"View Classes"</strong> button from the sidebar.</p>
						
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>