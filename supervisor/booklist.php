<?php
include('header-supervisor.php');
$page_protect->get_fullname($_GET['id']);
?>
		
	    <div class="span9">
         
          <div class="row-fluid">
            <div class="span12">
			<div class="tabbable tabs-left">
			 <h4><?php echo $page_protect->fname.' '.$page_protect->lname; ?>'s Booking History
			 <div class="tab-content"><div style="height:350px;overflow:scroll" class="well">
			 <table class="table table-striped table-bordered table-hover">
						<tr>
							 <th>Date</th>
							 <th>Time</th>
							 <th>Tutor Name</th>
						</tr>
						<?php
						@$sql_info = sprintf("SELECT * FROM schedules WHERE user_id = ".$_GET['id']." ORDER BY `year` DESC, `month` DESC, `day` DESC, `time` DESC");
						@$res = mysql_query($sql_info);
						while(@$row = mysql_fetch_array($res)){	
							$page_protect->tutor_info_for_sup($row['tutor_id']);
						echo '<tr><td>'.@$row['day'].' - '.@$row['month'].' - '.@$row['year'].'</td>';
						echo '<td>'.@$row['time'].'</td>';
						echo '<td>'.$page_protect->tutor_first_name.' '.$page_protect->tutor_last_name.'</td></tr>';
						}
						?>
						</table>
			 </div>
			 </div>
			 </div>
			 </div>
			 </div>

			  <?php
 include('footer-supervisor.php');
 ?>   
