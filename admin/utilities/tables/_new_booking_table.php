	 <?php
	 include("../includes/utilities/functions/student_filter.php");
	 ?>
	 <table class="table table-striped table-bordered table-hover DataTable">
	 <thead>
     <tr>
		 <th>Date</th>
		 <th>Time</th>
		 <th>Student Name</th>
		 <th class="hidden-xs">Tutor Name</th>
		 <th></th>
	</tr>
    </thead>
	<?php
		if($filter){
		$output =  $page_protect->get_student_booking_sup($filter,NULL);
		}
		else{
		$output =  $page_protect->get_student_booking_sup(NULL,NULL);
		}

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
	</table>
     