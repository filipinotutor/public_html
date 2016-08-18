<?php
include('header-tutor.php');
?>
        <div class="col-md-9">
        	<div class="row">
			  <div class="col-md-4">
				<h4>Schedule- Add/Edit</h4>
			  </div>

			 <div class="col-md-3 col-md-offset-5">
			 	<a class="btn btn-warning pull-right" href="view_schedule.php"><span class="icon-search"></span> View my schedule</a>
             </div>
             
			 </div>
			<div class="row">
			 	<div class="col-md-12">
				 	<strong>Guidelines</strong>
				    <ol>
						<li>Submitted schedules are being approved by supervisors.</li>
						<li>If schedule is closed, tutor can't update or cancel it anymore. If you have a valid reason please call your supervisor.</li>
					</ol>
            	</div>
            </div>
			<hr />
              <?php
			  
			  
				if (@$_POST["send"]) {
				
				$hoursselected = $_POST["hoursselected"];
				$schedule_added = false;
				
				foreach($hoursselected as $selected)
					{
						list ($hour, $day, $month, $year, $schedstatus) = explode('&', $selected);		
						
						if($schedstatus=="open") //----------------------------------------------------- open
							{
								$schedule_id="";
								//echo 'hour:'.$hour.' day:'.$day. ' month:'.$month. ' year:'. $year;
								//echo '<br />';
								$found=$page_protect->get_sched_id($hour, $day, $month, $year, $page_protect->user_id); //get id and status
								//echo "<p>Selected on ".$day."/".$month."/".$year." at ".$hour."</p>";
								
								$schedule_id=$page_protect->schedule_id;
								
								//echo "test";
								
								if($found) // if found then update
								{
									//echo "test2";
									//echo 'found:'.$schedule_id;
									$status=$page_protect->status;
									
									$approved=$page_protect->get_sched_approved($schedule_id); // if approved, cannot be changed anymore, supervisor can 
									
									if($approved=="no")
										{
											if($status=="closed")
											{
												echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> cannot be changed anymore because it is already booked.</div>';
											}
											else
											{
												//update
											$updated = $page_protect->update_schedule($schedule_id, $status, $approved);
											}
											
										}
									else if($status=="closed")
										{
											//cannot change status
											echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> schedule cannot be changed anymore because it is already booked.</div>';
											
										}
										/*
									else if($approved=="yes")
										{
											//cannot change status
											echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> schedule cannot be changed anymore because it is already approved by the supervisor.</div>';
											
										}*/
								}
								else // not found
								{
									//echo "test3";
									//TODO notify supervisor-----------------
									$inserted = $page_protect->insert_schedule_tutor($page_protect->user_id, $day, $month, $year, $hour, $schedstatus, $approved="no");
									
									
									
									if($inserted)
									{
										$schedule_added = true;
									}
									else
									{
										//error upon insertion
										echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> schedule NOT added. Database error.</div>';
									}
								}
								
								
								
							}
						if($schedstatus=="n/a") //--------------------------------------------------------------------- n/a
							{	
								$schedule_id="";
								//echo "<p>Selected on ".$day."/".$month."/".$year." at ".$hour."</p>";
								//echo $page_protect->user_id;
								$found= $page_protect->get_sched_id($hour, $day, $month, $year, $page_protect->user_id);
								$schedule_id = $page_protect->schedule_id;
								$approved=$page_protect->get_sched_approved($schedule_id); // if approved, cannot be changed anymore, supervisor can 

								if($found) //found
								{
									$status=$page_protect->status;
									if($status=="closed")
									{
										//cannot change status
										echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> cannot be changed anymore because it is already booked.</div>';
									}
									else if($approved=="yes")
										{
											//cannot change status
											echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> cannot be changed anymore because it is already approved by the supervisor.</div>';
											
										}
									else
									{
									//delete
									//echo "found: ".$page_protect->schedule_id;
									$schedule_id = $page_protect->schedule_id;
									$page_protect->delete_schedule($schedule_id);
									}
								}
								
								/*
								$found= $page_protect->get_sched_id($hour, $day, $month, $year, $page_protect->user_id);
								if($found)
								{
									$approved=$page_protect->get_sched_approved($page_protect->schedule_id);
									//get status
									$status=$page_protect->get_sched_status($page_protect->schedule_id);
									if($status=="closed")
									{
										//cannot change status
										echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a><strong>'.$month. '/'. $day. ' '. $hour . '</strong> cannot be changed anymore because it is already booked.</div>';
									}
									else
									{
										$page_protect->update_schedule($page_protect->schedule_id, $schedstatus, $approved);
									}
								}
								*/
							}// n/a
					}
					if($schedule_added) {
						echo '<div class="alert alert-success">Schedules Added. It is now being reviewed by the supervisor and are subject for approval.</div>';
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
				echo "<form method='post'>";
				echo $calendar->showCalendar ($page_protect->user_id,'','');
				echo "
					<div class='row'>
					<div class='col-md-11'>
					<span class='visible-xs-block pull-right'>
						<button class='btn btn-primary form-control' type='submit' name='send' value='send' />
							<i class='glyphicon-ok-sign glyphicon='></i> Update
						</button>
					</span>
					<span class='hidden-xs pull-right'>
						<button class='btn btn-primary' type='submit' name='send' value='send' />
							<i class='glyphicon-ok-sign glyphicon'></i> Update
						</button>
					</span>
					</div>
					</div>
				</form>";
				
				?>
				
			
            </div><!--/span-->
           
       
    

 <?php
 include('footer-tutor.php');
 ?>   