  <?php
			  
			  
				/*if ($_POST["send"]) {
				
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
				
				*/
				if($_GET["postvars"])
				{
				echo $postVars = $_GET["postvars"];
				}
				
				
				list ($d, $m, $y) = split('-', $postVars);	
				 
				if ($d && m && y)
				{
					$day = $d;
					$month = $m;
					$year = $y;
					} else {
					$day = date ("d");
					$month = date ("n");
					$year = date ("Y");
				}
				
				//$tutorid=$_GET["tutorid"];
				$tutorid=28;
				
				//include the WeeklyCalClass and create the object !!
				include ("../includes/WeeklyCalClass-booking.php");
				$calendar = new WeeklyCalClass ($day, $month, $year, $tutorid);
				echo "<form method='post'";
				echo $calendar->showCalendar ($tutorid);
				echo "</form>";
				
				echo '=---------------------------------';
				echo '<div id="weekcontent"></div>';
				include ("../includes/WeeklyCalClass-booking-head.php");
				$calendar1 = new WeeklyCalClassHead ($day, $month, $year, $tutorid);
				echo "<form method='post'";
				echo $calendar1->showCalendar ($tutorid);
				echo "</form>";
				
	?>