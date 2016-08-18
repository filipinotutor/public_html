<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Why Us - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>Why Us</h1>
						
						<h3>English Language Proficiency</h3>
						<p>Our tutors are university educated and have undergone extensive training to ensure that the quality of education at FilipinoTutor.com is of the highest standard.</p>
						
						<h3>Professional & Friendly</h3>
						<p>All of our instructors are university-level trained and experienced at providing quality instruction to individuals at different learning levels. Even with their exceptional professionalism, our tutors are known for their friendliness and ability to help our students enjoy the process of learning and improving their English skills.</p>
						
						<h3>Flexible Curriculum</h3>
						<p>We offer a wide variety of lessons starting from basic English grammar all the way to advanced business conversation practice. This means you can choose the topics and level that best suit your needs and you can select what lesson you'd like to learn next rather than having to complete an entire course in sequence.</p>
						
						<h3>Affordable Pricing</h3>
						<p>We believe that learning and improving English should be accessible, which is which we offer the highest quality of service at a competitive price. We even offer two free trial lessons. Sign up today for your free membership to begin your complimentary trial lessons and access an entire community of online learning resources.</p>

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>