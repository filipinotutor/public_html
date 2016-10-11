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
          <!-- top tiles -->
          <div class="row tile_count">
			<div class="col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Upcoming Classes</span>
              <div class="count">20</div>
			  <small><a href="tutors-class-upcoming.php"><u>View List</u></a></small>
            </div>
			<div class="col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Today's Classes</span>
              <div class="count">4</div>
				<small><a href="tutors-class-today.php"><u>View List</u></a></small>
            </div>
			<div class="col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Conversions</span>
				<div class="count">40</div>
				<small><a href="tutors-conversions-summary.php"><u>Conversions Summary</u></a></small>
             </div>
			<div class="col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Open Schedules</span>
              <div class="count">12</div>
			  <small><a href="tutors-schedule.php"><u>Manage Schedule</u></a></small>
            </div>
          </div>
          <!-- /top tiles -->
		
		
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<a href="#"><img src="images/banner-knowjapan.jpg" alt="" class="img-responsive" /></a>
			</div>
			<div class="col-sm-4 col-xs-12">
				<a href="#"><img src="images/banner-newtutor.jpg" alt="" class="img-responsive" /></a>
			</div>
			<div class="col-sm-4 col-xs-12">
				<a href="resources-tutors.php"><img src="images/banner-resources.jpg" alt="" class="img-responsive" /></a>
			</div>
		</div>
         
		<br />

		<div class="row"><!-- start of row -->

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel tile fixed_height_340">
                <div class="x_title">
                  <h2>Today's Class</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
					<thead>
						<tr role="row">
							<th class="sorting" style="width: 80px;">Date</th>
							<th class="sorting" style="width: 80px;">Time</th>
							<th class="sorting" style="width: 80px;">Student</th>
							<th class="sorting" style="width: 80px;">Class Type</th>
						</tr>
					</thead>
					<tbody>

					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>8:00-8:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
					  <td>ESL</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>9:00-9:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
					  <td>ESL</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>10:20-11:00</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
					  <td>Business</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>11:00-11:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
					  <td>Business</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>13:00-13:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
					  <td>ESL</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>16:00-16:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
					  <td>Business</td>
					</tr>
					</tbody>
					</table>
					<a href="#" class="btn btn-sm btn-success">View All</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel tile fixed_height_340">
                <div class="x_title">
                  <h2>Upcoming Classes</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
					<thead>
						<tr role="row">
							<th class="sorting" style="width: 80px;">Date</th>
							<th class="sorting" style="width: 80px;">Time</th>
							<th class="sorting" style="width: 80px;">Student</th>
							<th class="sorting" style="width: 80px;">Class Type</th>
						</tr>
					</thead>
					<tbody>

					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>8:00-8:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
					  <td>ESL</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>9:00-9:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
					  <td>ESL</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>10:20-11:00</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
					  <td>Business</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>11:00-11:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
					  <td>Business</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>13:00-13:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
					  <td>ESL</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="sorting_1">July 25</td>
					  <td>16:00-16:20</td>
					  <td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
					  <td>Business</td>
					</tr>
					</tbody>
					</table>
					<a href="#" class="btn btn-sm btn-success">View All</a>
                </div>
              </div>
            </div>

		</div><!-- start of row -->
		
		<div class="row"><!-- start of row -->

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Class History</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<table id="datatable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="datatable_info">
					  <thead>
						<tr role="row">
							<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Date</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Time</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Student</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Material</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Attendance</th>
						</tr>
					  </thead>
					  <tbody>
						<tr role="row" class="odd">
							<td>July 24</td>
							<td>9:00-9:20</td>
							<td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
							<td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
							<td><span class="label label-danger">Absent</span></td>
						</tr>
						<tr role="row" class="odd">
							<td>July 24</td>
							<td>10:00-10:20</td>
							<td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
							<td><a href="#"><span class="fa fa-external-link"></span> Holidays and Events | Chinese New Year</a></td>
							<td><span class="label label-success">Present</span></td>
						</tr>
						<tr role="row" class="odd">
							<td>July 23</td>
							<td>12:00-12:20</td>
							<td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
							<td><a href="#"><span class="fa fa-external-link"></span> Business Grammar | Lesson 14 - Defining A Process</a></td>
							<td><span class="label label-success">Present</span></td>
						</tr>
						<tr role="row" class="odd">
							<td>July 23</td>
							<td>16:00-16:20</td>
							<td><a href="#" target="_BLANK"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
							<td><a href="#"><span class="fa fa-external-link"></span> Business Grammar | Lesson 14 - Defining A Process</a></td>
							<td><span class="label label-success">Present</span></td>
						</tr>
						</tbody>
					</table>
					<a href="#" class="btn btn-sm btn-success">View All</a>
                </div>
              </div>
            </div>
	
         
		</div><!-- end of row -->
		  
		  
          </div>
        </div>
        <!-- /page content -->

<?php 
	include('template/footer.php');
?>