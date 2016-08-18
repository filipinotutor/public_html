<?php

include('header-supervisor.php');

$page_validate->addSource($_GET);
$page_validate->addRule('report',"numeric", false, 1, 255, true);
@$page_validate->run();
if(sizeof($page_validate->errors) > 0)
{
    echo '<script>window.location.replace("tutors.php?t=2B");</script>';
}
else
{
    $rep_id = $_GET['report'];  
}
//die();
//$stud_id = ;
//$stud_id = filter_input(INPUT_GET, 'StudId', FILTER_SANITIZE_NUMBER_INT);
$tud = intval($rep_id);
$page_protect->get_class_history($tud);
$page_protect->get_fullname($page_protect->student_id);
$page_protect->tutor_info_for_sup($page_protect->tutor_id);

?>
        <div class="col-md-7">
         
          <div class="row">
            <div class="col-md-12">
              <h4>Class Report</h4>
            </div><!--/span-->
           </div>
       

          <div class="row">
         <div class="col-md-12">
    <?php
    $time=explode(":",$page_protect->r_time); //format time ex. 6:00-6:25
              $hr=$time[0];
              $mn=$time[1];
              $minute=intval($mn)+25;
    $date=explode("-",$page_protect->r_date); //format time ex. 6:00-6:25
              $yy=trim($date[0]);
              $mm=trim($date[1]);
              $dd=trim($date[2]);
              echo '<table class="table table-striped table-bordered table-hover">';
              echo '<tr>';
                echo '<td>Student name:</td>'; //name
                echo '<td><strong>'.$page_protect->fname.' '.$page_protect->lname.'</strong></td>';
              echo '</tr>';
              echo '<tr>';
                echo '<td>Date:</td>'; //date
                echo '<td><strong>'.$page_protect->r_date.' / '.date('M',$mm).','.$dd.','.$yy.'<strong></td>';
              echo '</tr>';
              echo '<tr>';
                echo '<td>Time:</td>'; //time
                echo '<td><strong>'.$page_protect->r_time.' - '.$hr.':'.$minute.'</strong></td>';
              echo '</tr>';
              echo '<tr>';
                echo '<td>Tutor:</td>'; //tutor
                echo '<td><strong>'.$page_protect->tutor_nick_name.'</strong></td>';
              echo '</tr>';
              echo '<tr>';
                echo '<td>Attendance:</td>'; //tutor
                echo '<td><strong>'.$page_protect->r_attendance.'</strong></td>';
              echo '</tr>';
              echo '</table>';
              echo '</div></div>';
                ?>
                              
              
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well">
                                    <legend>Materials Details</legend>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="inputMaterial">Material </label>
                                        <div class="controls">
                                           <?php 
                                           $page_protect->get_materials_info($page_protect->r_materials); 
                                           echo $page_protect->m_title;
                                           ?>
                                        </div>
                                      </div>
                                      <div class="control-group">
                                            <label class="control-label" for="inputMaterialDetails">Details of Materials Covered </label>
                                            <div style="word-wrap:break-word;width:40%;margin:10px;">
                                           <?php echo $page_protect->r_mat_covered; ?>
                                           </div>
                                        </div>
                                        
                                       <legend>Areas for Improvement</legend>  
                                       
                                       <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Grammar and Sentence Construction</label>
                                            <br/><span class="label label-success"><?php echo $page_protect->r_grammar."/5";?>
                                            </span>
                                        </div>

                                         <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Pronunciation, Accent, Diction</label>
                                            <br/><span class="label label-success"><?php echo $page_protect->r_pronoun."/5";?>
                                            </span>
                                        </div>

                                         <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Vocabulary Bank & Word Choice</label>
                                            <br/><span class="label label-success"><?php echo $page_protect->r_vocab."/5";?>
                                            </span>
                                            </div>

                                         <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Listening Comprehension</label>
                                            <br/><span class="label label-success"><?php echo $page_protect->r_listen."/5";?>                   
                                            </span>
                                            </div>

                                         

                                          <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Reading Comprehension</label>
                                            <br/><span class="label label-success"><?php echo $page_protect->r_read.'/5';?>
                                            </span>
                                          </div>
                                       
                                       
                                        <div  class="control-group">
                                            <label class="control-label" for="inputMaterialDetails">Vocabulary Review</label>
                                           <div style="word-wrap:break-word;width:40%;margin:0 auto;">
                                          <?php
                                              echo $page_protect->r_voc_rev;
                                            ?>
                                        </div>
                                        </div>
                                      <legend>Tutor's Remarks</legend>  
                                       <div class="control-group">
                                            <div style="word-wrap:break-word;width:40%;margin:0 auto;">
                                            <?php
                                            echo $page_protect->r_remarks;
                                            ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                            <?php echo'<a href="tutors.php?schedid='.$page_protect->sched_id.'&action=approve_report&t=2C">'?>
                                            <input type=button name="submit" value="Approve Report" class="btn btn-primary">
                                            </a>
                                            </div>
                                        </div>
                                      
                                   
                                    </div> <!--/well-->
                                 </div> <!--/span-->
                            </div> <!--/row-->
                            
        
          
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->


 <?php

 include('footer-supervisor.php');

 ?>   