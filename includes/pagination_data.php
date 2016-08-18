<?php

include("../includes/main_class.php"); 



$page_protect = new Main_Class;



$per_page = 6; 



if($_GET){
	$page=$_GET['page'];
}







//get table contents

$start = ($page-1)*$per_page;

//$result = mysql_query($sql) or die(mysql_error());

/* 
	Query for filtering tutors based on students credit_type 
	1 - Business English
	2 - ESL
	3 - Both
	3 - Trial
*/

$stud_id = " (SELECT user_id FROM users WHERE username = '". $_SESSION['user'] ."' LIMIT 1) ";
$sql = "SELECT tutor_id, nick_name, photo, self_intro, audio FROM 
(SELECT tutor_id, nick_name, photo, self_intro, audio FROM (SELECT * FROM tutors WHERE tutor_id IN(SELECT user_id FROM users WHERE access_level = 2 and active = 'y')) tutors 
WHERE tutor_type_id IN(SELECT credit_type_id FROM studentcredits WHERE student_id = ".$stud_id." AND status = 1 AND expiration > NOW())
UNION ALL
SELECT tutor_id, nick_name, photo, self_intro, audio FROM (SELECT * FROM tutors WHERE tutor_id IN(SELECT user_id FROM users WHERE access_level = 2 and active = 'y')) tutors
WHERE tutor_type_id IN (SELECT credit_Type_id FROM studentcredits WHERE student_id = ".$stud_id." AND status = 1 AND expiration > NOW() AND credit_Type_id = 2 UNION ALL SELECT CASE WHEN credit_type_id = 2 THEN 1 ELSE 0 END `credit_type_id` FROM studentcredits WHERE student_id = ".$stud_id." AND status = 1 AND expiration > NOW())
UNION ALL
SELECT tutor_id, nick_name, photo, self_intro, audio FROM (SELECT * FROM tutors WHERE tutor_id IN(SELECT user_id FROM users WHERE access_level = 2 and active = 'y')) tutors
WHERE allow_teach_trial = (SELECT CASE WHEN credit_type_id = 4 THEN 1 ELSE 0 END `allow_teach_trial` FROM studentcredits WHERE student_id = ".$stud_id." AND status = 1 AND expiration > NOW() AND credit_type_id = 4)) tutors
GROUP BY tutor_id;
" ;
$rsd = mysql_query($sql) or die(mysql_error());
	echo '<ul class="thumbnails col-md-12">';
	while($row = mysql_fetch_array($rsd,MYSQL_NUM))
	{
		echo '<div class="col-md-2">';
		echo '<div class="thumbnail" style="color:black;';
		if($_GET['tutor_id'] == $row[0])
		{
		 	echo' background-color:#EC971F;';
		}
		echo ' " >
		<p class="text-center"><a href="book-classes.php?tutor_id='. $row[0].'#bookClass">';
		
		echo '<img src="'. $row[2].'" style="height:120px;" class="img-polaroid"/></a></p>';

		echo ' <h4 style="text-align:center;">'. $row[1].'</h4>'; //name

		echo '<p class="text-center"><a href="book-classes.php?tutor_id='. $row[0].'#bookClass" class="btn btn-mini btn-primary">Select</a> '; //select button

		echo '<a href="#myModal'. $row[0].'" role="button" class="btn btn-mini" data-toggle="modal" style="color:black;">View Profile</a></p>'; //view profile

		echo '</div>';

		echo '</div >';

		echo '
			<div id="myModal'. $row[0].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 id="myModalLabel">'. $row[1].'</h3>
						</div>

						<div class="modal-body">
							<div class="row">
								<div class="col-sm-5">
									<img src="'. $row[2].'" class="img-thumbnail" style="align:left; padding-right:10px;"  /><br />
									<audio src="../audio/tutors/'.$row[4].'" controls="controls" style="width: 197px;">
								</div>
								<div class="col-sm-7">
									<p style="vertical-align:top;">'. $row[3].'</p>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<a href="book-classes.php?tutor_id='. $row[0].'#bookClass" class="btn btn-primary">Select</a> 
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</div>
					</div>
				</div>
			</div>
		';
	} //while

	echo '</ul>';
?>