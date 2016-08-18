<?php include("../includes/ValidationClass.php"); 
$page_validate = new validation;

include("../includes/main_class.php"); 
$page_protect = new Main_Class;

// $page_protect->login_page = "login.php";  change this only if your login is on another page
$page_protect->access_page($_SERVER['PHP_SELF'], "", 10); // change this value to test differnet access levels (default: 1 = low and 10 high)
$page_protect->get_user_info();
$hello_name = ($page_protect->user_first_name != "") ? $page_protect->user_first_name : $page_protect->username;
ini_set('display_errors', '0');
ini_set("date.timezone", "Asia/Manila"); // set timezone


$notif = $page_protect->get_notification($page_protect->user_id,NULL," LIMIT 5");
$cnotif = $page_protect->get_notification_cnt($page_protect->user_id);

if (isset($_GET['action']) && $_GET['action'] == "log_out") {
  $page_protect->log_out(); // the method to log off  
}
//error_reporting(E_ALL | E_STRICT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../images/FFlogo.png" />
    <title>FilipinoTutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/jquery.1.9.min.js"></script>
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
    
    
    
  

    <script src="../js/ajax-jquery-pagination.js"></script>
    <script src="../js/jquery-image-upload.js"></script> <!-- image upload -->
    <script src="../js/moment.min.js"></script> <!-- datepicker for birthday -->
    <script src="../js/ckeditor_mat.js"></script>
    <script src="../ckeditor/ckeditor.js"></script> 

  <script>
    $.fn.editable.defaults.mode = 'inline';
  </script>
  <script type="text/javascript">
    $(function(){
    $(".search").keyup(function() 
    {   var searchid = $(this).val();
        var dataString = 'search='+ searchid;
        if(searchid!='') {
            $.ajax({
            type: "POST",
            url: "CSV.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
            $("#result").html(html).show();
            }
            });
        }
        return false;    
    });

    $("#result").live("click",function(e){ 
        var $clicked = $(e.target);
        var $name = $clicked.find('.name').html();
        var decoded = $("<div/>").html($name).text();
        $('#searchid').val(decoded);
    });
    $(document).live("click", function(e) { 
        var $clicked = $(e.target);
        if (! $clicked.hasClass("search")){
        jQuery("#result").fadeOut(); 
        }
    });
    $('#searchid').click(function(){
        jQuery("#result").fadeIn();
    });
    });
</script>


   <!-- x-editable-->
   <script>   
       $(function(){
          $('#user a').editable({
             url: 'post-users-profile.php' 
          });
       });
     
         //tooltip ------------------------------------------------
    $(function() {
    var tooltips = $( "[title]" ).tooltip();
    tooltips.tooltip();
    });

     </script>
     
     <!-- x editable for dashboard (announcement/user guide)-->
   <script>   
       $(function(){
          $('#announcement a').editable({
             url: 'announcement_ajax.php' 
          });
       });
     </script>
     <!-- x editable for dashboard (user guide)-->
   <script>   
       $(function(){
          $('#user_guide a').editable({
             url: 'user_guide_ajax.php' 
          });
       });
     </script>

     <!-- x editable for dashboard (user guide)-->
   <script>   
       $(function(){
          $('#conv a').editable({
             url: 'conversions_ajax.php' 
          });
       });
 </script>
 <script>
        $(function(){
          $('#adminsettings a').editable({
             url: 'adminsettings_ajax.php' 
          });
       });
     </script>
   <script>   
       $(function(){
          $('#credit a').editable({
             url: 'credit_ajax.php' 
          });
       });
     </script>
       <script>   
       $(function(){
          $('#conv_up a').editable({
             url: 'conv_up_ajax.php' 
          });
       });
     </script>

 
    <script>
    function mobdropd(x){
      switch(x){
        case 1:
        document.getElementById('dropd').className = 'span12 btn btn-success';
        document.getElementById('caret').className = ' glyphicon glyphicon-ok';
        document.getElementById('filter').value = 'approved';
          break;
        case 2:
        document.getElementById('dropd').className = 'span12 btn btn-danger';
        document.getElementById('caret').className = ' glyphicon glyphicon-remove';
        document.getElementById('filter').value = 'disapproved';
          break;
        case 3:
        document.getElementById('dropd').className = 'span12 btn btn-info';
        document.getElementById('caret').className = ' glyphicon glyphicon-minus';
        document.getElementById('filter').value = 'new';
          break;
      }
    }   
    </script>


 <!-- image upload ------------------------------------ -->
    <script> 
        $(document).ready(function() { 
    //elements
    var progressbox   = $('#progressbox');
    var progressbar   = $('#progressbar');
    var statustxt     = $('#statustxt');
    var submitbutton  = $("#SubmitButton");
    var myform      = $("#UploadForm");
    var output      = $("#output1");
    var completed     = '0%';
    
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
$( ".daterangefrom" ).datepicker( {dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, });
$( ".daterangeto" ).datepicker( {dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, });

var today = new Date();
var dd = today.getDay();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
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
});
</script>
     
