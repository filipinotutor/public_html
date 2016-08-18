<?php
include('header-tutor.php');
?>
        <div class="col-md-9">
        	<div class="row">
              	<div class="col-md-6">
              		<h4>Schedule</h4>
              	</div>
        		<div class="col-md-2 col-md-offset-4">
        			<a class="btn btn-warning pull-right" href="manage-schedule.php">&laquo;&nbsp;Back</a>
              	</div>
             </div>
              	<?php
              	if ($_GET["day"] && $_GET["month"] && $_GET["year"]) {
				
				$day = $_GET["day"];
				$month = $_GET["month"];
				$year = $_GET["year"];
				}
				else{
				$day = date ("d");
				$month = date ("n");
				$year = date ("Y");
				}
				//include the WeeklyCalClass and create the object !!
				include ("../includes/WeeklyCalClass.php");
				$calendar = new WeeklyCalClass ($day, $month, $year, $page_protect->user_id);
				
				echo $calendar->showCalendar ($page_protect->user_id,'view',"");
				

				?>
				
			
            </div><!--/span-->


 <?php
 include('footer-tutor.php');
 ?>   