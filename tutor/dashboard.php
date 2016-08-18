<?php
include('header-tutor.php');
$page_protect->get_guide('tutor');
?>
        <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
                <h4>Dashboard</h4>
  			  </div>
        </div>
        <div class="row">
			<div class="col-sm-5"><a href="http://filipinotutor.com/guide/pdf/FilipinoTutor.com_Tutors_Guide.pdf" target="_BLANK"><img src="../images/banner-newtutor.jpg" class="img-responsive"/></a></div>
			<div class="col-sm-5"><a href="http://filipinotutor.com/guide/pdf/FilipinoTutor.com_Japanese_Culture.pdf" target="_BLANK"><img src="../images/banner-knowjapan.jpg"  class="img-responsive"/></a></div>
		</div>
		 <div class="row">
			<div class="col-sm-10">
				<div class="guideBox">
			
					<h4>Not Sure Where to Start?</h4>
					<p>The best way to start is to navigate the top menu. We also provided some quick links below to help you.</p>
					<ol>
						<li>If this is your first time and haven't set your schedule yet, <a href="/tutor/manage-schedule.php">Click here.</a></li>
						<li>Want to check the students who booked their classes to you? <a href="/tutor/classes.php">Click here.</a></li>
						<li>If you have on-going classes and want to see your updates, <a href="/tutor/lesson-history.php">Click here.</a></li>
					</ol>
  				      <h4><?php //echo $page_protect->g_title; ?></h4>
                    <?php //echo $page_protect->g_content; ?>
				</div>
              </div>
		
          </div><!--/row-->
        </div>
        </div>

 <?php
 include('footer-tutor.php');
 ?>   