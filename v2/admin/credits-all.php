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
							<h4>Credit Packages</h4>
						</div>
						<div class="x_content">
							<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6">
					 
							 <div id="datatable_filter" class="dataTables_filter">
								<h4></h4>
							 </div>
							 
							 </div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
						  <thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Credit Package Name</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Type</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Price</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Duration</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Credit Points</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 60px;">Actions</th>
							</tr>
						  </thead>
						  <tbody>
							<tr role="row" class="odd">
								<td>スターター</td>
								<td>ESL</td>
								<td>4,200 JPY</td>
								<td>10 mins for 30 day(s)</td>
								<td>14</td>
								<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>バリュー</td>
								<td>ESL</td>
								<td>5,800 JPY</td>
								<td>10 mins for 30 day(s)</td>
								<td>30</td>
								<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>スタンダード　プロ</td>
								<td>Business English</td>
								<td>11,100 JPY</td>
								<td>25 mins for 30 day(s)</td>
								<td>30</td>
								<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>バリュー プロ</td>
								<td>Business English</td>
								<td>17,760 JPY</td>
								<td>30 mins for 30 day(s)</td>
								<td>60</td>
								<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>バリュープラス</td>
								<td>ESL</td>
								<td>9,700 JPY</td>
								<td>25 min for 30 day(s)</td>
								<td>60</td>
								<td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
							</tr>
							</tbody>
							</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
							
							
						</div>
			
					</div>
				</div>
			</div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>