<script>
  $(function() {

$( "#bdate" ).datepicker({
dateFormat: "yy-mm-dd",
/*
showOn: "button",
buttonImage: "../img/cal.png",
buttonImageOnly: true,  */
changeMonth: true,
changeYear: true,
maxDate: "1995-12-31"
});
});
</script>

<script>
  $(function() {
var today = new Date();
var dd = today.getDay();
var mm = today.getMonth()+2; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
  dd='0'+dd
    } 

if(mm<10) {
    mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
$( ".reportfrom" ).datepicker({
dateFormat: "yy-mm-dd",
/*
showOn: "button",
buttonImage: "../img/cal.png",
buttonImageOnly: true,  */
changeMonth: true,
changeYear: true,
maxDate: today
});
});

$(function() {
var today = new Date();
var dd = today.getDay();
var mm = today.getMonth()+2; //January is 0!
var yyyy = today.getFullYear();
if(dd<10) {
  dd='0'+ dd
    } 

if(mm<10) {
    mm='0'+ mm
} 

today = yyyy+'-'+mm+'-'+dd;
$( ".reportto" ).datepicker({
dateFormat: "yy-mm-dd",
/*
showOn: "button",
buttonImage: "../img/cal.png",
buttonImageOnly: true,  */
changeMonth: true,
changeYear: true
});
});

</script>
<script type="text/javascript">
  /* Updating allow_teach_trial */
  $(function(){
    $("#file").change(function() {
      $("#message").empty(); // To remove the previous error message
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        $('#previewing').attr('src','noimage.png');
        $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
        return false;
      }
      else{
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
      }
      function imageIsLoaded(e) {
      $("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '150px');
        $('#previewing').attr('height', '130px');
      };
    });
    

    var url = "<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>";
  
    $("#attcheck").click(function(){
      var ch = ($('#attcheck').is(":checked") === true) ? 1 : 0;
      $.ajax({
        data:{ch: ch},
        dataType: 'json',
        url: url,
        type: 'POST'
      });
    });

    $("#tutor_type").change(function(){
      var type = $("#tutor_type").val();
      $.ajax({
        data:{tutor_type: type},
        dataType: 'json',
        url: url,
        type: 'POST'
      });
    });
    
  });
  /*******************************/
</script>


