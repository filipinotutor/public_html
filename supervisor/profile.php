<?php
include('header-supervisor.php');
$page_protect->get_user_info();
$page_protect->get_supervisor_info($page_protect->user_id);
?>
        <div class="col-md-9">
         
         <div class="row">
          <div class="col-md-7">
          <div class="row">
            <div class="col-md-12">
                <h4>Personal Info</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
          
              <div id="user">

                       <div class="visible-xs-block"> 
                        <div id="output" style="width:100%;">
                    
                        <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" > <img src="<?php echo $page_protect->sup_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /> </a>
                            </div>
                             <div id="progressbox" style="width:150px;"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
                        </div>

                <table class="table table-bordered table-striped table-hover table-condensed">
                	<tr>
                    	<td width="150" class="hidden-xs">
                        
                        <div id="output" style="width:100%;">
                    
                        <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" > <img src="<?php echo $page_protect->sup_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /> </a>
                            </div>
                             <div id="progressbox" style="width:150px;"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
                		</td>
                        <td style="vertical-align:middle">
                        <h3>
						            <?php echo '<a href="#" id="first_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Change your First Name" data-value="'.$page_protect->user_first_name.'"></a>'; ?>
                        <br />
                        <?php echo '<a href="#" id="last_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Change your Last  Name"data-value="'.$page_protect->user_last_name.'"></a>'; ?>
                        </h3>
                        
                        </td>
                        
                    </tr>
                   	<tr>
                    	<td class="hidden-xs">Nickname</td>
                        <td><?php echo '<a href="#" id="nick_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Enter your Nickname" data-value="'.$page_protect->sup_nickname.'"></a>'; ?></td>
                    </tr>
                    <tr>
                    	<td class="hidden-xs">Gender</td>
                        <td><?php echo '<a href="#" id="gender" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->user_gender.'" data-source="genders.php" title="Select gender"></a><br>'; ?></td>
                    </tr>

                    <tr>
                    	<td class="hidden-xs">Skype ID</td>
                        <td><?php echo '<a href="#" id="skype_id" data-type="text" data-pk="'.$page_protect->user_id.'"title="" data-value="'.$page_protect->user_skype_id.'"></a>'; ?></td>
                    </tr>
                     
                     <tr>
                    	<td class="hidden-xs">Phone</td>
                        <td><?php echo '<a href="#" id="phone" data-type="text" data-pk="'.$page_protect->user_id.'"title="" data-value="'.$page_protect->sup_phone.'"></a>'; ?></td>
                    </tr>
                     <tr>
                    	<td class="hidden-xs">Birthday</td>
                        <td><?php echo '<a href="#" id="birthday" data-type="combodate" data-pk="'.$page_protect->user_id.'" title="Click to change your birthday" data-value="'.$page_protect->sup_birthday.'"></a>'; ?>

                        </td>
                    </tr>
	                    
                 </table>
                 <!-- image upload modal -->
                
						<!-- Modal -->
						<div id="modalImageupload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  						<div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
        						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        						<h3 id="myModalLabel">Upload </h3>
      						</div>

      						<div class="modal-body" id="output">
                    <form action="upload.php" method="post" enctype="multipart/form-data" id="UploadForm">
                      
                          
                          <div class="input-group">
                          <span class="btn btn-warning btn-file input-group-addon">Browse : 
                                   <i class="glyphicon glyphicon-circle-arrow-up"></i>
                                   <input name="ImageFile" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;"/>
                                 </span>
                                 <input id="upfile" type="text" class="form-control" />
                                 <br />
                          </div>
                          <input type="hidden" name="pk" value="<?php echo $page_protect->user_id;?>" />
                          <input type="hidden" name="user" value="supervisor" />
                          <br />
        						
      						</div>
                      
      						<div class="modal-footer">
      						    <button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                      <button class="btn btn-primary" type="submit" id="SubmitButton" data-loading-text="Loading..." >Submit</button>
                      </form>
      						</div>
                </div>
              </div>
						</div>
                        
                        
				
                 <!-- end image upload modal -->
                 </div>
                 </div>
                 </div>
               </div> <!--/user-->  
            </div><!--/span-->
            <div class="row">
            <div class="col-md-7">      
              <div class="row">
                <div class="col-md-12">      
                  <h4>Account</h4>
                </div>
              </div>
            <div class="row">
            <div class="col-md-12">      
               <div id="user">
                 <table class="table table-bordered table-striped table-hover table-condensed">
                 	 <tr>
                    	<td style="width:150px;" class="hidden-xs">Username</td>
                        <td><strong><?php echo $page_protect->username; ?></strong></td>
                    </tr>
                    <tr>
                    	<td style="width:150px;" class="hidden-xs">Password</td>
                        <td><?php echo '<a href="#" id="password" data-type="password" data-pk="'.$page_protect->user_id.'"title="">[hidden]</a>'; ?></td>
                    </tr>  
                    <tr>
                    	<td class="hidden-xs">Email</td>
                        <td><?php echo '<a href="#" id="email" data-type="email" data-pk="'.$page_protect->user_id.'"title="" data-value="'.$page_protect->user_email.'"></a>'; ?></td>
                    </tr>
                  </table>   
             </div>        
            </div><!--/span-->
           </div>
           </div>
           </div>
           </div>
          <?php /* 0------------------------------------- Background and Experiences ---------------------------------
       <div class="row-fluid">
          <div class="span6">
              <h4>Educational Background and Experience</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	
                   	<tr>
                    	<td width="160">Highest Educational Level</td>
                        <td><?php echo '<a href="#" id="ed_level" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_ed_level.'" data-source="ed-levels.php"title="" data-value="</a><br>'; ?></td>
                    </tr>
                    <tr>
                    	<td>School/University</td>
                        <td><?php echo '<a href="#" id="school" data-type="text" data-pk="'.$page_protect->user_id.'"title="" data-value="'.$page_protect->tutor_school.'"></a>'; ?><br />Currently Attending: <?php echo '<a href="#" id="attending" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_attending.'" data-source="attending.php"title="" data-value="</a><br>'; ?> </td>
                    </tr>

                    <tr>
                    	<td>Teaching Experience</td>
                        <td><?php echo '<a href="#" id="teaching_exp" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_teaching_exp.'" data-source="data-sources.php?v=teaching-exp"title="" data-value="</a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
            <div class="span6">
            -------------------------------Self Intro -------------------------------
              <h4>Self Introduction</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	
                   	<tr>
                    	
                        <td><?php echo '<a href="#" id="self_intro" data-type="textarea" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_self_intro.'"title="" data-value="</a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
          
          
          </div><!--/row-->
          ---------------------------- Hobbies --------------------------------
           <div class="row-fluid">
           <div class="span6">
              <h4>Hobbies</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                	
                   	<tr>
                        <td>One per line.<br />
						<?php echo '<a href="#" id="hobby" data-type="textarea" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_hobby.'"title="" data-value="</a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
          </div><!--/row-->
          */?>

 <?php
 include('footer-supervisor.php');
 ?>   