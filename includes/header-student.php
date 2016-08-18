<?php 

include("../includes/main_class.php"); 

$page_protect = new Main_Class;

// $page_protect->login_page = "login.php"; // change this only if your login is on another page

$page_protect->access_page($_SERVER['PHP_SELF'], $_SERVER['QUERY_STRING'], 1); // change this value to test differnet access levels (default: 1 = low and 10 high)

$page_protect->get_user_info();

ini_set("date.timezone", "Asia/Manila"); // set timezone 


 
//       get student info----------



	$page_protect->get_student_info($page_protect->user_id); //from users table

	if($page_protect->has_profile_student($page_protect->user_id))

	{

		$page_protect->get_student_profile($page_protect->user_id);	//from students table

		$userid = $page_protect->user_id;
		$check = $page_protect->check_credit_exp();
		$t_credits = $page_protect->get_total_student_credit();
	}





$hello_name = ($page_protect->user_first_name != "") ? $page_protect->user_first_name : $page_protect->user;



if (isset($_GET['action']) && $_GET['action'] == "log_out") {

	$page_protect->log_out(); // the method to log off

}

ini_set('display_errors', '0');


$lang = $_SESSION['lang'];

if($lang == "en" || $lang == ''){
	$dashboard = "Dashboard";
	$class_schedule = "Class Schedule";
	$class_history = "Class History";
	$credit_points = "Credit Points";
	$materials = "Materials";
	$book_class = "Book Class";
	$today_class = "Today's Class";
	$total_credits = "Total Credits";
	$account_summary = "Account Summary";
	$buy_credits = "Buy Credits";
	$pricing_package = "Pricing Package";

} else if($lang == "jp"){
	$dashboard = "ダッシュボード";
	$class_schedule = "クラスを予約する";
	$class_history = "あなたのクラス記録";
	$credit_points = "クレジット ポイント";
	$materials = "Materials";
	$book_class = "クラスを予約する";
	$today_class= '今日のクラス';
	$total_credits = 'トータル クレジット';
	$account_summary = "アカウント 要約";
	$buy_credits = "クレジットを購入する";
	$pricing_package = "パッケージのお値段";
}


if(isset($_POST['lang'])){
	
	$lang = $_POST['lang'];
	$_SESSION['lang'] = $lang;

	if($lang == "en"){
		$dashboard = "Dashboard";
		$class_schedule = "Class Schedule";
		$class_history = "Class History";
		$credit_points = "Credit Points";
		$materials = "Materials";
		$book_class = "Book Class";
		$today_class = "Today's Class";
		$total_credits = "Total Credits";
		$account_summary = "Account Summary";
		$buy_credits = "Buy Credits";
		$pricing_package = "Pricing Package";

	} else if($lang == "jp"){
		$dashboard = "ダッシュボード";
		$class_schedule = "クラスを予約する";
		$class_history = "あなたのクラス記録";
		$credit_points = "クレジット ポイント";
		$materials = "Materials";
		$book_class = "クラスを予約する";
		$today_class= '今日のクラス';
		$total_credits = 'トータル クレジット';
		$account_summary = "アカウント 要約";
		$buy_credits = "クレジットを購入する";
		$pricing_package = "パッケージのお値段";
	}
}

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



	 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
	<script src="../js/ajax-jquery-pagination.js"></script>
    <script src="../js/jquery-image-upload.js"></script> <!-- image upload -->
    <script src="../js/moment.min.js"></script> <!-- datepicker for birthday -->

        <script>

			$.fn.editable.defaults.mode = 'inline';

		</script>

	 

	 <!-- x-editable-->

	 <script>   

       $(function(){

          $('#user a').editable({

             url: 'post-student-profile.php' 

          });

       });

     </script>

     
<!-- ----Madal For smaller Devices ------ -->

 <!-- image upload -------------------------------------->

    <script> 

        $(document).ready(function() { 

		var progressbox 	= $('#progressbox');

		var progressbar 	= $('#progressbar');

		var statustxt 		= $('#statustxt');

		var submitbutton 	= $("#SubmitButton");

		var myform 			= $("#UploadForm");

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

						output.html(response.responseText); //update element with received data
						console.log(response.responseText);

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

		/*$(document)(function() {

		tooltips.tooltip( "open" );

		})*/

		});


		

		

		//nav

		$(function() {

			$('.navli').hover(function() {

				$(this).next('.navli').fadeToggle(500);

			});

		});

	</script>





	<script>	
	$('.nav').hover(function () {

		$('.nav').fadeIn(1000);

	}, function () {

		$('.nav').delay(1000).fadeOut();

	});
	</script>	

	

   



    <!-- styles -->

    <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<link href="../css/img-upload-style.css" rel="stylesheet">
    <link href="../css/res_conf.css" media="screen and (max-width:480px)" rel="stylesheet">
	<link href="../css/over_style.css" rel="stylesheet">
    

    <style>
     .checkbox input[type='checkbox']{
  position:relative !important;
 }
  .nav-collapse .open > .dropdown-menu {

    display: block;

  }