<script>  
  // check all checkboxes -----------------------------------

    $(function () {

      $('.checkall').on('click', function () {

        $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);

      });

    });


    $(function() {

      $('.dropdown-toggle').click(function() {

        $(this).dropdown();

      });

    });

    

  
  </script>

    <!-- Le styles -->
    <style>
    .searchbar{
      width: 75px;
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="../css/img-upload-style.css" rel="stylesheet">
    <link href="../css/res_conf.css"  media="screen and (max-width:480px)" rel="stylesheet">
    <link href="../css/over_style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    


</head>

  <body>
<?php
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
      <a class="navbar-brand" href="dashboard.php?t=8A">FilipinoTutor</a>
      </div>
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">

    <li class="dropdown <?php if($notif['count'][0] > 0){echo "btn-warning";}else{echo "btn-default";}?>">
      <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
        <span title="Notifications" data-placement="bottom" data-toggle="tooltip" style="text-align:center;color:black;">
            <i class="glyphicon-flag glyphicon"></i>
          <span class="<?php if($notif['count'][0] > 0){echo "label label-warning";}else{echo "label label-info";}?>"><?php echo $cnotif['cnt']//$page_protect->get_new_student_cnt($page_protect->user_al);?></span>
        </span>
      </a>

     <ul class="dropdown-menu" style="max-width:10px;">
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
            
            echo'
              <form action="'.$link.'" method="POST">
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
  
       <li>|</li>  
          <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><strong><?php echo $hello_name; ?></strong> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <li style="text-align:center; color:#999;">
                        <?php echo '<strong>'.$page_protect->user_first_name.' '.$page_protect->user_last_name.'</strong>'; ?>
                        </li>
                        <li><a href="settings.php?t=6A"><i class="icon-wrench"></i>&nbsp;Settings</a></li> 
                        <!--  <li><a href="profile.php?t=6B"><i class="icon-user"></i> Edit Profile</a></li> --> 
                        <li class="divider"></li>
                          <li><a href="?action=log_out"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                      </li>
      </ul>
      <ul class="nav navbar-nav"><li <?php echo $fname=='dashboard.php' ? 'class="active"' : '';?>><a href="dashboard.php?t=8A"><i class="glyphicon-home glyphicon"></i> Dashboard</a></li></ul>
      <ul class="nav navbar-nav">
                    <li class="dropdown" >
                      <a href="#" data-toggle="dropdown" class="active"><span class="glyphicon icon-search"></span>&nbsp;User Accounts<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li <?php echo $fname=='students.php' ? 'class="active"' : ''; if(@$_GET['user'] == 'student'){echo $fname=='deactivated_accounts.php' ? 'class="active"' : '';} echo $fname=='student_schedule.php' ? 'class="active"' : ''; echo $fname=='student_profile.php' ? 'class="active"' : ''; echo $fname=='booklist.php' ? 'class="active"' : '';?>><a href="students.php?t=1A"><i class="glyphicon glyphicon-book"></i> Students</a></li>
                        <li <?php echo $fname=='tutors.php'  ? 'class="active"' : '';echo $fname=='report_list.php'  ? 'class="active"' : ''; if(@$_GET['user'] == 'tutor'){echo $fname=='deactivated_accounts.php' ? 'class="active"' : '';}echo $fname=='tutor_schedule.php'  ? 'class="active"' : '';?> <?php echo $fname=='view_report.php'  ? 'class="active"' : '';?> <?php echo $fname=='tutor_profile.php'  ? 'class="active"' : '';?>><a href="tutors.php?t=2A"><img src="../img/tutors.png" />Tutors</a></li>
                        <li <?php echo $fname=='applicants.php' ? 'class="active"' : ''; echo $fname=='recent_applicant.php' ? 'class="active"' : '';?> <?php echo $fname=='applicant_profile.php' ? 'class="active"' : '';?>><a href="applicants.php?t=3A"><i class="glyphicon glyphicon-folder-open"></i> Applicants</a></li>
                        <li <?php echo $fname=='supervisors.php' ? 'class="active"' : ''; if(@$_GET['user'] == 'super'){echo $fname=='deactivated_accounts.php' ? 'class="active"' : '';}echo $fname=='supervisor_profile.php' ? 'class="active"' : '';?>><a href="supervisors.php?t=7A"><span class="glyphicon glyphicon-user"></span> Supervisor</a></li></li>
                      </ul>
                    </li>
      </ul>
      <ul class="nav navbar-nav">
        <li ><a href="materials.php?t=4B"><i class="glyphicon-file glyphicon"></i> Materials</a></li>
       
          </ul>
      <ul class="nav navbar-nav"><li <?php echo $fname=='pricing.php' ? 'class="active"' : '';?>><a href="pricing.php?t=5A"><i class="glyphicon glyphicon-shopping-cart"></i> Credits</a></li></ul>
      <ul class="nav navbar-nav"><li <?php echo $fname=='guides_and_announcements.php' ? 'class="active"' : '';?>><a href="guides_and_announcements.php?t=8A"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Guides And announcements</a></li></ul>
      <ul class="nav navbar-nav"><li <?php echo $fname=='email_logs.php' ? 'class="active"' : '';?>><a href="email_logs.php"><i class="glyphicon glyphicon-envelope"></i> Email Logs</a></li></ul>
      </div>
      </div>
      </nav>  
        
      <!--
      <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-cog" ></i> <?php echo $hello_name; ?> <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-wrench"></i> Account Settings</a></li>
        <li><a href="#"><i class="icon-user"></i> Edit Profile</a></li>
        <li class="divider"></li>
        <li><a href="?action=log_out"><i class="icon-off"></i> Logout</a></li>
      </ul>
      </div> -->
      
    <div class="container-fluid">
      <div class="row">
      
<?php

switch ($fname) {
  case'profile.php':
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
break;
}
case 'students.php':
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
break;
}
case 'booklist.php':
case 'student_schedule.php':
case 'student_profile.php':

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
break;
}
case 'deactivated_accounts.php':
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
      elseif($_GET['user'] === 'tutor'){
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
              <li <?php echo $tab=='2E' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2E">Latest Tutors</a></li>
              <li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a href="tutors.php?t=2B">Schedule Updates</a></li>
              <li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a href="tutors.php?t=2C">Reports</a></li>
              <li <?php echo $tab=='2D' ? 'class="active"' : '';?>><a href="tutors.php?t=2D">Conversions</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->

          
<?php
}
  elseif($_GET['user'] == 'super'){
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
              <li <?php echo $tab=='7A' ? 'class="active"' : '';?>><a href="supervisors.php?t=7A">Supervisor Accounts</a></li>
              <li <?php echo $tab=='7B' ? 'class="active"' : '';?>><a href="supervisors.php?t=7B">Create Supervisor</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
    }
