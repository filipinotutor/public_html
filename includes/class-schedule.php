<?php
include('header-student.php');
?>
		<div class="col-md-9">
		<div class="row">
            <div class="col-md-12">
				<h4>クラススケジュール/予約</h4>
            </div>
        </div>
			  <?php

			// print_r(rangeMonth('2011-4-5')); // year-month-day

			$daterange=$page_protect->rangeWeek(date('y-m-d'));

				

			 //echo $daterange['end'];

			 

			 if (isset($_POST['submit']))

				{

					$datef = $_POST['datefrom'];

					$datet = $_POST['dateto'];

				}

			 if(isset($_POST['cancel']))

			  {

				$datef = $_POST['datefrom'];

				$datet = $_POST['dateto'];

				//print_r($_POST);

				}	

			  ?>
			  <div class="row">
			  	<div class="col-xs-12 col-md-6 pull-right">
				  	<form action="class-schedule.php" method="post" role="form" class="inline-form">
					  	<div class="form-group">
						  	<div class="input-group">
							  	<div class="input-group-addon">from</div>
							  	<input  type="text"  class=" form-control datepickerto" name="datefrom" value="<?php echo (isset($_POST['datefrom'])) ? $_POST['datefrom'] : $daterange['start']; ?>" placeholder="Select a Date" >
								<div class="input-group-addon">to</div>
							  	<input  type="text" class=" form-control datepickerfrom" name="dateto" value="<?php echo (isset($_POST['dateto'])) ? $_POST['dateto'] : $daterange['end']; ?>" placeholder="Select a Date" >
							  <span class="input-group-btn">	
								<button class="btn btn-primary" type="submit" name="submit">Go</button>
								</span>
							</div>
						</div>
					</form>
				</div>
				  

				<!--<small>Click the calendar to choose date.</small>-->
				<div class="col-xs-12 col-md-6">
				<span class="hidden-xs">Bookings for </span>

					<span class="label label-success" style="font-size:14px;">
						<strong>
						<?php echo (isset($_POST['datefrom'])) ? date('F d, Y', strtotime($_POST['datefrom'])) : date('F d, Y', strtotime($daterange['start'])); ?>
						</strong>
					</span>
					<span class="hidden-xs"> &nbsp;to</span>
					<span class="label label-success" style="font-size:14px;">
				 		<strong>
				 		<?php echo (isset($_POST['dateto'])) ? date('F d, Y', strtotime($_POST['dateto'])) : date('F d, Y', strtotime($daterange['end'])); ?>
				 		</strong>
				 	</span>
				</div>
				</div>
			  <?php

			  if(isset($_POST['cancel'])){

				$datef = $_POST['datefrom'];

				$datet = $_POST['dateto'];

				

			 if(isset($datef) && isset($datet))

			  {

			  	$datefrom = $datef;

				$dateto = $datet;

			  } else {

			  	$datefrom = $daterange['start'];

				$dateto = $daterange['end'];

			  }

			  	$datefrom = strtotime($datefrom);

				$dateto = strtotime($dateto);				

				$page_protect->get_tutor_info($_POST['tutorid']);

				if(isset($_POST['sid']))
				{

					$sid=$_POST['sid'];

					echo '
					<div class="row">
					<div class="col-xs-12 col-md-12">
					<form action="'.$_SERVER['PHP_SELF'].'" method="post">';

					echo '<div class="alert alert-error">

					<a class="close" data-dismiss="alert">&times;</a><strong>

					<h4 class="alert-heading">Are you sure you want to cancel this schedule?</h4></strong>

						<br />Date and Time: <strong>'.$_POST['datetime'].'</strong>

						<br />Tutor: <strong><a href="#myModalClass'. $_POST['tutorid'].'" role="button" data-toggle="modal">'.$page_protect->tutor_nick_name.'</a></strong>

						<input type="hidden" name="sid" value="'.$sid.'">';

						echo '<input type="hidden" name="datefrom" value="'.date('Y-m-d',$datefrom).'">';

						echo '<input type="hidden" name="dateto" value="'.date('Y-m-d',$dateto).'">';

						echo '<input type="hidden" name="datetime" value="'.$_POST['datetime'].'">';

						echo '<input type="hidden" name="tutor_name" value="'.$page_protect->tutor_nick_name.'">';



						echo'<br /><br /><button type="submit" name="confirmcancel" class="btn btn-danger">Yes</button> <a href="" class="btn" data-dismiss="alert">No</a>

					</div></form></div>
					</div>';

				}

			  }

  			  if(isset($_POST['confirmcancel']))
			  {

			  	//print_r($_POST);

				//$daterange=$page_protect->rangeWeek(date('y-m-d'));

			  	
				$datef = $_POST['datefrom'];

				$datet = $_POST['dateto'];

				

				$sid=$_POST['sid'];

				//return points

				//echo $sid;

				
				$datetime = $_POST['datetime'];
				$tutor_name = $_POST['tutor_name'];


				$page_protect->return_credit($sid);


				$cancelled = $page_protect->update_schedule_cancel($sid, "open"); //set schedule status to 'open'
				$page_protect->get_student_credit($page_protect->user_id);
					
				$credit_id=$page_protect->credit_id;
				$credit_value=$page_protect->credit_value;

				$credit_value=$credit_value;
				$page_protect->update_student_credit($credit_id, $credit_value, 1);
				



				if($cancelled) {

					$headers = 'From: supervisor@filipinotutor.com' . "\r\n" .
					'Reply-To: supervisor@filipinotutor.com' . "\r\n";

					$subject = "Student's Schedule Cancellation";
					$body = "Student ".$_SESSION['user']." cancelled class schedule ". $datetime ." for Tutor ". $tutor_name;
					
					$mail_address = "admin@filipinotutor.com";
					if (mail($mail_address, $subject, $body, $headers)) {
						
						$page_protect->create_notification($page_protect->user_id, "student: book class", $page_protect->user_id, "student: book class");
					}	

					$mail_address = "supervisor@filipinotutor.com";
					if (mail($mail_address, $subject, $body, $headers)) {
					}
					echo '
							<div class="row">
	  				 			<div class="col-md-12">
	  								<div class="alert alert-success">
		  								<a class="close" data-dismiss="alert">&times;</a>
		  								Schedule cancelled.
	  								</div>
	  							</div>
	  						</div>
	  						';
					$admin_id = $page_protect->admin_id;
					$page_protect->create_notification($admin_id, "cancel schedule", $admin_id, "student: cancel schedule");
				}
				else {
					echo '
						<div class="row">
			  				<div class="col-md-12">
			  					<div class="alert alert-error">
				  					<a class="close" data-dismiss="alert">&times;</a>
				  					Error encountered while performing your request. Please retry.
			  					</div>
			  				</div>
			  			</div>
			  			';

				}
			  }

			  if(isset($datef) && isset($datet))

			  {

			  	$datefrom = $datef;

				$dateto = $datet;

				$all = false;
			  }

			  else

			  {

			  	$datefrom = $daterange['start'];

				$dateto = $daterange['end'];

				$all = true;
			  }

				$datefrom = strtotime($datefrom);

				$dateto = strtotime($dateto);

				

				$dayfrom = date('j', $datefrom);

				$monthfrom = date('n', $datefrom);

				$yearfrom = date('Y', $datefrom);

				

				$dayto = date('j', $dateto);

				$monthto = date('n', $dateto);

				$yearto = date('Y', $dateto);

				

				

				echo '
				<div class="row">
  					<div class="col-xs-12 col-md-12">
						<table class="table table-striped table-bordered table-hover table-responsive">';

				echo '<th>Date</th>';

				echo '<th>Time</th>';

				echo '<th>Tutor</th>';

				echo '<th class="hidden-xs">Skype ID</th>';

				echo '<th>Action</th>';

				if($all){

					$sql = 'SELECT year, month, day, time, tutor_id, fulldate, schedule_id FROM schedules WHERE user_id='.$page_protect->user_id.' and status="closed" AND approved="yes" ORDER BY fulldate DESC';

				} else {
					
					$sql = 'SELECT year, month, day, time, tutor_id, fulldate, schedule_id FROM schedules WHERE fulldate BETWEEN '.$datefrom.' AND '.$dateto.' AND user_id='.$page_protect->user_id.' and status="closed" AND approved="yes" ORDER BY fulldate DESC';
				}

				$rsd = mysql_query($sql) or die(mysql_error());

				$reccnt=0;

						while($row = mysql_fetch_array($rsd,MYSQL_NUM))

						{

						$reccnt=$reccnt+1;

						$time=explode(":",$row[3]);

						$hr=intval($time[0])+1;
						
						$sched_time = strtotime($row[3]) + 3600;

						$mn=$time[1];

						

						$minute=intval($mn)+25;

						

						$page_protect->tutor_info_for_sup($row[4]); 

						

						echo '<tr>';	

						echo '<td>
						<span class="hidden-xs">'.date('F d', $row[5]).'</span>
						<span class="visible-xs-block">'.date('m/d', $row[5]).'</span>
						</td>
								';
						echo '<td>'.date('H:i', $sched_time).' - '.$hr.':'.$minute.'</td>';
						echo '<td><a href="#myModalClass'. $row[4].'" data-toggle="modal">'.$page_protect->tutor_nick_name.'</a></td>';
						echo '<td class="hidden-xs">'.$page_protect->tutor_skype_id.'</td>';
						echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
						echo '<input type="hidden" name="sid" value="'.$row[6].'">';
						echo '<input type="hidden" name="a" value="c">';
						echo '<input type="hidden" name="datetime" value="'.date('F d', $row[5]).', '.date('H:i', $sched_time).' - '.$hr.':'.$minute.'">';
						echo '<input type="hidden" name="datefrom" value="'.date('Y-m-d',$datefrom).'">';
						echo '<input type="hidden" name="dateto" value="'.date('Y-m-d',$dateto).'">';
						echo '<input type="hidden" name="tutorid" value="'. $row[4].'">';
						
						if($row[5] > strtotime("today"))
						{ 
						echo '<td><button type="submit" name="cancel" class="btn btn-danger btn-sm">Cancel</button></td>';
						}
						else{
						echo '<td></td>';
						}
						echo '</form>';
						echo '</tr>';
						echo '
						<!-- Modal -->
						<div id="myModalClass'. $row[4].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
		    					<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h3 id="myModalLabel">'. $page_protect->tutor_nick_name.'</h3>
									</div>
									<div class="modal-body">
									<p style="vertical-align:top;"><img src="../'. $page_protect->tutor_photo.'" class="thumbnail" style="align:left; padding-right:10px;"  />
									'. $page_protect->tutor_self_intro.'
									</p>
									</div>

									<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									</div>
								</div>
							</div>
						</div>
				';	
						}
				echo '</table>
				</div>
				</div>
				';		
				if($reccnt==0) 
				{
					echo '
					<div class="row">
		  				<div class="col-md-12">
		  					<div class="alert alert-info">
		  					No schedule found within your selected dates.
							</div>
						</div>
					</div>
					';
				}
			  ?>
			  </div>
			 </div><!--/col-md-9 table -->
            
 <?php
 include('footer-student.php');
 ?>   