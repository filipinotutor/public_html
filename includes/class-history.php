<?php
include('header-student.php');
$class_id = $page_protect->user_id;
?>
        <div class="col-md-9">
          <div class="row">  
            <div class="col-xs-12">
              <h4>あなたのクラス記録</h4>
              </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
          		<?php 
          		include("../includes/classhistory.php");
          		?>
			      </div>
          </div>
        </div>

 <?php
 include('footer-student.php');
 ?>   