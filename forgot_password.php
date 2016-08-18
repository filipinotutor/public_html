<?php 		
include("includes/main_class.php");
$renew_password = new Main_Class;	
if (isset($_POST['Submit'])) {		
	$renew_password->forgot_password($_POST['email']);	
} 	
$error = $renew_password->the_msg;	
$root = $_SERVER['DOCUMENT_ROOT'];	$folder = '';	
$path = $root.$folder."/template/";	
$title = "Reset Password";	
$metad = "Reset Password for FilipinoTutor.com Account";	
include($path.'header.php');?>
    <div id="content">	
        <div class="container">		
            <div class="row">			
                <div class="col-sm-9">
                			
                    <div id="post">					
                        <div class="inner">
						<?php if(isset($error)) {echo $error;}?>							
                        <h1>Reset Password</h1>
												
                        <p>Please enter the e-mail address you used during registration.</p>						
                            <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">						  
                            <label for="email">E-mail:</label>						  
                            <input type="email" class="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ""; ?>">						  
                            <input type="submit" class="btn btn-primary" name="Submit" value="Submit">						
                            </form>	
                        </div>				
                    </div>			
                </div>			
            <?php include($path.'sidebar.php'); ?>		
            </div>	
        </div>
    </div>
<?php include($path.'footer.php'); ?>