 <!-- page content -->

            <div class="page-title">
              <div class="title_left">
                <h3>Tutors</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						
                        <div class="modal-body">
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
										<a href="#" class="btn btn-xs btn-danger">Deactivate Account</a>
									</p>
									
								</div>
							</div>
							<div class="x_content">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
								  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="tab-profile" role="tab" data-toggle="tab" aria-expanded="true">Account & Profile</a></li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="tab-schedule" data-toggle="tab" aria-expanded="false">Schedule & Bookings</a></li>
									<li role="presentation" class=""><a href="#tab_content3" role="tab" id="tab-history" data-toggle="tab" aria-expanded="false">Class History</a></li>
									<li role="presentation" class=""><a href="#tab_content4" role="tab" id="tab-credits" data-toggle="tab" aria-expanded="false">Conversions</a></li>
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
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.first_name }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Last Name </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.last_name }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.skype_id }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Mobile </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.phone }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Birthday </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.birthday }}"  />
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
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.ed_level }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">School/University </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.school }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Currently Attending </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.attending }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Teaching Experience </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.teaching_exp }}" />
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
														<input type="text" class="form-control" disabled="disabled" value="{{ tutor.username }}" />
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
															<option>{{ tutor.tutor_type }}</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Supervisor </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<select class="form-control" disabled="disabled">
															<option>-- NEED VALUE --</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Email </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="email" class="form-control" disabled="disabled" value="{{ tutor.email }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Rate </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="email" class="form-control" disabled="disabled" value="-- NEED VALUE --" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Trial Lesson </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<select class="form-control" disabled="disabled">
															<option>-- NEED VALUE --</option>
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
															<option>{{ tutor.bank_name }}</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Branch </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="password" class="form-control" disabled="disabled" value="{{ tutor.bank_branch }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Account Name </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="email" class="form-control" disabled="disabled" value="{{ tutor.accnt_name }}" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Account No. </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="email" class="form-control" disabled="disabled" value="{{ tutor.accnt_number }}" />
													</div>
												</div>
											</div>
										</div>
										</form>
										<br />
										<p align="center"><a class="btn btn-primary" >Save Changes</a></p>
										
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
										<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										
										<div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><a href="#" class="pull-right btn btn-sm btn-info">Manage Schedule</a></div></div>
										
										<div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
										  <thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Date</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Time</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Student</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Material</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Status</th>
											</tr>
										  </thead>

										  <tbody>
											<tr role="row" class="odd">
											  <td class="sorting_1">July 25</td>
											  <td>11:00</td>
											  <td>Yogi Shuko</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-success">Upcoming</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 25</td>
											  <td>9:00</td>
											  <td>Tsutsui Hajime</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Holidays and Events | Chinese New Year</a></td>
											  <td><span class="label label-success">Upcoming</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 24</td>
											  <td>22:00</td>
											  <td>Watanabe Hyosuke</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-success">Upcoming</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 24</td>
											  <td>22:00</td>
											  <td>Otake Takanobu</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Grammar, Writing & Pronunciation | Pronunciation - Warm Ups</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 24</td>
											  <td>21:30</td>
											  <td>Miyake Takao</td>
											 <td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process</a></td>
											 <td><span class="label label-default">Completed</span></td>
											</tr>
											<tr role="row" class="even">
											  <td class="sorting_1">July 24</td>
											  <td>18:30</td>
											 <td>Miyake Takao</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 24</td>
											  <td>18:30</td>
											 <td>Miyake Takao</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 23</td>
											  <td>11:00</td>
											 <td>Igarashi Hiroya</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 23</td>
											  <td>11:00</td>
											  <td>Shimoda Motoyuki</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>Business Management | Managing Communications in a Globalized Business</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 22</td>
											  <td>11:00</td>
											  <td>Yamashiro Takashi</td>
											  <td><a href="#"><span class="fa fa-external-link"></span>ESL Advanced - Famouse Cities | Lesson 1 - The Beautiful City of Munich</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr></tbody>
										</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
									</div>
									
									<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
										
										<a href="tutor-class-history.php" class="btn btn-sm btn-info pull-right">Detailed Class History</a>
										
										<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
										  <thead>
											<tr role="row">
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Date</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Time</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Student</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Material</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Student Rating</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Attendance</th>
											</tr>
										  </thead>
										  <tbody>
											<tr role="row" class="odd">
												<td>July 24</td>
												<td>16:08:22</td>
												<td>Yogi Shuko</td>
												<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
												<td><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></td>
												<td><span class="label label-danger">Absent</span></td>
											</tr>
											<tr role="row" class="odd">
												<td>July 24</td>
												<td>16:08:22</td>
												<td>Tsutsui Hajime</td>
												<td><a href="#"><span class="fa fa-external-link"></span>Holidays and Events | Chinese New Year</td>
												<td><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></td>
												<td><span class="label label-success">Present</span></td>
											</tr>
											<tr role="row" class="odd">
												<td>July 23</td>
												<td>16:08:22</td>
												<td>Watanabe Hyosuke</td>
												<td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process</td>
												<td><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half-o"></span><span class="fa fa-star-o"></span></td>
												<td><span class="label label-success">Present</span></td>
											</tr>
											<tr role="row" class="odd">
												<td>July 23</td>
												<td>16:08:22</td>
												<td>Otake Takanobu</td>
												<td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process</td>
												<td><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></td>
												<td><span class="label label-success">Present</span></td>
											</tr>
											</tbody>
										</table>

									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
										
										<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										
										
											<div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><a href="#" class="pull-right btn btn-sm btn-info">Manage Conversions</a></div></div>
											
											<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
											  <thead>
												<tr role="row">
													<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Date/Time</th>
													<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Supervisor</th>
													<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Student</th>
													<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Class Type</th>
													<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Status</th>
												</tr>
											  </thead>
											  <tbody>
												<tr role="row" class="odd">
													<td>2016-02-14 16:08:22</td>
													<td>Pedro Kabulong</td>
													<td>Tsutsui Hajime</td>
													<td>ESL</td>
													<td><span class="label label-sm label-info">ESL</span></td>
												</tr>
												<tr role="row" class="odd">
													<td>2016-02-14 16:08:22</td>
													<td>Pedro Kabulong</td>
													<td>Yamashiro Takashi</td>
													<td>Business English</td>
													<td><span class="label label-sm label-success">Business English</span></td>
												</tr>
												<tr role="row" class="odd">
													<td>2016-02-14 16:08:22</td>
													<td>Maria Clara</td>
													<td>Hata Toshiharu</td>
													<td>Business English</td>
													<td><span class="label label-sm label-success">Business English</span></td>
												</tr>
												<tr role="row" class="odd">
													<td>2016-02-14 16:08:22</td>
													<td>Maria Clara</td>
													<td>Yamashiro Takashi</td>
													<td>ESL</td>
													<td><span class="label label-sm label-info">ESL</span></td>
												</tr>
												</tbody>
											</table>
			
										</div>
									</div>
								  </div>
								</div>
							</div>
		                </div>
					</div>
				</div>
			</div>
                


<a class="btn btn-primary" ng-click="deactivate(tutor.user_id)" ng-show="tutor.deactivated == 0">Deactivate</a>
<a class="btn btn-primary" ng-click="activate(tutor.user_id)" ng-show="tutor.deactivated == 1">Activate</a>

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