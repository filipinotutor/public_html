<!-- page content -->

<div class="page-title">
  <div class="title_left">
	<h3>Supervisor Profile</h3>
  </div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-2">
						<img src="{{ supervisor.photo }}" class="img-responsive">
					</div>
					<div class="col-sm-6">
						<h4>{{ supervisor.first_name }} {{ supervisor.last_name }}</h4>
						<p>
							<b>Supervisor ID:</b> {{ supervisor.user_id }}<br>
							<b>Member Since:</b> {{ supervisor.creation_date }}<br><br>
							<a href="#" class="btn btn-xs btn-info">Edit Profile</a>
							<a href="#" class="btn btn-xs btn-danger">Deactivate Account</a>
						</p>
						
					</div>
				</div>
				<div class="x_content">
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab_content1" id="tab-profile" role="tab" data-toggle="tab" aria-expanded="true">Account &amp; Profile</a></li>
						<li role="presentation" class=""><a href="#tab_content2" role="tab" id="tab-schedule" data-toggle="tab" aria-expanded="false">Assigned Tutors</a></li>

					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<form class="form-horizontal form-label-left input_mask">
							<div class="row">
								<div class="col-sm-6">
									<h4>Personal Information</h4>
									<hr>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">First Name </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" ng-model="supervisor.first_name">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Last Name </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" ng-model="supervisor.last_name">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" ng-model="supervisor.skype_id">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Mobile </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" ng-model="supervisor.phone">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Birthday </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" ng-model="supervisor.birthday">
										</div>
									</div>
									
									<br>
									<!-- <h4>Bank Account</h4>
									<hr>
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
											<input type="password" class="form-control" disabled="disabled" value="asdf">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Account Name </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="email" class="form-control" disabled="disabled" value="asdf">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Account No. </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="email" class="form-control" disabled="disabled" value="asdf">
										</div>
									</div> -->
								</div>
								<div class="col-sm-6">
									<h4>Account Information</h4>
									<hr>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Username </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" ng-model="supervisor.username">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Password </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="password" class="form-control" disabled="disabled" ng-model="supervisor.username">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Email </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="email" class="form-control" disabled="disabled" ng-model="supervisor.email">
										</div>
									</div>

									
								</div>
							</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							  <thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 90px;">Username</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170px;">Tutor Name</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Nickname</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Skype ID</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 160px;">Email</th>
							  </tr></thead>


							  <tbody>

							  <tr role="row" class="odd">
								  <td class="sorting_1">fa032016136</td>
								  <td>Lea Joy Asparo</td>
								  <td>Tutor Lea</td>
								  <td>lea.joy.asparo</td>
								  <td>airi.satou@gmail.com</td>
								  
								</tr><tr role="row" class="even">
								  <td class="sorting_1">fb033221136</td>
								  <td>Fatima Abrugar</td>
								  <td>Tutor Fatima</td>
								  <td>fatima.abrugar</td>
								  <td>fatima.abrugar@gmail.com</td>
								  
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">fc556774454</td>
								  <td>Allysa Julienne Afidchao</td>
								  <td>Tutor Allysa</td>
								  <td>allysa.julienne.afidchao</td>
								  <td>allysa.julienne.afidchao@yahoo.com</td>
								 
								</tr><tr role="row" class="even">
								  <td class="sorting_1">fa032016136</td>
								  <td>Ericca Gabriel</td>
								  <td>ericca.gabriel</td>
								  <td>ericca.gabriel</td>
								  <td>ericca.gabriel@gmail.com</td>
								  
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">fc556774454</td>
								  <td>Andrew Nel Trompeta</td>
								  <td>Tutor Andrew</td>
								  <td>andrew.nel.trompeta</td>
								  <td>andrew.nel.trompeta@hotmail.com</td>
									
								</tr><tr role="row" class="even">
								  <td class="sorting_1">fa032016136</td>
								  <td>Lemon Llacuna</td>
								  <td>Tutor Lemon</td>
								  <td>lemon.llacuna</td>
								  <td>lemon.llacuna@gmail.com</td>
								  
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">fc556774454</td>
								  <td>Renan Mari Gallardo</td>
								  <td>Tutor Renan</td>
								  <td>renan.mari.gallardo</td>
								  <td>renan.mari.gallardo@gmail.com</td>
								 
								</tr><tr role="row" class="even">
								  <td class="sorting_1">fe222311366</td>
								  <td>Joan May Amaro</td>
								  <td>Tutor Joan</td>
								  <td>joan.may.amaro</td>
								  <td>joan.may.amaro@yahoo.com</td>
								 
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">fc556774454</td>
								  <td>Arianne Anna Reyes</td>
								  <td>Tutor Arianne</td>
								  <td>arianne.anna.reyes</td>
								  <td>arianne.anna.reyes@hotmail.com</td>
								 
								</tr><tr role="row" class="even">
								  <td class="sorting_1">fe222311366</td>
								  <td>Juan DeLa Cruz</td>
								  <td>Tutor Juan</td>
								  <td>juan.dela.cruz</td>
								  <td>juan.dela.cruz@hotmail.com</td>
								 
								</tr></tbody>
							</table>
							
							
						</div><!-- end of tab2 -->
						
						
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 
user_id : {{ supervisor.user_id }} <br/>
username: {{ supervisor.username }} <br/>
f_name: {{ supervisor.first_name }} <br/>
l_name: {{ supervisor.last_name }} <br/>
email: {{ supervisor.email }} <br/>
gender: {{ supervisor.gender }} <br/>
skype_id : {{ supervisor.skype_id }} <br/>
{{ supervisor.access_level }} <br/>
creation_date: {{ supervisor.creation_date }} <br/>
last_login: {{ supervisor.last_login }} <br/>
supervisor_id: {{ supervisor.supervisor_id }} <br/>
phone: {{ supervisor.phone }} <br/>
photo: {{ supervisor.photo }} <br/>
birthday: {{ supervisor.birthday }} <br/>
nick_name: {{ supervisor.nick_name }} <br/>
 -->
