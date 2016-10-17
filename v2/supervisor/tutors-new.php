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
                <h3>Add New Tutor</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

				<div class="x_panel">
                  <div class="x_title">
                    <h2>Personal Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
					<div class="row">
						<div class="col-sm-6">
							  <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">First Name <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Last Name <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Skype <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Gender <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
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
						</div>
						<div class="col-sm-6">
							
							  <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Email <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Mobile <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Birthday <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12 active" required="required" type="text">
								</div>
							  </div>

							
						</div>
					</div>
                  </div>
                </div> <!-- end of xpanel -->
				
				
				
				<div class="x_panel">
                  <div class="x_title">
                    <h2>Educational Background and Experience</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
					<div class="row">
						<div class="col-sm-6">
							  <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Highest Educational Level <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <select class="form-control">
									<option>Choose option</option>
									<option>Option one</option>
									<option>Option two</option>
									<option>Option three</option>
									<option>Option four</option>
								  </select>
								</div>
							  </div>
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">School/University <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Self Introduction <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
									<textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="60" rows="5" data-parsley-maxlength="300" data-parsley-minlength-message="Come on! You need to enter at least a 20 characters long introduction.." data-parsley-validation-threshold="20"></textarea>
								</div>
							  </div>
							 
							
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Currently Attending? <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							  </div>
							
							 <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Teachning Experience <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <select class="form-control">
									<option>Choose option</option>
									<option>Option one</option>
									<option>Option two</option>
									<option>Option three</option>
									<option>Option four</option>
								  </select>
								</div>
							  </div>
							 
						</div>
						
			
					</div>
					
                  </div>
                </div> <!-- end of xpanel -->
				
				
				<div class="x_panel">
                  <div class="x_title">
                    <h2>Bank & Technical Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Bank Name <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Bank Branch <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Account Name <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Account Number <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name"></label>
								<div class="col-sm-7 col-xs-12">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Upload Resume <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="file" name="image_file" id="file">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Tutor's Audio <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
								  <input type="file" name="image_file" id="file">
								</div>
							</div>
							  <div class="form-group">
								<label class="control-label col-sm-5 col-xs-12" for="first-name">Profile Picture <span class="required">*</span>
								</label>
								<div class="col-sm-7 col-xs-12">
									<input type="file" name="image_file" id="file">
								</div>
							  </div>
						</div>
					</div>

					
                  </div>
                </div> <!-- end of xpanel -->
				
				
				</form>
              </div>
			
			
            </div>
			<br clear="all" />
		</div>
		
        <!-- /page content -->

<?php 
	include('template/footer.php');
?>