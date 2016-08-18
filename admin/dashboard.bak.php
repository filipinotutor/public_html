<?php

include('header-admin.php');
/*if(IsSet($_POST['del'])){
        $del = $page_protect->delete_announcement($_POST['id']);
        if(($del)) //success
                    {
              echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Successfully Deleted.</div>';      
                    }
                else
              echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>There is an error in deleting Announcement.</div>';
                }
if(IsSet($_POST['create'])){
    $title = $_POST['title'];
    $title = $page_protect->replace_symbols($title);
    $msg = $_POST['msg'];
    $msg = $page_protect->replace_symbols($msg);
    $date = date("Y-m-d");
    $time = date('H:i',time());
    $sql = "INSERT INTO announcement( `id`,`title`,`msg`,`date`,`user_id`,`time`) VALUES (NULL,'".$title."','".$msg."','".$date."','".$page_protect->user_id."','".$time."')";
 
    $res = mysql_query($sql) or die("Error in creating announcement: ".mysql_error());
    if(($res)) //success
          echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Successfully Created.</div>';      
          echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>There is an error in creating Announcement.</div>';
            }  



if(IsSet($_POST['update'])){
  
  $title = $_POST['title'];
    
    if(IsSet($_POST['content'])){
      $content = $_POST['content'];
      }
    else{
      $content = $_POST['content2'];
      }
  
  $id=  $_POST['id'];
      
      $res =    $page_protect->update_guide_ajax($id, $title, $content);
      if($res){
        echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Successfully Updated.</div>';      
        }

      else{
        echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>There is an error in creating Announcement.</div>';
        }
  }  */
?>

    <div class="col-md-9 col-md-offset-3">     
       <div class="row">
            <div class="col-md-12">
              <h4>New Students</h4>
            </div>
          </div>
             <div class="row">
            <div class="col-md-12">
          <table class="table table-condensed table-bordered table-striped table-hover">
          <thead>
              <tr class='alert alert-success'>
              <th></th>
              <th>Name:</th>
              <th>Email:</th>
              <th>Skype ID:</th>
              </tr>
          </thead>
          <tbody>
            <?php
              $output = $page_protect->get_notification_list($page_protect->user_id,"AND `notification`.`process_name` = 'new student ' "," LIMIT 0,20");
                for($x=0;$x!=$output['count'][0];$x++){
                $page_protect->student_info_for_sup($output[$x]['p_id']);
                
                echo'
                <tr>
                  <td>'.$output[$x]['p_id'].'</td>
                  <td>'.$page_protect->student_first_name.' '.$page_protect->student_last_name.'</td>
                  <td>'.$page_protect->student_email.'</td>
                  <td>'.$page_protect->student_skype_id.'</td>
                </tr>
                ';
              }
            ?>
          </tbody>
          </table>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4>New Applicants</h4>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12">
          <table class="table table-condensed table-bordered table-striped table-hover">
          <thead>
              <tr class='alert alert-success'>
              <th></th>
              <th>Name:</th>
              <th>Email:</th>
              <th>Skype ID:</th>
              </tr>
          </thead>
          <tbody>
            <?php
              $output = $page_protect->get_notification_list($page_protect->user_id,"AND `notification`.`process_name` = 'new applicant' "," LIMIT 0,20");
                for($x=0;$x!=$output['count'][0];$x++){
                $page_protect->app_info_for_sup($output[$x]['p_id']);
                
                if($page_protect->app_email){
                echo'
                <tr>
                  <td>'.$output[$x]['p_id'].'</td>
                  <td>'.$page_protect->app_first_name.' '.$page_protect->app_last_name.'</td>
                  <td>'.$page_protect->app_email.'</td>
                  <td>'.$page_protect->app_skype.'</td>
                </tr>
                ';
            	}
              }
            ?>
          </tbody>
          </table>
          </div>
          </div>
        
    </div><!-- col-md-9 -->



 <?php
 include('footer-admin.php');
 ?>   