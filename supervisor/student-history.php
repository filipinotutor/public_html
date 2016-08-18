<?php
include('header-tutor.php');
// $class_id = $page_protect->user_id;

$stud_id = $_GET['studid'];

$res = $page_protect->get_student_class_history($stud_id);

?>
        <div class="col-md-9">
          <div class="row">
				      <div class="col-md-12">
                  <h4>Class History</h4>
              </div>
          </div>
          <div class="row">
              <table class="table">
                <tr>
                  <th>Date/Time</th>
                  <th>Lesson Materials</th>
                  <th>Evaluation/Remarks</th>
                  <th>Tutor</th>
                </tr>
                <?php 
                
                    $output = "";
                    while($row = mysql_fetch_array($res)){
                      $output .= "<tr>";
                      $output .= "<td>". $row['date'] ." / ". $row['time'] ."</td>";
                      $output .= "<td>". $row['title'] ."</td>";
                      $output .= "<td>". $row['remarks'] ."</td>";
                      $output .= "<td>". $row['nick_name'] ."</td>";
                    } 

                    echo $output;
                ?>
              </table>
          </div>
        </div><!--/span-->

 <?php
 include('footer-tutor.php');
 ?>   