<?php
	 

	if($_SERVER['PHP_SELF'] == "/tutor/lesson-history.php") {
		$user = "tutor";
	} else {
		$user = "student";	
	}


	if(isset($_POST['page'])){
		$page = $_POST['page'];
    } else { 
		$page= 0;
		$pages = $page * 5;
    }
	
    $limits = $page_protect->get_class_page_cnt($class_id,$user);
    $limit = ceil($limits/5);
    include("../includes/paging.php");
    $que = "SELECT a.*, b.c_rating_id, b.class_report_id, 
			case when isnull(b.knowledgability) then
			0
			else
			b.knowledgability
			end as `knowledgability`,
			case when isnull(b.preparedness) then
			0
			else
			b.preparedness
			end as `preparedness`,
			case when isnull(b.punctuality) then
			0
			else
			b.punctuality
			end as `punctuality`,
			case when isnull(b.patience) then
			0
			else
			b.patience
			end as `patience`,
			case when isnull(b.politeness) then
			0
			else
			b.politeness
			end as `politeness`,
			case when isnull(b.considerateness) then
			0
			else
			b.considerateness
			end as `considerateness`
			FROM classhistory a";

	if($_SERVER['PHP_SELF'] == "/tutor/lesson-history.php"){
		$sql_info = sprintf($que .''." LEFT JOIN class_ratings b ON a.report_id = b.class_report_id 
							 WHERE a.tutor = '".$class_id."' ORDER BY `date` DESC,`time` DESC LIMIT  ". $pages ." , 5");
	} else {
		$sql_info = sprintf($que .''." LEFT JOIN class_ratings b ON a.report_id = b.class_report_id
							 WHERE a.user_id = '".$class_id."' ORDER BY `date` DESC,`time` DESC LIMIT  ". $pages ." , 5");
	}
		
		$res_info = mysql_query($sql_info)or die(mysql_error());
		$count==0;

		while($row = Mysql_fetch_array($res_info)){
			$count = $count+1;
			@$time=explode(":",$row['time']); //format time ex. 6:00-6:25
							@$hr=$time[0];
							@$mn=$time[1];
							@$minute=intval($mn)+25;
							@$hr = @$hr.':'.@$minute;
			@$sched_time = $row['time'].' - '. $hr;
			
			
			$page_protect->tutor_info_for_sup($row['tutor']);
			$page_protect->student_info_for_sup($row['user_id']);
			
			
			$page_protect->get_materials_info($row['material']);
			 @$m_title = $page_protect->m_title;
			
			$ratings_part = '<tr>
								<td>
									Ratings: 
								</td>
								<td colspan="2">
								<a href="#" data-toggle="collapse" data-target="#'.$row['report_id'].'">View Ratings</a>
									<div id="'.$row['report_id'].'" class="collapse">
										Knowledgability: <select class="example">
							              <option value="1'.$row['report_id'].'knowledgability" '. ($row['knowledgability'] == 1 ? "selected" : "") .'>1</option>
							              <option value="2'.$row['report_id'].'knowledgability" '. ($row['knowledgability'] == 2 ? "selected" : "") .'>2</option>
							              <option value="3'.$row['report_id'].'knowledgability" '. ($row['knowledgability'] == 3 ? "selected" : "") .'>3</option>
							              <option value="4'.$row['report_id'].'knowledgability" '. ($row['knowledgability'] == 4 ? "selected" : "") .'>4</option>
							              <option value="5'.$row['report_id'].'knowledgability" '. ($row['knowledgability'] == 5 ? "selected" : "") .'>5</option>
							            </select>
										<br/>
										Preparedness: <select class="example">
							              <option value="1'.$row['report_id'].'preparedness" '. ($row['preparedness'] == 1 ? "selected" : "") .'>1</option>
							              <option value="2'.$row['report_id'].'preparedness" '. ($row['preparedness'] == 2 ? "selected" : "") .'>2</option>
							              <option value="3'.$row['report_id'].'preparedness" '. ($row['preparedness'] == 3 ? "selected" : "") .'>3</option>
							              <option value="4'.$row['report_id'].'preparedness" '. ($row['preparedness'] == 4 ? "selected" : "") .'>4</option>
							              <option value="5'.$row['report_id'].'preparedness" '. ($row['preparedness'] == 5 ? "selected" : "") .'>5</option>
							            </select>
										<br/>
										Punctuality: <select class="example">
							              <option value="1'.$row['report_id'].'punctuality" '. ($row['punctuality'] == 1 ? "selected" : "") .'>1</option>
							              <option value="2'.$row['report_id'].'punctuality" '. ($row['punctuality'] == 2 ? "selected" : "") .'>2</option>
							              <option value="3'.$row['report_id'].'punctuality" '. ($row['punctuality'] == 3 ? "selected" : "") .'>3</option>
							              <option value="4'.$row['report_id'].'punctuality" '. ($row['punctuality'] == 4 ? "selected" : "") .'>4</option>
							              <option value="5'.$row['report_id'].'punctuality" '. ($row['punctuality'] == 5 ? "selected" : "") .'>5</option>
							            </select>
										<br/>
										Patience: <select class="example">
							              <option value="1'.$row['report_id'].'patience" '. ($row['patience'] == 1 ? "selected" : "") .'>1</option>
							              <option value="2'.$row['report_id'].'patience" '. ($row['patience'] == 2 ? "selected" : "") .'>2</option>
							              <option value="3'.$row['report_id'].'patience" '. ($row['patience'] == 3 ? "selected" : "") .'>3</option>
							              <option value="4'.$row['report_id'].'patience" '. ($row['patience'] == 4 ? "selected" : "") .'>4</option>
							              <option value="5'.$row['report_id'].'patience" '. ($row['patience'] == 5 ? "selected" : "") .'>5</option>
							            </select>
										<br/>
										Politeness: <select class="example">
							              <option value="1'.$row['report_id'].'politeness" '. ($row['politeness'] == 1 ? "selected" : "") .'>1</option>
							              <option value="2'.$row['report_id'].'politeness" '. ($row['politeness'] == 2 ? "selected" : "") .'>2</option>
							              <option value="3'.$row['report_id'].'politeness" '. ($row['politeness'] == 3 ? "selected" : "") .'>3</option>
							              <option value="4'.$row['report_id'].'politeness" '. ($row['politeness'] == 4 ? "selected" : "") .'>4</option>
							              <option value="5'.$row['report_id'].'politeness" '. ($row['politeness'] == 5 ? "selected" : "") .'>5</option>
							            </select>
										<br/>
										Considerateness: <select class="example">
							              <option value="1'.$row['report_id'].'considerateness" '. ($row['considerateness'] == 1 ? "selected" : "") .'>1</option>
							              <option value="2'.$row['report_id'].'considerateness" '. ($row['considerateness'] == 2 ? "selected" : "") .'>2</option>
							              <option value="3'.$row['report_id'].'considerateness" '. ($row['considerateness'] == 3 ? "selected" : "") .'>3</option>
							              <option value="4'.$row['report_id'].'considerateness" '. ($row['considerateness'] == 4 ? "selected" : "") .'>4</option>
							              <option value="5'.$row['report_id'].'considerateness" '. ($row['considerateness'] == 5 ? "selected" : "") .'>5</option>
							            </select>
										<br/>
									</div>
								</td>
							</tr>';

			if($_SERVER['PHP_SELF'] == "/tutor/lesson-history.php"){
				echo'<table class="table table-striped table-bordered table-condensed">
						<tr>
						<td><b>Student:</b> <a href="#myModalViewProfile'.$row['user_id'].'"  data-toggle="modal" data-backdrop="static">
						'.@$page_protect->student_first_name.' '.$page_protect->student_last_name.'</a></td>
						<td><b>Date:</b> '.@$row['date'].'</td>
						<td><b>Time:</b><span class="label label-success"> '.@$sched_time.'</span></td>
						<td class="hidden-xs" style="color:';
						echo $row['attendance'] == "present" ? "green":"red";


						echo'"><b>'.strtoupper(@$row['attendance']).'</b></td>
						
					</tr>
					<tr>
						<td  style="min-width:100px;"><b>Lesson:</b></td>
						<td colspan="3"><a href="../includes/materials_content.php?mid='.$row['material'].'" target="blank"><h6>'.@$m_title.'</h6></a></td>
					</tr>
					';
					
					echo $ratings_part;

					if($page_protect->get_access_level() != 1){
						echo '<tr class="hidden-xs">
						<td><b>Tutors Comment:</b> </td>
						<td colspan="3" width="80%" >
						<p style="word-wrap:break-word;">
						'.$row['remarks'].'
						</p>
						</td>
						</tr>';

						
					};

				echo'
					<div id="myModalViewProfile'.$row['user_id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 id="myModalLabel">'. $page_protect->student_first_name.' '.$page_protect->student_first_name.'</h4>
										</div>
										
										<div class="modal-body">
											<p style="vertical-align:top;"> 
												<img src="'.$page_protect->student_photo.'" class="img-rounded" alt="Photo" height="" width="150" />
											</p>
											<p style="vertical-align:top;">
											Nickname:
												'.$page_protect->student_nick_name.'</a>
											</p>
											<!-- <p style="vertical-align:top;">
												Phone Number:
											'.$page_protect->student_phone.'
											</p>
											<p style="vertical-align:top;">
												Email: '.$page_protect->student_email.'
											</p>
											--> 
											<p style="vertical-align:top;">
												Skype ID: '.$page_protect->student_skype_id.'
											</p>
											<br/>
											<br/>
											
											<div class="container">
											<div class="row">
												<div class="col-xs-2">
												</div>
												<div class="col-xs-3">
												<a class="btn btn-primary" href="/tutor/student-history.php?studid='. $row['user_id'] .'" target="_blank">View Details</a>
												</div>
												<div class="col-xs-2">
												</div>
											</div>
											</div>
											';
										echo '
										</div>

										<div class="modal-footer">
											<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										</div>
							</div>
						</div>
					</div>
					</table>
					<div class="row-fluid">

					</div>';
			} else {
				echo'<table class="table table-striped table-bordered table-condensed">
						<tr>
						<td><b>Tutor:</b> <a href="#myModalViewProfile'.$row['tutor'].'"  data-toggle="modal" data-backdrop="static">
						'.@$page_protect->tutor_first_name.' '.$page_protect->tutor_last_name.'</a></td>
						<td><b>Date:</b> '.@$row['date'].'</td>
						<td><b>Time:</b><span class="label label-success"> '.@$sched_time.'</span></td>
						<td class="hidden-xs" style="color:';
						echo $row['attendance'] == "present" ? "green":"red";
						echo'"><b>'.strtoupper(@$row['attendance']).'</b></td>
					</tr>
					<tr>
						<td style="min-width:100px;"><b>Lesson:</b></td>
						<td colspan="3"><a href="../includes/materials_content.php?mid='.$row['material'].'" target="blank"><h6>'.@$m_title.'</h6></a></td>
					</tr>
					';
				
				echo $ratings_part;

					if($page_protect->get_access_level() != 1){
						echo '<tr class="hidden-xs">
						<td><b>Tutors Comment:</b> </td>
						<td colspan="3" width="80%" >
						<p style="word-wrap:break-word;">
						'.$row['remarks'].'
						</p>
						</td>
						</tr>';

					};
				echo'
					<div id="myModalViewProfile'.$row['tutor'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 id="myModalLabel">'. $page_protect->tutor_first_name.' '.$page_protect->tutor_first_name.'</h4>
										</div>
										<div class="modal-body">
											<p style="vertical-align:top;"> 
												<img src="'.$page_protect->tutor_photo.'" class="img-rounded" alt="Photo" height="" width="150" />
											</p>
											<p style="vertical-align:top;">
											Nickname:
												'.$page_protect->tutor_nick_name.'</a>
											</p>
											<!-- <p style="vertical-align:top;">
												Phone Number:
											'.$page_protect->tutor_phone.'
											</p>
											<p style="vertical-align:top;">
												Email: '.$page_protect->tutor_email.'
											</p>
											--> 
											<p style="vertical-align:top;">
												Skype ID: '.$page_protect->tutor_skype_id.'
											</p>
											</div>

										<div class="modal-footer">
											<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										</div>
							</div>
						</div>
					</div>
					</table>
					<div class="row-fluid">

					</div>
			';
			}
}			
			if($count == 0) {
			echo '<span class="label label-warning">No class history available.</span>';
			}
				
			echo $pagination;
    		
?>