@media(min-width: 980px) and (max-width: 1180px){
	.nav-collapse .nav>li>span, 
	.nav-collapse .nav>li>a{
		padding:10px;
		font-size:12px;
		text-align: left;
	}
		.nav-collapse .nav>li>img{
			display:none;
		} 

	.navbar-inner>.container-fluid>.brand{
		padding:10px;
		
	}
}
@media (min-width: 1180px){
	.nav-collapse .nav>li>span
	{
		padding-left: 20px;
		padding-right: 20px;
	}
}
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

	  



/* pagination style */



/*

a

{

text-decoration:none;

color:#B2b2b2;



}



a:hover

{



color:#DF3D82;

text-decoration:underline;



}

#loading { 

width: 100%; 

position: absolute;

}



#pagination

{

text-align:center;

margin-left:120px;



}

#pagination li{	

list-style: none; 

float: left; 

margin-right: 16px; 

padding:5px; 

border:solid 1px #dddddd;

color:#0063DC; 

}*/



#loading { 

width: 100%; 

position: absolute;

}



#calloader, #cheadloader { 

width: 100%; 

position: absolute;

}



li.pages:hover

{ 

color:#FF0084; 

cursor: pointer; 

}

li.bc:hover{
	color:white;
}

/* pagination style */	

   }

</style>

</head>
  <body>

			<?php
				$cnt = $page_protect->get_bookings_cnt();
				$path_parts = pathinfo($_SERVER['PHP_SELF']);
				$fname= $path_parts['filename'].'.php'; // since PHP 5.2.0
			?>
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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $page_protect->user_first_name;?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li ><a href="profile.php">
            	<img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-circle" style="width:150px;"  />
            	<br />	
                <?php echo '<strong>'.$page_protect->user_first_name.' '.$page_protect->user_last_name.'</strong>'; ?>
            	</a>
            </li>
            <li class="divider"></li>
            <li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> Edit Profile</a></li>
            <li class="divider"></li>
            <li><a href="?action=log_out"><i class="glyphicon glyphicon-off"></i> Logout</a></li>

          </ul>
        </li>
        <li>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="lang">
        	<div style="padding-top:8px;">
			  <select name="lang" class="form-control" id="sel1" onchange="this.form.submit()">
			    <option value="en" <?php echo $_SESSION['lang'] == 'en' ? 'selected' : ''; ?> >En</option>
			    <option value="jp" <?php echo $_SESSION['lang'] == 'jp' ? 'selected' : ''; ?> >Jp</option>
			  </select>
			</div>
		</form>
        </li>
      </ul>
      		<ul class="nav navbar-nav navbar-right">
                    <li  class=" btn-success" title="Server Time" data-placement="bottom" data-toggle="tooltip"  >
                   <a href="#" style="color:white;">
                    <?php
						echo '<span class="label label-success">'.date('H:i',time())."</span>&nbsp;<strong>". date('M d, Y',time()) ."</strong>" ;
                    ?>
                    </a>
                   </li>
            </ul>
            <ul class="nav navbar-nav"><li <?php echo $fname=='dashboard.php' ? 'class="active"' : '';?>><a id="dashboard" title="Dashboard" data-placement="bottom" data-toggle="tooltip" href="dashboard.php"><i class="glyphicon-home glyphicon"></i>&nbsp; <?php  echo $dashboard; ?></a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='class-schedule.php' ? 'class="active"' : '';?>><a title="Class Schedule" data-placement="bottom" data-toggle="tooltip" href="class-schedule.php"><i class="glyphicon-time glyphicon"></i>&nbsp; <?php  echo $class_schedule; ?></a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='class-history.php' ? 'class="active"' : '';?>><a title="Class History" data-placement="bottom" data-toggle="tooltip" href="class-history.php"><i class="glyphicon-calendar glyphicon"></i>&nbsp; <?php  echo $class_history; ?></a></li></ul>
			<ul class="nav navbar-nav"><li <?php echo $fname=='credits.php' ? 'class="active"' : '';?>><a title="Credit Points" data-placement="bottom" data-toggle="tooltip" href="credits.php"><i class="glyphicon-briefcase glyphicon"></i>&nbsp; <?php  echo $credit_points; ?></a></li></ul>
			<ul class='nav navbar-nav'>
				<li class='dropdown <?php echo $fname=='materials.php' ? 'active' : ''; ?>' >
					<?php 
						if($t_credits->isNotTrial){
							echo "<a id='materials' href='materials.php?t=4B'><i class='glyphicon-file glyphicon'></i>". $materials ."</a>";	
						}
					?>
				</li>
			</ul>
			<ul class="nav navbar-nav"><li  class="<?php echo $fname=='book-classes.php' ? 'active' : 'btn-primary';?> bc"><a href="book-classes.php" style="color:white;"><i class="glyphicon glyphicon-plus-sign"></i><b style="color:white">&nbsp; <?php  echo $book_class; ?></b></a></li></ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">
