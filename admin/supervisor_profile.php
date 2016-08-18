<?php
include('header-admin.php');
$page_validate->addSource($_GET);
$page_validate->addRule('SupId',"numeric", false, 1, 255, true);

@$page_validate->run();

if(sizeof($page_validate->errors) > 0)
{
    echo '<script>window.location.replace("supervisors.php?t=7A");</script>';
}
else{

    $sup_id = $_GET['SupId'];  
$sup = intval($sup_id);
if($page_protect->check_if_active($sup) == "y"){
$page_protect->get_supervisor_info($sup);  
}
else{
    echo '<script>window.location.replace("supervisors.php?t=7A&acc=f");</script>';
  }
}
?>
        <div class="col-md-9">
         
          <div class="row">
            <div class="col-md-7">
            <div class="row">
              <div class="col-xs-8 col-md-8">             
                <h4>Personal Info</h4>
              </div>
              <div class="col-xs-4 col-md-4">
                <form action="supents.php?t=1A" method="POST">
                <input type="hidden" name="deactivate_id" value="<?php echo $sup;?> "/>
                <button type="submit" name="deactivate" class="btn btn-warning pull-right">
                <span class="hidden-xs">
                  <i class="glyphicon glyphicon-trash"></i>&nbsp;Deactivate Accounts
                </span>
                <span class="viible-xs-block">
                  <i class="glyphicon glyphicon-trash"></i>
                
                </span>
                </button>
                </form>
                </div>
             </div>
              <div class="row">
                <div class="col-md-12">             
                  <div id="user">
                      <div class="visible-xs-block">
                        <div id="output" style="width:100%;">
                          <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" > <img src="<?php echo $page_protect->sup_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /> </a>
                        </div>
                        <div id="progressbox" style="width:150px;">
                          <div id="progressbar"></div >
                          <div id="statustxt">0%</div >
                        </div>
                      </div>
                  <table class="table table-bordered table-striped table-hover">
                  <tr>
                      <td width="150px" class="hidden-xs">      
                        <div id="output" style="width:100%;">
                          <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" > <img src="<?php echo $page_protect->sup_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /> </a>
                        </div>
                        <div id="progressbox" style="width:150px;">
                          <div id="progressbar"></div >
                          <div id="statustxt">0%</div >
                        </div>
                      </td>
                      <td style="vertical-align:middle">
                        <h3>
                        <?php echo '<a href="#" id="first_name" data-type="text" data-pk="'.$sup.'" title="Change your First Name" data-value="'.$page_protect->sup_fname.'"></a>'; ?>
                        <br />
                        <?php echo '<a href="#" id="last_name" data-type="text" data-pk="'.$sup.'" title="Change your Last  Name" data-value="'.$page_protect->sup_lname.'"></a>'; ?>
                        </h3>
                      </td>
                    </tr>
                    <tr>
                        <td class="hidden-xs">Nickname</td>
                        <td><?php echo '<a href="#" id="nick_name" data-type="text" data-pk="'.$sup.'" title="Enter your Nickname" data-value="'.$page_protect->sup_nickname.'"> </a>'; ?></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs">Gender</td>
                        <td><?php echo '<a href="#" id="gender" data-type="select" data-pk="'.$sup.'" data-value="'.$page_protect->sup_gender.'" data-source="genders.php" title="Select gender"></a><br>'; ?></td>
                    </tr>
                     <tr>
                        <td class="hidden-xs">Skype ID</td>
                        <td><?php echo '<a href="#" id="skype_id" data-type="text" data-pk="'.$sup.'" title="Change the Skype ID" data-value="'.$page_protect->user_skype_id.'"></a>'; ?></td>
                    </tr>
                     <tr>
                        <td class="hidden-xs">Phone</td>
                        <td><?php echo '<a href="#" id="phone" data-type="text" data-pk="'.$sup.'" title="Change the phone number" data-value="'.$page_protect->sup_phone.'"></a>'; ?></td>
                    </tr>
                     <tr>
                        <td class="hidden-xs">Birthday</td>
                        <td><?php echo '<a href="#" id="birthday" data-type="combodate" data-pk="'.$sup.'" title="Click to change your birthday" data-value="'.$page_protect->sup_birthday.'"></a>'; ?></td>
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
                                <input type="hidden" name="pk" value="<?php echo $sup;?>" />
                                <input type="hidden" name="user" value="supervisor" />
            </p>
            
                       
            <div class="modal-footer">
            <button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary" type="submit" id="SubmitButton" data-loading-text="Loading..." >Submit</button>
                        </form>
        
                 <!-- end image upload modal -->
                 
               </div> <!--/user-->  
            </div><!--/span-->
            </div>
            </div>
            </div>
            </div><!--row-->
            </div>
            </div>
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
                <table class="table table-bordered table-striped table-hover">
                   <tr>
                        <td style="width:150px;" class="hidden-xs">Username</td>
                        <td><strong><?php echo $page_protect->sup_username; ?></strong></td>
                    </tr>
                     <tr>
                        <td class="hidden-xs">Password</td>
                        <td><?php echo '<a href="#" id="password" data-type="password" data-pk="'.$sup.'" title="Change current password">[hidden]</a>'; ?></td>
                    </tr>
                    <tr>  
                        <td class="hidden-xs">Email</td>
                        <td><?php echo '<a href="#" id="email" data-type="email" data-pk="'.$sup.'" title="Change the Email Address" data-value="'.$page_protect->sup_email.'"></a>'; ?></td>
                    </tr>
                </table>   
             </div>        
           </div>
           </div>
           </div>
           </div>
          </div><!--/row-->
          <?php /* 0------------------------------------- Background and Experiences ---------------------------------
       <div class="row-fluid">
          <div class="span6">
              <h4>Educational Background and Experience</h4>
                  
                      <td width="160">Highest Educational Level</td>
                        <td><?php echo '<a href="#" id="ed_level" data-type="select" data-pk="'.$sup.'" data-value="'.$page_protect->tutor_ed_level.'" data-source="ed-levels.php" title=""></a><br>'; ?></td>
                      <td>School/University</td>
                        <td><?php echo '<a href="#" id="school" data-type="text" data-pk="'.$sup.'" title="">'.$page_protect->tutor_school.'</a>'; ?><br />Currently Attending: <?php echo '<a href="#" id="attending" data-type="select" data-pk="'.$sup.'" data-value="'.$page_protect->tutor_attending.'" data-source="attending.php" title=""></a><br>'; ?> </td>
                      <td>Teaching Experience</td>
                        <td><?php echo '<a href="#" id="teaching_exp" data-type="select" data-pk="'.$sup.'" data-value="'.$page_protect->tutor_teaching_exp.'" data-source="data-sources.php?v=teaching-exp" title=""></a><br>'; ?></td>
               </div> <!--/user--> 
            -------------------------------Self Intro -------------------------------
              <h4>Self Introduction</h4>
                      
                        <td><?php echo '<a href="#" id="self_intro" data-type="textarea" data-pk="'.$sup.'" data-value="'.$page_protect->tutor_self_intro.'" title=""></a><br>'; ?></td>
          
          ---------------------------- Hobbies --------------------------------
           <div class="row-fluid">
           <div class="span6">
              <h4>Hobbies</h4>
                        <td>One per line.<br />
            <?php echo '<a href="#" id="hobby" data-type="textarea" data-pk="'.$sup.'" data-value="'.$page_protect->tutor_hobby.'" title=""></a><br>'; ?></td>
          */?>
        </div><!--/span-->
      </div><!--/row-->

 <?php
 include('footer-admin.php');
 ?>   