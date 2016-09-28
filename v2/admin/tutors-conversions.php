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
                <h3>Conversions Summary</h3>
              </div>

              <div class="title_right">
					
              </div>
            </div>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Record for August <a href="#" class="btn btn-sm btn-info">Download Record</a></h2>
                    <div class="pull-right">
						<form class="form-horizontal form-label-left input_mask">
							<div class="form-group">
								<label class="control-label col-sm-4">Gender </label>
								<div class="col-sm-8">
									<select class="form-control" >
										<option>January</option>
										<option>February</option>
										<option>March</option>
										<option>April</option>
										<option>May</option>
										<option>June</option>
										<option>July</option>
										<option>August</option>
										<option>September</option>
										<option>October</option>
										<option>November</option>
										<option>December</option>
									</select>
								</div>
							</div>
						</form>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">Tutor</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 90px;">Total Points</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 90px;">Total Amount</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 150px;">Status</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 60px;">Actions</th></tr>
                      </thead>
                      <tbody>
                      <tr role="row" class="odd">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Lea Joy Asparo</a></td>
                          <td>6</td>
                          <td>&#8369;900</td>
                          <td><span class="label label-success">Paid</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Fatima Abrugar</a></td>
                           <td>25</td>
                          <td>&#8369;2,500</td>
                          <td><span class="label label-success">Paid</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Allysa Julienne Afidchao</a></td>
                           <td>35</td>
                          <td>&#8369;3,500</td>
                          <td><span class="label label-success">Paid</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Ericca Gabriel</a></td>
                           <td>12</td>
                          <td>&#8369;1,200</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Andrew Nel Trompeta</a></td>
                           <td>4</td>
                          <td>&#8369;400</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Lemon Llacuna</a></td>
                          <td>5</td>
                          <td>&#8369;500</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Renan Mari Gallardo</a></td>
                          <td>7</td>
                          <td>&#8369;700</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Joan May Amaro</a></td>
                           <td>45</td>
                          <td>&#8369;4,500</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Arianne Anna Reyes</a></td>
							<td>45</td>
                          <td>&#8369;4,500</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td><a href="#"><span class="fa fa-info-circle"></span> Juan DeLa Cruz</a></td>
                           <td>15</td>
                          <td>&#8369;1,500</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><a href="" data-toggle="modal" data-target=".bs-conversion-modal-lg" class="fa fa-search"></a>&nbsp;&nbsp;<a href="" class="fa fa-gear"></a>&nbsp;&nbsp;<a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                  </div>
                </div>
				
				<div class="modal fade bs-conversion-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Conversions of Lea Joy Asparo for the month of August</h4>
                        </div>

                        <div class="modal-body">
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
							  <thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Date/Time</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 90px;">Class</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Student</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Type</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 60px;">Points</th>
									<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 60px;">Amount</th>
								</tr>
							  </thead>
							  <tbody>
								<tr role="row" class="odd">
								  <td>2016-02-14 16:30</td>
								  <td>16:00-16:20</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
								  <td><span class="label label-success">ESL</span></td>
								  <td>1</td>
								  <td>&#8369;150</td>
								</tr>
								<tr role="row" class="odd">
								  <td>2016-02-14 16:30</td>
								  <td>16:00-16:20</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
								  <td><span class="label label-success">ESL</span></td>
								  <td>1</td>
								  <td>&#8369;150</td>
								</tr>
								<tr role="row" class="odd">
								  <td>2016-02-14 16:30</td>
								  <td>16:00-16:20</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
								  <td><span class="label label-success">Business</span></td>
								  <td>2</td>
								  <td>&#8369;300</td>
								</tr>
								<tr role="row" class="odd">
								  <td>2016-02-14 16:30</td>
								  <td>16:00-16:20</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
								  <td><span class="label label-success">ESL</span></td>
								  <td>1</td>
								  <td>&#8369;150</td>
								</tr>
								<tr role="row" class="odd">
								  <td>2016-02-14 16:30</td>
								  <td>16:00-16:20</td>
								  <td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
								  <td><span class="label label-success">ESL</span></td>
								  <td>1</td>
								  <td>&#8369;150</td>
								</tr>
								</tbody>
							</table>
							
							
		                </div>
						
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                 
				
              </div><!-- end of modal -->
				
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
              </div>
            </div>
            </div>
		</div>
		   
<?php 
	include('template/footer.php');
?>