<?php
$notif = $page_protect->get_notification($page_protect->user_id," AND `process_id` =".$page_protect->user_id." ",NULL);
	for($y=0;$y!=$notif['count'][0];$y++){

	 if($notif[$y]['p_name'] == 'welcome note'){
		echo'<div class="row">
            <div class="col-md-12">
             <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <address>
              <h4>
                Welcome <strong>'.$page_protect->user_first_name.' '.$page_protect->user_last_name.'</strong>,
                <br/>
                <p style="margin-left:5em;">
                We are glad that you are now part of <strong>FilipinoTutor.com</strong>. 
                <ul>
                <li>You have a two free credits that you can use to book two classes.</li>
                <li>You can click the <span style="color:white;padding:5px; font-size:10px;" class="btn-primary">
                  <strong>
                    <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;クラスを予約する
                  </strong>
                </span>&nbsp;button on the top to start.
                </li>
                </ul>
                </p>
             </h4>
             </address>
             </div>
             </div>
        </div>'; 
        $page_protect->notif_seen("welcome note");
		}
		if($notif[$y]['p_name'] == 'student: book class'){
		echo'<div class="row">
            <div class="col-md-12">
             <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <address>
              <h4>
                Congratulations <strong>'.$page_protect->user_first_name.' '.$page_protect->user_last_name.'</strong>:
                <br/>
                <span style="margin-left:5em;">
                You have successfully booked your class. Please take note of your class schedule or check it on the class schedule tabs
             	</span>
             </h4>
             </address>
             </div>
             </div>
        </div>';	
        $page_protect->notif_seen("student: book class");
		}

    }
?>
      <div class="row">


