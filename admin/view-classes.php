<?php
include('header-admin.php');
?>
        <div class="span9">
         
          <div class="row-fluid">
			  <div class="span12">
			  <h4>Class schedule</h4> 
			 <?php
				$tutorid=$_GET['TutorId'];
				//include the WeeklyCalClass and create the object !!
				include ("../includes/WeeklyCalClass-booking.php");
				@$calendar = new WeeklyCalClass ($day, $month, $year);
				echo "<form method='post'";
				echo @$calendar->showCalendar ($tutorid,$page_protect->user_id);
			
				?>
			
			  <!-- end CALENDAR --------------------->
			
            </div><!--/span-->
           
       
          </div><!--/row-->
          <div class="row-fluid">
         
          
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

 <?php
 include('footer-admin.php');
 ?>   