<?php 
	include('template/header.php');
?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
			<?php 
				include('template/sidebar.php');
			?>
        </div>

        <!-- top navigation -->
        <?php 
			include('template/top-nav.php');
		?>
        <!-- /top navigation -->

        <!-- page content -->
		<div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Supervisors</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="#" class="btn btn-sm btn-info">All</a><a href="#" class="btn btn-sm btn-warning">Deactivated ( 30 )</a></h2>
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>June 30, 2016 - July 29, 2016</span> <b class="caret"></b>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
					
					<div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 90px;">ID</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 170px;">Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 170px;">Nickname</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Email</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 60px;">Actions</th></tr>
                      </thead>


                      <tbody>

                      <tr role="row" class="odd">
                          <td class="sorting_1">fa032016136</td>
                          <td>Myleen De Leon</td>
                          <td>Supervisor Myleen</td>
                          <td>myleen.deleon</td>
                          <td>myleen.deleon@gmail.com</td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View / Edit</span></td>
                        </tr>
						<tr role="row" class="even">
                          <td class="sorting_1">fb033221136</td>
                          <td>Joy Loarca</td>
                          <td>Supervisor Joy</td>
                          <td>joy.loarca</td>
                          <td>joy.loarca@gmail.com</td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View / Edit</span></td>
                        </tr>
						
						</tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div>
					
					</div>
                  </div>
                </div>
				
				
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">View/Edit Tutor Profile</h4>
                        </div>
						
						
                        <div class="modal-body">
							<div class="row">
								<div class="col-sm-2">
									<img src="./images/profilepic.jpg" class="img-responsive" />
								</div>
								<div class="col-sm-6">
									<h4>Myleen Deleon</h4>
									<p>
										<b>Supervisor ID:</b> F44331<br />
										<b>Member Since:</b> August 20, 2016<br /><br />
										<a href="#" class="btn btn-xs btn-info">Edit Profile</a>
										<a href="#" class="btn btn-xs btn-danger">Deactivate Account</a>
									</p>
									
								</div>
							</div>
							<div class="x_content">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
								  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="tab-profile" role="tab" data-toggle="tab" aria-expanded="true">Account & Profile</a></li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="tab-schedule" data-toggle="tab" aria-expanded="false">Assigned Tutors</a></li>

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
														<input type="text" class="form-control" disabled="disabled" value="Juan" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Last Name </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="Dela Cruz" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="juan.delacruz" />
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
													<label class="control-label col-sm-3 col-xs-12">
Highest Educational Level </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="Juan" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">School/University </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="University of the Philippines" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Teaching Experience </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="3 years as college teacher" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Self Introduction </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<textarea id="message" required="required" class="form-control" rows="3" disabled="disabled">Hello I am Juan Delacruz</textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Hobbies </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<textarea id="message" required="required" class="form-control" rows="3" disabled="disabled">Boxing, Swimming, Singing and Dancing</textarea>
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
										  </thead>


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
						
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                      </div>
                    </div>
                  
              </div><!-- end of modal -->
			
			
				
				 </div><!-- end of modal -->
				
              </div>


                  </div>
                
			
			
           </div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>