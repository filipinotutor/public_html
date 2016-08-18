<?php
include('header-supervisor.php');
?>
	
         <div class="col-md-12">
         <div class="col-md-6">
            <table class="table table-striped table-bordered">
				<tr class="success"> 
					<td>
						<span class="text-success">
							<strong>Recent Bookings</strong>
						</span> 
						<a class="btn pull-right btn-mini" href="students.php?t=1B">
							<i class="glyphicon glyphicon-chevron-right"></i>
						</a>
					</td>
				</tr> 
				<tr>
					<td>
					<table class="table table-striped table-bordered table-hover table-condensed">
						<tbody>
							<?php
							$output = $page_protect->get_student_booking_sup(NULL, " LIMIT 0,5");
							for($x=0;$x!=$output['count'][0];$x++){
							
							$time=explode(":",$output[$x]['time']);
							$hr=$time[0];
							$mn=$time[1];
							
							$minute=intval($mn)+25;
							$page_protect->get_student_info($output[$x]['user_id']); 
							$page_protect->get_tutor_info($output[$x]['tutor_id']);
									
							echo'
									<tr>
										<td>
											'.date('F d',$output[$x]['fulldate']).'
										</td>
										<td>
											'.$output[$x]['time'].'-'.$time[0].':'.$minute.'
										</td>
										<td>
											'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'
										</td>
										<td class="hidden-xs">
											'.$page_protect->tutor_nick_name.'
										</td>
										<td>
											<a class="btn btn-xs btn-primary" href="student_schedule.php?StudId='. $output[$x]['user_id'].'&t=1A&page=N-0&t=1B">
												<i class="glyphicon-book glyphicon"></i>
											</a>
										</td>
									</tr>';
								}
							?>
						</tbody>
					</table>
					</td>
				</tr>
				</table>
        </div><!--/span-->
		 <div class="col-md-6">
            <table class="table table-striped table-bordered">
			<tr class="success"> 
					<td><span class="text-success"><strong>New Registrations</strong></span> <a class="btn pull-right btn-mini" href="students.php?t=1A"><i class="glyphicon glyphicon-chevron-right"></i></a></td>
				</tr>
				<tr>
					<td>
					<table class="table table-striped table-bordered table-hover">
						<?php
						echo $page_protect->get_new_student_list(' LIMIT 0,5');
						?>
					</table>
					</td>
				</tr>
				</table>
        </div><!--/span-->
      </div><!--/12 row-->
     <div class="col-md-12">
         <div class="col-md-6">

            <table class="table table-striped table-bordered ">
				<tr class="success"> 
					<td><span class="text-success"><strong>Schedule Updates</strong></span> <a class="btn pull-right btn-mini" href="tutors.php?t=2B"><i class="glyphicon glyphicon-chevron-right"></i></a></td>
				</tr>
				<tr>
					<td>
					<table class="table table-striped table-bordered table-hover table-condensed">
				<?php
					$output = $page_protect->get_tut_update_sched_sup(" LIMIT 0,5");
					for($x=0;$x!=$output['count'][0];$x++){
					$page_protect->tutor_info_for_sup($output[$x]['tutor_id']);
					echo
						'<tr>
							<td>
								<a href="tutor_profile.php?TutorId='.$output[$x]['tutor_id'].'&t=2A" title="View Tutor Schedules">
								'.$page_protect->tutor_nick_name.'
								</a>
							</td>
							<td>
								<span class="label label-success">
								'.$output[$x]['time'].'
								</span> &nbsp;
								'.date('M d, Y',$output[$x]['fulldate']).'
							</td>
							<td class="hidden-xs">
								'.$page_protect->tutor_skype_id.'
							</td>
						</tr>
					';	
				}
			?>

					</table>
					</td>
				</tr>
				</table>
        </div><!--/span-->
        <div class="col-md-6">
            <table class="table table-striped table-bordered">
				<tr class="success"> 
					<td><span class="text-success"><strong>Class Reports</strong></span> <a class="btn pull-right btn-mini" href="tutors.php?t=2C"><i class="glyphicon glyphicon-chevron-right"></i></a></td>
				</tr>
				<tr>
					<td>
					<table class="table table-striped  table-bordered table-hover table-condensed">
				
						<?php 
						$output = $page_protect->get_tutor_report_sup(" LIMIT 0,5");
						for ($x=0; $x != $output['count'][0] ; $x++) { 
						
							$page_protect->get_tutor_info($output[$x]['tutor_id']);
							$page_protect->student_info_for_sup($output[$x]['student_id']);
							$page_protect->get_materials_info($output[$x]['material_id']);
							
							echo '<tr>';
							if($page_protect->check_if_active($output[$x]['tutor_id']) == 'y'){
								echo'<td><a href="tutor_schedule.php?TutorId='. $output[$x]['tutor_id'].'&t=2A" title="View Tutor Schedules" data-placement="right" data-toggle="tooltip">
											'.$page_protect->tutor_nick_name.'</a></td>';
							}
							else{
								echo'<td style="color:grey;">'.$page_protect->tutor_nick_name.'</td>';
							}
							if($page_protect->check_if_active($output[$x]['student_id']) == 'y'){
								echo '<td><a href="student_profile.php?StudId='.$output[$x]['student_id'].'&t=1A" title="View Student\'s Profile" target="blank" data-placement="right" data-toggle="tooltip">
										'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</a></td>';
							}
							else{
								echo '<td style="color:grey;">'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</td>';
							}
								echo '<td style="color:';
							
							if($output[$x]['attendance'] == 'present'){
								echo 'green;"';
							}
							else{
								echo 'red;"';
							}
							echo
								 	'><b>'.strtoupper($output[$x]['attendance']).'</b></td>

								<td class="hidden-xs">
									  	<a href="bookmaterial.php?mid='.$output[$x]['material_id'].'&t=4B" title="View Material" target="blank" data-placement="right" data-toggle="tooltip">
									  	'.$page_protect->m_title.'
									  	</a>
								  	</td>
								<td class="hidden-xs">'.$output[$x]['date'].'</td>
								<td class="hidden-xs">'.$output[$x]['time'].'</td>';
						}
		?>
				</table>
					</td>
				</tr>
				</table>
        </div><!--/span-->
        </div>
	<div class="col-md-12">
		  <div class="col-md-6">
            <table class="table table-striped table-bordered">
				<tr class="success"> 
					<td>
						<span class="text-success">
							<strong>Guides & Resources</strong>
						</span> 
						<a class="btn pull-right btn-mini" href="students.php?t=1B">
							<i class="glyphicon glyphicon-chevron-right"></i>
						</a>
					</td>
				</tr> 
				<tr>
					<td>
						<ul>
							<li><a href="/guide/pdf/FilipinoTutor.com_User_Guide.pdf" target="_BLANK">Download User Guide</a></li>
							<li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_1.pdf">Facts About Japan ( Part 1)</a></li>
							<li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_2.pdf">Facts About Japan ( Part 2)</a></li>
							<hr />
							<li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Reading_Assessment_Test_1.pdf" target="_BLANK">Tutor Reading Assessment Test 1</a></li>
							<li><a href="/guide/pdf/FilipinoTutor.com_Tutor_English_Proficiency_Test_2.pdf" target="_BLANK">Tutor Reading Assessment Test 2</a></li>
							<li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Test_Answer_Key.pdf" target="_BLANK">Tutor Test Answer Key</a></li>
							<hr />
							<li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Agreement.pdf" target="_BLANK">Tutor Agreement</a></li>
							<li><a href="/guide/pdf/Filipinotutor.com_Tutor_Overview_Training_Part_1.pdf" target="_BLANK">Tutor Training Overview - Part 1</a></li>
							<li><a href="/guide/pdf/Filipinotutor.com_Tutor_Overview_Training_Part_2.pdf" target="_BLANK">Tutor Training Overview - Part 2</a></li>
							<li><a href="/guide/pdf/FilipinoTutor.com_Tutoring_Tips.pdf" target="_BLANK">Tutoring Tips</a></li>
						</ul>
					</td>
				</tr>
				</table>
        </div><!--/span-->
	</div>

 <?php
 include('footer-supervisor.php');
 ?>   