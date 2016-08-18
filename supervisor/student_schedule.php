<?php
include('header-supervisor.php');
$page_validate->addSource($_GET);
$page_validate->addRule('StudId',"numeric", false, 1, 255, true);
@$page_validate->run();
    //die();
//$stud_id = ;
//$stud_id = filter_input(INPUT_GET, 'StudId', FILTER_SANITIZE_NUMBER_INT);



if(sizeof($page_validate->errors) > 0)
{
    echo '<script>window.location.replace("students.php?t=1A");</script>';
}
else
{
    $stud_id = $_GET['StudId'];  
    $stud = intval($stud_id);
if($page_protect->check_user_access_student($stud,"")){
    if(isset($_POST['page'])){
      $page = $_POST['page'];
    }
    else{
      $page= 0;
      $pages = $page * 10;
    }
    $limits = $page_protect->get_stud_sched_cnt($stud);
    $limit = ceil($limits/10);
    include("../includes/paging.php");
}
else{
    echo '<script>window.location.replace("students.php?t=1A");</script>';
}
}
?>
	    <div class="col-md-9">
          <div class="col-md-12">
            <h4>View Student's Schedule</h4>
          </div>
          <div class="col-md-12">
      			 <table class="table table-striped table-bordered table-hover">
      						<tr>
      						  <th>Date</th>
      						  <th>Time</th>
      						  <th>Report</th>
      						  <th>Status</th>
      						</tr>
            		<?php
            		echo $page_protect->get_student_sched_mon($stud,$pages);
            		?>
      			</table>
            <?php echo $pagination; ?>
          </div><!--/12-->
      </div><!--/9-->
      
 <?php
 include('footer-supervisor.php');
 ?>   