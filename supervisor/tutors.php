<?php
	include('header-supervisor.php');
	include('../includes/utilities/functions/searchbar.php');
	include('../includes/utilities/functions/validate_deact_account.php');
?> 
		
	    <div class="col-md-9">      
			<div class="tabbable tabs-left">
			 <div class="tab-content">
			   
			   <div id="2A" class="tab-pane fade in <?php echo $tab=='2A' ? 'active' : '';?> ">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h4>Tutor Accounts</h4> 
						</div>
						<div class="col-xs-12 col-md-6 col-md-offset-2">
							<?php include('../includes/utilities/forms/searchbar.php'); ?> 
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include('../includes/utilities/tables/_tutor_account_table.php'); ?>
						</div>
					</div>	
				</div>
				
				<div id="2B" class="tab-pane fade in <?php echo $tab=='2B' ? 'active' : '';?>">
					
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h4>Schedules Update</h4>
						</div> 
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include('../includes/utilities/tables/_update_schedule_table.php'); ?>							
						</div>
					</div>

				</div>
				
				<div id="2C" class="tab-pane fade in <?php echo $tab=='2C' ? 'active' : '';?>">
					
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h4>Reports</h4>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/_report_table.php"); ?>
				    	</div>
				    </div>
			    
			    </div>
				
			<!-- 	<div id="2D" class="tab-pane fade in <?php //echo $tab=='2D' ? 'active' : '';?>">
					
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h4>Conversions</h4>
						</div>
						<div class="col-xs-12 col-md-7">
						<?php
						    //include("../includes/utilities/forms/conversion_filter_form.php");  					
						?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php 
							/*
						    include("../includes/utilities/functions/conversion_function.php");  					
							include("../includes/utilities/forms/conversion_settings.php");  	
							include("../includes/utilities/tables/_conversion_table.php"); 
							*/
							?>
			 			</div>
			 		</div>

		 		</div>
 -->
			</div>
			</div>	
        </div><!-- span --> 

 <?php
 include('footer-supervisor.php');
 ?>   