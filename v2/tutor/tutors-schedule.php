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
                <h3>Manage Schedule</h3>
              </div>

              <div class="title_right">
					
              </div>
            </div>
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add/Edit Class Schedule</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<div class="col-md-12">
						<ul class="pagination">
							<li class="pages">
								<a href="?day=26&amp;month=9&amp;year=2016&amp;">
									« previous week
								</a>
							</li>
							<li class="pages active">
								<a href="/tutor/manage-schedule.php">
									Oct 03-Oct 09,2016
								</a>
							</li> 
							<li class="pages">
								<a href="?day=10&amp;month=10&amp;year=2016&amp;">
									next week »
								</a>
							</li>
						</ul>
						<button class="btn btn-primary pull-right" type="submit" name="send" value="Save">
						<i class="glyphicon-ok-sign glyphicon"></i> Update</button>
					</div>
					<table id="sched-calendar" class="table table-striped table-bordered table-hover" width="95%">
                    <tbody><tr>
        <td>Week 2 of 6</td><th style="text-align:center;">October 3<br>(MON)</th><th style="text-align:center;">October 4<br>(TUE)</th><th style="text-align:center;">October 5<br>(WED)</th><th style="background:#ffeedd; text-align:center;">October 6<br><strong>(THU)</strong></th><th style="text-align:center;">October 7<br><strong>(FRI)</strong></th><th style="text-align:center;">October 8<br><strong>(SAT)</strong></th><th style="text-align:center;">October 9<br><strong>(SUN)</strong></th></tr><tr></tr><tr><td style="text-align:center;"><b>6:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="6:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="6:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>6:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="6:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="6:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>7:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="7:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="7:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>7:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="7:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="7:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>8:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="8:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="8:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>8:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="8:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="8:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>9:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="9:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="9:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="9:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="9:00&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="9:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="9:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="9:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="9:00&amp;6&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal2959007102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal2959007102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal2959008102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal2959008102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="9:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="9:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>9:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="9:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="9:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="9:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="9:30&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="9:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="9:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="9:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="9:30&amp;6&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal2959307102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal2959307102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal2959308102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal2959308102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="9:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="9:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>10:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="10:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="10:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="10:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="10:00&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="10:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="10:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="10:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="10:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal29510007102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal29510007102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal29510008102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal29510008102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="10:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="10:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>10:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="10:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="10:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="10:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="10:30&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="10:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="10:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="10:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="10:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal29510307102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>yhuan</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal29510307102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">yhuan hanz</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>hanzyhuan24@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"><li class="list-group-item"> <p>Christmas </p><h6>(15 Sep 16 10:00 AM)</h6> <a href="#111" data-toggle="collapse"> View more </a> <p></p><div id="111" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                3 <br>3<br>3<br>3<br>3
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Things about Christmas. <br>
                                                    <b>Vocabulary Review: </b>Holidays
Christmas
Snowman 
Bells
Season
 <br>
                                                    <b>Remarks: </b>Student is good.
 <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(16 Aug 16 04:30 PM)</h6> <a href="#106" data-toggle="collapse"> View more </a> <p></p><div id="106" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>school supplies <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Pronouns </p><h6>(08 Aug 16 09:00 AM)</h6> <a href="#99" data-toggle="collapse"> View more </a> <p></p><div id="99" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of Pronoun <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Colors </p><h6>(08 Aug 16 01:30 PM)</h6> <a href="#96" data-toggle="collapse"> View more </a> <p></p><div id="96" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   disapproved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>colors <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>School Supplies </p><h6>(03 Aug 16 09:00 AM)</h6> <a href="#94" data-toggle="collapse"> View more </a> <p></p><div id="94" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>Different kinds of School supplies
 <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb to be </p><h6>(03 Aug 16 02:30 PM)</h6> <a href="#103" data-toggle="collapse"> View more </a> <p></p><div id="103" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor JHOY
                                                   <br>
                                                   absent
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                 <br><br><br><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>be verbs <br>
                                                    <b>Vocabulary Review: </b> <br>
                                                    <b>Remarks: </b> <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li><li class="list-group-item"> <p>Verb </p><h6>(02 Aug 16 01:00 PM)</h6> <a href="#93" data-toggle="collapse"> View more </a> <p></p><div id="93" class="collapse"><hr><div>
                                            <div class="row text-left">
                                                <div class="col-md-2 col-xs-2">
                                                <strong>Tutor: </strong>
                                                <br>
                                                <strong>Attendance: </strong>
                                                <br>
                                                <strong>Status: </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                   Tutor Joy
                                                   <br>
                                                   present
                                                   <br>
                                                   approved
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <strong>
                                                    Reading: 
                                                    <br>
                                                    Listening:
                                                    <br>
                                                    Vocabulary:
                                                    <br>
                                                    Pronunciation:
                                                    <br>  
                                                    Grammar:
                                                    <br>
                                                    </strong>
                                                </div>
                                                <div class="col-md-1 col-xs-1">
                                                5 <br>5<br>5<br>5<br>5
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-left">
                                                    <b>Material Covered: </b>kinds of verb
 <br>
                                                    <b>Vocabulary Review: </b>circling
