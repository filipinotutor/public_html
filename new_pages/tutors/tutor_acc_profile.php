	<form class="form-horizontal form-label-left input_mask">
		<div class="row">
			<div class="col-sm-6">
				<h4>Personal Information</h4>
				<hr />
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">First Name </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.first_name" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Last Name </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.last_name" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.skype_id" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Mobile </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.phone" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Birthday </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.birthday"  />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Audio Presentation </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<audio src="../audio/tutors/tutor3460c83f1425f247b95e2a767e7b320f.mp3" controls="controls" disabled="disabled"></audio>
					</div>
				</div>
				<br />
				<h4>Educational Background & Others</h4>
				<hr />
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Highest Educational Level </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.ed_level" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">School/University </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.school" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Currently Attending </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.attending" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Teaching Experience </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" ng-model="tutor.teaching_exp" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Self Introduction </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<textarea id="message" required="required" class="form-control" rows="3" disabled="disabled">{{ tutor.self_intro }}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Hobbies </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<textarea id="message" required="required" class="form-control" rows="3" disabled="disabled">{{ tutor.hobby }}</textarea>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<h4>Account Information</h4>
				<hr />
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Username </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="text" class="form-control" disabled="disabled" value="Juan" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Password </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="password" class="form-control" disabled="disabled" value="33333" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Tutor Type </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="form-control" disabled="disabled">
							<option>Business English</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Supervisor </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="form-control" disabled="disabled">
							<option>Myleen De Leon</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Email </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="email" class="form-control" disabled="disabled" value="johncross@gmail.com" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Rate </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="email" class="form-control" disabled="disabled" value="" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Trial Lesson </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="form-control" disabled="disabled">
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
						<select class="form-control" disabled="disabled">
							<option>Bank of the Philippine Islands</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Branch </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="password" class="form-control" disabled="disabled" value="Cavite" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Account Name </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="email" class="form-control" disabled="disabled" value="Juan Dela Cruz" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12">Account No. </label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input type="email" class="form-control" disabled="disabled" value="9309-9423-02" />
					</div>
				</div>
			</div>
		</div>
	</form>