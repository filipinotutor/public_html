<?php
include('header-admin.php');
if(IsSet($_POST['delete']))
	{
		$res = $page_protect->delete_applicant($_POST['id'],"decline");
		if(isset($res)) //success
				{
					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected Applicant succesfully declined.</div>';			
				}
			
			
		else
	{
		echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please select schedules to approve.</div>';
		}
	}
if(IsSet($_POST['approve_applicant']))
	{
		$res = $page_protect->applicant_to_tutor($_POST['id'], $_POST['supervisor_id']);
		if($res) //success
				{
					$res = $page_protect->delete_applicant($_POST['id'],"approved");
					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected Applicant succesfully approved.</div>';			
				}
		else
		{
			echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please select applicant to approve.</div>';
		}
	
	}
?>


		
	    <div class="col-md-9">

			<div class="tabbable tabs-left">
			 <div class="tab-content">
		
			    <div id="3A" class="tab-pane fade in <?php echo $tab=='3A' ? 'active' : '';?>">

				    <?php
				    include('../includes/utilities/functions/schedule_training.php');
					?>

				 	<div class="row">
						<div class="col-xs-6 col-md-4">
						<h4>Applicants</h4> <!-- Tutor Accounts ----------------------------------------------- -->
						</div>
						<div class="col-xs-2 col-xs-offset-4 col-md-2 col-md-offset-6">
							<a class="btn btn-info pull-right" href="recent_applicant.php?t=3A">
								<span class="hidden-xs">
									<i class="glyphicon-search glyphicon"></i>&nbsp;View Recent Applicants
								</span>
								<span class="visible-xs-block">
									<i class="glyphicon-trash glyphicon"></i>
								</span>
					 		</a>
				 		</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						    <?php
						    include('../includes/utilities/tables/notif_new_applicant_table.php');
						    include('../includes/utilities/tables/_applicant_account_table.php');
							?>
						</div>
					</div>

				</div>
				<div id="3B" class="tab-pane fade in <?php echo $tab=='3B' ? 'active' : '';?>">
					<?php
						include('../includes/utilities/functions/approve_decline_applicant.php');
					?>
					<div class="row">
						<div class="col-md-12">
							<h4>Applicant's Training Schedules</h4> <!--Schedule Updates ----------------------------------------------- -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php
								include('../includes/utilities/tables/_applicant_training_schedule_table.php');
							?>
						</div>
					</div>
				</div>
			</div>
			</div>	
			      </div><!--/row-->



 <?php
 include('footer-admin.php');
 ?>   