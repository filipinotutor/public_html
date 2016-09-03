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
                <h3>Class Tracker <small>On-Going and Upcoming Classes</small></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>
			
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="#" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></h2>
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>June 30, 2016 - July 29, 2016</span> <b class="caret"></b>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  
				  
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">On-Going Classes <span class="badge bg-orange">25</span></a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Upcoming Classes <span class="badge bg-orange">200</span></a>
						 <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Reports for Submissions <span class="badge bg-red">5</span></a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1">
							 <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6">
							 
							 <div id="datatable_filter" class="dataTables_filter">
								<h4>11:00 - 11:20 Class</h4>
							 </div>
							 
							 </div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
						  <thead>
							<tr role="row">
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Supervisor</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 150px;">Tutor</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Tutor Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Student</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Student Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Lesson</th>
							
							</tr>
						  </thead>


						  <tbody>

							<tr role="row" class="odd">
								<td>Juan De La Cruz</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
								<td>pam.abrugar4</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
								<td>yogi.shuko</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Pedro Kabulong</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
								<td>joyasparo</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
								<td>tsutsui.hajime</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 8 - Lesson on Preposition </a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Pedro Kabulong</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
								<td>allysaafichao</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
								<td>watanabe.hyosuke</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Holidays and Events | Chinese New Year</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Maria Clara</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								<td>ekkai1231</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
								<td>otake.takanobu</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Pedro Kabulong</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Trompeta Andrew Nel</a></td>
								<td>murt.sky</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
								<td>miyake.takao</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Grammar, Writing & Pronunciation | Pronunciation - Warm Ups</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Juan De La Cruz</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
								<td>lemon.llacuna1</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Hata Toshiharu</a></td>
								<td>hata.toshiharu</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process </a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Pedro Kabulong</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Gallardo Renan Mari</a></td>
								<td>renangallardo</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Igarashi Hiroya</a></td>
								<td>igarashi.hiroya</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Business Conversation | Lesson 6 - Various Business Conversation</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Juan De La Cruz</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima Rosario</a></td>
								<td>pam.abrugar4</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Shimoda Motoyuki</a></td>
								<td>shimoda.motoyuki</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Juan De La Cruz</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Amaro Joan May</td>
								<td>joanmayamaro</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yamashiro Takashi</a></td>
								<td>yamashiro.takashi</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Business Management | Managing Communications in a Globalized Business</a></td>
								
							</tr>
							<tr role="row" class="odd">
								<td>Maria Clara</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Reyes Arianne Anna</a></td>
								<td>arianne.anna</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Nakai Tsuruki</a></td>
								<td>nakai.tsuruki</td>
								<td><a href="#"><span class="fa fa-external-link"></span>ESL Advanced - Famouse Cities | Lesson 1 - The Beautiful City of Munich</a></td>
								
							</tr>
							
							
							
							</tbody>
						</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                        
						</div><!-- end of tab1 -->
						
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2">
						
							<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6">
							 
							 <div id="datatable_filter" class="dataTables_filter">
								<h4>Classes to start in 3 hours</h4>
							 </div>
							 
							 </div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
						  <thead>
							<tr role="row">
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Class</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 150px;">Tutor</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Tutor Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Student</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Student Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Lesson</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 30px;">Actions</th>
							</tr>
						  </thead>


						  <tbody>

							<tr role="row" class="odd">
								<td>8:00-8:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
								<td>pam.abrugar4</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
								<td>yogi.shuko</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>8:00-8:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
								<td>joyasparo</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
								<td>tsutsui.hajime</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 8 - Lesson on Preposition </a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>8:00-8:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
								<td>allysaafichao</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
								<td>watanabe.hyosuke</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Holidays and Events | Chinese New Year</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>9:00-9:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								<td>ekkai1231</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
								<td>otake.takanobu</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>9:00-9:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Trompeta Andrew Nel</a></td>
								<td>murt.sky</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
								<td>miyake.takao</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Grammar, Writing & Pronunciation | Pronunciation - Warm Ups</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>9:00-9:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
								<td>lemon.llacuna1</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Hata Toshiharu</a></td>
								<td>hata.toshiharu</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Business Grammar | Lesson 14 - Defining A Process </a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>9:00-9:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Gallardo Renan Mari</a></td>
								<td>renangallardo</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Igarashi Hiroya</a></td>
								<td>igarashi.hiroya</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Business Conversation | Lesson 6 - Various Business Conversation</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>10:20-11:00</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima Rosario</a></td>
								<td>pam.abrugar4</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Shimoda Motoyuki</a></td>
								<td>shimoda.motoyuki</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>10:20-11:00</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Amaro Joan May</td>
								<td>joanmayamaro</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yamashiro Takashi</a></td>
								<td>yamashiro.takashi</td>
								<td><a href="#"><span class="fa fa-external-link"></span>Business Management | Managing Communications in a Globalized Business</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							<tr role="row" class="odd">
								<td>10:20-11:00</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Reyes Arianne Anna</a></td>
								<td>arianne.anna</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Nakai Tsuruki</a></td>
								<td>nakai.tsuruki</td>
								<td><a href="#"><span class="fa fa-external-link"></span>ESL Advanced - Famouse Cities | Lesson 1 - The Beautiful City of Munich</a></td>
								<td><a href="#"><span class="label label-danger">Reassign</span></a></td>
							</tr>
							
							
							
							</tbody>
							</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
							
							
							
                        </div><!-- end of tab2 -->
						
						
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3">
						
							<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6">
							 
							 <div id="datatable_filter" class="dataTables_filter">
								<h4>Remind tutor via skype or phone</h4>
							 </div>
							 
							 </div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
						  <thead>
							<tr role="row">
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">End of Class</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 150px;">Tutor</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Tutor Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 160px;">Student</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Student Skype</th>
							<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;">Phone</th>
							</tr>
						  </thead>


						  <tbody>

							<tr role="row" class="odd">
								<td>8:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
								<td>pam.abrugar4</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Yogi Shuko</a></td>
								<td>yogi.shuko</td>
								<td><a href="#">+639215567786</td>
								
							</tr>
							<tr role="row" class="odd">
								<td>8:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
								<td>joyasparo</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Tsutsui Hajime</a></td>
								<td>tsutsui.hajime</td>
								<td><a href="#">+639215567786</td>
								
							</tr>
							<tr role="row" class="odd">
								<td>8:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
								<td>allysaafichao</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Watanabe Hyosuke</a></td>
								<td>watanabe.hyosuke</td>
								<td><a href="#">+639215567786</td>
								
							</tr>
							<tr role="row" class="odd">
								<td>9:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
								<td>ekkai1231</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Otake Takanobu</a></td>
								<td>otake.takanobu</td>
								<td><a href="#">+639215567786</td>
								
							</tr>
							<tr role="row" class="odd">
								<td>9:20</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Trompeta Andrew Nel</a></td>
								<td>murt.sky</td>
								<td><a href="#"><span class="fa fa-info-circle"></span> Miyake Takao</a></td>
								<td>miyake.takao</td>
								<td><a href="#">+639215567786</td>
								
							</tr>
						
							
							
							
							</tbody>
							</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
                        </div>
						<!-- end of tab3 -->
						
						
                      </div>
                    </div>
					
					
                   
                  </div>
                </div><!-- end of panel -->
				
				
				
				
				
              </div>
		
		
            </div>
            </div>
		</div>

        <!-- /page content -->

<?php 
	include('template/footer.php');
?>