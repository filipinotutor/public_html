<?php
include('header-supervisor.php');
$page_validate->addSource($_GET);
$page_validate->addRule('TutorId',"numeric", false, 1, 255, true);
@$page_validate->run();
  //die();
//$stud_id = ;
//$stud_id = filter_input(INPUT_GET, 'StudId', FILTER_SANITIZE_NUMBER_INT);
if(sizeof($page_validate->errors) > 0)
{
    echo '<script>window.location.replace("tutors.php?t=2A");</script>';
}
else
  {
    $TutorId = $_GET['TutorId']; 
    $tud = intval($TutorId);
    if($page_protect->check_if_active($tud) == "y"){
      if($page_protect->check_user_access($tud,$page_protect->user_id)){
          $addid = "TutorId=".$tud."&t=2A";    
        }
        else{
        echo '<script>window.location.replace("tutors.php?t=2A&acc=n");</script>';    
      }
    }
  }
?>
     <div class="col-md-9">
             <a class="btn btn-warning pull-right" href="tutors.php?t=2A">&laquo;Back</a>
              <h4>Schedule</h4>
              <?php
                if ($_GET["day"] && $_GET["month"] && $_GET["year"]) {
                  $day = $_GET["day"];
                  $month = $_GET["month"];
                  $year = $_GET["year"];
                }
                else{
                  $day = date ("d");
                  $month = date ("n");
                  $year = date ("Y");
                  //include the WeeklyCalClass and create the object !!
                  include ("../includes/WeeklyCalClass.php");
                  $calendar = new WeeklyCalClass ($day, $month, $year, $tud);
                  echo "<form method='post' action='".$_SERVER['PHP_SELF']."TutorId=".$tud."t=2A&' >";
                  echo $calendar->showCalendar ($tud,'view',$addid);
                  echo "</form>";
                }
                ?>
            
          </div><!--/span-->
      </div><!--/row-->
 <?php
 include('footer-supervisor.php');
 ?>   