<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include('header-student.php');
include($root.'/includes/log.php'); 

$log = new Log();

?>
        <div class="col-md-9">
         	<div class="row">
          	  <div class="col-md-12">
			  	<h4>クラスの予約</h4> 
			  </div>
			</div>
			<div class="row">	
			<div class="col-md-12">
			 	<div class="visible-xs-block">
				  Choose your Tutor:
						<div  style="max-height:100px;overflow-y:scroll;">
						<?php

						$row = $page_protect->get_active_tutor();
						for($x=0;$x!=$row['count'][0];$x++){
							$page_protect->get_tutor_info($row['user_id'][$x]);
						echo'
						<a href="#ModalSelectTutor'.$row['user_id'][$x].'" data-toggle="modal">
						'.$row['first_name'][$x].' '.$row['last_name'][$x].'<br/>
						</a>				
						<div id="ModalSelectTutor'.$row['user_id'][$x].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 id="myModalLabel">'.$row['first_name'][$x].' '.$row['last_name'][$x].'</h4>
								</div>

								<div class="modal-body" style="overflow-y:scroll;">
								<img src="'.$page_protect->tutor_photo.'" class="img-thumbnail" width="150px"/><br/>
								'.$page_protect->tutor_nick_name.'<br/>
								'.$page_protect->tutor_self_intro.'					
								</div>

								<div class="modal-footer">
									<a href="book-classes.php?tutor_id='.$row['user_id'][$x].'#bookClass" class="btn btn">Select</a>
									<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							</div>
							</div>
						</div>

						';
						}
						?>
						</div>

					</div>	
				</div>
			</div>			
				<?php	
				$per_page = 6; 

				//getting number of rows and calculating no of pages
				$sql = "SELECT * FROM tutors,users WHERE tutors.tutor_id = users.user_id AND users.active = 'y'";
				$rsd = mysql_query($sql)or die(MySQL_error());
				$count = mysql_num_rows($rsd);
				$pages = ceil($count/$per_page);
				
				?>
			<div class="row">
				<div class="col-md-12">
					<div class="hidden-xs">
						
						<div id="content-tutors" class="<?php echo $_GET['tutor_id'];?>">
						</div>
						
						<div class="pagination col-md-12">
							<ul id="pagination" class="pagination">
								<?php
								//Show page links
									if($pages > 1 )
									{
										for($i=1; $i<=$pages; $i++)
										{
											echo '<li class="pages" id="'.$i.'"><span>'.$i.'</span></li>';
										}
									}
								?>
							</ul>	
						</div>
						
						<div id="loading" class="btn btn-warning">
						</div>
					
					</div>
				</div>
			</div>
		<div class="row" id="bookClass">
			<div class="col-md-12">
				    <div class="well">
                    
		                <?php
						if(isset($_GET['tutor_id']))
						{
		                $page_protect->get_tutor_info($_GET['tutor_id']);
						
						?>
					Chosen Tutor: <strong><?php echo '<a href="#myModal'. $_GET['tutor_id'].'" role="button" class="btn btn-warning" data-toggle="modal"><img style="width:40px;" class="img-rounded" src="'.$page_protect->tutor_photo.'"> '. $page_protect->tutor_nick_name.'</a>';?></strong>
                    	<?php
                        }
						else {
							echo 'Please select a tutor above to start booking your classes.';
							}
                        ?>
	          
				    </div>
			</div>
		</div>
			
		
		<div class="row">
		    <div class="col-md-12">
              <!-- start CALENDAR ------------------- -->
			  <?php
			  	
				if($_GET['tutor_id']){
					if (@$_POST["send"]){
						if(isset($_POST["hoursselected"])){
							$hoursselected = $_POST["hoursselected"];
				
							$page_protect->get_student_credit($page_protect->user_id);
							$credit_value=$page_protect->credit_value;
							if($credit_value > 0){
									$page_protect->create_notification($page_protect->user_id, "student: book class", $page_protect->user_id, "student: book class");
									$page_protect->create_notification($_GET['tutor_id'], "student: book class", $page_protect->user_id, "student: book class");
							}		

							foreach($hoursselected as $selected)
							{
								list ($hour, $day, $month, $year, $sched_id) = explode('&', $selected);		

								$tmphour = '';
								if (strlen($hour) >= 6) {
									for($i = 0; $i <= strlen($hour) - 2; $i++){
										$tmphour = $tmphour.''.$hour[$i];
									}
									$hour = $tmphour;
								}

								$hour = date("G:i", strtotime(date("G:i", strtotime($hour))) - 3600);

								$matched = $page_protect->get_sched_matched($hour, $day, $month, $year, $page_protect->user_id);

								if(!$matched) {

									$msg = 'hour: '.$hour.' day: '.$day.' month: '.$month.' year: '.$year.' tutor_id:'.$page_protect->user_id;
									$log->setLogName("student\book-classes.php");
									$log->setLog("matched", "e", $msg);

									$currdate = date("Y-m-d H:i:s", time());
									$sql = 'SELECT credit_id, credit_value FROM studentcredits WHERE status=1 AND expiration > "'.$currdate.'" AND student_id = '.$page_protect->user_id.'  ORDER BY expiration ASC';
									$rsd = mysql_query($sql) or die(mysql_error());
									
									while($row = mysql_fetch_array($rsd,MYSQL_NUM))
									{
										$studentcredits=$studentcredits+$row[1];
									}
												
									$page_protect->get_student_credit($page_protect->user_id);
									$credit_id=$page_protect->credit_id;
									$credit_value=$page_protect->credit_value;
									
									if( $credit_value-1 >= 0) {
										
										$res=$page_protect->book_schedule($sched_id, $page_protect->user_id);
										
										if($res) {
											$page_protect->insert_credit_usage($credit_id, $sched_id, $status='booked');
											
											if(intval($credit_value) > 1) {
												$credit_value=$credit_value-1;
												$page_protect->update_student_credit($credit_id, $credit_value, 1);
											}	
											else if($credit_value == 1) {
												$credit_value=$credit_value-1;
												$page_protect->update_student_credit($credit_id, $credit_value, 0);
											}	

											echo ' <meta http-equiv="refresh" content="3"><div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>'.$month.'/' .$day.' <strong>'.$hour.'</strong> schedule successfully booked.</div>';
										}
									}
									else // 0 credits
									{
										echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a><strong> You do not have enough credits.</strong> <a href="credits.php" class="btn btn-success"><i class="icon-shopping-cart"></i> Buy Credits</a></div>';
									}
								}
								else
								{
									$hour = date("G:i", strtotime(date("G:i", strtotime($hour))) + 3600);

									$msg = 'hour: '.$hour.' day: '.$day.' month: '.$month.' year: '.$year.' tutor_id:'.$page_protect->user_id;
									$log->setLogName("student\book-classes.php");
									$log->setLog("notmatched", "e", $msg);
									echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>'.$month.'/' .$day.' <strong>'.$hour.' NOT BOOKED.</strong> You already booked a class with the same schedule. Please choose another schedule.</div>';
									
								}
							}

				  		} else {
					  		echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>No schedule selected.</div>';
					  	}
					} 
					if (@$_GET["day"] && @$_GET["month"] && @$_GET["year"] && @$_GET["tutor_id"]) {
						$day = $_GET["day"];
						$month = $_GET["month"];
						$year = $_GET["year"];
					} else {
						$day = date ("d");
						$month = date ("n");
						$year = date ("Y");
					}
					$tutorid=$_GET['tutor_id'];
					//include the WeeklyCalClass and create the object !!
					include ("../includes/WeeklyCalClass-booking.php");
					@$calendar = new WeeklyCalClass ($day, $month, $year);
					echo "<form method='post'";
					echo @$calendar->showCalendar ($tutorid,$page_protect->user_id,'','');
				}
				?>
			
			  <!-- end CALENDAR ------------------- -->
			
            </div><!--/span-->
           
      </div><!--/row-->

     </div>

 <?php
 include('footer-student.php');
 ?>   