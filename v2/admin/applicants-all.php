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
							
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Email</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100px;">Status</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Actions</th></tr>
                      </thead>


                      <tbody>

                      <tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Airi Satou</td>
                          <td>airi.satou</td>
                          <td>airi.satou@gmail.com</td>
						  <td><span class="label label-danger">Pending</span></td>
                           <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Angelica Ramos</td>
                          <td>angelica.ramos</td>
                          <td>angelica.ramos@gmail.com</td>
						   <td><span class="label label-success">Scheduled</span></td>
                          <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Ashton Cox</td>
                          <td>ashton.cox</td>
                          <td>ashton.cox@yahoo.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
                           <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Bradley Greer</td>
                          <td>bradley.greer</td>
                          <td>bradley.greer@gmail.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
                           <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Brenden Wagner</td>
                          <td>brenden.wagner</td>
                          <td>brenden.wagner@hotmail.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
							 <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Brielle Williamson</td>
                          <td>brielle.2015</td>
                          <td>brielle.willamson@mail.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
                            <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Bruno Nash</td>
                          <td>bruno.nash</td>
                          <td>bruno.nash@gmail.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
                           <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Caesar Vance</td>
                          <td>caesar.vance</td>
                          <td>caesar.vance@yahoo.com</td>
						  <td><span class="label label-danger">Pending</span></td>
                           <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Cara Stevens</td>
                          <td>cara.stevens</td>
                          <td>cara.stevens@hotmail.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
                          <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">2016-02-14 16:08:22</td>
                          <td>Cedric Kelly</td>
                          <td>cedric.kelly</td>
                          <td>cedric.kelly@hotmail.com</td>
						  <td><span class="label label-success">Scheduled</span></td>
                          <td><a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" class="fa fa-newspaper-o"></a>&nbsp;&nbsp;<a href="" class="fa fa-coffee"></a>&nbsp;&nbsp;<a href="" class="fa fa-trash"></a></td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                  </div>
                </div>
              </div>


                  </div>
                
			
			
           </div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>