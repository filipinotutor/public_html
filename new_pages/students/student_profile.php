<div class="page-title">
	<div class="title_left">
		<h3>Student Profile</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

				<div class="row">
					<div class="col-sm-2">
						<form name="uploadForm">
							<img ng-if="picFile1" ngf-thumbnail="picFile1" class="thumb img-responsive"> 
							<div ng-show="!picFile1" ngf-select ng-model="picFile1" name="file" accept="image/*" ngf-max-size="2MB"  ngf-change="validate($invalidFiles)">
								<img ng-src="{{ student.photo }}" class="img-responsive" ng-if="!picFile1"/>
							</div>
							<button ng-click="picFile1 = null" ng-show="picFile1">Cancel</button>
							<button ng-click="uploadPic(picFile1)" ng-if="picFile1 != null">Save</button>
						</form>
					</div>
					<div class="col-sm-6">
						<h4>{{ student.first_name }} {{ student.last_name }}</h4>
						<p>
							<b>Student ID:</b> {{ student.user_id }}<br />
							<b>Member Since:</b> {{ student.creation_date }}<br />
							<b>ESL Credits:</b> {{ esl_credit }}<br />
							<b>Business Credits:</b> {{ b_credit }}<br /><br />
							<a ng-click="edit()" ng-if="student.disable" class="btn btn-xs btn-info">Edit Profile</a>
							<a ng-click="deactivate(student.student_id, student.deactivated)" ng-show="student.deactivated == 0" class="btn btn-xs btn-danger">Deactivate Account</a>
							<a ng-click="deactivate(student.student_id, student.deactivated)" ng-show="student.deactivated == 1" class="btn btn-xs btn-info">Activate</a>
						</p>
					</div>	
				</div>
				<div class="x_content">
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a data-target="#tab_content1" id="tab-profile" role="tab" data-toggle="tab" aria-expanded="true">Account & Profile</a></li>
						<li role="presentation" class=""><a data-target="#tab_content2" role="tab" id="tab-schedule" data-toggle="tab" aria-expanded="false">Schedule & Bookings</a></li>
						<li role="presentation" class=""><a data-target="#tab_content3" role="tab" id="tab-history" data-toggle="tab" aria-expanded="false">Class History</a></li>
						<li role="presentation" class=""><a data-target="#tab_content4" role="tab" id="tab-credits" data-toggle="tab" aria-expanded="false">Credit Purchases</a></li>
					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<div ui-view="acc_prof"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<div ui-view="sched_book"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
							<div ui-view="class_history"></div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
							<div ui-view="cred_purchases"></div>
						</div>
					  </div>
					</div>
				</div>

				<a ng-hide="student.disable" ng-click="saveEdit()" class="btn btn-success">Save</a>

		</div>
	</div>
</div>
