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
								<label class="control-label col-sm-4">Month: </label>
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
					<div class="row">
						<div class="col-sm-2"><b>Total Conversions: </b>6</div>
						<div class="col-sm-2"><b>Total Amount: </b>₱900</div>
						<div class="col-sm-2"><b>Payout Status: </b><span class="label label-success">Paid</span></div>
						<div class="col-sm-3"><b>Total Approved Classes: </b>5</div>
						<div class="col-sm-3"><b>Total Declined Classes:</b>1</div>
					</div>
					<hr />
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
						  <td>₱150</td>
						</tr>
						<tr role="row" class="odd">
						  <td>2016-02-14 16:30</td>
						  <td>16:00-16:20</td>
						  <td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
						  <td><span class="label label-success">ESL</span></td>
						  <td>1</td>
						  <td>₱150</td>
						</tr>
						<tr role="row" class="odd">
						  <td>2016-02-14 16:30</td>
						  <td>16:00-16:20</td>
						  <td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
						  <td><span class="label label-success">Business</span></td>
						  <td>2</td>
						  <td>₱300</td>
						</tr>
						<tr role="row" class="odd">
						  <td>2016-02-14 16:30</td>
						  <td>16:00-16:20</td>
						  <td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
						  <td><span class="label label-success">ESL</span></td>
						  <td>1</td>
						  <td>₱150</td>
						</tr>
						<tr role="row" class="odd">
						  <td>2016-02-14 16:30</td>
						  <td>16:00-16:20</td>
						  <td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
						  <td><span class="label label-success">ESL</span></td>
						  <td>1</td>
						  <td>₱150</td>
						</tr>
						</tbody>
					</table>
						
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
							
							<p align="right"><b>TOTAL: </b> &#8369;900</p>
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
				
				<!-- start paid modal -->
				<div class="modal fade bs-paid-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-sm">
					  <div class="modal-content">

						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						  </button>
						  <h4 class="modal-title" id="myModalLabel">Update Status</h4>
						</div>
						
						
						<div class="modal-body">
							Do you want to mark this record as paid?
						</div>
						
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  <button type="button" class="btn btn-success">Mark as Paid</button>
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