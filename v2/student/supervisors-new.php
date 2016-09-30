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
                <h3>Add New Supervisor</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			<div class="x_panel">
				<div class="x_title">
                    <h2><a href="supervisors-all.php" class="btn btn-success">View All Supervisors</a></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">First Name</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Last Name</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Username</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Password</label>
							<div class="col-md-4">
								<input type="password" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Email</label>
							<div class="col-md-4">
								<input type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Phone</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Skype ID</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Nickname</label>
							<div class="col-md-4">
								<input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Gender</label>
							<div class="col-md-5">
								<div id="gender" class="btn-group" data-toggle="buttons">
									<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
									  <input type="radio" name="gender" value="male" data-parsley-multiple="gender"> &nbsp; Male &nbsp;
									</label>
									<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
									  <input type="radio" name="gender" value="female" data-parsley-multiple="gender"> Female
									</label>
								  </div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="first-name">Birthday</label>
							<div class="col-md-4">
								<input id="birthday" class="date-picker form-control col-md-7 col-xs-12 active" required="required" type="text">
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