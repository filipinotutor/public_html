<div class="page-title">
  <div class="title_left">
    <h3>Tutors</h3>
  </div>
  <div class="title_right"></div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>
	        <a class="btn btn-sm btn-info" ng-click="allTutor()">All ({{ tutorCount }})</a>
	        <a class="btn btn-sm btn-success" ng-click="newlyRegister()">New ({{ newRegCount }})</a>
	        <a class="btn btn-sm btn-warning" ng-click="deactTutor()">Deactivated ({{ deactTutorCount }})</a>
	        <a class="btn btn-sm btn-danger" ng-click="forApproval()">For Approval ({{ forAppListCount }})</a>
        </h2>
        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
          <span>June 30, 2016 - July 29, 2016</span> <b class="caret"></b>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label>
        Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12">

        <table st-table="tutorListColl" st-safe-src="tutorlist" id="dataTable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
          <thead>
            <tr role="row">
				<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"  aria-label="Position: activate to sort column ascending" style="width: 190px;" st-sort="username">Username</th>
				<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 190px;" st-sort="first_name">Name</th>
				<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;" st-sort="skype_id">Skype ID</th>
				<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;" st-sort="email">Email</th>
				<th tabindex="0" aria-controls="datatable" rowspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Actions</th></tr>
          </thead>
          <tbody bindonce ng-repeat="s in tutorListColl | orderBy: 'userName'">
          	<tr role="row" bo-show="$even" class="odd">
              <td class="sorting_1">
              	<span bo-bind="s.username"></span>
              </td>
              <td>
              	<span bo-bind="s.first_name"></span>	
              	<span bo-bind="s.last_name"></span>
              </td>
              <td>	
              	<span bo-bind="s.skype_id"></span>	
              </td>
              <td>	
              	<span bo-bind="s.email"></span>
              </td>
              <td>
              	 <a ui-sref="tutor_profile({ userNameOrEmail:s.username })"><span class="label label-warning">View / Edit</span>
              	</a>
              <!-- <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View / Edit</span></a> -->
              </td>
            </tr>
           	<tr role="row" bo-show="$odd" class="even">
              <td class="sorting_1">
              	<span bo-bind="s.username"></span>
              </td>
              <td>
              	<span bo-bind="s.first_name"></span>	
              	<span bo-bind="s.last_name"></span>
              </td>
              <td>	
              	<span bo-bind="s.skype_id"></span>	
              </td>
              <td>	
              	<span bo-bind="s.email"></span>
              </td>
              <td>
               <a ui-sref="tutor_profile({ userNameOrEmail:s.username })"><span class="label label-warning">View / Edit</span>
              	</a>
              <!-- 
              	<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View / Edit</span>
              	</a> -->
              </td>
            </tr>
           </tbody>
           <tfoot>
			<tr>
				<td colspan="5" class="text-center">
					<div st-pagination="" st-items-by-page="itemsByPage" st-displayed-pages="10"></div>
				</td>
			</tr>
		</tfoot>

        </table>

        </div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
      </div>
    </div><!-- end of panel -->
	
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">View/Edit tutor Profile</h4>
            </div>
			
			
            <div class="modal-body">
				<div class="row">
					<div class="col-sm-2">
						<img src="./images/profilepic.jpg" class="img-responsive" />
					</div>
					<div class="col-sm-6">
						<h4>Tsutsui Hajime</h4>
						<p>
							<b>tutor ID:</b> F44331<br />
							<b>Member Since:</b> August 20, 2016<br />
							<b>Credits:</b><br />
							- 20 Credits ( Business )<br />
							- 15 Credits ( ESL )<br />
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
						<li role="presentation" class=""><a href="#tab_content4" role="tab" id="tab-credits" data-toggle="tab" aria-expanded="false">Credit Purchases</a></li>
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
											<input type="text" class="form-control" disabled="disabled" value="Tsutsui" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Last Name </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" value="Hajime" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Gender </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<select class="form-control" disabled="disabled">
												<option>Male</option>
												<option>Female</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" value="tsutsui.hajime" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Mobile </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" value="+639154718843" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Birthday </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" value="09/08/1985"  />
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h4>Account Information</h4>
									<hr />
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Username </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" class="form-control" disabled="disabled" value="tsutsui.hajime" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Password </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="password" class="form-control" disabled="disabled" value="33333" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3 col-xs-12">Email </label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="email" class="form-control" disabled="disabled" value="tsutsui.hajime@gmail.com" />
										</div>
									</div>
								</div>
							</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							
							<div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"></div></div>
							
							<div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							  <thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Date</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Time</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Tutor</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Material</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Status</th>
								</tr>
							  </thead>

							  <tbody>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>11:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								  <td><span class="label label-success">Upcoming</span></td>
								</tr><tr role="row" class="even">
								  <td class="sorting_1">July 25</td>
								  <td>9:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Holidays and Events | Chinese New Year</a></td>
								  <td><span class="label label-success">Upcoming</span></td>
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">July 24</td>
								  <td>22:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								  <td><span class="label label-success">Upcoming</span></td>
								</tr><tr role="row" class="even">
								  <td class="sorting_1">July 24</td>
								  <td>22:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Grammar, Writing & Pronunciation | Pronunciation - Warm Ups</a></td>
								  <td><span class="label label-default">Completed</span></td>
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">July 24</td>
								  <td>21:30</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
								 <td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process</a></td>
								 <td><span class="label label-default">Completed</span></td>
								</tr>
								<tr role="row" class="even">
								  <td class="sorting_1">July 24</td>
								  <td>18:30</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								  <td><span class="label label-default">Completed</span></td>
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">July 24</td>
								  <td>18:30</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								  <td><span class="label label-default">Completed</span></td>
								</tr><tr role="row" class="even">
								  <td class="sorting_1">July 23</td>
								  <td>11:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								  <td><span class="label label-default">Completed</span></td>
								</tr><tr role="row" class="odd">
								  <td class="sorting_1">July 23</td>
								  <td>11:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>Business Management | Managing Communications in a Globalized Business</a></td>
								  <td><span class="label label-default">Completed</span></td>
								</tr><tr role="row" class="even">
								  <td class="sorting_1">July 22</td>
								  <td>11:00</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
								  <td><a href="#"><span class="fa fa-external-link"></span>ESL Advanced - Famouse Cities | Lesson 1 - The Beautiful City of Munich</a></td>
								  <td><span class="label label-default">Completed</span></td>
								</tr></tbody>
							</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
						
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							  <thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Date</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Time</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Tutor</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Material</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Evaluation</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Attendance</th>
								</tr>
							  </thead>
							  <tbody>
								<tr role="row" class="odd">
									<td>July 24</td>
									<td>16:08:22</td>
									<td>Airi Satou</td>
									<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
									<td>She is a new tutor but has knowledge on basic grammar.</td>
									<td><span class="label label-danger">Absent</span></td>
								</tr>
								<tr role="row" class="odd">
									<td>July 24</td>
									<td>16:08:22</td>
									<td>Airi Satou</td>
									<td><a href="#"><span class="fa fa-external-link"></span>Holidays and Events | Chinese New Year</td>
									<td>Needs to start on alphabets again.</a></td>
									<td><span class="label label-success">Present</span></td>
								</tr>
								<tr role="row" class="odd">
									<td>July 23</td>
									<td>16:08:22</td>
									<td>Ashton Cox</td>
									<td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process</td>
									<td>Lesson ended up well.</a></td>
									<td><span class="label label-success">Present</span></td>
								</tr>
								<tr role="row" class="odd">
									<td>July 23</td>
									<td>16:08:22</td>
									<td>Bradley Greer</td>
									<td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process</td>
									<td>tutor is responsive and loves to talk about her hobbies.</a></td>
									<td><span class="label label-success">Present</span></td>
								</tr>
								</tbody>
							</table>

						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
						
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							  <thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Date/Time</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Credit Package / Type</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Price</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Credit Points</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Expiration</th>
								</tr>
							  </thead>
							  <tbody>
								<tr role="row" class="odd">
									<td>2016-02-14 16:08:22</td>
									<td>スターター<span class="label label-info">ESL</span></td>
									<td>4,200 JPY</td>
									<td>14</td>
									<td>2016-02-14 16:08:22</td>
								</tr>
								<tr role="row" class="odd">
									<td>2016-02-14 16:08:22</td>
									<td>バリュープラス <span class="label label-info">ESL</span></td>
									<td>9,700 JPY</td>
									<td>30</td>
									<td>2016-02-14 16:08:22</td>
								</tr>
								<tr role="row" class="odd">
									<td>2016-02-14 16:08:22</td>
									<td>スターター<span class="label label-info">ESL</span></td>
									<td>4,200 JPY</td>
									<td>14</td>
									<td>2016-02-14 16:08:22</td>
								</tr>
								<tr role="row" class="odd">
									<td>2016-02-14 16:08:22</td>
									<td>スターター<span class="label label-info">ESL</span></td>
									<td>4,200 JPY</td>
									<td>14</td>
									<td>2016-02-14 16:08:22</td>
								</tr>
								</tbody>
							</table>

						</div>
					  </div>
					</div>
				</div>
            </div>
			
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>

          </div>
        </div>
    </div><!-- end of modal -->


  </div>
    
	
	</div>
  </div>
</div>