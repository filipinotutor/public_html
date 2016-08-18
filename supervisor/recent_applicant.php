<?php
include('header-supervisor.php');
?>

		<div class="span9">
         
          <div class="row-fluid">
            <div class="span12">
             
			<div class="tabbable tabs-left">
			 <div class="tab-content">
			 <a class="btn btn-warning pull-right" href="applicants.php?t=3A">&laquo;&nbsp;Back</a>
            <h4>Recent Applicants</h4>
			 <table class="table table-striped table-bordered table-hover">
							<tr>
							<th>Applicant's Name</th>
							<th>email</th>
							<th>Date</th>
							<th>Status</th>
							</tr>
			<?php
			$sql=sprintf("SELECT * FROM recentapplicant");
			$res = mysql_query($sql);

			while($row = mysql_fetch_array($res))
			{
				echo'<tr><th>'.$row['name'].'</th>';
				echo'<th>'.$row['email'].'</th>';
				echo'<th>'.$row['datetoday'].'</th>';
				echo'<th>'.$row['status'].'</th></tr>';
			}
			?>
			</table>



          <div class="row-fluid">
         
          
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

 <?php
 include('footer-supervisor.php');
 ?>   