<?php
if($fname == 'materials.php') { ?>
			 <ul class="nav nav-list" id="myTab" style="display:none;">
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
			<li <?php echo $tab=='4B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4B">Vew/Edit Materials</a></li>
			</ul>
<?php }  ?>
        <div class="col-md-3">

		 <?php

		 		$schedcounter=0;

				$daterange=$page_protect->rangeWeek(date('y-m-d'));

				//$sql = 'SELECT time, tutor_id FROM schedules WHERE user_id='.$page_protect->user_id.' AND status="closed" AND approved="yes" ';

				$sql = 'SELECT time, tutor_id FROM schedules WHERE fulldate BETWEEN '.strtotime($daterange['start']).' AND '.strtotime($daterange['end']).' AND user_id='.$page_protect->user_id.' and status="closed" AND approved="yes" ORDER BY fulldate DESC';

				$rsd = mysql_query($sql) or die(mysql_error());

						while($row = mysql_fetch_array($rsd,MYSQL_NUM))

						{

						$schedcounter=$schedcounter=+1;

						}

				if ($schedcounter==0)		

				{

					echo '<div class="well sidebar-nav">

					You have no class booked for this week. <a href="book-classes.php" class="btn btn-small btn-primary btn-block" type="button">'. $book_class .'</a>

					</div><!--/.well -->';

				}

						

		 ?>		

          

          <div class="well sidebar-nav">

            <ul class="nav nav-list">

              <li class="nav-header"><?php echo $today_class; ?></li>

			  <?php

			  //echo date("G").date("i");

			  $d = date("j");

			  $m = date("n");

			  $y = date("Y");

			  

			  	$sql = 'SELECT time, tutor_id FROM schedules WHERE day="'.$d.'" AND month="'.$m.'" AND year="'.$y.'" AND user_id ='.$page_protect->user_id.' AND status="closed" AND approved="yes"  ORDER BY time ASC';

				$rsd = mysql_query($sql) or die(mysql_error());

						while($row = mysql_fetch_array($rsd,MYSQL_NUM))

						{

							$page_protect->get_tutor_info($row[1]);
							$sched_time = strtotime($row[0]) + 3600;
							//echo date('H:i', $sched_time);


						echo '<li>'.date('H:i', $sched_time).' <span style="float:right;"><a href="#myModalClassToday'. $row[1].'" role="button" data-toggle="modal">'.$page_protect->tutor_nick_name.'</a></span></li>';

						//echo '<a href="#myModal'. $row[0].'" role="button" class="btn btn-mini" data-toggle="modal">Vew Profile</a></p>'; //view profile

						echo '

						<!-- Modal -->

						<div id="myModalClassToday'. $row[1].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">

						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h3 id="myModalLabel">'. $page_protect->tutor_nick_name.'</h3>

						</div>

						<div class="modal-body">

						<p style="vertical-align:top;"><img src="../'. $page_protect->tutor_photo.'" class="thumbnail" style="align:left; padding-right:10px;"  />

						'. $page_protect->tutor_self_intro.'

						</p>

						

						</div>

						<div class="modal-footer">

						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

						</div>
						</div>
						</div>

						</div>

				';

						}

						

			  ?>

            </ul>

			<a href="class-schedule.php" class="btn btn-small btn-block" type="button"><?php echo $class_schedule; ?></a>

			

			

          </div><!--/.well -->

		<!-- <div style="height:200px;overflow:hidden;overflow-y:scroll;" class="well sidebar-nav">
			<font size="3" color="gray">Announcements</font><br><br>
			<?php

			/*	$sqlAnnouncement = "SELECT * FROM announcement ORDER BY `date` DESC";
				$resultAnnouncement = mysql_query($sqlAnnouncement);
	

				while ($rowAnnouncement = mysql_fetch_array ($resultAnnouncement))
				{
					echo '<font size="2"><b>'.$rowAnnouncement['title'].'</b></font><br>';
					echo '<small style="color:gray">Date Posted: '.$rowAnnouncement['date'].'</small><br><br>';
					echo '<font size="2">'.$rowAnnouncement['msg'].'</font>';
					echo '<hr class="divider">';
				} */
			?>
		</div> -->
		<!--/.well -->



		  <div class="well sidebar-nav">

            <ul class="nav nav-list">

              <li class="nav-header"><?php echo $account_summary; ?></li>

			  

            </ul>

			

            <?php

				

			

			  /////////////// add days to date

			  

			 	/*$date = "04/28/2013 07:30:00";

				$dates = explode(" ",$date);

				$date = strtotime($dates[0]);

				$date = strtotime("+6 days", $date);

				echo date('Y-m-d', $date)." ".$dates[1];

				echo date("Y-m-d H:i:s", time());

			  */

			  $credits=0;

			  //echo $currdate = strtotime(date("Y-m-d H:i:s", time()));

			  $currdate = date("Y-m-d H:i:s", time());

			  //echo '<br/>';



			  //echo strtotime('2013-06-16 07:30:00');

			  

			  $sql = 'SELECT credit_value, expiration FROM studentcredits WHERE student_id='.$page_protect->user_id.' AND expiration > "'.$currdate.'" AND status=1 AND credit_value > 0 ORDER BY expiration ASC';

			  $rsd = mysql_query($sql) or die(mysql_error());

			  $rowsresult=array();

						while($row = mysql_fetch_array($rsd,MYSQL_NUM))

						{

						//print_r($row);

						

						$credits=$credits+$row[0];

						$rowsresult[]=$row;

						}

				if($credits==0)

			{

			echo '<a href="buy-credits.php" class="btn btn-danger btn-block" type="button" data-placement="right" data-toggle="tooltip"><i class="glyphicon glyphicon-shopping-cart"></i>'.  $buy_credits .'</a><br />';	

			}

			else

			echo '<a href="credits.php" class="btn btn-info btn-block" type="button" title="Vew Credit Details" data-placement="right" data-toggle="tooltip">';		

						

				echo $total_credits .' : <span class="label label-success">'.$credits.'</span> Points';

				//print_r($rowsresult);

				foreach($rowsresult as $val)

				{
					$date = date('Y-m-d',strtotime($val[1]));
				

					//echo $val[0];

					echo '<br />';

					echo $val[0]. ' '. ($val[0]==1 ? 'Credit Expires' : 'Credits Expire'). ' on:<span class="label label-danger">'. $date.'</span>';

				}

				

			  ?>

              </a>
				
				<br clear="all" />
				<a href="/student/buy-credits.php" class="btn btn-small btn-success btn-block" type="button"><i class="glyphicon glyphicon-plus-sign"></i><b style="color:white">&nbsp; <?php echo $buy_credits; ?></b></a>
				
			</div><!--/.well -->
		  
		  
		  
			<!-- <div class="well sidebar-nav">
				
			
			</div> -->
			<!--/.well -->
			  
			  
			  
			  
        </div><!--/col-md-3 -->
