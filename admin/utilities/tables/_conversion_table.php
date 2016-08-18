<table class="table table-striped table-bordered DataTable">
<thead>	
	<tr>
	    <th>Tutor's Name</th>
	    <th>Total Points</th>
	    <th>Amount</th>
	    <th>Details</th>
 	</tr>
</thead>
<tbody>	
 	<?php
 	if(isset($filter)){
		$output = $page_protect->get_tutor_conversion_sup($filter,NULL);
	}
 	else{
	    $output = $page_protect->get_tutor_conversion_sup(true,NULL);
	    }
	    for($x=0;$x!=$output['count'][0];$x++){
	    	echo "<tr><td class=\"col-1\"><a href=\"tutor_profile.php?TutorId=".$output[$x]['tutor_id']."&t=2A&u=t\" target=\"_blank\">".$page_protect->tutor_first_name." ".$page_protect->tutor_last_name."</td>
		            <td>".$output[$x]['points']."</td>
		            <td>".number_format($output[$x]['value'],2)."</td>
					<td><button class=\"btn btn-sm btn-info view-conversions\"  data-id=".$output[$x]['tutor_id']."><i class=\"glyphicon-search glyphicon\"></i> View</button></td>";            
	    }
	?>   
</tbody>	
</table>

<!-- Modal -->
<div class="modal fade" id="modalConversions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tutor: <span id="tutor_name"></span></h4>
      </div>
      <div class="modal-body">
      		<div id="conversion_details">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <script>
		//$('#DataTable').DataTable();
		
		$('#DataTable').on('click', '.view-conversions', function(event)
		{
			console.log($(this).data('id'));
			$.ajax(
			{
				url: '../includes/utilities/tables/_conversion_details_table.php?tutor_id=' + $(this).data('id'),
				type: "GET",
				dataType: "json",
				success: function(data)
				{
					if (data.success == true)
					{
						$('#conversion_details').empty();
						var conversion_details = '<table class="table table-striped table-bordered table-hover"><tr><th>Date</th><th>Time</th><th>Student Nickname</th><th>Report</th></tr>';
						$.each(data.Response, function(key, value)
						{
							conversion_details += '<tr>';
								conversion_details += '<td>'+value.fulldate+'</td>';
								conversion_details += '<td>'+value.time+'</td>';
								conversion_details += '<td>'+value.student_nickname+'</td>';
								if(value.report_id == null) {
										conversion_details += '<td><a href="" class="btn btn-default btn-sm disabled" title="No report found">View</a></td>';
								}
								else {
										conversion_details += '<td><a href="./view_report.php?report='+value.report_id+'&t=2C" class="btn btn-default btn-sm" target="_blank">View</a></td>';
									}
							conversion_details += '</tr>';
						});
						conversion_details += '</table>';
						
						$('#conversion_details').html(conversion_details);
						$('#tutor_name').html(data.tutor_name);
									
						$('#modalConversions').modal('show');
					}
					else
					{
						var errors = "";
						
						$.each(data.errors, function(key, value)
						{
							errors += value + "<br />";
						});
						
					}
				},
			});
		});
		
		
	</script>