break;
}
case 'tutors.php':
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
              <li <?php echo $tab=='2E' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2E">Latest Tutors</a></li>
              <li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2B">Schedule Updates</a></li>
              <li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2C">Reports</a></li>
              <li <?php echo $tab=='2D' ? 'class="active"' : '';?>><a data-toggle="tab" href="#2D">Conversions</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case 'tutor_profile.php':
case 'tutor_schedule.php':
case 'view_report.php':
case 'report_list.php':
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
              <li <?php echo $tab=='2E' ? 'class="active"' : '';?>><a href="tutors.php?t=2E">Latest Tutors</a></li>
              <li <?php echo $tab=='2B' ? 'class="active"' : '';?>><a href="tutors.php?t=2B">Schedule Updates</a></li>
              <li <?php echo $tab=='2C' ? 'class="active"' : '';?>><a href="tutors.php?t=2C">Reports</a></li>
              <li <?php echo $tab=='2D' ? 'class="active"' : '';?>><a href="tutors.php?t=2D">Conversions</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->

<?php
break;
}

case'applicants.php':
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
              <li <?php echo $tab=='3A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#3A">New Applicants</a></li>
              <li <?php echo $tab=='3B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#3B">Training Schedule</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case 'recent_applicant.php':
case 'applicant_profile.php':
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
              <li <?php echo $tab=='3A' ? 'class="active"' : '';?>><a href="applicants.php?t=3A">New Applicants</a></li>
              <li <?php echo $tab=='3B' ? 'class="active"' : '';?>><a href="applicants.php?t=3B">Training Schedule</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case'materials.php':
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
              <li <?php echo $tab=='4C' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4C">New Category</a></li>
              <li <?php echo $tab=='4D' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4D">Vew/Edit Category</a></li>
              <li <?php echo $tab=='4E' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4E">New Sub-category</a></li>
              <li <?php echo $tab=='4F' ? 'class="active"' : '';?>><a data-toggle="tab" href="#4F">Vew/Edit Sub-category</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case'bookmaterial.php':
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
break;
}
case'supervisors.php':
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
              <li <?php echo $tab=='7A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#7A">Supervisor Accounts</a></li>
              <li <?php echo $tab=='7B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#7B">Create Supervisor</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case'supervisor_profile.php':
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
              <li <?php echo $tab=='7A' ? 'class="active"' : '';?>><a href="supervisors.php?t=7A">Supervisor Accounts</a></li>
              <li <?php echo $tab=='7B' ? 'class="active"' : '';?>><a href="supervisors.php?t=7B">Create Supervisor</a></li>
            </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case'guides_and_announcements.php':
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
              <li <?php echo $tab=='8A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#8A">Tutor Guide</a></li>
              <li <?php echo $tab=='8B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#8B">Student Guide</a></li>
              <li <?php echo $tab=='8C' ? 'class="active"' : '';?>><a data-toggle="tab" href="#8C">Announcement</a></li>
            </ul>
              
          </div><!--/.well -->
      
      <div class="well sidebar-nav">
      <h4>Resources</h4>
      <ul>
      <li><a href="/guide/pdf/FilipinoTutor.com_User_Guide.pdf" target="_BLANK">Download User Guide</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_1.pdf">Facts About Japan ( Part 1)</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_2.pdf">Facts About Japan ( Part 2)</a></li>
      <hr />
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_English_Proficiency_Test_1.pdf" target="_BLANK">Tutor English Proficiency Test 1</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_English_Proficiency_Test_2.pdf" target="_BLANK">Tutor English Proficiency Test 2</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Test_Answer_Key.pdf" target="_BLANK">Tutor Test Answer Key</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Reading_Assessment_Test_1.pdf" target="_BLANK">Tutor Reading Assessment Test 1</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Reading_Assessment_Test_2.pdf" target="_BLANK">Tutor Reading Assessment Test 2</a></li>
      <hr />
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Agreement.pdf" target="_BLANK">Tutor Agreement</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Overview_Training_Part_1.pdf" target="_BLANK">Tutor Training Overview (Part 1)</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Overview_Training_Part_2.pdf" target="_BLANK">Tutor Training Overview (Part 2)</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutoring_Tips.pdf" target="_BLANK">Tutoring Tips</a></li>
    <hr />
    <li><a href="/guide/pdf/FilipinoTutor.com_Student_Guide_For_Admin.pdf" target="_BLANK">Student Guide</a></li>
      </ul>
    
      </div>
        </div><!--/span-->
