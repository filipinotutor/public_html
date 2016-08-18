   <?php
   $path =$page_protect->get_path();
    if($path == "student_schedule.php"){
      $numofrec = 10;
      $url = ''.$_SERVER['PHP_SELF'].'?t=1A&StudId='.$stud.'';
    }elseif ($path == "viewhistory.php") {
      $numofrec = 5;
      $url = ''.$_SERVER['PHP_SELF'].'?id='.$class_id.'';
    }
    else{
      $numofrec = 5;
      $url = $_SERVER['PHP_SELF'];
    }
   if($limits>$numofrec)
   {
    if(isset($_POST['next'])){
      if($page < $limit-1){
        $page+=1;
        $pages = $page * $numofrec;
      }else{
        $page=$limit - 1;
        $pages=$page * $numofrec;
      }
    }
    if(isset($_POST['prev'])){
      if($page > 0){
        $page-=1;
        $pages = $page * $numofrec;
      }else{
        $page=0;
        $pages = $page * $numofrec;
      } 
    }
    $pagination = ' 
   <div class="col-md-12"> 
             
                   <form action="'.$url.'" method="POST">
                       <input type="hidden" name="page" value="'.$page.'">
                       <button name="prev" type="submit" class="btn btn-primary pull-left">
                          <i class="glyphicon glyphicon-arrow-left"></i>
                       </button>
                       <button name="next" type="submit" class="btn btn-primary pull-right">
                          <i class="glyphicon glyphicon-arrow-right"></i>
                       </button>
                   </form>
              
    </div>';
  }
    else{
        $pages = 0;
        $page = 0;

    $pagination = '';
    }
?>