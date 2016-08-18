<?php
include('header-supervisor.php');
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
		$res = $page_protect->applicant_to_tutor($_POST['id']);
		if($res) //success
				{
					$res = $page_protect->delete_applicant($_POST['id'],"approved");
					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected Applicant succesfully declined.</div>';			
				}
		else
		{
			echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please select schedules to approve.</div>';
		}
	
	}
?>


		
	    <div class="span9">
         
          <div class="row-fluid">
            <div class="span12">

			<div class="tabbable tabs-left">
			 <div class="tab-content">
		
			    <div id="3A" class="tab-pane fade in <?php echo $tab=='3A' ? 'active' : '';?>">

			    <?php
							if(isset($_POST['train_sched']))
							{
								$hh = $_POST['hh'];
								$mm = $_POST['mm'];
								$set = $_POST['set'];
								$date = $_POST['training_date'];
								$time = $hh.":".$mm." ".$set;
								$app_ids=$_POST['app_id'];
								if(isset($app_ids))
								{
									$sql= sprintf("UPDATE applicants SET `t_time` = '$time' , `training_date` = '$date', `status` = 'for training' WHERE `applicant_id` ='$app_ids' ");
									$res = mysql_query($sql)or die("Error".mysql_error());
									if(isset($res)) //success
										{
											echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected schedule/s approved.</div>';			
										}
									
								}	
								else
								{
									echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please select schedules to approve.</div>';
								}
							}

							
								?>
							
 	 <a class="btn btn-warning pull-right" href="recent_applicant.php?t=3A"><i class="icon-search icon-white"></i>View Recent Applicants</a>

							<h4>Applicants</h4> <!-- Tutor Accounts ----------------------------------------------- -->
							<table class="table table-striped table-bordered table-hover">
							<th>Name</th>
							<th>Email</th>
							<th>Skype</th>
                            <th>Mobile Number</th>
                            <th>date of interview</th>
							<th></th>
							
							<?php echo $page_protect->get_applicant_list(NULL);?>
							</table>	
				</div>
				<div id="3B" class="tab-pane fade in <?php echo $tab=='3B' ? 'active' : '';?>">
							<?php
							if(isset($_POST['approvesched']))
							{
								$scheduleids=$_POST['schedule_id'];
								if(isset($scheduleids))
								{
									foreach($scheduleids as $schedule_id)
									{
									$approved=$page_protect->update_schedule_approve($schedule_id);
										if($approved)	
											{
												$approvedids .= $schedule_id.', ';
											}//approved
									}//foreach
									//echo $approvedids;
									if(isset($approvedids)) //success
										{
											echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected schedule/s approved.</div>';			
										}
									
								}	
								else
								{
									echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>Please select schedules to approve.</div>';
								}
							}//post
							?>
							
							<h4>Applicant's Training Schedules</h4> <!--Schedule Updates ----------------------------------------------- -->
							<br />
							<fieldset>
							<table class="table table-striped table-bordered table-hover">
							<tr>
							<th>Applicant's Name</th>
							<th>Training Date</th>
							<th>Skype ID</th>
							<th></th>
							</tr>
							
							<?php echo $page_protect->get_app_training_sched(NULL);?>
							</table>
							</div>
							</form>
							  
				</div>
			</div>
			</div>	
           </div><!--/span-->

           
       
          </div><!--/row-->
          <div class="row-fluid">
         
          
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>


 <?php
 include('footer-supervisor.php');
 ?>   