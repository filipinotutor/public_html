<?php 
include("../includes/main_class.php"); 

$page_protect = new Main_Class;
// $page_protect->login_page = "login.php"; // change this only if your login is on another page
$page_protect->access_page($_SERVER['PHP_SELF'], "", 9); // change this value to test differnet access levels (default: 1 = low and 10 high)
$page_protect->get_user_info();
$hello_name = ($page_protect->user_full_name != "") ? $page_protect->user_full_name : $page_protect->user;

if (isset($_GET['action']) && $_GET['action'] == "log_out") {
	$page_protect->log_out(); // the method to log off
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>FilipinoTutor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/style.css" rel="stylesheet">
        <script src="../js/jquery-image-upload.js"></script> <!-- image upload -->
    <script src="../js/editable.min.js"></script> <!-- x-editable -->
    <script src="../js/moment.min.js"></script> <!-- datepicker for birthday -->
    
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
    var progressbox   = $('#progressbox');
    var progressbar   = $('#progressbar');
    var statustxt     = $('#statustxt');
    var submitbutton  = $("#SubmitButton");
    var myform      = $("#UploadForm");
    var output      = $("#output");
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
        $(this).next('.dropdown-menu').fadeToggle(300);
      });
    });
    
    //tooltip
    $(function() {
    var tooltips = $( "[title]" ).tooltip();
    $(document)(function() {
    tooltips.tooltip( "open" );
    })
    });
  </script>


    <!-- Le styles -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/editable.css" rel="stylesheet">
    <link href="../css/img-upload-style.css" rel="stylesheet">
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
   }
</style>
</head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="dashboard.php">FilipinoTutor</a>
		  
          <div class="nav-collapse collapse">
		     
		  
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php echo $hello_name; ?></a>  | <a href="?action=log_out">Logout</a>
			  
            </p>
			<?php
				$path_parts = pathinfo($_SERVER['PHP_SELF']);
				$fname= $path_parts['filename'].'.php'; // since PHP 5.2.0
				
				
				 
				
			?>
            <ul class="nav"><li <?php echo $fname=='dashboard.php' ? 'class="active"' : '';?>><a href="dashboard.php">Dashboard</a></li></ul>
			<ul class="nav"><li <?php echo $fname=='class-today.php' ? 'class="active"' : '';?>><a href="class-today.php">Today's Class</a></li></ul>
			<ul class="nav"><li <?php echo $fname=='manage-schedule.php' ? 'class="active"' : '';?>><a href="manage-schedule.php">Manage Schedule</a></li></ul>
			<ul class="nav"><li <?php echo $fname=='conversions.php' ? 'class="active"' : '';?>><a href="conversions.php">Conversions</a></li></ul>
			
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
