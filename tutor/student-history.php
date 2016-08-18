<?php
include('header-tutor.php');
// $class_id = $page_protect->user_id;

$stud_id = $_GET['studid'];

$res = $page_protect->get_student_class_history($stud_id);
$tutor_id = $page_protect->get_user_id();

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
                  <th>TutorName</th>
                  <th>Lesson Materials</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Evaluation/Remarks</th>
                  <th> Ratings </th>
                </tr>
                <?php 
                    $output = "";
                    while($row = mysql_fetch_array($res)){
                      $output .= "<tr>";
                      $output .= "<td>". $row['nick_name'] ."</td>";
                      $output .= "<td>". $row['title'] ."</td>";
                      $output .= "<td>". $row['date'] . "</td>";
                      $output .= "<td>". $row['time'] ."</td>";
                      $output .= "<td>". $row['remarks'] ."</td>";
                      
                      if($tutor_id == $row['tutor_id']){
                        $output .= "<td>
                        <select class='example'>
                          <option value='1'". ($row['tutor_rating'] == 1 ? 'selected' : "") .">1</option>
                          <option value='2'". ($row['tutor_rating'] == 2 ? 'selected' : "") .">2</option>
                          <option value='3'". ($row['tutor_rating'] == 3 ? 'selected' : "") .">3</option>
                          <option value='4'". ($row['tutor_rating'] == 4 ? 'selected' : "") .">4</option>
                          <option value='5'". ($row['tutor_rating'] == 5 ? 'selected' : "") .">5</option>
                        </select>
                        </td>";
                      } else {
                        $output .='<td></td>';
                      }

                      
                    } 

                    echo $output;
                ?>
              </table>
          </div>
        </div><!--/span-->

 <?php
 include('footer-tutor.php');
 ?>   