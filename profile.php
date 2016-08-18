<?php
include('header-tutor.php');
?>
        <div class="span9">
         
          <div class="row-fluid">
            <div class="span6">
              <h4>Personal Info</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	<tr>
                    	<td width="150">
                        
                            <div id="output" style="width:100%;">
                    
                        <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->tutor_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>
                            </div>
                             <div id="progressbox" style="width:150px;"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
                		</td>
                        <td style="vertical-align:middle">
                        <h3>
						<?php echo '<a href="#" id="first_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Change your First Name">'.$page_protect->user_first_name.'</a>'; ?>
                        <br />
                        <?php echo '<a href="#" id="last_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Change your Last  Name">'.$page_protect->user_last_name.'</a>'; ?>
                        </h3>
                        
                        </td>
                        
                    </tr>
                   	<tr>
                    	<td>Nickname</td>
                        <td><?php echo '<a href="#" id="nick_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Enter your Nickname">'.$page_protect->tutor_nick_name.'</a>'; ?></td>
                    </tr>
                    <tr>
                    	<td>Gender</td>
                        <td><?php echo '<a href="#" id="gender" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->user_gender.'" data-source="genders.php" title="Select gender"></a><br>'; ?></td>
                    </tr>

                    <tr>
                    	<td>Skype ID</td>
                        <td><?php echo '<a href="#" id="skype_id" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->user_skype_id.'</a>'; ?></td>
                    </tr>
                     
                     <tr>
                    	<td>Phone</td>
                        <td><?php echo '<a href="#" id="phone" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_phone.'</a>'; ?></td>
                    </tr>
                     <tr>
                    	<td>Birthday</td>
                        <td><?php echo '<a href="#" id="birthday" data-type="combodate" data-pk="'.$page_protect->user_id.'" title="Click to change your birthday" data-value="'.$page_protect->tutor_birthday.'"></a>'; ?>

                        </td>
                    </tr>
	                    
                 </table>
                 <!-- image upload modal -->
                
						<!-- Modal -->
						<div id="modalImageupload" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="myModalLabel">Upload </h3>
						</div>
						<div class="modal-body" id="output">
                        <form action="upload.php" method="post" enctype="multipart/form-data" id="UploadForm">
                                File : <input name="ImageFile" type="file" />
                                <br />
                                <input type="hidden" name="pk" value="<?php echo $page_protect->user_id;?>" />
                                <br />
						</p>
						
						</div>
                       

						<div class="modal-footer">
						<button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary" type="submit" id="SubmitButton" data-loading-text="Loading..." >Submit</button>
                        </form>
						</div>
						</div>
                        
                        
				
                 <!-- end image upload modal -->
                 
               </div> <!--/user-->  
            </div><!--/span-->
            <div class="span6">
              <h4>Account</h4>
               <div id="user">
             <table class="table table-bordered table-striped table-hover">
                 	 <tr>
                    	<td style="width:150px;">Username</td>
                        <td><strong><?php echo $page_protect->username; ?></strong></td>
                    </tr>
                    <tr>
                    	<td style="width:150px;">Password</td>
                        <td><?php echo '<a href="#" id="password" data-type="password" data-pk="'.$page_protect->user_id.'" title="">[hidden]</a>'; ?></td>
                    </tr>  
                    <tr>
                    	<td>Email</td>
                        <td><?php echo '<a href="#" id="email" data-type="email" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->user_email.'</a>'; ?></td>
                    </tr>
                     <tr>
                    	<td>Bank Name</td>
                        <td><?php echo '<a href="#" id="bank_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_bank_name.'</a>'; ?>
                        <br />
                        Branch: <?php echo '<a href="#" id="bank_branch" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_bank_branch.'</a>'; ?>
                        </td>
                    </tr>
                     <tr>
                    	<td>Account Name</td>
                        <td><?php echo '<a href="#" id="accnt_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_accnt_name.'</a>'; ?></td>
                    </tr>
                     <tr>
                    	<td>Account Number</td>
                        <td><?php echo '<a href="#" id="accnt_number" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_accnt_number.'</a>'; ?></td>
                    </tr>
                    
             </table>   
             </div>        
            </div><!--/span-->
           
           
       
          </div><!--/row-->
          <div class="row-fluid">
          <div class="span6">
              <h4>Educational Background and Experience</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	
                   	<tr>
                    	<td width="160">Highest Educational Level</td>
                        <td><?php echo '<a href="#" id="ed_level" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_ed_level.'" data-source="ed-levels.php" title=""></a><br>'; ?></td>
                    </tr>
                    <tr>
                    	<td>School/University</td>
                        <td><?php echo '<a href="#" id="school" data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_school.'</a>'; ?><br />Currently Attending: <?php echo '<a href="#" id="attending" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_attending.'" data-source="attending.php" title=""></a><br>'; ?> </td>
                    </tr>

                    <tr>
                    	<td>Teaching Experience</td>
                        <td><?php echo '<a href="#" id="teaching_exp" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_teaching_exp.'" data-source="data-sources.php?v=teaching-exp" title=""></a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
            <div class="span6">
              <h4>Self Introduction</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	
                   	<tr>
                    	
                        <td><?php echo '<a href="#" id="self_intro" data-type="textarea" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_self_intro.'" title=""></a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
          
          
          </div><!--/row-->
           <div class="row-fluid">
           <div class="span6">
              <h4>Hobbies</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	
                   	<tr>
                        <td>One per line.<br />
						<?php echo '<a href="#" id="hobby" data-type="textarea" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_hobby.'" title=""></a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

 <?php
 include('footer-tutor.php');
 ?>   