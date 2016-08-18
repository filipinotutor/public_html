<?php

include('header-admin.php');
if(IsSet($_POST['del'])){
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
  }  
?>

    <div class="col-md-9">     
      <div class="tabbable tabs-left">
      <div class="tab-content">
        <div id="8A" class="tab-pane fade in <?php echo $tab=='8A' ? 'active' : '';?>">
          <div class="row">
            <div class="col-md-12">
              <h4>Tutor Guide</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
               <div class="form-horizontal">
                  <div id="user_guide">
                    <?php
                      echo $page_protect->user_guide_update('tutor');
                    ?>
                    
                    </div>
                </div>
            </div>
          </div>
          </div>

      <div id="8B" class="tab-pane fade in <?php echo $tab=='8B' ? 'active' : '';?>">
        <div class="row">
          <div class="col-md-12">
            <h4>Student Guide</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-horizontal">
              <div id="user_guide" style="height:450px;">
                  <?php
                    echo $page_protect->user_guide_update('student');
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>     

       <div id="8C" class="tab-pane fade in <?php echo $tab=='8C' ? 'active' : '';?>">
          <div class="row">
            <div class="col-md-12">
              <h4>Announcements</h4> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="form-horizontal">
              <form action=" <?php echo $_SERVER['PHP_SELF']; ?>?t=8C" method="POST">
                  <span class="label label-success">
                    <?php $dt = date("Y-m-d"); $tm = date('H:i',time()); echo $tm." ".$dt; ?>
                  </span>         
                <input style="width:100%;" type="text" name="title" placeholder="title"/>
                <textarea style="width:100%;resize:vertical;min-height:200px;max-height:200px;" placeholder="Message"  name="msg"></textarea>
                <button name="create" type="submit" class="btn btn-primary"><i class="icon-white icon-ok"></i>&nbsp;Submit</button>
              </form>          
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">          
              <div id="announcement">
                <div style="height:220px;overflow:hidden;overflow-y:scroll;">
                    <?php
                      echo $page_protect->ann_read_and_update();
                    ?>
                </div>
              </div>
            </div>
          </div>
       </div>
        
      </div>
      </div>
    </div><!-- col-md-9 -->



 <?php
 include('footer-admin.php');
 ?>   