do
did
does
 <br>
                                                    <b>Remarks: </b>Student is a beginner but he did great in this session. <br>
                                                </div>
                                            </div>
                                        <div></div></div></div></li></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="10:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="10:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="10:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="10:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>11:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="11:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="11:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="11:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="11:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="11:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;7&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="11:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;8&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="11:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="11:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>11:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="11:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="11:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="11:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="11:30&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="11:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="11:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="11:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="11:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><span style="color:red; padding-left:5px;padding-right:5px;"><a href="#myModal33011307102016" role="button" class="btn btn-xs btn-success" data-toggle="modal" title="" data-original-title="View Details"><strong>Sui</strong></a></span>    
                        <!-- Modal -->
                          <div id="myModal33011307102016" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="myModalLabel">Sui Chin</h4>
                        </div>
                        <div class="modal-body">

                        <img src="../pictures/noimg.gif" class="img-polaroid pull-left" style="margin-right:20px;">
                        <table cellpadding="5px">
                            <tbody><tr>
                                <td>Nickname:  </td><td><strong>MyNickname</strong></td>
                            </tr>
                            <!-- <tr>
                                <td>Phone</td><td><strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td><td><strong>chinsui2429@gmail.com</strong></td>
                            </tr>
                            -->
                            <tr>
                                <td>Skype: </td><td><strong>jhoy2999</strong></td>
                            </tr>
                            <!--
                            <tr>
                                <td>Birthday</td><td><strong></strong></td>
                            </tr>
                            -->
                        </tbody></table>
                        <br>
                        <br>
                            <div class="container-fluid" style="margin-top: 100px;"><div class="row"><div class="panel panel-primary"><div class="panel panel-heading">Class History</div><div class="panel-body"><ul class="list-group"></ul></div></div></div></div>
                        </div>
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="col-md-4"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button></div>
                            </div>
                        </div>
                        </div>
                                                                                        </div>
                                                                                        </div>
                </td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="11:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="11:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="11:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="11:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>12:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="12:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="12:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>12:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="12:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="12:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>13:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="13:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="13:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>13:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="13:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="13:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="13:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="13:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="13:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="13:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>14:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="14:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="14:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="14:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="14:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="14:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="14:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="14:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="14:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>14:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="14:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="14:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="14:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="14:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="14:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="14:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="14:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="14:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>15:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%; background-color:green; color:white;"><option value="15:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;4&amp;10&amp;2016&amp;open" selected="">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="15:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="15:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="15:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="15:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>15:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="15:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="15:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>16:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="16:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="16:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>16:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="16:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="16:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>17:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="17:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="17:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>17:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="17:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="17:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>18:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="18:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="18:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>18:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="18:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="18:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>19:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="19:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="19:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>19:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="19:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="19:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>20:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="20:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="20:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>20:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="20:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="20:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>21:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="21:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="21:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>21:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="21:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="21:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>22:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="22:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="22:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>22:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="22:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="22:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>23:00</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="23:00&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="23:00&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr><tr><td style="text-align:center;"><b>23:30</b></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;3&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;3&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;4&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;4&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;5&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;5&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" disabled="" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;6&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;6&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;7&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;7&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;8&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;8&amp;10&amp;2016&amp;open">Open</option></select></td><td style="text-align:center;"><select name="hoursselected[]" class="selectBox-cal" style="width:98%;"><option value="23:30&amp;9&amp;10&amp;2016&amp;n/a">-</option><option value="23:30&amp;9&amp;10&amp;2016&amp;open">Open</option></select></td></tr>
                            </tbody></table>
					
                  </div>
                </div><!-- end of panel -->
				
				<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">View/Edit Student Profile</h4>
                        </div>
						
						
                        <div class="modal-body">
							<div class="row">
								<div class="col-sm-2">
									<img src="./images/profilepic.jpg" class="img-responsive" />
								</div>
								<div class="col-sm-6">
									<h4>Tsutsui Hajime</h4>
									<p>
										<b>Student ID:</b> F44331<br />
										<b>Member Since:</b> August 20, 2016<br />
										<b>Credits:</b><br />
										- 20 Credits ( Business )<br />
										- 15 Credits ( ESL )<br />
										<a href="#" class="btn btn-xs btn-info">Edit Profile</a>
										<a href="#" class="btn btn-xs btn-danger">Deactivate Account</a>
									</p>
									
								</div>
							</div>
							<div class="x_content">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
								  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="tab-profile" role="tab" data-toggle="tab" aria-expanded="true">Account & Profile</a></li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="tab-schedule" data-toggle="tab" aria-expanded="false">Schedule & Bookings</a></li>
									<li role="presentation" class=""><a href="#tab_content3" role="tab" id="tab-history" data-toggle="tab" aria-expanded="false">Class History</a></li>
									<li role="presentation" class=""><a href="#tab_content4" role="tab" id="tab-credits" data-toggle="tab" aria-expanded="false">Credit Purchases</a></li>
								  </ul>
								  <div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
										<form class="form-horizontal form-label-left input_mask">
										<div class="row">
											<div class="col-sm-6">
												<h4>Personal Information</h4>
												<hr />
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">First Name </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="Tsutsui" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Last Name </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="Hajime" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Gender </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<select class="form-control" disabled="disabled">
															<option>Male</option>
															<option>Female</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Skype ID </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="tsutsui.hajime" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Mobile </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="+639154718843" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Birthday </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="09/08/1985"  />
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<h4>Account Information</h4>
												<hr />
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Username </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="text" class="form-control" disabled="disabled" value="tsutsui.hajime" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Password </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="password" class="form-control" disabled="disabled" value="33333" />
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3 col-xs-12">Email </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
														<input type="email" class="form-control" disabled="disabled" value="tsutsui.hajime@gmail.com" />
													</div>
												</div>
											</div>
										</div>
										</form>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
										<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										
										<div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"></div></div>
										
										<div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
										  <thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Date</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Time</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Tutor</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;">Material</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 40px;">Status</th>
											</tr>
										  </thead>

										  <tbody>
											<tr role="row" class="odd">
											  <td class="sorting_1">July 25</td>
											  <td>11:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-success">Upcoming</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 25</td>
											  <td>9:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Asparo Lea Joy</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Holidays and Events | Chinese New Year</a></td>
											  <td><span class="label label-success">Upcoming</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 24</td>
											  <td>22:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-success">Upcoming</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 24</td>
											  <td>22:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Afidchao Allysa Julienne</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Grammar, Writing & Pronunciation | Pronunciation - Warm Ups</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 24</td>
											  <td>21:30</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
											 <td><a href="#"><span class="fa fa-external-link"></span> Business Grammar | Lesson 14 - Defining A Process</a></td>
											 <td><span class="label label-default">Completed</span></td>
											</tr>
											<tr role="row" class="even">
											  <td class="sorting_1">July 24</td>
											  <td>18:30</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 24</td>
											  <td>18:30</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Gabriel Ericca</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 23</td>
											  <td>11:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="odd">
											  <td class="sorting_1">July 23</td>
											  <td>11:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Llacuna Lemon</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> Business Management | Managing Communications in a Globalized Business</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr><tr role="row" class="even">
											  <td class="sorting_1">July 22</td>
											  <td>11:00</td>
											  <td><a href="#"><span class="fa fa-info-circle"></span> Abrugar Fatima</a></td>
											  <td><a href="#"><span class="fa fa-external-link"></span> ESL Advanced - Famouse Cities | Lesson 1 - The Beautiful City of Munich</a></td>
											  <td><span class="label label-default">Completed</span></td>
											</tr></tbody>
										</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
									</div>
									
									<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
									
										<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
										  <thead>
											<tr role="row">
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Date</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Time</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Tutor</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Material</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Evaluation</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 50px;">Attendance</th>
											</tr>
										  </thead>
										  <tbody>
											<tr role="row" class="odd">
												<td>July 24</td>
												<td>16:08:22</td>
												<td>Airi Satou</td>
												<td><a href="#"><span class="fa fa-external-link"></span> Young Learners Series 2 | Lesson 1 - Lesson on Numbers</a></td>
												<td>She is a new student but has knowledge on basic grammar.</td>
												<td><span class="label label-danger">Absent</span></td>
											</tr>
											<tr role="row" class="odd">
												<td>July 24</td>
												<td>16:08:22</td>
												<td>Airi Satou</td>
												<td><a href="#"><span class="fa fa-external-link"></span> Holidays and Events | Chinese New Year</td>
												<td>Needs to start on alphabets again.</a></td>
												<td><span class="label label-success">Present</span></td>
											</tr>
											<tr role="row" class="odd">
												<td>July 23</td>
												<td>16:08:22</td>
												<td>Ashton Cox</td>
												<td><a href="#"><span class="fa fa-external-link"></span> Business Grammar | Lesson 14 - Defining A Process</td>
												<td>Lesson ended up well.</a></td>
												<td><span class="label label-success">Present</span></td>
											</tr>
											<tr role="row" class="odd">
												<td>July 23</td>
												<td>16:08:22</td>
												<td>Bradley Greer</td>
												<td><a href="#"><span class="fa fa-external-link"></span> Business Grammar | Lesson 14 - Defining A Process</td>
												<td>Student is responsive and loves to talk about her hobbies.</a></td>
												<td><span class="label label-success">Present</span></td>
											</tr>
											</tbody>
										</table>

									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
									
										<table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
										  <thead>
											<tr role="row">
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Date/Time</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 200px;">Credit Package / Type</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Price</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 100px;">Credit Points</th>
												<th class="sorting" tabindex="0" aria-controls="datatable" style="width: 110px;">Expiration</th>
											</tr>
										  </thead>
										  <tbody>
											<tr role="row" class="odd">
												<td>2016-02-14 16:08:22</td>
												<td>スターター<span class="label label-info">ESL</span></td>
												<td>4,200 JPY</td>
												<td>14</td>
												<td>2016-02-14 16:08:22</td>
											</tr>
											<tr role="row" class="odd">
												<td>2016-02-14 16:08:22</td>
												<td>バリュープラス <span class="label label-info">ESL</span></td>
												<td>9,700 JPY</td>
												<td>30</td>
												<td>2016-02-14 16:08:22</td>
											</tr>
											<tr role="row" class="odd">
												<td>2016-02-14 16:08:22</td>
												<td>スターター<span class="label label-info">ESL</span></td>
												<td>4,200 JPY</td>
												<td>14</td>
												<td>2016-02-14 16:08:22</td>
											</tr>
											<tr role="row" class="odd">
												<td>2016-02-14 16:08:22</td>
												<td>スターター<span class="label label-info">ESL</span></td>
												<td>4,200 JPY</td>
												<td>14</td>
												<td>2016-02-14 16:08:22</td>
											</tr>
											</tbody>
										</table>
			
									</div>
								  </div>
								</div>
							</div>
		                </div>
						
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                      </div>
                    </div>
                 
				
              </div><!-- end of modal -->


                  </div>
                
				
				</div>
              </div>
            </div>
            </div>
		</div>
		   
<?php 
	include('template/footer.php');
?>