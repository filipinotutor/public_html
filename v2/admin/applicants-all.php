<?php 
	include('template/header.php');
	/* added comment here */
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
                <h3>Applicants</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>List of all applicants</small></h2>
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>June 30, 2016 - July 29, 2016</span> <b class="caret"></b>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 130px;">Date Applied</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;">Email</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;">Mobile</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;">Status</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Interview Date</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;">Actions</th></tr>
                      </thead>


                      <tbody>

                      <tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Jeffrey Quiamzon</td>
                          <td>jeffrey.quiamzon@gmail.com</td>
                          <td>+639154623211</td>
						  <td><span class="label label-danger">Pending</span></td>
						  <td>N/A</td>
                           <td><a href="" class="fa fa-search" data-toggle="modal" data-target=".bs-profile-modal-lg" title="Applicant Profile"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Jhaymee Gonzales</td>
                          <td>jhaymee.gonzales@gmail.com</td>
						  <td>+639154623211</td>
						   <td><span class="label label-success">Scheduled</span></td>
						   <td>09/14/2016</td>
                          <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Hanz Luarca</td>
                          <td>hanz.luarca@yahoo.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
                           <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Shalen Villena</td>
                          <td>shalen.villena@gmail.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
                           <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Stephen Mayorga</td>
                          <td>stephen.mayorga@hotmail.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
							 <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Jhon Brylle Enchata</td>
                          <td>jhon.brylle.enchata@gmail.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
                            <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Amanda Smith</td>
                          <td>amanda.smith@gmail.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
                           <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Elisha Jackson</td>
                          <td>elisha.jackson@yahoo.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-danger">Pending</span></td>
						  <td>N/A</td>
                           <td><a href="" class="fa fa-search" data-toggle="modal" data-target=".bs-profile-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Ryan Jarabe</td>
                          <td>ryan.jarabe@hotmail.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
                          <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Yumi Nishida</td>
                          <td>yumi.nishida@hotmail.com</td>
						  <td>+639154623211</td>
						  <td><span class="label label-success">Scheduled</span></td>
						  <td>09/14/2016</td>
                          <td><a href="" class="fa fa-search"></a>&nbsp;&nbsp;<a href="../docs/sample-resume.docx" title="download resume" target="_BLANK" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee" data-toggle="modal" data-target=".bs-training-modal-sm" title="Schedule Interview"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                  </div>
                </div>
				
				<!-- start delete modal -->
				<div class="modal fade bs-delete-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-sm">
					  <div class="modal-content">

						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						  </button>
						  <h4 class="modal-title" id="myModalLabel">Delete Record</h4>
						</div>
						
						
						<div class="modal-body">
							Are sure that you want to delete this record?
						</div>
						
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  <button type="button" class="btn btn-danger">Delete</button>
						</div>

					  </div>
					</div>
				</div><!-- end of modal -->
				
				<!-- start training modal -->
				<div class="modal fade bs-training-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-sm">
					  <div class="modal-content">

						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						  </button>
						  <h4 class="modal-title" id="myModalLabel">Schedule Interview</h4>
						</div>
						
						
						<div class="modal-body">
							<b>Interview Schedule:</b><br />
							<input id="birthday" class="date-picker form-control col-md-7 col-xs-12 active" required="required" type="text">
							<br /><br />
						</div>
						
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  <button type="button" class="btn btn-success">Set Schedule</button>
						</div>

					  </div>
					</div>
				 </div><!-- end of modal -->
				 
				 
				 <!-- start profile modal -->
				<div class="modal fade bs-profile-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">

						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						  </button>
						  <h4 class="modal-title" id="myModalLabel">Applicant Information</h4>
						</div>
						
						
						<div class="modal-body">
						
								<form class="form-horizontal form-label-left input_mask">
									<div class="row">
										<div class="col-sm-6">
											<h4>Personal Information</h4>
											<hr>
											<div class="row">
												<label class="col-sm-5">First Name </label>
												<div class="col-sm-7">
													Juan
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Last Name </label>
												<div class="col-sm-7">
													Dela Cruz
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Skype ID </label>
												<div class="col-sm-7">
													juan.delacruz
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Mobile </label>
												<div class="col-sm-7">
													+639154718843
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Birthday </label>
												<div class="col-sm-7">
													09/08/1985
												</div>
											</div>
											
										</div>
										<div class="col-sm-6">
											<h4>Educational Background &amp; Others</h4>
											<hr>
											<div class="row">
												<label class="col-sm-5">Highest Educational Level </label>
												<div class="col-sm-7">
													Juan
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">School/University </label>
												<div class="col-sm-7">
													University of the Philippines
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Teaching Experience </label>
												<div class="col-sm-7">
													3 years as college teacher
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Self Introduction </label>
												<div class="col-sm-7">
													Hello I am Juan Delacruz
												</div>
											</div>
											<div class="row">
												<label class="col-sm-5">Hobbies </label>
												<div class="col-sm-7">
													Boxing, Swimming, Singing and Dancing
												</div>
											</div>
										</div>
									</div>
								</form>
							<br clear="all" />
						</div>
						
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>

					  </div>
					</div>
				 </div><!-- end of modal -->
				 
				
              </div>
				
				
				
				
            </div>


                  </div>
                
			
			
           </div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>