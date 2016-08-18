<?php
include('header-admin.php');
?>

		<div class="col-md-9">
            <div class="row">
	            <div class="col-md-4">
	            	<h4>Recent Applicants</h4>
				</div>
         	 	<div class="col-md-2 col-md-offset-6">
	         	 <a class="btn btn-warning pull-right" href="applicants.php?t=3A">
	         	 	<i class="glyphicon glyphicon-arrow-left"></i>
	         	 	Back
         	 	</a>
				</div>
			</div>
			<div class="row">
	            <div class="col-md-12 table-responsive">
	        
			 <table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Applicant's Name</th>
						<th class="hidden-phone">email</th>
						<th>Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$sql=sprintf("SELECT * FROM recentapplicant");
			$res = mysql_query($sql);

			while($row = mysql_fetch_array($res))
			{
				echo'<tr>
					 <th>'.$row['name'].'</th>
					 <th class="hidden-phone">'.$row['email'].'</th>
					 <th>'.$row['datetoday'].'</th>
					 <th>'.$row['status'].'</th></tr>';
			}
			?>
			</tbody>
			</table>

			</div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->


 <?php
 include('footer-admin.php');
 ?>   