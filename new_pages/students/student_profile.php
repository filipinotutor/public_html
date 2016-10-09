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
						<img src="{{ student.photo }}" class="img-responsive" />
					</div>
					<div class="col-sm-6">
						<h4>Tsutsui Hajime</h4>
						<p>
							<b>Student ID:</b> {{ student.user_id }}<br />
							<b>Member Since:</b> {{ student.creation_date }}<br />
							<b>Credits:</b>-- NEED DATA --<br /><br />
							<a href="#" class="btn btn-xs btn-info">Edit Profile</a>
							<a href="#" class="btn btn-xs btn-danger">Deactivate Account</a>
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

		</div>
	</div>
</div>
<!--
user_id : {{ student.user_id }} <br/>
username : {{ student.username }} <br/>
first_name  : {{ student.first_name }} <br/>
last_name   : {{ student.last_name }} <br/>
email  : {{ student.email }} <br/>
gender   : {{ student.gender }} <br/>
skype_id   : {{ student.skype_id }} <br/>
 <!-- {{ student.access_level }} -->
 <!-- {{ student.creation_date }} -->
 <!-- {{ student.last_login }} -->
 <!--
nick_name  : {{ student.nick_name }} <br/>
phone  : {{ student.phone }} <br/>
photo  : {{ student.photo }} <br/>
birthday  : {{ student.birthday }} <br/>
viewed  : {{ student.viewed }} <br/>
deactivated : <!-- {{ student.deactivated }} -->

