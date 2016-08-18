<?php

include('header-student.php');

$class_id = $page_protect->user_id;

$page_protect->get_guide('student');


?>
         
          <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h4>Dashboard</h4>
            </div>
          </div>
          
    <div class="row">
          <!-- <div class="col-md-12">
             <div class="well">
                <h4><?php //echo $page_protect->g_title; ?></h4>
                    <?php //echo $page_protect->g_content; ?>
             </div>
             </div>
       --> 

      <div class="col-sm-5">
        <a href="http://filipinotutor.com/guide/pdf/FilipinoTutor.com_Student_Guide.pdf" target="_BLANK" class="hoverbanner hovernew"></a>
      </div>
      <?php
      if($t_credits->isNotTrial){
      ?>
      <div class="col-sm-5">
        <a href="/student/materials.php?t=4B" class="hoverbanner hovertutor"></a>
      </div>
      <?php
        } else {
      ?>
      <div class="col-sm-5">
          <a href="/student/buy-credits.php" class="hoverbanner hovertutor1"></a>
          <div style="background-color:red;"></div>  
      </div>
       <?php 
        }
      ?>

    </div>
    <br />
    <br />
    <div class="row">
      <div class="col-sm-5">
       <a href="/student/book-classes.php" class="hoverbanner hoverlesson"></a>
      </div>
      <div class="col-sm-5">
        
      </div>
    </div>
	<br />
    <br />
        <!--  <div class="row">
           <div class="col-md-12">
            <h4>Class History</h4>
           </div>
         </div>
        <div class="row">
           <div class="col-md-12">
             <?php
             //include("../includes/classhistory.php");
             ?>
            </div>
        </div> -->

    </div>

         
 <?php

 include('footer-student.php');

 ?>   