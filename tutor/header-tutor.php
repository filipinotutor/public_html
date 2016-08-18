<?php  
include("../includes/main_class.php"); 
include("../includes/ValidationClass.php"); 

$page_validate = new validation;
$page_protect = new Main_Class;
// $page_protect->login_page = "login.php"; // change this only if your login is on another page
$page_protect->access_page($_SERVER['PHP_SELF'], "", 2); // change this value to test differnet access levels (default: 1 = low and 10 high)
$page_protect->get_user_info();
$hello_name = ($page_protect->user_first_name != "") ? $page_protect->user_first_name : $page_protect->user;
ini_set("date.timezone", "Asia/Manila"); // set timezone

	if($page_protect->has_profile_tutor($page_protect->user_id)) //if tutor has profile in the 'tutors' table get it
	{
		$page_protect->get_tutor_info($page_protect->user_id);
		$tutor = $page_protect->user_first_name;
	}

if (isset($_GET['action']) && $_GET['action'] == "log_out") {
	$page_protect->log_out(); // the method to log off
}
ini_set('display_errors', '0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type; X-UA-Compatible" content="text/html; charset=UTF-8; IE=edge">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../images/FFlogo.png" />
    <title>FilipinoTutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/fontawesome-stars.css"/>

    <script src="../js/jquery-1.8.2.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	<script src="../js/ajax-jquery-pagination.js"></script>
    <script src="../js/jquery-image-upload.js"></script> <!-- image upload -->
	<script src="../js/moment.min.js"></script> <!-- datepicker for birthday -->
    <script src="../js/jquery.barrating.min.js"></script>

    <script>
		$.fn.editable.defaults.mode = 'inline';
	</script>
	 
	 <!-- x-editable-->
	 <script>   
       $(function(){
          $('#user a').editable({
             url: 'post-tutor-profile.php' 
          });
       });
     </script>
     
    
 <!-- image upload -------------------------------------->
    <script> 
        $(document).ready(function() { 
		//elements
		var progressbox 	= $('#progressbox');
		var progressbar 	= $('#progressbar');
		var statustxt 		= $('#statustxt');
		var submitbutton 	= $("#SubmitButton");
		var myform 			= $("#UploadForm");
		var output 			= $("#output");
		var completed 		= '0%';
		
				$(myform).ajaxForm({
					beforeSend: function() { //brfore sending form
						submitbutton.attr('disabled', ''); // disable upload button
						statustxt.empty();
						progressbox.show(); //show progressbar
						progressbar.width(completed); //initial value 0% of progressbar
						statustxt.html(completed); //set status text
						statustxt.css('color','#000'); //initial color of status text
					},
					uploadProgress: function(event, position, total, percentComplete) { //on progress
						progressbar.width(percentComplete + '%') //update progressbar percent complete
						statustxt.html(percentComplete + '%'); //update status text
						if(percentComplete>50)
							{
								statustxt.css('color','#fff'); //change status text to white after 50%
							}
						},
					complete: function(response) { // on complete
						output.html(response.responseText); //update element with received data
						myform.resetForm();  // reset form
						submitbutton.removeAttr('disabled'); //enable submit button
						progressbox.hide(); // hide progressbar
					}
			});
        }); 

    </script> 
     <!-- audio upload -------------------------------------->
    <script> 
        $(document).ready(function() { 
		//elements
		var progressbox 	= $('#progressbox1');
		var progressbar 	= $('#progressbar1');
		var statustxt 		= $('#statustxt1');
		var submitbutton 	= $("#SubmitButton1");
		var myform 			= $("#UploadForm1");
		var output 			= $("#output1");
		var completed 		= '0%';
		
				$(myform).ajaxForm({
					beforeSend: function() { //brfore sending form
						submitbutton.attr('disabled', ''); // disable upload button
						statustxt.empty();
						progressbox.show(); //show progressbar
						progressbar.width(completed); //initial value 0% of progressbar
						statustxt.html(completed); //set status text
						statustxt.css('color','#000'); //initial color of status text
					},
					uploadProgress: function(event, position, total, percentComplete) { //on progress
						progressbar.width(percentComplete + '%') //update progressbar percent complete
						statustxt.html(percentComplete + '%'); //update status text
						if(percentComplete>50)
							{
								statustxt.css('color','#fff'); //change status text to white after 50%
							}
						},
					complete: function(response) { // on complete
						
						myform.resetForm();  // reset form
						submitbutton.removeAttr('disabled'); //enable submit button
						progressbox.hide(); // hide progressbar
						
						var reponse_content = 	$.parseJSON(response.responseText);
						if(reponse_content.success) {
							output.html(reponse_content.responseTxt); //update element with received data
							$('#modalImageupload1').modal('hide');
							alert(reponse_content.msg);
							}
						else {
							alert(reponse_content.msg);
							}
					}
			});
        }); 

    </script>      
     
	<script>
$(function() {
//$( ".datepickerto" ).datepicker();
//$( ".datepickerto" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
$( ".datepickerto" ).datepicker({
dateFormat: "yy-mm-dd",

/*showOn: "button",
buttonImage: "../img/cal.png",
buttonImageOnly: true,*/
changeMonth: true,
changeYear: true
});

$( ".datepickerfrom" ).datepicker({
dateFormat: "yy-mm-dd",
/*showOn: "button",
buttonImage: "../img/cal.png",
buttonImageOnly: true,*/
changeMonth: true,
changeYear: true
});

});
</script>



 	<script>
		 
		//dropdown fadein 
		$(function() {
			$('.dropdown-toggle').click(function() {
				$(this).dropdown();
			});
		});
		//tooltip
		$(function() {
			var tooltips = $( "[title]" ).tooltip();
			$(function() {
				tooltips.tooltip( "open" );
			});
		});


 		var url = "<?php echo $_SERVER['PHP_SELF']; ?>";

	</script>

	 <?php 

     echo '<script>
			$(function() {
		      $(".example").barrating({
		        theme: "fontawesome-stars",
		        readonly: '; echo $page_protect->get_access_level() == 2 ? "true" : "false";
		        echo'
		      });
		   });
     </script>';

     ?>


    <!-- Le styles -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<link href="../css/img-upload-style.css" rel="stylesheet">
    <link href="../css/res_conf.css" media="screen and (max-width:480px)" rel="stylesheet">
    <link href="../css/over_style.css" rel="stylesheet">

        <style>
.well>p>span{
	white-space:normal;

}
.cont {
    display: block;
	
    }
.rows  {
    display: table-row;
	
    }
.columns {
    display: table-cell;
    padding-right: 5px;
	padding-left: 5px;
	width: 50px;
    }
.columns-time {
    display: table-cell;
    padding-right: 5px;
	padding-left: 5px;
	width: 100px;
    }
 .asterisk{
	  	color:#FF0000;
	  }
 .form-horizontal {
        max-width: 90%;
        padding: 19px 29px 40px;
       /* margin: 0 auto 10px;*/
        background-color: #fff;
        
		border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
				
      }	  
	.radio-table td 
	{
			width:25px;
		}  
	.improvement
	{
		 margin-top:5px !important;
		 margin-bottom:5px !important;
		}	
	
	

   
</style>
</head>

  <body>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse ">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php">FilipinoTutor</a>
    </div>

           <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                      <!--<li><img src="<?php echo $page_protect->tutor_photo; ?>" class="img-rounded" style="width:40px;"  /></li>
                      -->
                   <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><strong><?php echo $hello_name; ?></strong> <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                        <li style="text-align:center; color:#999;"><img src="<?php echo $page_protect->tutor_photo; ?>" class="img-circle" style="width:150px;"  />
                        <br />	
                        <?php echo '<strong>'.$page_protect->user_first_name.' '.$page_protect->user_last_name.'</strong>'; ?>
                        </li>
                        
                         <li class="divider"></li>
                          <!--<li><a href="#"><i class="icon-wrench"></i> Account Settings</a></li>-->
                          <li><a href="profile.php"><i class="icon-user"></i> Edit Profile</a></li>
                          <li class="divider"></li>
                          <li><a href="?action=log_out"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                      </li>
		     </ul>
      		<ul class="nav navbar-nav navbar-right">
            <li class="btn-success" title="Server Time" data-placement="bottom" data-toggle="tooltip" style="padding-right:20px; padding-left:20px;">
                    <?php
						echo '<a href="#" style="color:white">
						<strong class="label-success">'.date('H:i',time()).'</strong>&nbsp;<strong>' ;
						echo date('M d, Y',time()) .'</strong></a>';
						$cnt = $page_protect->get_bookings_cnt();
                    ?>
                </li>
                <li>|</li>
                <li class="label-success"><a title="Recent Bookings" data-placement="bottom" data-toggle="tooltip" href="classes.php" style="color:white;"><i class="glyphicon glyphicon-time"></i><span class="label label-success"><?php echo ''.$cnt;?></span></a></li>
            </ul>
			<?php
				$path_parts = pathinfo($_SERVER['PHP_SELF']);
				$fname= $path_parts['filename'].'.php'; // since PHP 5.2.0

			?>
            <ul class="nav navbar-nav"><li <?php echo $fname=='dashboard.php' ? 'class="active"' : '';?>><a href="dashboard.php"><i class="glyphicon-home glyphicon"></i></a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='classes.php' ? 'class="active"' : '';?>><a href="classes.php">Classes</a></li></ul>
            <ul class="nav navbar-nav"><li <?php echo $fname=='lesson-history.php' ? 'class="active"' : '';?>><a href="lesson-history.php">Lesson History</a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='manage-schedule.php' ? 'class="active"' : '';?>><a href="manage-schedule.php">Manage Schedule</a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='conversions.php' ? 'class="active"' : '';?>><a href="conversions.php">Conversions</a></li></ul>
			<!-- <ul class="nav navbar-nav"><li <?php echo $fname=='materials.php' ? 'class="active"' : '';?>><a href="materials.php">Materials</a></li></ul> -->
			<ul class="nav navbar-nav">
                    <li class="dropdown" >
                      <a href="materials.php?t=4B" class="active"><i class="glyphicon-file glyphicon"></i>Materials</a>
                     
                    </li> 
      		</ul>
      		
          </div><!--/.nav-collapse -->
        </div>
      </nav>

    <div class="container-fluid">
 <?php
/* $notif = $page_protect->get_notification($page_protect->user_id," AND `process_name` = 'student: book class' ",NULL);
	$output = $page_protect->sched_notification_for_tutor($page_protect->user_id);
	if($notif['count'][0] > 0 AND $output['count'][0] == 0){
		echo'
		<div class="row">
            <div class="col-md-12">
            <div class="alert alert-info">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
            	<address>
            	  Good day '.$page_protect->user_first_name.' '.$page_protect->user_last_name.',
            	    <br/>
            	    <p style="margin-left:5em;">
            	    	You have to create your report today. If you failed to create the report within 24 hours vary to the scheduled date of the class, there will be no conversion point that will be granted. To create a report, please proceed to the "Classes" page. Thank you, and have a nice day. 
            	    </p>
            	</address>
            </div>
            </div>
        </div>'; 
    if($output['count'][0] == 0){
    //	$page_protect->notif_seen('student: book class');
    }
    } */
?>
      <div class="row">
        <div class="col-md-3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Today's Class</li>
			  <?php
			  //echo date("G").date("i");
			  $d = date("d");
			  $m = date("m");
			  $y = date("Y");
			  $itcount = 0;
			  	$sql = 'SELECT time, user_id FROM schedules WHERE day="'.$d.'" AND month="'.$m.'" AND year="'.$y.'" AND status="closed" AND approved="yes" AND tutor_id='.$page_protect->user_id.'  ORDER BY time ASC';
				$rsd = mysql_query($sql) or die(mysql_error());
						while($row = mysql_fetch_array($rsd,MYSQL_NUM))
						{
							$page_protect->get_student_info($row[1]);
							$page_protect->get_student_profile($row[1]);
						echo '<li>'.$row[0].' <span style="float:right;"><a href="#myModalClassToday'. $row[1].'" role="button" data-toggle="modal">'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</a></span></li>';
						//echo '<a href="#myModal'. $row[0].'" role="button" class="btn btn-mini" data-toggle="modal">Vew Profile</a></p>'; //view profile
						echo '
						<!-- Modal -->
						<div id="myModalClassToday'. $row[1].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 id="myModalLabel">'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</h4>
						</div>
						<div class="modal-body">
						<img src="'. $page_protect->studentprofile_photo.'" class="img-polaroid pull-left" style="margin-right:20px;" />
						<table class="table table-striped table-hover">
							<tr>
								<td>Nickname</td><td><strong>'.$page_protect->studentprofile_nick_name.'</strong></td>
							</tr>
							<tr>
								<td>Phone</td><td><strong>'.$page_protect->studentprofile_phone.'</strong></td>
							</tr>
							<tr>
								<td>Email</td><td><strong>'.$page_protect->student_email.'</strong></td>
							</tr>
							<tr>
								<td>Skype</td><td><strong>'.$page_protect->student_skype_id.'</strong></td>
							</tr>
							<tr>
								<td>Birthday</td><td><strong>'.$page_protect->studentprofile_birthday.'</strong></td>
							</tr>
						</table>
						
						</div>
						<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</div>
						</div>
						</div>
						</div>
				';
				$itcount++;
						}
						
			  ?>
            </ul>
            <?php
            if($itcount >0){
            echo'
            <a href="classes.php" class="btn btn-small btn-block" type="button">View Classes</a>
          	';
            }
            else{
            	echo'<span class="label label-success">No scheduled class for today.</span>';
            }

          	?>
          </div><!--/.well -->
		   <div class="well sidebar-nav">
			<h4>Resources</h4>
			<ul>
				<li><a href="/guide/pdf/FilipinoTutor.com_Tutors_Guide.pdf">Tutor's System Guide</a></li>
				<li><a href="/guide/pdf/FilipinoTutor.com_Tutoring_Tips.pdf" target="_BLANK">Tutoring Tips</a></li>
				<li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Overview_Training_Part_1.pdf" target="_BLANK">Tutor Overview Training (Part 1)</a></li>
				<li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Overview_Training_Part_2.pdf" target="_BLANK">Tutor Overview Training (Part 2)</a></li>
				<li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_1.pdf">Facts About Japan (Part 1)</a></li>
				<li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_2.pdf">Facts About Japan (Part 2)</a></li>
			</ul>
		  </div>
        </div><!--/span-->