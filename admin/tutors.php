<?php
	include('header-admin.php');
	include('../includes/utilities/functions/searchbar.php');
	include('../includes/utilities/functions/validate_deact_account.php');
?> 		
	    <div class="col-md-9">      
			<div class="tabbable tabs-left">
			 <div class="tab-content">
			   
			   <div id="2A" class="tab-pane fade in <?php echo $tab=='2A' ? 'active' : '';?> ">
				   <div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h4>Tutor Accounts</h4> 
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-2">
							<?php //include('../includes/utilities/forms/searchbar.php'); ?> 
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
						<div class="col-xs-12 col-md-2 col-md-offset-6">
						   <a href="report_list.php?t=2C">
	                            <button class="btn btn-info pull-right">
	                            	<i class="icon-search icon-white"></i>&nbsp;View Report List
	                            </button>
                            </a>
                        </div>
					</div>
					<div class="row">
				          <div class="col-xs-12 col-md-12">
							<?php include("../includes/utilities/tables/_report_table.php"); ?>
					    </div>
					</div>
			    </div>
				
				<div id="2D" class="tab-pane fade in <?php echo $tab=='2D' ? 'active' : '';?>">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h4>Conversions</h4>
						</div>
					<div class="col-xs-12 col-sm-6 col-md-8">
					<?php
							 include("../includes/utilities/forms/conversion_filter_form.php");  					
					?>
						<ul class="dropdown pull-right"  style="top:10px;">
						<a data-toggle="dropdown" class="dropdown-toggle pull-right hidden-xs" href="#" style="position:relative;top:-10px;"><button class="btn btn-info"><b class="caret"></b></button></a>
							<ul class="dropdown-menu " style="min-width: 5%;top:10px;">
								<li style="text-align:center;">
									<form action="CSV.php" method="POST">
										<input type="hidden" name="path" value="<?php echo $path;?>"/>
										<input type="hidden" name="filter" value="<?php echo $add;?>"/>
										<button type="submit" name="submit" class="btn btn-mini btn-warning">
										<i class="glyphicon-circle-arrow-down glyphicon"></i>&nbsp;</button>
			                        </form>		
								</li>
								<li class="divider"></li>
								<li>
									<a href="#ConversionSettings" data-toggle="modal" data-backdrop="static">
									<button class="btn btn-mini btn-info"><i class="glyphicon glyphicon-cog"></i>&nbsp;</button></a>
								</li>
			                </ul>
		                </ul>
					</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-12">
						<?php 
						$page_protect->get_conversion_value();
							
						    include("../includes/utilities/functions/conversion_function.php");  					
							include("../includes/utilities/forms/conversion_settings.php");  					
							include("../includes/utilities/tables/_conversion_table.php"); 
						?>
			 			</div>
			 		</div>
		 		</div>
		 		<div id="2E" class="tab-pane fade in <?php echo $tab=='2E' ? 'active' : '';?>"> 
					<?php
                        include("../includes/utilities/functions/assign_tutor_supervisor.php");  
					    include("../includes/utilities/tables/_latest_tutor_table.php");  
					?>
					</div>

			</div>
			</div>	
        </div>
 <?php
 include('footer-admin.php');
 ?>   