<?php
include("../includes/main_class.php"); 

$page_protect = new Main_Class;

$per_page = 10; 

if($_GET)
{
$page=$_GET['page'];

}


 /*
//get table contents
$start = ($page-1)*$per_page;
//$result = mysql_query($sql) or die(mysql_error()); 
 $sql = 'SELECT user_id, first_name, last_name, email, skype_id FROM users,tutors WHERE (`access_level`=2 AND `active`=\'y\') AND (`supervisor_id` ='.$page_protect->user_id.' AND tutor_id = user_id) ORDER BY last_name ASC LIMIT '.$start.','.$per_page.'';
	$rsd = mysql_query($sql) or die(mysql_error());

									while($row = mysql_fetch_array($rsd,MYSQL_NUM))

									{

									echo '<tr>';
									echo '<td>'.$row[0].'</td>';
									echo '<td>'.$row[2].' '.$row[1].'</td>';
									echo '<td>'.$row[4].'</td>';
									
									echo '
									<td>

										<a href="#myModalViewAccount'. $row[0].'" class="btn btn-mini btn-info" data-toggle="modal" data-backdrop="static"><i class="icon-search"></i></a>	

										<a href="tutor_profile.php?t=2A&TutorId='. $row[0].'&u=t" class="btn btn-mini btn-info"><i class="icon-edit"></i></a>

										<a href="tutor_schedule.php?TutorId='. $row[0].'&t=2A" class="btn btn-mini btn-info" target="blank"><i class="icon-calendar"></i></a>

										<a href="#myModalViewBookings'. $row[0].'" class="btn btn-mini btn-info" data-toggle="modal" data-backdrop="static"><i class="icon-trash"></i></a>	

									</td>';

									$page_protect->get_tutor_info($row[0]);

									echo '</tr>';

									echo '
										<div id="myModalViewAccount'. $row[0].'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 id="myModalLabel">'. $row[1].' '.$row[2].'</h4>
										</div>

										<div class="modal-body">
											<p style "vertical-align:top;"> 
												<img src="'.$page_protect->tutor_photo.'" class="img-rounded" alt="Photo" height="" width="150" />
											</p>
	                     					<p style="vertical-align:top;">
											Nickname:
                    							'.$page_protect->tutor_nick_name.'</a>
                    					    </p>
                    					    <p style="vertical-align:top;">
										 		Phone Number:
                    						'.$page_protect->tutor_phone.'
	                     					</p>
                    						<p style="vertical-align:top;">
	                            				Email: '.$row[3].'
											</p>
											<p style="vertical-align:top;">
												Skype ID: '.$row[4].'
											</p>
										</div>

										<div class="modal-footer">
										<a href="tutor_profile.php?TutorId='.$row[0].'&t=2A&u=t"><button class="btn">View</button></a>
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										</div>
										</div>';

										

										echo '
										<div id="myModalViewBookings'. $row[0].'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 id="myModalLabel">'. $row[1].' '.$row[2].'</h4>
										</div>

										<div class="modal-body">

											<p style "vertical-align:top;"> 
												<img src="'.$page_protect->tutor_photo.'" class="img-rounded" alt="Photo" height="" width="150" />
											</p>
	                     					<p style="vertical-align:top;">

											Nickname:
                    							'.$page_protect->tutor_nick_name.'</a>
                    					    </p>
                    					    <p style="vertical-align:top;">

										 		Phone Number:
                    						'.$page_protect->tutor_phone.'
	                     					</p>

                    						<p style="vertical-align:top;">
	                            				Email: '.$row[3].'
											</p>

											<p style="vertical-align:top;">
												Skype ID: '.$row[4].'
											</p>
										</div>

										<form method="POST" action="'. $_SERVER['PHP_SELF'].'?t=2A" >

										<div class="modal-footer">
										<input type="hidden" name="deactivate_id" value="'.$row[0].'"/>
										<input type="submit" name="deactivate" class="btn" value="Deactivate"/></form>	
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										</div>

										</div>';

									}
	
		*/
	echo $page_protect->user_id;
?>