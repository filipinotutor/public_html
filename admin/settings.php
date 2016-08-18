<?php
include('header-admin.php');
$result = $page_protect->get_admin_settings();
?>
	<div class="col-md-9">       
        <div class="tabbable tabs-left">
		<div class="tab-content"> 
			<div id="6A" class="tab-pane fade in <?php echo $tab=='6A' ? 'active' : '';?>">
			<div class="col-md-10">
				<div class="form-horizontal" style="background-color:rgb(250,250,250);">
					<div id="adminsettings" >
					
					<div class="form-horizontal" >
					<h4>Paypal Settings <small><br/>(PayPal Client ID and Secret)</small></h4>
						<p class="control_group" >
							<label class="control-label">Client ID:
							</label>    <div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
							<?php echo '<a href="#" title="Client ID" data-type="textarea" data-pk="'.$page_protect->user_id.'" id="client_id" data-value="'.$result['client_id'].'">Click here to edit.</a>';?>
							</div>
						</p>
						
						<p class="control_group">               
							<label class="control-label" >Secret:
							</label>
							<div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
							<?php echo '<a href="#" title="Secret" data-type="textarea" data-pk="'.$page_protect->user_id.'" id="secret" data-value="'.$result['secret'].'">Click here to edit.</a>';?>
							</div>
						</p>
					</div>
					<div class="form-horizontal" style="background-color:rgb(240,240,250);">
					<h4>Conversions Settings <small><br/>(Conversion Value: one (1) conversion point = one (1) success class)</small></h4>
					
						<p class="control_group">
							<label class="control-label">Conversion Value:
							</label>
							<div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
								<?php echo '<a href="#" title="Conversion Value" data-type="text" data-pk="'.$page_protect->user_id.'" id="conversionsvalue" data-value="'.$result['conversionsvalue'].'"></a>';?>
							</div>
						</p>
					</div>
					<div class="form-horizontal">
					<h4>Account Settings <small><br/>(For Webmaster and Admin email notifications)</small></h4>
						<p class="control_group">
							<label class="control-label">Webmaster Name:
							</label>
							<div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
								<?php echo '<a href="#" title="Webmaster Name" data-type="text" data-pk="'.$page_protect->user_id.'" id="webmaster_name" data-value="'.$result['webmaster_name'].'"></a>';?>
							</div>	
						</p>
						<p class="control_group">
							<label class="control-label" >Webmaster Email:
							</label>
							<div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
								<?php echo '<a href="#" title="Webmaster Email" data-type="text" data-pk="'.$page_protect->user_id.'" id="webmaster_email" data-value="'.$result['webmaster_email'].'"></a>';?>
							</div>
						</p>
						<p class="control_group">
							<label class="control-label">Admin Name:
							</label>
						    <div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
								<?php echo '<a href="#" title="Admin Name" data-type="text" data-pk="'.$page_protect->user_id.'" id="admin_name" data-value="'.$result['admin_name'].'"></a>';?>
							</div>
						</p>
						<p class="control_group">
							<label class="control-label">Admin Email:
							</label>
						    <div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
								<?php echo '<a href="#" title="Admin Email" data-type="text" data-pk="'.$page_protect->user_id.'" id="admin_email" data-value="'.$result['admin_email'].'"></a>';?>
							</div>
						</p>
					</div>
					</div>
				</div>
				</div>
			</div>
			<div id="6B" class="tab-pane fade in <?php echo $tab=='6B' ? 'active' : '';?>">
					<div class="form-horizontal">
					</div>

			</div>
				
		</div>
		</div>
	</div>
<?php
include('footer-admin.php');
?>