<?php
break;
}
case'pricing.php':
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
              <li <?php echo $tab=='5A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#5A">Credit List</a></li>
            </ul>
              
          </div><!--/.well -->
        </div><!--/span-->
<?php
break;
}
case 'settings.php':
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
              <li <?php echo $tab=='6A' ? 'class="active"' : '';?>><a data-toggle="tab" href="#6A">Paypal</a></li>
              <li <?php echo $tab=='6B' ? 'class="active"' : '';?>><a data-toggle="tab" href="#6B">Conversion</a></li>
              </ul>
              
          </div><!--/.well -->
        </div><!--/span-->

<?php
}
break;
case 'dashboard.php':
{
?>
   <div class="col-md-3">
          <div class="well sidebar-nav">
    <h4>Resources</h4>
    <ul>
      <li><a href="/guide/pdf/FilipinoTutor.com_User_Guide.pdf" target="_BLANK">Download User Guide</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_1.pdf">Facts About Japan - Part 1</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Facts_About_Japan_2.pdf">Facts About Japan - Part 2</a></li>
      <hr />
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_English_Proficiency_Test_1.pdf" target="_BLANK">Tutor English Proficiency - Test 1</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_English_Proficiency_Test_2.pdf" target="_BLANK">Tutor English Proficiency - Test 2</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Test_Answer_Key.pdf" target="_BLANK">Tutor Test Answer Key</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Reading_Assessment_Test_1.pdf" target="_BLANK">Tutor Reading Assessment - Test 1</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Reading_Assessment_Test_2.pdf" target="_BLANK">Tutor Reading Assessment - Test 2</a></li>
      <hr />
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Agreement.pdf" target="_BLANK">Tutor Agreement</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Overview_Training_Part_1.pdf" target="_BLANK">Tutor Training Overview - Part 1</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutor_Overview_Training_Part_2.pdf" target="_BLANK">Tutor Training Overview - Part 2</a></li>
      <li><a href="/guide/pdf/FilipinoTutor.com_Tutoring_Tips.pdf" target="_BLANK">Tutoring Tips</a></li>
    <hr />
    <li><a href="/guide/pdf/FilipinoTutor.com_Student_Guide_For_Admin.pdf" target="_BLANK">Student Guide</a></li>
    </ul>
  </div>
   </div><!--/span-->
<?php
}
break;

}
?>