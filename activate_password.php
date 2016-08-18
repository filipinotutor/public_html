<?php 
include("includes/main_class.php");  
$act_password = new Main_Class;

if (!empty($_GET['activate'])) { // this two variables are required for activating/updating the account/password


	if ($act_password->check_activation_password($_GET['activate'])) { // the activation/validation method 


		$_SESSION['activation'] = $_GET['activate']; // put the activation string into a session or into a hdden field


	} 


}


if (isset($_POST['Submit'])) {


	if ($act_password->activate_new_password($_POST['password'], $_POST['confirm'], $_SESSION['activation'])) { // this will change the password


		unset($_SESSION['activation']);


	}


	$act_password->user = $_POST['user']; // to hold the user name in this screen (new in version > 1.77)


} 


$error = $act_password->the_msg;


$root = $_SERVER['DOCUMENT_ROOT'];	$folder = '';	
$path = $root.$folder."/template/";	
$title = "Reset Password";	
$metad = "Reset Password for FilipinoTutor.com Account";	
include($path.'header.php');
?>
<div id="content">	
        <div class="container">		
            <div class="row">			
                <div class="col-sm-9">
                <div id="post">					
                        <div class="inner">	
				<?php echo (isset($error)) ? $error : "&nbsp;"; ?><br />	
				<?php if (isset($_SESSION['activation'])) { ?>
                <h2>Enter your new password</h2>
                Enter here your new password, (login: <b><?php echo $act_password->user; ?></b>).
                
                    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
                      <div class="control-group">
                        <label class="control-label" for="password"><strong>New</strong> Password:</label>
                        <div class="controls">
                          <input type="password" name="password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ""; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="confirm">Confirm New Password:</label>
                        <div class="controls">
                          <input type="password" name="confirm" value="<?php echo (isset($_POST['confirm'])) ? $_POST['confirm'] : ""; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="controls">
                          <input type="hidden" name="user" value="<?php echo $act_password->user; ?>">
                          <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                
                
                <?php } else { ?>
                <?php } ?>
                
                
                <!-- Notice! you have to change this links here, if the files are not in the same folder -->
                
                
				<a class="btn btn-success" href="<?php echo $act_password->login_page; ?>">Login here</a>
				</div>
				</div>
            </div>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>

