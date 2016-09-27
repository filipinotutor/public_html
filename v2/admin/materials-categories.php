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
                <h3>Materials Categories</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
            </div>
			
			<div class="clearfix"></div>

            <div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="row">
							<div class="col-md-4">
								<div class="x_title">
									<h4>Add New Category</h4>
								</div>
								
								<p>&nbsp;</p>
								
								<form class="form-horizontal form-label-left">
									<div class="form-group">
										<label class="control-label col-md-3" for="first-name">Name</label>
										<div class="col-md-9">
											<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="first-name">Type</label>
										<div class="col-md-9">
											<select class="form-control">
											<option>All</option>
											<option>ESL</option>
											<option>Business</option>
										  </select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="first-name">Parent</label>
										<div class="col-md-9">
											<select class="form-control">
											<option>None</option>
											<option>ESL Beginner</option>
											<option>ESL - Intermediate</option>
											<option>ESL - Advanced</option>
											<option>English for Business - Beginner</option>
											<option>English for Business - Intermediate</option>
											<option>English for Business - Advanced</option>
											<option>TOEFL</option>
										  </select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="first-name">Visibility</label>
										<div class="col-md-9">
											<select class="form-control">
											<option>All</option>
											<option>Admin Only</option>
											<option>Admin & Supervisors</option>
											<option>Students Only</option>
											<option>Tutors Only</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="first-name">Description</label>
										<div class="col-md-9">
										  <textarea class="form-control" rows="5" placeholder=""></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3" for="first-name"></label>
										<div class="col-md-9">
											<button type="submit" class="btn btn-success">Add New Category</button>
										</div>
									</div>
								</form>
								
							</div>
							<div class="col-md-8">
								<div class="x_title">
									<h4>Categories</h4>
								</div>
								<div class="x_content">
									<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6">
							 
									 <div id="datatable_filter" class="dataTables_filter">
										<h4></h4>
									 </div>
									 
									 </div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
								  <thead>
									<tr role="row">
										<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Category</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Type</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 80px;">Visibility</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Description</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 40px;">Actions</th>
									</tr>
								  </thead>


								  <tbody>

									<tr role="row" class="odd">
										<td>ESL Beginner</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>-- Young Learners Series 1</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>-- Famous Countries</td>
										<td>ESL</td>
										<td>All</td>
										<td><small>Tackles information of different countries.</small></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>-- Vocabulary</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>ESL - Intermediate</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>-- Holidays & Events</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>-- Sports</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>-- Vocabulary</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>English for Business - Beginner</td>
										<td>ESL</td>
										<td>All</td>
										<td></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									<tr role="row" class="odd">
										<td>English for Business - Intermediate</td>
										<td>ESL</td>
										<td>All</td>
										<td><small>This covers business conversations, management and meetings.</small></td>
										<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
									</tr>
									</tbody>
									</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
									
									
								</div>
							</div>
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


				</div>
			</div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>