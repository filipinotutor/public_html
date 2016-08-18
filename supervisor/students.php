<?php
	include('header-supervisor.php');
	include('../includes/utilities/functions/searchbar.php');
	include('../includes/utilities/functions/validate_deact_account.php');
?> 

	   <div class="col-md-9">     
       <div class="tabbable tabs-left">
			<div class="tab-content"> 
				<div id="lA" class="tab-pane fade in <?php echo $tab=='1A' ? 'active' : '';?>">
					
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h4>Student Accounts</h4>
						</div>
						
						<div class="col-xs-12 col-md-6 col-md-offset-2">
							<?php include("../includes/utilities/forms/searchbar.php"); ?>
						</div> 
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/notif_new_student_table.php"); ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/_student_account_table.php"); ?>	
						</div>
					</div>
				</div>

				<div id="lB" class="tab-pane fade in <?php echo $tab=='1B' ? 'active' : '';?>">
					
					<div class="row">
						<div class="col-xs-12 col-md-4 ">
							<h4>New Bookings</h4> 
						</div>
						<div class="col-xs-12 col-md-7 col-md-offset-1">
						<?php
						    include("../includes/utilities/forms/conversion_filter_form.php");  					
						?>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/notif_new_booking_table.php"); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/_new_booking_table.php"); ?>
						</div>
					</div>

				</div>

				<div id="lC" class="tab-pane fade in <?php echo $tab=='1C' ? 'active' : '';?>">
					
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<h4>Credit Purchases</h4> 
						</div>
						<div class="col-xs-12 col-md-7 col-md-offset-1">
						<?php
						    include("../includes/utilities/forms/credit_filter.php");  					
						?>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/_credit_purchase_table.php"); ?>
						</div>
					</div>

				</div>
				
			</div>
	</div>
    </div><!--/span-->
          

 <?php
 include('footer-supervisor.php');
 ?>   