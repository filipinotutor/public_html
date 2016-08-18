<?php
include('header-tutor.php');
$class_id = $page_protect->user_id;
?>
        <div class="col-md-9">
          <div class="row">
				      <div class="col-md-12">
                  <h4>Class History</h4>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">  
                <?php
                include("../includes/classhistory.php");
                 ?>
              </div>
          </div>
        </div><!--/span-->
           

 <?php
 include('footer-tutor.php');
 ?>   