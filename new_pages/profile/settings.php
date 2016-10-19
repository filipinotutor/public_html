<div class="page-title">
  <div class="title_left">
    <h3>Profile Settings</h3>
  </div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Account Settings</h2>
				<div class="clearfix"></div>
			</div>
			<form class="form-horizontal form-label-left">
				<div class="x_content">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Enter Old Password <span class="required">*</span></label>
								<div class="col-sm-7 col-xs-12">
									<input type="pw" ng-model="oldPw" placeholder="old password" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Enter Old Password <span class="required">*</span></label>
								<div class="col-sm-7 col-xs-12">
									<input type="pw" ng-model="confirmNewPw" placeholder="confirm new password" class="form-control"  />
								</div>
							</div>
						</div>
					</div>
					
					<a class="btn btn-primary" ng-click="changePw()">Save</a>
				</div>

			</form>
		</div>
	</div>
</div>
	