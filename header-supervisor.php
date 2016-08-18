<?php include("../includes/ValidationClass.php"); 

$page_validate = new validation;



include("../includes/main_class.php"); 



$page_protect = new Main_Class;

// $page_protect->login_page = "login.php";  change this only if your login is on another page

$page_protect->access_page($_SERVER['PHP_SELF'], "", 9); // change this value to test differnet access levels (default: 1 = low and 10 high)

$page_protect->get_user_info();

$hello_name = ($page_protect->user_first_name != "") ? $page_protect->user_first_name : $page_protect->usename;

/*ini_set('display_errors', '0');
*/
ini_set("date.timezone", "Asia/Manila"); // set timezone



if($page_protect->has_profile_supervisor($page_protect->user_id)) //if tutor has profile in the 'tutors' table get it

	{

		$page_protect->get_supervisor_info($page_protect->user_id);

		

	}



if (isset($_GET['action']) && $_GET['action'] == "log_out") {

	$page_protect->log_out(); // the method to log off	

}

//error_reporting(E_ALL | E_STRICT);

$notif = $page_protect->get_notification($page_protect->user_id,NULL," LIMIT 5");
$cnotif = $page_protect->get_notification_cnt($page_protect->user_id);

?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../images/FFlogo.png" />
    <title>FilipinoTutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

   

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/jquery.1.9.min.js"></script>
    
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	

	<script src="../js/ajax-jquery-pagination.js"></script>
    <script src="../js/jquery-image-upload.js"></script> <!-- image upload -->
    <script src="../js/moment.min.js"></script> <!-- datepicker for birthday -->
    <script src="../js/ckeditor_mat.js"></script>
    <script src="../ckeditor/ckeditor.js"></script> 
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>

    

    <script>

		$.fn.editable.defaults.mode = 'inline';
	</script>
	 
	 <!-- x-editable-->
	 <script>   
       $(function(){
          $('#user a').editable({
             url: 'post-users-profile.php' 
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
<script>
	$(function() {
//$( ".datepickerto" ).datepicker();
//$( ".datepickerto" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
var today = new Date();
var dd = today.getDay();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getYear();
 dd += 1;
if(dd<10) {
	dd='0'+dd
    } 
if(mm<10) {
    mm='0'+mm
} 
today = yyyy+'-'+mm+'-'+dd;
$( ".datepickerto" ).datepicker({
dateFormat: "yy-mm-dd",
/*showOn: "button",
buttonImage: "../img/cal.png",
buttonImageOnly: true,*/
changeMonth: true,
changeYear: true,
minDate: today
});
</script>

<script>		

	// check all checkboxes -----------------------------------

		$(function () {

			$('.checkall').on('click', function () {

				$(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);

			});

		});

		 

		//dropdown fadein ----------------------------------------

		$(function() {

			$('.dropdown-toggle').click(function() {

				$(this).dropdown();

			});

		});

		

		//tooltip ------------------------------------------------

		$(function() {

		var tooltips = $( "[title]" ).tooltip();

		$(document)(function() {

		tooltips.tooltip( "open" );

		})

		});
</script>

    <!-- Le styles -->

    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<link href="../css/img-upload-style.css" rel="stylesheet">
 	<link href="../css/res_conf.css"  media="screen and (max-width:480px)" rel="stylesheet">
	<link href="../css/over_style.css" rel="stylesheet">
    
    <style>

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



			<?php

				$path_parts = pathinfo($_SERVER['PHP_SELF']);

				$fname= $path_parts['filename'].'.php'; // since PHP 5.2.0

			?>

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

	<li class="dropdown <?php if($notif['count'][0] > 0){echo "btn-warning";}else{echo "btn-default";}?>">
        												
        <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
		<span title="Notifications" data-placement="bottom" data-toggle="tooltip" style="text-align:center;color:black;">
			<i class="glyphicon-flag glyphicon"></i>
			<span class="<?php if($notif['count'][0] > 0){echo "label label-warning";}else{echo "label label-info";}?>"><?php echo $cnotif['cnt'];?></span>
		</span>
       </a>

     <ul class="dropdown-menu">
     <li>
     	<p style="text-align:center;color:black;">
	    	<i class="glyphicon glyphicon-user"></i><?php echo "<i class='label label-warning'>".$cnotif['ns']."</i>"; ?>
		   	<i class="glyphicon glyphicon-time"></i><?php echo "<i class='label label-success'>".$cnotif['nb']."</i>"; ?>
		   	<i class="glyphicon glyphicon-file"></i><?php echo "<i class='label alert-error'>".$cnotif['na']."</i>"; ?>
		   	<i class="glyphicon glyphicon-calendar"></i><?php echo "<i class='label label-info'>".$cnotif['us']."</i>"; ?><br/>
	   	</p>
	</li>
	<li class="divider"></li>
    <?php
    for($x=0;$x!=$notif['count'][0];$x++){
    echo '<li>';
    switch ($notif[$x]['p_name']) {
    	case 'new booking':
    		$link ="students.php?t=1B";
    		$icon ="glyphicon-time";
    		$label="label-success";
    		$bg = "bg-success";
        $sname = "new_book";
    		break;
    	case 'new student':
        $link ="students.php?t=1A";
    		$icon ="glyphicon-user";
    		$label="label-warning";
    		$bg = "bg-warning";
        $sname = "new_stud";
    		break;
    	case 'update schedule':
    		$link ="tutors.php?t=2B";
    		$icon ="glyphicon-calendar";
    		$label="label-info";
    		$bg = "bg-info";
        $sname = "up_sched";
    		break;
    	case 'new applicant':
    		
        $link ="applicants.php?t=3A";
        $icon ="glyphicon-file"; 
    		$label="label-danger";
    		$bg = "bg-danger";
        $sname = "new_app";
    		break;
    	default:
    		$icon ="none"; 
    		$label="none";
    		$bg = "bg-default";
    		break;
    	
    }
    
    echo '
    	<form action="'.$link.'" method="POST" >
	      <p style="margin:10px;text-align:center;">
          <input type="hidden" name="pname" value="'.$notif[$x]['p_name'].'" />
    		<button type="submit" name="'.$sname.'" style="border:0;background-color:rgba(0,0,0,0);color:black;" class="">
	               	<i class="glyphicon '.$icon.'"></i>&nbsp;'.ucwords($notif[$x]['p_name']).' <br>
	        		<i class="label '.$label.' " style="font-size:10px;" >'.$notif[$x]['date'].' '.$notif[$x]['time'].'</i>
	        </button>   	
      		</p> 
	    </form>
    	</li>
    	
    	';
    }
    if($icon == ""){
            echo'<li>
            		<p style="text-align:center;">
	               	<span class="label label-warning">No Notification today.</span>
	               	</p> 
           		</li>
            	<li class="divider"></li>
            	';
            }
            ?>
            </ul>
        </li>
		<li >|</li>

	    <li class="divider-vertical"></li>
	    <li><img src="<?php echo $page_protect->sup_photo; ?>" class="img-rounded" style="width:40px;"  /></li>
	    <li class="dropdown" role="dropdown">
	      <a data-toggle="dropdown" class="dropdown-toggle" href="#"><strong><?php echo $hello_name; ?></strong> <b class="caret"></b></a>
	      <ul class="dropdown-menu">
	      <li style="text-align:center; color:#999;"><img src="<?php echo $page_protect->sup_photo; ?>" class="img-circle" style="width:150px;"  />
	      <br />	
	      <?php echo '<strong>'.$page_protect->user_first_name.' '.$page_protect->user_last_name.'</strong>'; ?>
	      </li>
	        <li><a href="profile.php?t=6B"><i class="icon-user"></i> Edit Profile</a></li>
	        <li class="divider"></li>
	        <li><a href="?action=log_out"><i class="icon-off"></i> Logout</a></li>
	      </ul>
	    </li>
	</ul>
            <ul class="nav navbar-nav"><li <?php echo $fname=='dashboard.php' ? 'class="active"' : '';?>><a href="dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='students.php' ? 'class="active"' : ''; if(@$_GET['user'] == 'student'){echo $fname=='deactivated_accounts.php' ? 'class="active"' : '';} echo $fname=='student_schedule.php' ? 'class="active"' : ''; echo $fname=='student_profile.php' ? 'class="active"' : ''; echo $fname=='booklist.php' ? 'class="active"' : '';?>><a href="students.php?t=1A"><img src="../img/icon_users.png" /> Students</a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='tutors.php'  ? 'class="active"' : ''; if(@$_GET['user'] == 'tutor'){echo $fname=='deactivated_accounts.php' ? 'class="active"' : '';}	echo $fname=='tutor_schedule.php'  ? 'class="active"' : '';?> <?php echo $fname=='view_report.php'  ? 'class="active"' : '';?> <?php echo $fname=='tutor_profile.php'  ? 'class="active"' : '';?>><a href="tutors.php?t=2A"><img src="../img/tutors.png" />Tutors</a></li></ul>			<ul class="nav navbar-nav"><li <?php echo $fname=='materials.php' ? 'class="active"' : ''; echo $fname=='bookmaterial.php' ? 'class="active"' : '';?>><a href="materials.php?t=4B"><i class="icon-file icon-white"></i> Materials</a></li></ul>
			
				
				
				<!--<div class="btn-group">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog" ></i> <?php echo $hello_name; ?> <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="#"><i class="icon-wrench"></i> Account Settings</a></li>
				<li><a href="#"><i class="icon-user"></i> Edit Profile</a></li>
				<li class="divider"></li>
				<li><a href="?action=log_out"><i class="icon-off"></i> Logout</a></li>
			</ul>
			</div>-->
          </div><!--/.nav-collapse -->
        </div>
      </nav>

    <div class="container-fluid">
      <div class="row">
<?php
if($fname=="students.php")
{
?>	       
    <div class="col-md-3">
         <div class="well sidebar-nav">
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
				$tab=$_POST['t'];

			 }
			 
			 ?>
							<li <?php echo $tab=='1A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#lA">Student Accounts</a></li>
							<li <?php echo $tab=='1B' ? 'class="active"' : '';?>><a href="students.php?t=1B">New Bookings</a></li>
							<li <?php echo $tab=='1C' ? 'class="active"' : '';?>><a href="students.php?t=1C">Credit Purchases</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
}if($fname=="profile.php")
{
?>	       
    <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='6A' ? 'class="active"' : '';?>><a data-toggle="tab" href="profile.php?t=6A">Account Settings</a></li>
							<li <?php echo $tab=='6B' ? 'class="active"' : '';?>><a data-toggle="tab" href="profile.php?t=6B">Edit Profile</a></li>
							</ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
}
if($fname=="student_profile.php")
{
?>	       
    <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='1A' ? 'class="active"' : '';?>><a href="students.php?t=1A">Student Accounts</a></li>
							<li <?php echo $tab=='1B' ? 'class="active"' : '';?>><a href="students.php?t=1B">New Bookings</a></li>
							<li <?php echo $tab=='1C' ? 'class="active"' : '';?>><a href="students.php?t=1C">Credit Purchases</a></li>
					  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
}
if($fname=="student_schedule.php")
{
?>
    <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">

			 <?php

			 if(isset($_GET['t']))

			 {

			 	$tab=$_GET['t'];

			 }

			 if(isset($_POST['t']))

			 {

			 	$tab=$_POST['t'];

			 }

			 

			 ?>

							<li <?php echo $tab=='1A' ? 'class="active"' : '';?>><a href="students.php?t=1A">Student Accounts</a></li>
							<li <?php echo $tab=='1B' ? 'class="active"' : '';?>><a href="students.php?t=1B">New Bookings</a></li>
							<li <?php echo $tab=='1C' ? 'class="active"' : '';?>><a href="students.php?t=1C">Credit Purchases</a></li>
					  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
}
if($fname=="deactivated_accounts.php")
{
		if($_GET['user'] === 'student'){
?>	       
    <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='1A' ? 'class="active"' : '';?>><a href="students.php?t=1A">Student Accounts</a></li>
							<li <?php echo $tab=='1B' ? 'class="active"' : '';?>><a href="students.php?t=1B">New Bookings</a></li>
							<li <?php echo $tab=='1C' ? 'class="active"' : '';?>><a href="students.php?t=1C">Credit Purchases</a></li>
					  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
		}
}
if($fname=="booklist.php")
{
?>	       
    <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='1A' ? 'class="active"' : '';?>><a href="students.php?t=1A">Student Accounts</a></li>
							<li <?php echo $tab=='1B' ? 'class="active"' : '';?>><a href="students.php?t=1B">New Bookings</a></li>
							<li <?php echo $tab=='1C' ? 'class="active"' : '';?>><a href="students.php?t=1C">Credit Purchases</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
}
if($fname=="tutors.php")
{
?>	       
    <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='2A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2A">Tutor Accounts</a></li>
							<li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2B">Schedule Updates</a></li>
							<li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2C">Reports</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->
<?php
}
if($fname=="tutor_profile.php")
{
?>
   <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='2A' ? 'class="active"' : '';?>><a href="tutors.php?t=2A">Tutor Accounts</a></li>
							<li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a href="tutors.php?t=2B">Schedule Updates</a></li>
							<li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a href="tutors.php?t=2C">Reports</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->

<?php
}
if($fname=="deactivated_accounts.php")
{
	if($_GET['user'] === 'tutor'){
?>
   <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='2A' ? 'class="active"' : '';?>><a href="tutors.php?t=2A">Tutor Accounts</a></li>
							<li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a href="tutors.php?t=2B">Schedule Updates</a></li>
							<li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a href="tutors.php?t=2C">Reports</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->

<?php
	}
}
if($fname=="tutor_schedule.php")
{
?>
   <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='2A' ? 'class="active"' : '';?>><a href="tutors.php?t=2A">Tutor Accounts</a></li>
							<li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a href="tutors.php?t=2B">Schedule Updates</a></li>
							<li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a href="tutors.php?t=2C">Reports</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->

<?php
}
if($fname=="view_report.php")
{
?>
   <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='2A' ? 'class="active"' : '';?>><a href="tutors.php?t=2A">Tutor Accounts</a></li>
							<li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a href="tutors.php?t=2B">Schedule Updates</a></li>
							<li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a href="tutors.php?t=2C">Reports</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->

<?php
}
if($fname=="materials.php")
{
?>	       
        <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='4A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4A">New Material</a></li>
							<li <?php echo $tab=='4B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4B">Vew/Edit Materials</a></li>
						  </ul>
						  
          </div><!--/.well -->
        </div><!--/span-->

<?php
}
if($fname=="bookmaterial.php")
{
?>
        <div class="col-md-3">
          <div class="well sidebar-nav">
		
			 <ul class="nav nav-list" id="myTab">
			 <?php
			 if(isset($_GET['t']))
			 {
			 	$tab=$_GET['t'];
			 }
			 if(isset($_POST['t']))
			 {
			 	$tab=$_POST['t'];
			 }
			 
			 ?>
							<li <?php echo $tab=='4A' ? 'class="active"' : '';?>><a href="materials.php?t=4A">New Material</a></li>
							<li <?php echo $tab=='4B' ? 'class="active"' : '';?>><a href="materials.php?t=4B">Vew/Edit Materials</a></li>
						  </ul>
						  
          </div><!--/.well -->
       </div><!--/span-->
<?php
}
?>