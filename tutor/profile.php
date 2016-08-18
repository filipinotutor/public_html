<?php
include('header-tutor.php');
?> 

<div class="col-md-9">
        
        <div class="row">
          <div class="col-md-7">            
               <div class="row">
                 <div class="col-md-6">            
                    <h4>Tutor's Information</h4>
                  </div>
                <div class="col-md-2 col-md-offset-4">
                  <form action="tutors.php?t=2A" method="POST">
                   <input type="hidden" name="deactivate_id" value="<?php echo $tud;?> "/>
                      <button type="submit" name="deactivate" class="btn btn-warning pull-right">
                        <span class="hidden-xs">
                          <i class="glyphicon glyphicon-remove"></i>&nbsp;Deactivate Account
                        </span>
                        <span class="visible-xs-block">
                          <i class="glyphicon glyphicon-trash"></i>
                        </span>
                       </button>
                    </form>
                    </div>
                </div> 
              <!--<div id="user">
              <div class="row visible-xs-block">
                <div class="col-md-12" syle="text-align:center;">
                  <div id="output" style="width:150px;">
                    <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->tutor_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>
                  </div>
                  <div id="progressbox" style="width:150px;">
                    <div id="progressbar"></div >
                    <div id="statustxt">0%</div >
                  </div>
                </div>
              </div>-->
              
              
              <div class="row">
                <div class="col-md-12">

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <td class="hidden-xs" width="150px;">
                          <div id="output" style="width:150px;">
                            <a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" data-placement="right" ><img src="<?php echo $page_protect->tutor_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>
                          </div>
                          <div id="progressbox" style="width:150px;">
                            <div id="progressbar"></div >
                            <div id="statustxt">0%</div >
                          </div>
                        </td>
                    <input name='userid' value="<?php echo $stud;?>" type="hidden">
                        <td style="vertical-align:middle">
                          <h3>
                            <?php echo '<a href="#" id="first_name"  data-type="text" data-pk="'.$page_protect->user_id.'" title="Change the tutor\'s First Name">'.$page_protect->user_first_name.'</a>'; ?> <br />
                            <?php echo '<a href="#" id="last_name"  data-type="text" data-pk="'.$page_protect->user_id.'" title="Change the tutor\'s Last  Name">'.$page_protect->user_last_name.'</a>'; ?>
                          </h3>
                        </td>
                    </tr>
                    <tr>
                        <td  class="hidden-xs">Audio Presentation</td>
                        <td>
                        <div id="output1" style="width:150px;">
            <?php
              if($page_protect->tutor_audio !='') {
                echo '<p><a class="btn btn-info btn-xs" href="#modalImageupload1" role="button" data-toggle="modal" title="Upload mp3 file" data-placement="right" >Change</a></p>';
                echo '<p><audio src="../audio/tutors/'.$page_protect->tutor_audio.'" controls="controls"></p>';
                
                }
              else {
                  echo '<a class="btn btn-info btn-xs" href="#modalImageupload1" role="button" data-toggle="modal" title="Upload mp3 file" data-placement="right" >Upload</a>';
                } 
                        ?>
                        </div>
                        <div id="progressbox1" style="width:150px;">
                            <div id="progressbar1"></div >
                            <div id="statustxt1">0%</div >
                          </div>
                          <!--
                          <div id="progressbox1" style="width:150px;">
                            <div id="progressbar1"></div >
                          </div>-->
                          </td>
                    </tr>
                    <tr>
                        <td  class="hidden-xs">Nickname</td>
                        <td><?php echo '<a href="#"  id="nick_name" data-type="text" data-pk="'.$page_protect->user_id.'" title="Change the tutor\'s Nickname">'.$page_protect->tutor_nick_name.'</a>'; ?></td>
                    </tr>  
                    <tr>
                        <td class="hidden-xs">Gender</td>
                        <td><?php echo '<a href="#"  id="gender" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->user_gender.'" data-source="genders.php" title="Select gender"></a><br>'; ?></td>
                    </tr>
                    <tr>  
                        <td class="hidden-xs">Skype ID</td>
                        <td><?php echo '<a href="#"  id="skype_id" data-type="text" data-pk="'.$page_protect->user_id.'" title=""Change the tutor\'s Skype ID">'.$page_protect->user_skype_id.'</a>'; ?></td>
                     </tr>
                     <tr>
                        <td class="hidden-xs">Phone</td>
                        <td><?php echo '<a href="#"  id="phone" data-type="text" data-pk="'.$page_protect->user_id.'" title=""Change the tutor\'s Phone Number">'.$page_protect->tutor_phone.'</a>'; ?></td>
                      </tr>
                      <tr>
                        <td class="hidden-xs">Birthday</td>
                        <td><?php echo '<a href="#"  id="birthday" data-type="combodate" data-pk="'.$page_protect->user_id.'" title="Click to change the tutor\'s birthday" data-value="'.$page_protect->tutor_birthday.'"></a>'; ?>
                      </td>
                      </tr>
                 </table>
                 <!-- image upload modal -->
                
            <!-- Modal -->
            <!-- <div id="modalImageupload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              
              <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="myModalLabel">Upload </h3>
                  </div>
                  
                  <div class="modal-body">
                              <form action="upload.php" method="post" enctype="multipart/form-data" id="UploadForm">
                                     
                      <div class="input-group">
                      <span class="btn btn-warning btn-file input-group-addon"> Browser : 
                               <i class="glyphicon glyphicon-circle-arrow-up"></i>
                               <input name="ImageFile" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;"/>
                             </span>
                             <input id="upfile" type="text" class="form-control" />
                             <br />
                      </div>
                                      <input type="hidden" name="pk" value="<?php echo $page_protect->user_id;?>" />
                                      <input type="hidden" name="user" value="tutor" />
                  </div>
                  
                  <div class="modal-footer">
                    <button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary" type="submit" id="SubmitButton" data-loading-text="Loading..." >Submit</button>
                    </form>
                    <!-- end image upload modal 
                  </div> <!--/user
                
                </div>
              </div>
            </div> -->
            <!-- modal -->
            
               <!-- Modal audio-->
            <div id="modalImageupload1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              
              <div class="modal-dialog">
                <div class="modal-content">
                  
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="myModalLabel1">Upload </h3>
                  </div>
                  
                  <div class="modal-body">
                              <form action="upload-audio.php" method="post" enctype="multipart/form-data" id="UploadForm1">
                                     
                      <div class="input-group">
                      <span class="btn btn-warning btn-file input-group-addon"> Browser : 
                               <i class="glyphicon glyphicon-circle-arrow-up"></i>
                               <input name="ImageFile1" type="file" id="fil1" onchange="document.getElementById('upfile1').value = document.getElementById('fil1').value;"/>
                             </span>
                             <input id="upfile1" type="text" class="form-control" />
                             <br />
                      </div>
                      <div id="statustxt1">0%</div >
                                      <input type="hidden" name="pk" value="<?php echo $page_protect->user_id;?>" />
                                      <input type="hidden" name="user" value="tutor" />
                                      
                                       
                  </div>
                  
                  <div class="modal-footer">
                    <button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary" type="submit" id="SubmitButton1" data-loading-text="Loading..." >Submit</button>
                    </form>
                    <!-- end image upload modal -->
                  </div> <!--/user-->  
                
                </div>
              </div>
            </div><!-- modal -->
          </div>
          </div>

        <div class="row">
          <div class="col-md-12">            
           <h4>Educational Background and Experience</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">            
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                  <tr>
                    <td width="160" class="hidden-xs">Highest Educational Level</td>
                    <td><?php echo '<a href="#" id="ed_level"  data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_ed_level.'" data-source="ed-levels.php" title=""></a><br>'; ?></td>
                  </tr>
                  <tr>
                    <td class="hidden-xs">School/University</td>
                    <td><?php echo '<a href="#" id="school"  data-type="text" data-pk="'.$page_protect->user_id.'" title="Enter the tutor\'s University">'.$page_protect->tutor_school.'</a>'; ?><br />Currently Attending: <?php echo '<a href="#" id="attending" data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_attending.'" data-source="attending.php" title=""></a><br>'; ?> </td>
                  </tr>
                  <tr>
                    <td class="hidden-xs">Teaching Experience</td>
                    <td><?php echo '<a href="#" id="teaching_exp"  data-type="select" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_teaching_exp.'" data-source="data-sources.php?v=teaching-exp" title="Enter the tutor\'s Teaching Experience"></a><br>'; ?></td>
                  </tr>
                </table>
              </div> <!--/user-->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">            
              <h4>Self Introduction</h4>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">            
              <div id="user">
              <div class=" well">
                <?php echo '<a href="#" id="self_intro"  data-type="textarea" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_self_intro.'" title="Change tutor\'s Introduction"></a><br>'; ?>
              </div>
              </div>
          </div>
        </div>

          </div> <!-- col-md-6 -->  
          </div>

          <div class="col-md-5">
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
                        <td style="width:150px;"  class="hidden-xs">Username</td>
                        <td><strong><?php echo $page_protect->username; ?></strong></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs">Password</td>
                        <td><?php echo '<a href="#" id="password"  data-type="password" data-pk="'.$page_protect->user_id.'" title=""Change the tutor\'s Password">[hidden]</a>'; ?></td>
                    </tr>  
                    <tr>
                        <td class="hidden-xs">Email</td>
                        <td><?php echo '<a href="#" id="email"  data-type="email" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->user_email.'</a>'; ?></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs">Bank Name</td>
                        <td><?php echo '<a href="#" id="bank_name"  data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_bank_name.'</a>'; ?></td>    
                    </tr>
                    <tr>
                        <td class="hidden-xs">Branch:</td>
                        <td><?php echo '<a href="#" id="bank_branch"  data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_bank_branch.'</a>'; ?></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs">Account Name</td>
                        <td><?php echo '<a href="#" id="accnt_name"  data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_accnt_name.'</a>'; ?></td>
                    </tr>
                    <tr>
                        <td class="hidden-xs">Account Number</td>
                        <td><?php echo '<a href="#" id="accnt_number"  data-type="text" data-pk="'.$page_protect->user_id.'" title="">'.$page_protect->tutor_accnt_number.'</a>'; ?></td>
                    </tr>
                </table>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12">            
                <h4>Hobbies</h4>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">            
                <div id="user">
                <div class=" well">
                <?php echo '<a href="#" id="hobby"  data-type="textarea" data-pk="'.$page_protect->user_id.'" data-value="'.$page_protect->tutor_hobby.'" title="Add tutor\'s Hobbies"></a><br>'; ?>
                </div>
                </div>
              </div>
            </div>
          </div><!-- col-md-6 -->
          
      </div><!--/col-md-9 -->


 <?php
 include('footer-tutor.php');
 ?>   