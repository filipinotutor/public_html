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
                <h3>Add New Resource</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			<div class="x_panel">
				<div class="x_title">
                    <h2><a href="resources-admin.php" class="btn btn-success">View All Resources</a></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Resource Name</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Visibile On</label>
							<div class="col-md-5">
								<div class="checkbox">
									<label>
									  <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Admin 
									</label>
								
									<label>
									  <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Students
									</label>
								
									<label>
									  <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Tutors
									</label>
								
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Order</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Upload File</label>
							<div class="col-md-4">
								<input type="file" id="exampleInputFile">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name"></label>
							<div class="col-md-4">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
            </div>
			
			
			</div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>