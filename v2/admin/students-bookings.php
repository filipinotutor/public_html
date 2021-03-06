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
                <h3>Students Bookings</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="#" class="btn btn-sm btn-success">New Bookings</a><!-- <a href="#" class="btn btn-sm btn-warning">Cancel Requests ( 10 )</a><a href="#" class="btn btn-sm btn-danger">Transfer Requests ( 30 )</a>--></h2>
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
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">Booking Date</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 130px;">User Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 190px;">Student Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Actions</th>
                      </thead>


                      <tbody>

                      <tr role="row" class="odd">
                          <td class="sorting_1">July 25</td>
                          <td>Airi_Satou</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Airi Satou</a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 25</td>
                          <td>Angelica_Ramos</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Angelica Ramos</a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (5)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 24</td>
                          <td>Ashton_Cox</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Ashton Cox</a></td>
                            <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (10)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 24</td>
                          <td>Bradley_Greer</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Bradley Greer</a></td>
                            <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 24</td>
                          <td>Brenden_Wagner</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Brenden Wagner</a></td>
							<td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
                          <td>Brielle_Williamson</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Brielle Williamson</a></td>
                        <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (6)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 23</td>
                          <td>Bruno_Nash</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Bruno Nash</a></td>
							<td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (1)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
                          <td>Caesar_Vance</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Caesar Vance</a></td>
                           <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (3)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 23</td>
                          <td>Cara_Stevens</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Cara Stevens</a></td>
                        <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (2)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
                          <td>Cedric_Kelly</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Cedric Kelly</a></td>
                           <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Bookings (3)</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-calendar"></a>&nbsp;&nbsp;<a href="" class="fa fa-history"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                  </div>
                </div><!-- end of panel -->
				
				<!-- start modal -->
				
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">All Classes Booked on July 25, 2016</h4>
                        </div>
						
						
                        <div class="modal-body">
						
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
								<thead>
									<tr role="row">
										<th class="sorting" style="width: 80px;">Date</th>
										<th class="sorting" style="width: 80px;">Time</th>
										<th class="sorting" style="width: 80px;">Tutor</th>
										<th class="sorting" style="width: 80px;">Class Type</th>
									</tr>
								</thead>


							  <tbody>

								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>8:00-8:20</td>
								  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Airi Satou</a></td>
								  <td>ESL</td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>9:00-9:20</td>
								  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								  <td>ESL</td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>10:20-11:00</td>
								  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Airi Satou</a></td>
								  <td>Business</td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>11:00-11:20</td>
								  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
								  <td>Business</td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>13:00-13:20</td>
								  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								  <td>ESL</td>
								</tr>
								<tr role="row" class="odd">
								  <td class="sorting_1">July 25</td>
								  <td>16:00-16:20</td>
								  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Airi Satou</a></td>
								  <td>Business</td>
								</tr>
								</tbody>
							</table>
							
		                </div>
						
                        <div class="modal-footer">
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

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>