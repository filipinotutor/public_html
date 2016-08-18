	 <?php
	 include("../includes/utilities/functions/credit_purchase_filter.php");
	 ?>
	 <table class="table table-striped table-bordered table-hover DataTable">
	 <thead>
     <tr>
		 <th>Date Purchased</th>
		 <th>Student Name</th>
		 <th class="hidden-xs">Student Skype ID</th>
		 <th>Credits</th>
		 <th class="hidden-xs">Expiration Date</th>
	</tr>
    </thead>
<?php
	if($filter){
	$output = $page_protect->get_student_credit_purchased_sup($filter);
	}
	else{
	$output = $page_protect->get_student_credit_purchased_sup(NULL);
	}	

	for($x=0;$x!=$output['count'][0];$x++){
			$page_protect->get_student_info($output[$x]['student_id']); 
			
			echo
				'<tr>
					<td>'.date('M d, Y',strtotime($output[$x]['date_paid'])).'</td>
					<td><a href="student_profile.php?StudId='.$page_protect->student_id.'&t=1A" target="_blank">'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</a></td>
					<td class="hidden-xs">'.$page_protect->student_skype_id.'</td>
					<td>'.$output[$x]['credit_value'].'</td>
					<td class="hidden-xs">'.$output[$x]['expiration'].'</td>
				</tr>';
	}
?>
</table>
	
		