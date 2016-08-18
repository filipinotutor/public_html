<?php
include('header-tutor.php');
?>
        <div class="col-md-9">
         
          <div class="row">
            <div class="col-md-12">
              <h4>Class Report</h4>
            </div><!--/span-->
          </div> 
       
          <div class="row"><!--/row-->
          <div class="col-md-12 form-horizontal">
         
          
          
          <?php
		  	if(isset($_POST['schedid']) && isset($_POST['uid']))
			{
				$schedid = filter_var($_POST['schedid'], FILTER_SANITIZE_STRING);  
				$uid = filter_var($_POST['uid'], FILTER_SANITIZE_STRING);  
				
				//print_r($_POST);
				
				 $attendance			= filter_var($_POST['attendance'], FILTER_SANITIZE_STRING);  
				 $inputMaterial			= filter_var($_POST['inputMaterial'], FILTER_SANITIZE_STRING);  
				 $inputMaterialDetails	= filter_var($_POST['inputMaterialDetails'], FILTER_SANITIZE_STRING);  
				 $grammar				= filter_var($_POST['grammar'], FILTER_SANITIZE_STRING);  
				 $pronunciation			= filter_var($_POST['pronunciation'], FILTER_SANITIZE_STRING);  
				 $vocabulary			= filter_var($_POST['vocabulary'], FILTER_SANITIZE_STRING);  
				 $listening				= filter_var($_POST['listening'], FILTER_SANITIZE_STRING);  
				 $reading				= filter_var($_POST['reading'], FILTER_SANITIZE_STRING);  
				 $inputVocReview		= filter_var($_POST['inputVocReview'], FILTER_SANITIZE_STRING);  
				 $inputRemarks			= filter_var($_POST['inputRemarks'], FILTER_SANITIZE_STRING);  
				 $user_id    			= filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);  
				 $sched_date			= filter_var($_POST['sched_date'], FILTER_SANITIZE_STRING);  
				 $sched_time			= filter_var($_POST['sched_time'], FILTER_SANITIZE_STRING);  
				 $sched_tutor_id		= filter_var($_POST['sched_tutor_id'], FILTER_SANITIZE_STRING);  
				
				
				//attendance
				
					if ($attendance == "") {  
						$errors .= 'Please indicate if student is Present or Absent.<br/>';  
					}  
					if ($inputMaterial == "") {  
						$errors .= 'Please select material used in the class.<br/>';  
					}  
					if ($inputMaterialDetails == "") {  
						$errors .= 'Please enter Details of Materials Covered.<br/>';  
					}  
			
				
				
			 if (!$errors) {  //check for errors
           //save
		  // echo 'ready to save';
		if(isset($_POST['submit']))
		{   if($page_protect->insert_tutor_report($schedid, $inputMaterial, $inputMaterialDetails, $attendance, $grammar, $pronunciation, $vocabulary, $listening, $reading, $vocabulary, $inputVocReview, $inputRemarks, $sched_tutor_id, $sched_date, $sched_time, $user_id ))
		   {
			  echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Your report has been submitted. <a href="classes.php">Back to Classes</a></div>';
			   }
			   else echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';  
		}	   
			   
  
        } else {  
            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>' . $errors . '<br/></div>';  
        }  
		
		} //end post
		  
		  	if(isset($_GET['schedid']) && isset($_GET['uid']))
			{
				$schedid=$_GET['schedid'];
				$uid=$_GET['uid'];
			}
			
			
			
				if(isset($schedid) || isset($uid))	//ready
				{
					if($page_protect->get_sched_info($schedid) && $page_protect->get_student_info($uid)) //get sched info and student info
						{	
							$time=explode(":",$page_protect->sched_time); //format time ex. 6:00-6:25
							$hr=$time[0];
							$mn=$time[1];
							$minute=intval($mn)+25;
							$month = str_pad($page_protect->sched_month, 2, '0', STR_PAD_LEFT);
							$page_protect->get_tutor_info($page_protect->sched_tutor_id); // get tutor info
							
							$user_id = $page_protect->sched_user_id;
							$sched_date = $page_protect->sched_year."-".$month."-".$page_protect->sched_day;
							$sched_time = $page_protect->sched_time;
							$sched_tutor_id = $page_protect->sched_tutor_id;

							echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
							echo '
									<div class="row">
									<div class="col-md-6">
									';
							echo '<table class="table table-striped table-bordered table-hover">';
							echo '<tr>';
								echo '<td>Student name:</td>'; //name
								echo '<td><strong>'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</strong></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Date:</td>'; //date
								echo '<td><strong>'.date('m',$page_protect->sched_month).' '.$page_protect->sched_day.', '.$page_protect->sched_year.'<strong></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Time:</td>'; //time
								echo '<td><strong>'.$page_protect->sched_time.' - '.$hr.':'.$minute.'</strong></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td>Tutor:</td>'; //tutor
								echo '<td><strong>'.$page_protect->tutor_nick_name.'</strong></td>';
							echo '</tr>';
							echo '</table>';
							echo '</div>';
							
							
							echo '
							<div class="col-md-6">
							';
								echo '<table class="table table-striped table-bordered table-hover">';
							echo '<tr>';
								echo '
								<td>
									<strong>
										<label class="radio" for="present">
										Present
										</label>
										<input type="radio" name="attendance" value="present" id="present" /> 
									</strong>
								</td>'; //attendance
								echo '
								<td>
									<strong>
									<label class="radio" for="absent">
										Absent
									</label>
									<input type="radio" name="attendance" value="absent" id="absent" />
									</strong>
								</td>'; //attendance
							
						
							echo '</tr>';
							echo '<tr>';
							echo '</table>
							</div>
							</div>';
								?>
                            	
							
                            <div class="row">
                                <div class="col-md-12">
                                 Asterisk (<span class="asterisk">*</span>) indicates a required field.
                                    <div class="well">
                                    <legend>Materials Details</legend>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="inputMaterial">Material <span class="asterisk">*</span></label>
                                        <div class="controls">
                                        <input name="user_id" value="<?php echo "".$user_id; ?>" type="hidden"/>
                                        <input name="sched_date" value="<?php echo "".$sched_date; ?>" type="hidden"/>
                                        <input name="sched_time" value="<?php echo "".$sched_time; ?>" type="hidden"/>
                                        <input name="sched_tutor_id" value="<?php echo "".$sched_tutor_id; ?>" type="hidden"/>
                                        <select name="inputMaterial" class="selectBox">
                                            <option value=""></option>
                                            	<?php
												$sql = 'SELECT material_id, title FROM materials';
												$rsd = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_array($rsd,MYSQL_NUM))
													{
													echo '<option value="'.$row[0].'">'.$row[1].'</option>';
													}
												?>
                                        </select>
                                        </div>
                                      </div>
                                      <div class="control-group">
                                            <label class="control-label" for="inputMaterialDetails">Details of Materials Covered <span class="asterisk">*</span></label>
                                            <div class="controls">
                                            <textarea name="inputMaterialDetails" style="width:90%;" rows="7" /><?php echo $_POST['inputMaterialDetails']?></textarea>
                                            <br />
                                            <small>Page number, exercise number, topics, external links, etc</small>
                                            </div>
                                        </div>
                                        
                                       <legend>Areas for Improvement</legend>  
                                       
                                        <div class="control-group">
                                            <label class="control-label" ></label>
                                            <div class="controls" style="margin-bottom:0px; padding-bottom:0px;">
                                             <span class="label label-info"><strong>1</strong>=Lowest <strong>5</strong>=Highest</span>
                                           <table class="radio-table">
                                          	<tr>
                                            	<td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                            </tr>
                                          </table>
                                            </div>
                                        </div>
                                       
                                       <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Grammar and Sentence Construction</label>
                                            <div class="controls">
                                          
                                           <table class="radio-table">
                                           
                                          	<tr>
                                                <?php
												if(isset($_POST['grammar']))
												{
													$grammar=$_POST['grammar'];	
													}
												for($x=1; $x<=5; $x++)	
												{
																echo '<td><input type="radio" name="grammar" value="'.$x.'" '.($x==$grammar ? 'checked' : '').' /></td>';
													}
                                                ?>

                                            </tr>
                                          </table>
                                            </div>
                                        </div>
                                         <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Pronunciation, Accent, Diction</label>
                                            <div class="controls">
                                          <table class="radio-table">
                                          	<tr>
                                                <?php
												if(isset($_POST['pronunciation']))
												{
													$pronunciation=$_POST['pronunciation'];	
													}
												for($x=1; $x<=5; $x++)	
												{
																echo '<td><input type="radio" name="pronunciation" value="'.$x.'" '.($x==$pronunciation ? 'checked' : '').' /></td>';
													}
                                                ?>

                                            </tr>
                                          </table>
                                            </div>
                                        </div>
                                         <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Vocabulary Bank & Word Choice</label>
                                            <div class="controls">
                                          <table class="radio-table">
                                          	<tr>
                                                <?php
												if(isset($_POST['vocabulary']))
												{
													$vocabulary=$_POST['vocabulary'];	
													}
												for($x=1; $x<=5; $x++)	
												{
																echo '<td><input type="radio" name="vocabulary" value="'.$x.'" '.($x==$vocabulary ? 'checked' : '').' /></td>';
													}
                                                ?>
                                            </tr>
                                          </table>
                                            </div>
                                        </div>
                                         <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Listening Comprehension</label>
                                            <div class="controls">
                                          <table class="radio-table">
                                          	<tr>
                                                <?php
												if(isset($_POST['listening']))
												{
													$listening=$_POST['listening'];	
													}
												for($x=1; $x<=5; $x++)	
												{
																echo '<td><input type="radio" name="listening" value="'.$x.'" '.($x==$listening ? 'checked' : '').' /></td>';
													}
                                                ?>
                                            </tr>
                                          </table>
                                            </div>
                                        </div>
                                          <div class="control-group improvement">
                                            <label class="control-label" for="inputMaterialDetails">Reading Comprehension</label>
                                            <div class="controls">
                                          <table class="radio-table">
                                          	<tr>
                                            	<?php
												if(isset($_POST['reading']))
												{
													$reading=$_POST['reading'];	
													}
												for($x=1; $x<=5; $x++)	
												{
																echo '<td><input type="radio" name="reading" value="'.$x.'" '.($x==$reading ? 'checked' : '').' /></td>';
													}
                                                ?>
                                            </tr>
                                          </table>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="control-group">
                                            <label class="control-label" for="inputMaterialDetails">Vocabulary Review</label>
                                            <div class="controls">
                                            <textarea name="inputVocReview" style="width:90%;" rows="7"><?php echo $_POST['inputVocReview']?></textarea>
                                            <br />
                                            <small>(List of words to be reviewed before starting the lesson)</small>
                                            </div>
                                        </div>
                                      <legend>Tutor's Remarks</legend>  
                                       <div class="control-group">
                                            <label class="control-label" for="inputReview"></label>
                                            <div class="controls">
                                            <textarea name="inputRemarks" style="width:90%;" rows="7"><?php echo $_POST['inputRemarks']?></textarea>
                                            <br />
                                            <small>(What happened in the class including student response and behavior towards tutor or his/her class)</small>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                            <?php
                                            echo '<input type="hidden" name="schedid" value="'.$schedid.'">';
											echo '<input type="hidden" name="uid" value="'.$uid.'">';
											?>
                    <div id="myModalConfirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">		
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4>Create Report</h4>
								<h4 id="myModalLabel"></h4>
								</div>
								<div class="modal-body">
									Do you want to proceed?
								</div>
							<div class="modal-footer">
							   <input type="submit" name="submit" value="Submit" class="btn">
                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
							</div>
					</div>
					</div>
					</div>
					<a href="#myModalConfirm"  data-toggle="modal" data-backdrop="static">
				        <input type="button" value="Submit" class="btn btn-primary btn-large">
				        </a>
                                            </div>
                                        </div>
                                      
                                   
                                    </div> <!--/well-->
                                 </div> <!--/span-->
                            </div> <!--/row-->
                            
							<?php	
							echo '</form>';
							
						} //end get student info
					else
					{
						echo '<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">&times;</a>Schedule not found. Please select schedule <strong><a href="classes.php">here</a></strong>.</div>';
							
						}	
						
						
						
					} // end ready
					else
					{
					echo '<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">&times;</a>Please select schedule <strong><a href="classes.php">here</a></strong>.</div>';
						}
		    ?>
        
          
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

 <?php
 include('footer-tutor.php');
 ?>   