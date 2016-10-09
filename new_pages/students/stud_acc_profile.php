<form class="form-horizontal form-label-left input_mask">
	<div class="row">
		<div class="col-sm-6">
			<h4>Personal Information</h4>
			<hr />
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">First Name </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" disabled="disabled" ng-model="student.first_name" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Last Name </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" disabled="disabled" ng-model="student.last_name" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Gender </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<select class="form-control" disabled="disabled">
						<option>Male</option>
						<option selected>{{student.gender}}</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" disabled="disabled" ng-model="student.skype_id" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Mobile </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" disabled="disabled" ng-model="student.phone" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Birthday </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" disabled="disabled" ng-model="student.birthday"  />
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<h4>Account Information</h4>
			<hr />
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Username </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" disabled="disabled" ng-model="student.username" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Password </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="password" class="form-control" disabled="disabled" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Email </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="email" class="form-control" disabled="disabled" ng-model="student.email" />
				</div>
			</div>
		</div>
	</div>
</form>