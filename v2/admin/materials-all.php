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
                <h3>Materials & Lessons</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
				
			<div class="x_panel">
                  <div class="x_title">
                    <h2>Browse Materials</h2>
                    <span class="pull-right"><a href="materials-new.php" class="btn btn-success">Add New Material</a></span>
					<div class="clearfix"></div>
                  </div>
				  
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#material1" data-toggle="tab" aria-expanded="false">ESL - Beginner</a>
                        </li>
                        <li class=""><a href="#material2" data-toggle="tab" aria-expanded="false">ESL - Intermediate</a>
                        </li>
                        <li class=""><a href="#material3" data-toggle="tab" aria-expanded="true">ESL - Advanced</a>
                        </li>
                        <li class=""><a href="#material4" data-toggle="tab" aria-expanded="false">English for Business - Intermediate</a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="material1">
							<h4>ESL - Beginner <small>Browse Materials</small></h4>
							
							<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								  <h4 class="panel-title">Young Learners Series 1 (12)</h4>
								</a>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									<ul class="special">
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Health - Anatomy</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Alphabet</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Numbers</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Colors</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">School Supplies</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Occupations</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Adjectives</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Adjctives and Pronouns</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Pronouns</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Verb</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Verb to be</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Introducing Yourself</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  <h4 class="panel-title">Famous Countries (6)</h4>
								</a>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									<ul class="special">
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 1 - The USA</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 2 - Canada</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 3 - China</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 4 - Japan</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 5 - France</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 6 - South Africa</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								  <h4 class="panel-title">Family, Lifestyle & Travel (5)</h4>
								</a>
								<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
								  <div class="panel-body">
									<ul class="special">
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 1 - House</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 2 - Restaurant</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 3 - Holidays</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 4 - Nature</a></li>
										<li><a href="#" class="fa fa-external-link"></a>&nbsp;&nbsp;<a href="" class="fa fa-edit"></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target=".bs-delete-modal-sm" class="fa fa-trash"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Lesson 5 - Geography</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							</div>
							
							
                        </div>
                        <div class="tab-pane" id="material2">
							<h4>ESL - Intermediate <small>Browse Materials</small></h4>
							<p>Refer to "ESL Beginners Tab" on how the materials are displayed and how the accordions work.</p>
							<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								  <h4 class="panel-title">Holidays & Events (10)</h4>
								</a>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  <h4 class="panel-title">Sports (10)</h4>
								</a>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								  <h4 class="panel-title">Health (10)</h4>
								</a>
								<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							</div>
						</div>
                        <div class="tab-pane" id="material3">
							<h4>ESL - Advanced <small>Browse Materials</small></h4>
							<p>Refer to "ESL Beginners Tab" on how the materials are displayed and how the accordions work.</p>
							<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								  <h4 class="panel-title">Holidays & Events (10)</h4>
								</a>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  <h4 class="panel-title">Sports (10)</h4>
								</a>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								  <h4 class="panel-title">Health (10)</h4>
								</a>
								<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							</div>
						
						</div>
                        <div class="tab-pane" id="material4">
							<h4>English for Business - Intermediate <small>Browse Materials</small></h4>
							<p>Refer to "ESL Beginners Tab" on how the materials are displayed and how the accordions work.</p>
							<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								  <h4 class="panel-title">Holidays & Events (10)</h4>
								</a>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  <h4 class="panel-title">Sports (10)</h4>
								</a>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							  <div class="panel">
								<a class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								  <h4 class="panel-title">Health (10)</h4>
								</a>
								<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true">
								  <div class="panel-body">
									
								  </div>
								</div>
							  </div>
							</div>
						</div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

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

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>