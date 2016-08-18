<?php
include('header-tutor.php');
?>
        <div class="span9">
         
          <div class="row-fluid">
            <div class="span12">
              <h4>Schedule- Add/Edit</h4>
			  <strong>Guidelines</strong>
			    <ol>
					<li>Schedules are set weekly.</li>
					<li>Submitted schedules are being approved by supervisors for approval.</li>
					<li>If schedule is closed, tutor can't update or cancel it anymore. If you have a valid reasone please call your supervisor.</li>
				</ol>
              <?php
			  
			  
				if ($_POST["send"]) {
				
				$hoursselected = $_POST["hoursselected"];
				
				foreach($hoursselected as $selected)
					{
						list ($hour, $day, $month, $year, $schedstatus) = split('&', $selected);		
						if($schedstatus=="open")
							{
								//echo "<p>Selected on ".$day."/".$month."/".$year." at ".$hour."</p>";
								//echo $page_protect->user_id;
								$page_protect->insert_schedule_tutor($page_protect->user_id, $day, $month, $year, $hour, $schedstatus);
							}
						if($schedstatus=="n/a")
							{
								//echo "<p>Selected on ".$day."/".$month."/".$year." at ".$hour."</p>";
								//echo $page_protect->user_id;
								$found= $page_protect->get_sched_id($hour, $day, $month, $year);
								if($found)
								{
								//$page_protect->schedule_id;
								$page_protect->update_schedule($page_protect->schedule_id, $schedstatus);
								}
							}
					}
				} 
				
				
				if ($_GET["day"] && $_GET["month"] && $_GET["year"]) {
				
				$day = $_GET["day"];
				$month = $_GET["month"];
				$year = $_GET["year"];
				} else {
				$day = date ("d");
				$month = date ("n");
				$year = date ("Y");
				}
				
				
				//include the WeeklyCalClass and create the object !!
				include ("../includes/WeeklyCalClass.php");
				$calendar = new WeeklyCalClass ($day, $month, $year, $page_protect->user_id);
				echo "<form method='post'";
				echo $calendar->showCalendar ($page_protect->user_id);
				echo "<button class='btn btn-primary' type='submit' name='send' value='send' /><i class='icon-ok-sign icon-white'></i> Update</button></form>";
				?>
				
			
            </div><!--/span-->
           
       
          </div><!--/row-->
          <div class="row-fluid">
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->
      <hr>

 <?php
 include('footer-tutor.php');
 ?>   