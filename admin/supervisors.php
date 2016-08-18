<?php
include('header-admin.php');
?> 
	<div class="col-md-9">
		<div class="tabbable tabs-left">
		<div class="tab-content">
			<div id="7A" class="tab-pane fade in <?php echo $tab=='7A' ? 'active' : '';?>"> 
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<h4>Supervisor Accounts</h4> 
					</div>	
					<div class="col-xs-12 col-md-6 col-md-offset-2">
						<?php 
						include('../includes/utilities/functions/validate_deact_account.php');
						?>
						<?php
						include('../includes/utilities/forms/searchbar.php');
						?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-md-12">
					<?php
					include('../includes/utilities/tables/_supervisor_account_table.php');
					?>	
					</div>
				</div>
			</div>
			
			<div id="7B" class="tab-pane fade in <?php echo $tab=='7B' ? 'active' : '';?>"> 
				<div class="row">
					<?php
					include("create_supervisor.php");
					?>
				</div>
			</div>
		</div>
		</div>
	</div>

<?php
include('footer-admin.php');
?>   