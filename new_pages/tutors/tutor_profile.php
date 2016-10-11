<!-- page content -->

<div class="page-title">
  <div class="title_left">
	<h3>Tutor Profile</h3>
  </div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="row">
				<div class="col-sm-2">
					<img src="{{ tutor.photo }}" class="img-responsive" />
				</div>
				<div class="col-sm-6">
					<h4>{{ tutor.first_name }} {{ tutor.last_name }} </h4>
					<p>
						<b>Tutor ID:</b> {{ tutor.user_id }}<br />
						<b>Member Since:</b> {{ tutor.creation_date }}<br />
						<b>Type: <span class="label label-xs label-success">{{ tutor.tutor_type }}</b><br /><br />
						<a href="#" class="btn btn-xs btn-info">Edit Profile</a>
						<a class="btn btn-xs btn-danger" ng-click="deactivate(tutor.user_id)" ng-show="tutor.deactivated == 0">Deactivate</a>
						<a class="btn btn-xs btn-success" ng-click="activate(tutor.user_id)" ng-show="tutor.deactivated == 1">Activate</a>
					</p>
				</div>
			</div>
			<div class="" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation" class="active"><a data-target="#tab_content1" id="tab-profile" role="tab" data-toggle="tab" aria-expanded="true">Account & Profile</a></li>
					<li role="presentation" class=""><a data-target="#tab_content2" role="tab" id="tab-schedule" data-toggle="tab" aria-expanded="false">Schedule & Bookings</a></li>
					<li role="presentation" class=""><a data-target="#tab_content3" role="tab" id="tab-history" data-toggle="tab" aria-expanded="false">Class History</a></li>
					<li role="presentation" class=""><a data-target="#tab_content4" role="tab" id="tab-credits" data-toggle="tab" aria-expanded="false">Conversions</a></li>
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
					<div ui-view="conversions"></div>
				</div>
			  </div>

			</div>
		</div>
	</div>
</div>
<!-- 
tutor.user_id  : {{ tutor.user_id }} <br><br>
tutor.email  : {{ tutor.email }} <br><br>
tutor.username  : {{ tutor.username }} <br><br>
tutor.first_name : {{ tutor.first_name }} <br><br>
tutor.last_name  : {{ tutor.last_name }} <br><br>
tutor.gender   : {{ tutor.gender }} <br><br>
tutor.skype_id  : {{ tutor.skype_id }} <br><br>
<!-- {{ tutor.access_level }} -->
<!-- 
tutor.creation_d : {{ tutor.creation_date }} <br><br> <!-- registration_date -->
<!-- 
tutor.last_login : {{ tutor.last_login }} <br><br>
tutor.nick_name  : {{ tutor.nick_name }} <br><br>
tutor.phone  : {{ tutor.phone }} <br><br>
tutor.photo  : {{ tutor.photo }} <br><br>
tutor.audio  : {{ tutor.audio }} <br><br>
tutor.birthday  : {{ tutor.birthday }} <br><br>
tutor.ed_level  : {{ tutor.ed_level }} <br><br>
tutor.school  : {{ tutor.school }} <br><br>
tutor.attending  : {{ tutor.attending }} <br><br>
tutor.teaching_eexp : {{ tutor.teaching_exp }} <br><br>
tutor.hobby  : {{ tutor.hobby }} <br><br>
tutor.self_intro : {{ tutor.self_intro }} <br><br>
tutor.bank_name  : {{ tutor.bank_name }} <br><br>
tutor.bank_branc : {{ tutor.bank_branch }} <br><br>
<!-- {{ tutor.access }} --> 
<!-- 
tutor.accnt_name : {{ tutor.accnt_name }} <br><br>
tutor.accnt_numb : {{ tutor.accnt_number }} <br><br>
<!-- {{ tutor.supervisor_id }} --> 
<!-- {{ tutor.tutor_type_id }} --> 
<!-- 
tutor.tutor_type : {{ tutor.tutor_type }}  <br><br>