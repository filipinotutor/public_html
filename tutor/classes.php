<?php

include('header-tutor.php');

?>

        <div class="col-md-9">
        <div class="row">
	        <div class="col-md-12">
	              <h4>Class Schedule/Bookings</h4>
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

				  	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" role="from">
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

					<!--<small>Click the calendar to choose date.</small>-->
					</form>
				  </div>
					<div class="col-xs-12 col-md-6 pull-left">
						<span class="hidden-xs">Bookings for</span>
							<span class="label label-success" style="font-size:12px;">
								<strong>
								<?php echo (isset($_POST['datefrom'])) ? date('F d, Y', strtotime($_POST['datefrom'])) : date('F d, Y', strtotime($daterange['start'])); ?>
								</strong>
							</span>
							<span class="hidden-xs">&nbsp;to&nbsp;</span>
							<span class="label label-success" style="font-size:12px;">
						 		<strong>
						 		<?php echo (isset($_POST['dateto'])) ? date('F d, Y', strtotime($_POST['dateto'])) : date('F d, Y', strtotime($daterange['end'])); ?>
						 		</strong>
						 	</span>
						</div>
				</div>


			  

			  <?php

			/*  if(isset($_GET['sid']) && isset($_GET['a'])) //cancel button clicked

			  {

			  	echo $_GET['sid'];

				echo $_GET['a'];

				if($_GET['a']=='c')

				{

					update_schedule_cancel($schedule_id, $status);

				}

			  }*/

			  if(isset($_POST['cancel']))

			  {

			  	//print_r($_POST);

				//echo $_POST['tutorid'];

				//$daterange=$page_protect->rangeWeek(date('y-m-d'));

				

				$datef = $_POST['datefrom'];

				$datet = $_POST['dateto'];

				

			 if(isset($datef) && isset($datet))

			  {

			  	$datefrom = $datef;

				$dateto = $datet;

			  }

			  else

			  {

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
					<div class="col-md-12>
					"<form action="'.$_SERVER['PHP_SELF'].'" method="post">';

					echo '
						<div class="alert alert-error">

						<a class="close" data-dismiss="alert">&times;</a><strong>

						<h4 class="alert-heading">Are you sure you want to cancel your schedule?</h4></strong>

							<br />Date and Time: <strong>'.$_POST['datetime'].'</strong>

							<br />Tutor: <strong><a href="#myModalClass'. $_POST['tutorid'].'" role="button" data-toggle="modal">'.$page_protect->tutor_nick_name.'</a></strong>

							<input type="hidden" name="sid" value="'.$sid.'">';

							echo '<input type="hidden" name="datefrom" value="'.date('Y-m-d',$datefrom).'">';

							echo '<input type="hidden" name="dateto" value="'.date('Y-m-d',$dateto).'">';

							echo'<br /><br /><button type="submit" name="confirmcancel" class="btn btn-danger">Yes</button> <a href="" class="btn" data-dismiss="alert">No</a>

						</div>
					</form>
					</div>
					</div>
					';

				}

			  }

  			  if(isset($_POST['confirmcancel']))

			  {

			  	//print_r($_POST);

				//$daterange=$page_protect->rangeWeek(date('y-m-d'));

				$datef = $_POST['datefrom'];

				$datet = $_POST['dateto'];

				

				$sid=$_POST['sid'];

				$cancelled = $page_protect->update_schedule_cancel($sid, "open"); //set schedule status to 'open'

				

				if($cancelled) 

				{

					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Schedule cancelled.</div>';

				}

				else

				{

					echo '<div class="alert alert-danger"><a class="close" data-dismiss="alert">&times;</a>Error encountered while performing your request. Please retry.</div>';

				}

				

			  }





			  if(isset($datef) && isset($datet))

			  {

			  	$datefrom = $datef;

				$dateto = $datet;

			  }

			  else

			  {

			  	$datefrom = $daterange['start'];

				$dateto = $daterange['end'];

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
				<div class="col-xs-12 col-md-12 ">

				<table class="table table-striped table-bordered table-hover ">';

				echo '<tr><th>Date</th>';

				echo '<th>Time</th>';

				echo '<th>Student</th>';

				echo '<th class="hidden-xs">Skype ID</th>';

				echo '<th>Action</th></tr>';

				//echo $datefrom;

				//echo $dateto;

				//print_r($_POST);

				$sql = 'SELECT year, month, day, time, user_id, fulldate, schedule_id, report FROM schedules WHERE fulldate BETWEEN '.$datefrom.' AND '.$dateto.' AND tutor_id='.$page_protect->user_id.' and status="closed" AND approved="yes" ORDER BY fulldate DESC';

				$rsd = mysql_query($sql) or die(mysql_error());

				$reccnt=0;

						while($row = mysql_fetch_array($rsd,MYSQL_NUM))

						{

						$reccnt=$reccnt+1;

						$time=explode(":",$row[3]);

						$hr=$time[0];

						$mn=$time[1];

						

						$minute=intval($mn)+25;

						

						$page_protect->get_student_info($row[4]); 

						$page_protect->get_student_profile($row[4]); 

						

						

						echo '<tr>';	

						echo '<td>
									<span  class="hidden-xs">'.date('F d', $row[5]).'</span>
									<span  class="visible-xs-block">'.date('m/d', $row[5]).'</span>
							  </td>';

						echo '<td>'.$row[3].' - '.$hr.':'.$minute.'</td>';

						if($page_protect->check_if_active($row[4]) == 'y'){

						echo '<td><a href="#myModalClass'. $row[4].'" role="button" data-toggle="modal">'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</a></td>';

						}

						else{

							echo '<td style="color:grey;">'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</td>';

						}

						echo '<td class="hidden-xs">'.$page_protect->student_skype_id.'</td>';

						echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';

						echo '<input type="hidden" name="sid" value="'.$row[6].'">';

						echo '<input type="hidden" name="a" value="c">';

						echo '<input type="hidden" name="datetime" value="'.date('F d', $row[5]).', '.$row[3].' - '.$hr.':'.$minute.'">';

						echo '<input type="hidden" name="datefrom" value="'.date('Y-m-d',$datefrom).'">';

						echo '<input type="hidden" name="dateto" value="'.date('Y-m-d',$dateto).'">';

						echo '<input type="hidden" name="tutorid" value="'. $row[4].'">';

						echo '<td><a href="viewhistory.php?id='.$row['4'].'" class="btn btn-default btn-xs">
								<span class="hidden-xs">View History</span>
										<span class="visible-xs-block"><i class="glyphicon glyphicon-search"></i></span>
								</a>&nbsp;';


						$sql2 = 'SELECT status FROM classhistory WHERE schedule_id ='.$row[6];

						$rsd2 = mysql_query($sql2) or die(mysql_error());

						$status = mysql_result($rsd2,0,'status');

						$sched_datetime =  strtotime(date("Y-m-d G:i", strtotime(''.$row[0].'-'.$row[1].'-'.$row[2].' '.$row[3])));

						if($row[7]!='yes' && $status ==''){
						
							if($sched_datetime < strtotime("now"))
							{	
								// echo $row[5].':'.strtotime("now").'<br/>';
								echo  '  
								<a href="report.php?schedid='.$row[6].'&uid='.$row[4].'" class="btn btn-primary btn-xs">
									<span class="hidden-xs">CREATE REPORT</span>
									<span class="visible-xs-block"><i class="glyphicon glyphicon-file"></i></span>
								</a>';

							} else {	
								echo'<span class="label label-warning hidden-xs">No need to report yet.</span>';	
								echo'<span class="label label-warning visible-xs-block"><i class="glyphicon glyphicon-lock"></i></span>';	
							}

							if($row[5] +86400 < strtotime("now")){
								echo'	<span class="label label-default hidden-xs">No report created</span>';echo'
										<span class="label label-default visible-xs-block"><i class="glyphicon glyphicon-thumbs-down"></i></span>';	
								
							}
						}

						elseif($row[7]=='yes' && $status == 'new')
							{

								echo '
								<span class="btn btn-default label label-success hidden-xs">
										Pending Report
								</span>
								<a href="#" class="btn visible-xs-block">

									<i class="glyphicon glyphicon-minus"></i>
								</a>
								';


							}

						elseif($row[7]=='yes' && $status == 'disapproved')

							{

								echo '
								<a href="#" class="btn btn-danger btn-xs">
									<span class="visible-xs-block">
										<i class="glyphicon glyphicon-remove"></i>
									</span>
									<span class="hidden-xs">
										Report Disapproved
									</span>
								</a>
								';

							}

						elseif($row[7]=='yes' && $status == 'approved')

							{

								echo '
								<a href="#" class="btn btn-info btn-xs">
									<span class="visible-xs-block">
										<i class="glyphicon glyphicon-ok"></i>
									</span>
									<span class="hidden-xs">
										Report Approved
									</span>
								</a>
								';

							}

						echo '</form></td>';

						echo '</tr>';

						echo '

						<!-- Modal -->

						<div id="myModalClass'. $row[4].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

						<div class="modal-dialog">
						
						<div class="modal-content">
						
						<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h3 id="myModalLabel">'. $page_protect->student_first_name.' '.$page_protect->student_last_name.'</h3>

						</div>

						<div class="modal-body"><img src="'. $page_protect->studentprofile_photo.'" class="thumbnail" style="margin:0 auto;"  />

						<br/>

						<p style="align:center;">
						
						Skype ID:'. $page_protect->student_skype_id.'<br>
						
						<!-- Birthday:'. $page_protect->studentprofile_birthday.'<br> 
							Phone Number:'. $page_protect->studentprofile_phone.'
						-->
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
				</div>';		

				if($reccnt==0) 

				{

					echo '
					<div class="row"><div class="col-xs-12 col-md-12"><div class="alert alert-block">No schedule found within your selected dates.</div></div></div>';

				}

			  ?>

            </div><!--/span-->

     



 <?php

 include('footer-tutor.php');

 ?>   