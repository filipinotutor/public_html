<?php
include('header-tutor.php');
$page_validate = new validation;
$page_validate->addSource($_GET);
$page_validate->addRule('id',"numeric", false, 1, 255, true);
@$page_validate->run();
if(sizeof($page_validate->errors) > 0)
{
    echo '<script>window.location.replace("classes.php");</script>';
}
else
{
	$userid = $_GET['id'];  
}
$class_id = intval($userid);


if($page_protect->check_if_active($class_id) == "y"){
$page_protect->student_info_for_sup($class_id);  
}
else{
    echo '<script>window.location.replace("classes.php");</script>';
}


?>
        <div class="col-md-9">
        <div class="col-md-12"> 
        <a class="pull-right" href="classes.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button></a>
			  <h4>Student's Class History</h4>
			  </div>
  			  <div class="col-md-12">
          <?php
            include("../includes/classhistory.php");
          ?>
          </div><!--/span-->
        </div>   
       
 <?php
 include('footer-tutor.php');
 ?>   