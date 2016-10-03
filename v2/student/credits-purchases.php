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
                <h3>Credits</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
            </div>
			
			<div class="clearfix"></div>

            <div class="row">
				<div class="col-md-12">
					<div class="x_panel">
					
						<div class="x_title">
							<h4>Credit Purchases</h4>
						</div>
						<div class="x_content">
							<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6">
					 
							 <div id="datatable_filter" class="dataTables_filter">
								<h4></h4>
							 </div>
							 
							 </div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
						  <thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Date/Time</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Student Name</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Credit Package / Type</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Price</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Expiration</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 60px;">Actions</th>
							</tr>
						  </thead>
						  <tbody>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
								<td>スターター<span class="label label-info">ESL</span></td>
								<td>4,200 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
								<td>バリュープラス <span class="label label-info">ESL</span></td>
								<td>9,700 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
								<td>スターター<span class="label label-info">ESL</span></td>
								<td>4,200 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
								<td>スターター<span class="label label-info">ESL</span></td>
								<td>4,200 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
								<td>スタンダード　プロ <span class="label label-info">Business English</span></td>
								<td>11,100 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Hata Toshiharu</a></td>
								<td>スターター<span class="label label-info">ESL</span></td>
								<td>4,200 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Igarashi Hiroya</a></td>
								<td>スタンダード　プロ <span class="label label-info">Business English</span></td>
								<td>11,100 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Shimoda Motoyuki</a></td>
								<td>スターター<span class="label label-info">ESL</span></td>
								<td>4,200 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yamashiro Takashi</a></td>
								<td>バリュープラス <span class="label label-info">ESL</span></td>
								<td>9,700 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>2016-02-14 16:08:22</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Nakai Tsuruki</a></td>
								<td>スタンダード　プロ <span class="label label-info">Business English</span></td>
								<td>11,100 JPY</td>
								<td>2016-02-14 16:08:22</td>
								<td><a href=""  data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a></td>
							</tr>
							</tbody>
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
				</div>
			</div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>