<?php
include('header-admin.php');
// $page_validate->addSource($_GET);
// $page_validate->addRule('AppId',"numeric", false, 1, 255, true);
// @$page_validate->run();
// if(sizeof($page_validate->errors) > 0)
// {
//     echo '<script>window.location.replace("applicants.php?t=3A");</script>';
// }
// else
// {
    $stud_id = $_GET['AppId'];

    if(!isset($stud_id)){
       echo '<script>window.location.replace("applicants.php?t=3A");</script>';
    }

// }
//die();
//$stud_id = ;
//$stud_id = filter_input(INPUT_GET, 'StudId', FILTER_SANITIZE_NUMBER_INT);
$tud = intval($stud_id);
$page_protect->app_info_for_sup($tud);

?>
<div class="col-md-9">
         
          <div class="row">
            <div class="col-md-7">

          <div class="row">
            <div class="col-md-12">
              <h4>Applicant's Information</h4>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">  
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                  <tr>
                        <td style="vertical-align:middle" colspan="2">
                        <h3>
                        <?php echo '<a href="#" id="first_name"  data-type="text" data-pk="'.$tud.'" title="Change the tutor\'s First Name">'.$page_protect->app_first_name.'</a>'; ?>
                        <br />
                        <?php echo '<a href="#" id="last_name"  data-type="text" data-pk="'.$tud.'" title="Change the tutor\'s Last  Name">'.$page_protect->app_last_name.'</a>'; ?>
                        </h3>
                        
                        </td>
                        
                    </tr>
                    <tr>
                      <td class="hidden-xs">Gender</td>
                        <td><?php echo '<a href="#"  id="gender" data-type="select" data-pk="'.$tud.'" data-value="'.$page_protect->app_gender.'" data-source="genders.php" title="Select gender"></a><br>'; ?></td>
                    </tr>
                    <tr>
                      <td class="hidden-xs">Email</td>
                        <td><?php echo '<a href="#"  id="email" data-type="text" data-pk="'.$tud.'" data-value="'.$page_protect->app_email.'"  title="Edit E-mail"></a><br>'; ?></td>
                    </tr>

                    <tr>
                      <td class="hidden-xs">Skype ID</td>
                        <td><?php echo '<a href="#"  id="skype" data-type="text" data-pk="'.$tud.'" title=""Change the tutor\'s Skype ID">'.$page_protect->app_skype.'</a>'; ?></td>
                    </tr>
                     
                     <tr>
                      <td class="hidden-xs">Phone</td>
                        <td><?php echo '<a href="#"  id="mobile" data-type="text" data-pk="'.$tud.'" title=""Change the tutor\'s Phone Number">'.$page_protect->app_phone.'</a>'; ?></td>
                    </tr>
                     <tr>
                      <td class="hidden-xs">Birthday</td>
                        <td><?php 
						//echo $page_protect->app_birthday;
						
						
						echo '<a href="#"  id="birthday" data-type="combodate" data-pk="'.$tud.'" title="Click to change the tutor\'s birthday" data-value="'.$page_protect->app_birthday.'"></a>'; 
						
						?>

                        </td>
                    </tr>
                      
                 </table>
               <?php /* 
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
                                <input type="hidden" name="pk" value="<?php echo $tud;?>" />
                                <input type="hidden" name="user" value="tutor" />
                                <br />
            </p>
            
            </div>
                       

            <div class="modal-footer">
            <button class="btn " data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary" type="submit" id="SubmitButton" data-loading-text="Loading..." >Submit</button>
                        </form>
            </div>
            </div>
                        
                        
        
                 <!-- end image upload modal --> */
                ?> 
               </div> <!--/user-->  
            </div><!--/span-->           
       
          </div><!--/row-->
          </div>
          </div>
          <div class="row">
            <div class="col-md-7">

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
                      <td width="180px" class="hidden-xs">Highest Educational Level</td>
                        <td><?php 

								
						//echo $page_protect->app_ed_level;
						echo '<a href="#" id="level"  data-type="select" data-pk="'.$tud.'" data-value="'.$page_protect->app_ed_level.'" data-source="ed-levels.php" title="">'.$page_protect->app_ed_level.'</a><br>'; ?>
						
						</td>
                    </tr>
                    <tr>
                      <td class="hidden-xs">School/University</td>
                        <td><?php echo '<a href="#" id="school"  data-type="text" data-pk="'.$tud.'" title="Enter the tutor\'s University">'.$page_protect->app_school.'</a>'; ?><br />Currently Attending: <?php echo '<a href="#" id="attending" data-type="select" data-pk="'.$tud.'" data-value="'.$page_protect->app_attending.'" data-source="attending.php" title=""></a><br>'; ?> </td>
                    </tr>

                    <tr>
                      <td class="hidden-xs">Teaching Experience</td>
                        <td><?php echo '<a href="#" id="teaching_exp"  data-type="select" data-pk="'.$tud.'" data-value="'.$page_protect->app_teaching_exp.'" data-source="data-sources.php?v=teaching-exp" title="Enter the tutor\'s Teaching Experience"></a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
            </div>
          </div>
      </div>
           
          <div class="row">
            <div class="col-md-7">
            <div class="row">
              <div class="col-md-12">
                <h4>Self Introduction</h4>
              </div>
            </div>
            

          <div class="row">
            <div class="col-md-12">
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                  
                    <tr>
                      
                        <td><?php echo '<a href="#" id="self_intro"  data-type="textarea" data-pk="'.$tud.'" data-value="'.$page_protect->app_self_intro.'" title="Change tutor\'s Introduction"></a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
          </div>
          </div>
          </div>
          </div>

          <?php /*
          <!--/row-->
           <div class="row-fluid">
           <div class="span6">
              <h4>Hobbies</h4>
              <div id="user">
                <table class="table table-bordered table-striped table-hover">
                  
                    <tr>
                        <td>
            <?php echo '<a href="#" id="hobby"  data-type="textarea" data-pk="'.$tud.'" data-value="'.$page_protect->app_hobby.'" title="Add tutor\'s Hobbies"></a><br>'; ?></td>
                    </tr>
                 </table>
                 
                 
               </div> <!--/user--> 
            </div><!--/span-->
          </div><!--/row-->
        */ ?>
 <?php
 include('footer-admin.php');
 ?>   