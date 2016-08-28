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
                <h3>Resources for Students</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Guides & Resources for students.</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

						
						<div class="col-md-55">
							<div class="thumbnail">
							  <div class="image view view-first">
								<img style="width: 100%; display: block;" src="images/student-start-guide.jpg" alt="image">
								<div class="mask no-caption">
								  <div class="tools tools-bottom">
									<a href="#"><i class="fa fa-link"></i> <small>View</small></a>
									
								  </div>
								</div>
							  </div>
							  <div class="caption">
								<p><b>Student Start Guide</b></p>
								<p>For new students on how to book and start a class. </p>
							  </div>
							</div>
						</div>
						
						<div class="col-md-55">
							<div class="thumbnail">
							  <div class="image view view-first">
								<img style="width: 100%; display: block;" src="images/student-system-guide.jpg" alt="image">
								<div class="mask no-caption">
								  <div class="tools tools-bottom">
									<a href="#"><i class="fa fa-link"></i> <small>View</small></a>
									
								  </div>
								</div>
							  </div>
							  <div class="caption">
								<p><b>Student System Guide</b></p>
								<p>Student guide on how to use the system.</p>
							  </div>
							</div>
						</div>
						
						
						
                    </div>
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