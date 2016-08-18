<?php
include('header-supervisor.php');
$page_validate->addSource($_GET);
$page_validate->addRule('user',"string", false, 1, 10, true);
@$page_validate->run();
if(sizeof($page_validate->errors) > 0)
{
	if($_GET['user'] === 'tutor'){
    echo '<script>window.location.replace("tutors.php?t=2A");</script>';
	}
	elseif ($_GET['user'] === 'student') {
	 echo '<script>window.location.replace("dashboard.php?t=1A");</script>';
	}
}
else
  {
	$user = $_GET['user'];
  }

?>
	   <div class="col-md-9">
          <div class="col-md-12">
              <h4>Deactivated <?php echo $user;?>s</h4>
              <?php
				if(IsSet($_POST['activate']))
								{
									$s_id = $_POST['activate_id'];
									$approvedids = $page_protect->delete_activate_user('y', $s_id);
								if(($approvedids)) //success
										{
											echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Selected user activated.</div>';			
										}
								else
										{
											echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">&times;</a>There is an error in activating user.</div>';
										}
					
								}
              ?>
              	<table class="table table-striped table-bordered table-hover">
				<tr>
							<th>Name</th>
							<th>Email</th>
							<th></th>
				</tr>
					<?php 
					$output =  $page_protect->get_inactive_acc($user);
					if(!isset($output['count'][0])){
						echo $output;
					}
					else{
						for($x=0;$x!=$output['count'][0];$x++)
						{
							echo '
								<tr>
									<th>'.$output[$x]['first_name'].' '.$output[$x]['last_name'].'</th>
									<th>'.$output[$x]['email'].'</th>
									<th>
										<form action="'.$_SERVER['PHP_SELF'].'?&user='.$user.'" method="POST" >
										<input name="activate_id" value="'.$output[$x]['user_id'].'" type="hidden" /> 
										<input type="submit"  class="btn btn-primary btn-xs" name="activate" value="Activate" />
										</form>
									</th>
								<tr>
								';
						}
					} 
					?>
				</table>		
              </div>
           </div>
        </div>
          <div class="row-fluid">
          	
          </div><!--/row-->

<?php
include('footer-supervisor.php');
?>