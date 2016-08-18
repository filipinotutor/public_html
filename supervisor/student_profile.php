<?php
include('header-supervisor.php');
$page_validate->addSource($_GET);
$page_validate->addRule('StudId',"numeric", false, 1, 255, true);
@$page_validate->run();
if(sizeof($page_validate->errors) > 0)
{
    echo '<script>window.location.replace("students.php?t=1A");</script>';
}
else
{
    $stud_id = $_GET['StudId'];  
}
$stud = intval($stud_id);


if($page_protect->check_if_active($stud) == "y"){
  if($page_protect->check_user_access_student($stud,$page_protect->user_id)){
$page_protect->student_info_for_sup($stud);  
}
else{
    echo '<script>window.location.replace("students.php?t=1A&acc=n");</script>';
}
}
else{
    echo '<script>window.location.replace("students.php?t=1A&acc=f");</script>';
}


?>
         <div class="col-xs-12 col-md-9">
              
              <div class="col-xs-12 col-md-7">
               <form action="students.php?t=1A" method="POST">
                <input type="hidden" name="deactivate_id" value="<?php echo $stud;?> "/>
                 <button type="submit" name="deactivate" class="btn btn-warning pull-right">
                  <span class="hidden-xs">
                    <i class="glyphicon glyphicon-remove"></i>&nbsp;Deactivate Account
                  </span>
                  <span class="visible-xs-block">
                    <i class="glyphicon glyphicon-trash"></i>
                  </span>
                 </button>
               </form>
              <h4>Student's Information</h4>
              <div id="user">
              <div class="visible-xs-block">
                <div id="output" style="width:150px;">
                    <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" >
                    <img src="<?php echo $page_protect->student_photo; ?> " class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" />
                    </a>
                </div>
              </div>
                <table class="table table-bordered table-striped table-hover">
                	<tr>
                    	<td width="150px" class="hidden-xs">
                         <div id="output" style="width:150px">
                           <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" >
                           <img src="<?php echo $page_protect->student_photo; ?> " class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" />
                           </a>
                         </div>
                 		</td>
                        <td style="vertical-align:middle">
                          <h3>
    						            <?php echo '<a href="#" id="first_name"  data-type="text" data-pk="'.$stud.'" title="Change your First Name">'.$page_protect->student_first_name.'</a>'; ?>
                            <br />
                            <?php echo '<a href="#" id="last_name"  data-type="text" data-pk="'.$stud.'" title="Change your Last  Name">'.$page_protect->student_last_name.'</a>'; ?>
                          </h3>
                        </td>
                    </tr>
                   	<tr>
                    	    <td class="hidden-xs">Nickname</td>
                          <td><?php echo '<a href="#" id="nick_name"  data-type="text" data-pk="'.$stud.'" title="Enter your Nickname">'.$page_protect->student_nick_name.'</a>'; ?></td>
                    </tr>
                    <tr>
                    	   <td class="hidden-xs">Gender</td>
                         <td><?php echo '<a href="#" id="gender"  data-type="select" data-pk="'.$stud.'" data-value="'.$page_protect->student_gender.'" data-source="genders.php" title="Select gender"></a><br>'; ?></td>
                    </tr>

                    <tr>
                    	    <td class="hidden-xs">Skype ID</td>
                          <td><?php echo '<a href="#" id="skype_id"  data-type="text" data-pk="'.$stud.'" title="">'.$page_protect->student_skype_id.'</a>'; ?></td>
                    </tr>
                     
                     <tr>
                          <td class="hidden-xs">Phone</td>
                          <td><?php echo '<a href="#" id="phone"  data-type="text" data-pk="'.$stud.'" title="">'.$page_protect->student_phone.'</a>'; ?></td>
                    </tr>
                     <tr>
                          <td class="hidden-xs">Birthday</td>
                          <td><?php echo '<a href="#" id="birthday"  data-type="combodate" data-pk="'.$stud.'" title="Click to change your birthday" data-value="'.$page_protect->student_birthday.'"></a>'; ?>
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
                      <span class="btn btn-warning btn-file input-group-addon"> Browser : 
                               <i class="glyphicon glyphicon-circle-arrow-up"></i>
                               <input name="ImageFile" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;"/>
                             </span>
                             <input id="upfile" type="text" class="form-control" />
                             <br />
                      </div>
                                      <input type="hidden" name="pk" value="<?php echo $stud;?>" />
                                      <input type="hidden" name="user" value="student" />
                  </div>
                  
                  <div class="modal-footer">
                    <button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary" type="submit" id="SubmitButton" data-loading-text="Loading..." >Submit</button>
                    </form>
                    <!-- end image upload modal -->
                  </div> <!--/user-->  
                
              </div>
						</div>

                        
                        
				
                 <!-- end image upload modal -->
                 
               </div> <!--/user-->  
              </div><!--/span-->
            <h4>Account</h4>
             <div id="user">
             <table class="table table-bordered table-hover">
                 	 <tr>
                    	<td style="width:150px;" class="hidden-xs">Username</td>
                      <td><strong><?php echo $page_protect->username; ?></strong></td>
                    </tr>
                    <tr>
                    	<td style="width:150px;" class="hidden-xs">Password</td>
                      <td><?php echo '<a href="#" id="password" data-type="password"  data-pk="'.$stud.'" title="">[hidden]</a>'; ?></td>
                    </tr>  
                    <tr>
                    	<td class="hidden-xs">Email</td>
                      <td><?php echo '<a href="#" id="email" data-type="email"  data-pk="'.$stud.'" title="">'.$page_protect->student_email.'</a>'; ?></td>
                    </tr>
                    
             </table>   
             </div>        
            </div> <!--/span-->
           
       
          </div><!--/row-->
          
 <?php
 include('footer-supervisor.php');
 ?>   