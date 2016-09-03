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
                <h3>Tutors Reports <small>Reports waiting for approval</small></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="tutors-reports-history.php" class="btn btn-sm btn-warning">Report History</a></h2>
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
							<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 60px;">Date</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 60px;">Time</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Tutor Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Student Name</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Student Attendance</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Actions</th>
                      </thead>

                      <tbody>

                      <tr role="row" class="odd">
                          <td class="sorting_1">July 25</td>
						  <td>11:00</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
						   <td><span class="label label-success">Present</span></td>
							<td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 25</td>
						   <td>9:00</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
						  <td><span class="label label-success">Present</span></td>
						  <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 24</td>
						   <td>22:00</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
						  <td><span class="label label-danger">Absent</span></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 24</td>
						   <td>21:30</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
						  <td><span class="label label-success">Present</span></td>
                           <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 24</td>
						   <td>18:30</td>
                         <td><a href="#"><span class="fa fa-info-circle"></span> Trompeta Andrew Nel</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
						  <td><span class="label label-success">Present</span></td>
							<td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 24</td>
						   <td>11:00</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Hata Toshiharu</a></td>
						  <td><span class="label label-success">Present</span></td>
                            <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 23</td>
						   <td>9:30</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Gallardo Renan Mari</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Igarashi Hiroya</a></td>
						  <td><span class="label label-success">Present</span></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
						   <td>6:30</td>
							<td><a href="#"><span class="fa fa-info-circle"></span> Shimoda Motoyuki</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Caesar Vance</a></td>
						  <td><span class="label label-success">Present</span></td>
                         <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">July 23</td>
						   <td>5:00</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Amaro Joan May</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Yamashiro Takashi</a></td>
						  <td><span class="label label-success">Present</span></td>
                         <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">July 23</td>
						   <td>5:30</td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Reyes Arianne Anna</a></td>
                          <td><a href="#"><span class="fa fa-info-circle"></span> Nakai Tsuruki</a></td>
						  <td><span class="label label-success">Present</span></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="label label-warning">View Report</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                  </div>
                </div>
              </div>


            </div>
			
			
			<!-- start modal -->
				
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Report Details</h4>
                        </div>
						
						
                        <div class="modal-body">
							<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
								<tr role="row">
									<td style="width: 150px"><b>Report Submitted:</b> 06-24-2016 - 11:45</td>
									<td style="width: 150px;"><b>Class Date:</b> Aug 27 </td>
									<td style="width: 150px;"><b>Class Time:</b> 11:00-11:20</td>
									<td  style="width: 70px;"><span class="label label-sm label-success">Present</span></td>
								</tr>
								<tr role="row">
									<td style="width: 170px;"><b>Tutor: </b><br />Abrugar Fatima</td>
									<td style="width: 90px;"><b>Student:</b><br />Yogi Shuko</td>
									<td colspan="2" style="width: 170px;"><b>Material:</b> <br /><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								</tr>
								<tr role="row">
									<td class="sorting_asc" style="width: 90px;"><b>Student Rating:</b><br /><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></td>
									<td class="sorting" colspan="3" style="width: 170px;"><b>Tutor Remarks:</b> <br />Student needs more improvement on alphabets and vocabulary. Tutor should focus on these things first before proceeding to the next material.</td>
								</tr>
							</table>
							
		                </div>
						
                        <div class="modal-footer">
							<button type="button" class="btn btn-danger">Decline Report</button>
							<button type="button" class="btn btn-success">Approve Report</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
				  
				  <!-- end of modal -->
                
			
			
			
            </div>
		
            </div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>