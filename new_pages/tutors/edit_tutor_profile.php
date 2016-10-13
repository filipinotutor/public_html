<!-- page content -->

<div class="page-title">
  <div class="title_left">
	<h3>Tutor Profile</h3>
  </div>
</div>

 <form name="myForm">
    <fieldset>
      <legend>Upload on form submit</legend>
      Username:
      <input type="text" name="userName" ng-model="username" size="31" required>
      <i ng-show="myForm.userName.$error.required">*required</i>
      <br>Photo:
      <input type="file" ngf-select ng-model="picFile" name="file"    
             accept="image/*" ngf-max-size="2MB" required
             ngf-model-invalid="errorFile">
      <i ng-show="myForm.file.$error.required">*required</i><br>
      <i ng-show="myForm.file.$error.maxSize">File too large 
          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
      <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 
      <button ng-click="picFile = null" ng-show="picFile">Remove</button>
      <br>
      <button ng-click="uploadPic(picFile)">Submit</button>
      <span class="progress" ng-show="picFile.progress >= 0">
        <div style="width:{{picFile.progress}}%" ng-bind="picFile.progress + '%'"></div>
      </span>
      <span ng-show="picFile.result">Upload Successful</span>
      <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
    </fieldset>
    <br>
  </form>


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
				  </ul>
			  <div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
					<form class="form-horizontal form-label-left input_mask">
						<div class="row">
							<div class="col-sm-6">
								<h4>Personal Information</h4>
								<hr />
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">First Name </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  ng-model="tutor.first_name" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Last Name </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  ng-model="tutor.last_name" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  ng-model="tutor.skype_id" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Mobile </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  ng-model="tutor.phone" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Birthday </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  ng-model="tutor.birthday"  />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Audio Presentation </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<audio src="../audio/tutors/tutor3460c83f1425f247b95e2a767e7b320f.mp3" controls="controls" ></audio>
									</div>
								</div>
								<br />
								<h4>Educational Background & Others</h4>
								<hr />
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Highest Educational Level </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" ng-model="tutor.ed_level">
											<option ng-repeat="el in educ_level" value="{{ el.educ_level_desc }}" 
											ng-selected="el.educ_level_desc == tutor.ed_level">{{ el.educ_level_desc }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">School/University </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  ng-model="tutor.school" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Currently Attending </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control" ng-model="tutor.attending" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Teaching Experience </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" ng-model="tutor.teaching_exp">
											<option ng-repeat="te in teaching_exp" value="{{ te.teaching_exp_desc }}" 
											ng-selected=" te.teaching_exp_desc == tutor.teaching_exp">{{ te.teaching_exp_desc }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Self Introduction </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<textarea id="message" required="required" class="form-control" rows="3" >{{ tutor.self_intro }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Hobbies </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<textarea id="message" required="required" class="form-control" rows="3" >{{ tutor.hobby }}</textarea>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h4>Account Information</h4>
								<hr />
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Username </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  value="Juan" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Password </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="password" class="form-control"  value="33333" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Tutor Type </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" ng-model="tutor.tutor_type_id">
											<option ng-repeat="t_type in tutor_types" value="{{ t_type.tutor_type_id }}" ng-selected="tutor.tutor_type_id == t_type.tutor_type_id">{{ t_type.tutor_type_desc }} </option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Supervisor </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" ng-model="tutor.supervisor_id">
											<option ng-repeat="s in supervisors" value="{{ s.supervisor_id }}" 
											ng-selected="s.supervisor_id == tutor.supervisor_id">{{ s.first_name }} {{ s.last_name }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Email </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="email" class="form-control"  value="johncross@gmail.com" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Rate </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="email" class="form-control"  value="" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Trial Lesson </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" >
											<option>Yes</option>
										</select>
									</div>
								</div>
								<br />
								<h4>Bank Account</h4>
								<hr />
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Bank Name </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select class="form-control" ng-model="tutor.bank_name">
											<option ng-repeat="bank in banks" value="{{ bank.bank_name }}"
											ng-selected="tutor.bank_name == bank.bank_name">{{ bank.bank_name }}</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Branch </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" class="form-control"  value="Cavite" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Account Name </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="email" class="form-control"  value="Juan Dela Cruz" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3 col-xs-12">Account No. </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="email" class="form-control"  value="9309-9423-02" />
									</div>
								</div>
							</div>

							
						
						</div>
					</form>
				</div>
			  </div>

			  <a ng-click="saveEdit()" class="btn btn-primary btn-lg">Save</a>

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