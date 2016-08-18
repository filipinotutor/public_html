<?php
include('header-admin.php');
$page_validate->addSource($_GET);
$page_validate->addRule('TutorId',"numeric", false, 1, 255, true);
@$page_validate->run();
$day = '';
$month = '';
$year = '';

    if($_GET['TutorId']){
      $TutorId = $_GET['TutorId']; 
      $tud = intval($TutorId);
      $addid = "TutorId=".$tud."&t=2A";
    } else {
       echo '<script>window.location.replace("tutors.php?t=2A")';
    }
    
    if ($_GET["day"] && $_GET["month"] && $_GET["year"]) {
      $day = $_GET["day"];
      $month = $_GET["month"];
      $year = $_GET["year"];
    } else {
      $day = date ("d");
      $month = date ("n");
      $year = date ("Y");
      echo '<script>window.location.replace("tutor_schedule.php?day='.$day.'&month='.$month.'&year='.$year.'&'.$addid.'");</script>';
    }

    $res = $page_protect->get_tutor_sched($TutorId);

    if(isset($_POST['subtitute_tutor'])){
      $tutor_id = $_POST['tutorIdOption'];
      $schedule_id = $_POST['schedule_id'];
      $time = $_POST['time'];
      $day = $_POST['day'];
      $month = $_POST['month'];
      $year = $_POST['year'];
      
      $q1 = 'DELETE FROM schedules WHERE time = "'.$time.'" AND day='.$day.' AND month='.$month.' AND year='.$year.' AND tutor_id='.$tutor_id;
      mysql_query($q1);

      $q = 'UPDATE schedules SET tutor_id = '.$tutor_id.' WHERE schedule_id = '.$schedule_id;
      mysql_query($q);

    }

    if(isset($_POST['cancelOpenSched'])){
      $tutor_id = $_POST['tutor_id'];
      $schedule_id = $_POST['schedule_id'];

      $q = 'DELETE FROM schedules WHERE schedule_id = '.$schedule_id.' AND tutor_id = '.$tutor_id;
      mysql_query($q);
    }

?>
    <div class="container-fluid">
      <div class="row">
       <div class="col-md-9">
         <a class="btn btn-warning pull-right" href="tutors.php?t=2A">&laquo;Back</a>
          <h4>Schedule</h4>
          <?php
            include ("../includes/WeeklyCalClass.php");
            // if ($_GET["day"] && $_GET["month"] && $_GET["year"]) {
            //   $day = $_GET["day"];
            //   $month = $_GET["month"];
            //   $year = $_GET["year"];
            //   $calendar = new WeeklyCalClass ($day, $month, $year, $tud);
            //   echo $calendar->showCalendar ($tud,'view',$addid);
            // }
            // else{
            //   $day = date ("d");
            //   $month = date ("n");
            //   $year = date ("Y");
            //   // echo '<h1>'.$day.'</h1></br>';
            //   // echo '<h1>'.$month.'</h1></br>';
            //   // echo '<h1>'.$year.'</h1></br>';
            //   //include the WeeklyCalClass and create the object !!
              $calendar = new WeeklyCalClass ($day, $month, $year, $tud);
              // echo "<form method='post' action='".$_SERVER['PHP_SELF']."TutorId=".$tud."t=2A&' >";
              echo $calendar->showCalendar ($tud,'view',$addid);
              // echo "</form>";
            // }
            ?>
        </div>
      </div>
    </div>
      
 <?php
 include('footer-admin.php');
 ?>   