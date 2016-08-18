<?php
if($_GET['tutor_id'] == 'tutors'){
include("includes/main_class.php"); 
}
else{
include("includes/main_class.php"); 
}
$page_protect = new Main_Class;
$per_page = 4; 
if($_GET)
{
$page=$_GET['page'];
}
//get table contents
$start = ($page-1)*$per_page;
//$result = mysql_query($sql) or die(mysql_error()); 
 $sql = "SELECT tutor_id, nick_name, photo, self_intro, audio FROM tutors,users  WHERE tutors.tutor_id = users.user_id AND users.active = 'y' ORDER BY tutor_id ASC LIMIT $start,$per_page";
 $rsd = mysql_query($sql) or die(mysql_error());
 
 		echo '<div class="col-md-12">';
		//echo '<ul class="thumbnails col-md-12">';
				
		while($row = mysql_fetch_array($rsd,MYSQL_NUM))
		{
			$audio_control = '';
			if(!empty($row[4])) {
				$audio_control = '<audio src="audio/tutors/'.$row[4].'" controls="controls"  style="width: 180px;">';
				}
				

				echo '<div class="col-md-3">';

				echo '<div class="thumbnail"><p class="text-center">';				
				echo '<img src="'. $row[2].'" style="height:120px;" class="img-polaroid"/></p>';
				echo ' <h4 style="text-align:center;">'. $row[1].'</h4>'; //name
				echo '<p class="text-center"><a href="#myModal'. $row[0].'" role="button" class="btn btn-mini" data-toggle="modal">View Profile</a></p>'; //view profile
				echo '</div>';
				echo '</div >';
				echo '

						<!-- Modal -->
						<!-- Modal -->

						<div id="myModal'. $row[0].'" class="modal modal-lg fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="height: 70%;">
						<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h3 id="myModalLabel">'. $row[1].'</h3>

						</div>

						<div class="modal-body">
						<div class="col-sm-5">
						
								
								<img src="'.$row[2].'" class="thumbnail" width="180px"/><br/>
								
								'.$audio_control.'
												
								</div>
								<div class="col-sm-7">'.$row[1].'<br/>
								'.$row[3].'	
								</div>
						</div>

						<div class="modal-footer">

						<!--<a href="book-classes.php?tutor_id='. $row[0].'" class="btn btn-primary">Select</a>-->

						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

						</div>
						</div>';

		} //while

		echo '</div>';

		

?>
