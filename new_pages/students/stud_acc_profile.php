<form class="form-horizontal form-label-left input_mask">
	<div class="row">
		<div class="col-sm-6">
			<h4>Personal Information</h4>
			<hr />
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">First Name </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" required class="form-control"  ng-disabled="student.disable" ng-model="student.first_name" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Last Name </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" required class="form-control"  ng-disabled="student.disable" ng-model="student.last_name" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Gender </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<select class="form-control" ng-model="student.gender"  ng-disabled="student.disable">
						<option ng-selected="student.gender=='Male'" value="Male">Male</option>
						<option ng-selected="student.gender=='Female'" value="Female">Female</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" required class="form-control"  ng-disabled="student.disable" ng-model="student.skype_id" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Mobile </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" required class="form-control"  ng-disabled="student.disable" ng-model="student.phone" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Birthday </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" required class="form-control"  ng-disabled="student.disable" ng-model="student.birthday"  />
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<h4>Account Information</h4>
			<hr />
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Username </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" required class="form-control"  ng-disabled="student.disable" ng-model="student.username" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Password </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="password" class="form-control"  ng-disabled="student.disable" value="123123"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3 col-xs-12">Email </label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="email" class="form-control"  ng-disabled="student.disable" ng-model="student.email" />
				</div>
			</div>
		</div>
	</div>
</form>