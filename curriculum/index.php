<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Curriculum FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>Curriculum</h1>

						<p>We believe that everyone deserves access to exceptional educational opportunities. Our unique online model provides an easy and affordable tutoring experience, without sacrificing quality of instruction.</p>
						<p>Our curriculum is based on the US national grading standard, so you can be assured of the high quality of the material you are studying. In addition, our curriculum is developed by acclaimed educators from world-renowned universities and international education centres.</p>

						<h3>Our Curriculum Advisors/Developers</h3>
						<div class="row">
							<div class="col-sm-3">
								<img src="/images/annafaktorovich.jpg" alt="Anna Faktorovich" class="img-responsive">
							</div>						
							<div class="col-sm-9">
							<h3>Dr. Anna Faktorovich</h3>
							<p>The Director of the Anaphora Literary Press. Faktorovich has over three years of full-time English college teaching experience. She has a Ph.D. in English Literature and Criticism and an M.A. in Comparative Literature. Her Rebellion as Genre in the Novels of Scott, Dickens and Stevenson critical book has been published with McFarland in February, 2013. Her new book, "Formulaic Writing within the Fantasy, Science Fiction, Romance, Religious and Mystery Genres," will be released with McFarland in April, 2014.  She published two poetry collections Improvisational Arguments (Fomite Press, 2011) and Battle for Athens (Anaphora, 2012). She illustrated, designed and wrote the poetry for an illustrated children's book, The Sloths and I (Anaphora, 2013). She also published three editions of the Book Production Guide, which gives advice on editing, design and marketing for writers and publishers. She has been editing and writing for the independent, tri-annual and peer-reviewed Pennsylvania Literary Journal since 2009; it is available on EBSCO, ProQuest and in print. She has also presented her research at the MLA, SAMLA, EAPSU, SWWC, BWWC and many other conferences. She won the MLA Bibliography and the Brown University Military Collection fellowships.</p>
							</div>
						</div>
						<div class="row">
						<div class="col-sm-3">
						</div>
						<div class="col-sm-9">
						<h3>Alexandra Moore</h3>
						<p>A Master's Degree in English and has studied Shakespeare and Renaissance Drama as a Ph.D. Student at the University of British Columbia, Canada. She has taught English at the University level and developed curriculum and training materials for University students and courses. She is a recipient of prestigious research grants for both her Master's and Ph.D. work from the Social Sciences and Canadian Research Council of Canada.</p>
						</div>
						</div>
				</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>