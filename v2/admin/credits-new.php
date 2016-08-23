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
                <h3>Add New Credit</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			<div class="x_panel">
				<div class="x_title">
                    <h2><a href="credits-all.php" class="btn btn-success">View All Credits</a></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Credit Name</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Type</label>
							<div class="col-md-4">
								<select class="form-control">
									<option>Choose option</option>
									<option>ESL</option>
									<option>Business</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Price</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Duration</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Credit Points</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Expiration</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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