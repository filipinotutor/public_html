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
                <h3>Tutors Schedule</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
				<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Schedule Request for Approval</h2>
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
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 60px;">Date Requested</th>
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Username</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 210px;">Tutor Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;">Actions</th>
                      </thead>


                      <tbody>

                      <tr role="row" class="odd">
                          <td class="sorting_1">July 25</td>
                          <td>abrugar.fatima</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Requests (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 25</td>
                          <td>asparo.lea.joy</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
                           <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Requests (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 24</td>
                          <td>allysa.julienne</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Allysa Julienne</a></td>
                            <td><a href="#"><span class="label label-warning">View Requests (5)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 24</td>
                          <td>ericca.gabriel</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Ericca Gabriel</a></td>
                            <td><a href="#"><span class="label label-warning">View Requests (1)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 24</td>
                          <td>andrew.trompeta</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Andrew Trompeta</a></td>
							  <td><a href="#"><span class="label label-warning">View Requests (1)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
                          <td>llacuna.lemon</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Lemon Llacuna</a></td>
                            <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Requests (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 23</td>
                          <td>renan.gallardo</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Renan Gallardo</a></td>
                            <td><a href="#"><span class="label label-warning">View Requests (7)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
                          <td>fatima.rosario.abrugar</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Fatima Rosario Abrugar</a></td>
                            <td><a href="#"><span class="label label-warning">View Requests (8)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 23</td>
                          <td>joan.may.amaro</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Joan May Amaro</a></td>
                           <td><a href="#"><span class="label label-warning">View Requests (1)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
                          <td>arianne.anna.reyes</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Arianne Anna Reyes</a></td>
                           <td><a href="#"><span class="label label-warning">View Requests (3)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
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
				
				
				<!-- start modal -->
				
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Schedules for Approval</h4>
                        </div>
						
						
                        <div class="modal-body">
							<h5>Abrugar Fatima - July 25, 2016</h5>
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
								<thead>
									<tr role="row">
										<th class="sorting" style="width: 80px;">Schedule Date</th>
										<th class="sorting" style="width: 80px;">Schedule Time</th>
										<th class="sorting" style="width: 50px;"><input type="checkbox" /> Approve</th>
									</tr>
								</thead>


							  <tbody>

								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>8:00-8:20</td>
								  <td><input type="checkbox" /></td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>9:00-9:20</td>
								  <td><input type="checkbox" /></td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>10:20-11:00</td>
								  <td><input type="checkbox" /></td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>11:00-11:20</td>
								  <td><input type="checkbox" /></td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>13:00-13:20</td>
								  <td><input type="checkbox" /></td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>16:00-16:20</td>
								  <td><input type="checkbox" /></td>
								</tr>
								</tbody>
							</table>
							
		                </div>
						
                        <div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
				  
				  <!-- end of modal -->
				
				
              </div>


                  </div>
                
			
			
			
            </div>
		
            </div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>