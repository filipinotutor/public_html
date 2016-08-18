<?php 
include("main_class.php"); 

$new_user = new Main_Class;
// $new_member->language = "de"; // use this selector to get messages in other languages
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register &middot; FilipinoTutor.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	

    <!-- Le styles -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-horizontal {
        max-width: 900px;
        padding: 19px 29px 40px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  </head>

  <body>
<?php

if(isset($_POST['submit']))
{
	// if you don't like the confirm feature use a copy of the password variable
	$new_user->register_user($_POST['inputUsername'], $_POST['inputFirstName'], $_POST['inputLastName'],  $_POST['inputEmail'],  $_POST['inputConfirmEmail'], $_POST['inputPassword'], $_POST['inputConfirmPassword'], $_POST['inputGender'], $_POST['inputSkypeID']); // the register method
	/*
	[inputUsername]
[inputFirstName]
[inputLastName]
[inputEmail]
[inputConfirmEmail]
[inputPassword]
[inputConfirmPassword]
[inputGender]
[inputSkypeID] 
*/
echo $error = $new_user->the_msg; // error message

echo '<br />';
//print_r($_POST);

}
?>

    <div class="container form-horizontal">
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<h3 class="form-signin-heading">Student Registration</h3>
	<div style="float:left;">

			<div class="control-group">
				<label class="control-label" for="inputUsername">Username</label>
				<div class="controls">
				<input type="text" name="inputUsername" placeholder="" value="<?php echo (isset($_POST['inputUsername'])) ? $_POST['inputUsername'] : ""; ?>">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputFirstName">First Name</label>
				<div class="controls">
				<input type="text" name="inputFirstName" placeholder="" value="<?php echo (isset($_POST['inputFirstName'])) ? $_POST['inputFirstName'] : ""; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputFirstName">Last Name</label>
				<div class="controls">
				<input type="text" name="inputLastName" placeholder="" value="<?php echo (isset($_POST['inputLastName'])) ? $_POST['inputLastName'] : ""; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				<input type="text" name="inputEmail" placeholder="" value="<?php echo (isset($_POST['inputEmail'])) ? $_POST['inputEmail'] : ""; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputConfirmEmail">Confirm Email</label>
				<div class="controls">
				<input type="text" name="inputConfirmEmail" placeholder="" value="<?php echo (isset($_POST['inputConfirmEmail'])) ? $_POST['inputConfirmEmail'] : ""; ?>">
				</div>
			</div>
			
			
		</div>
		<div style="float:left;">
		
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				<input type="password" name="inputPassword" placeholder="" value="<?php echo (isset($_POST['inputPassword'])) ? $_POST['inputPassword'] : ""; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Confirm Password</label>
				<div class="controls">
				<input type="password" name="inputConfirmPassword" placeholder="" value="<?php echo (isset($_POST['inputConfirmPassword'])) ? $_POST['inputConfirmPassword'] : ""; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputGender">Gender</label>
				<div class="controls">
				<label class="radio">
				<input type="radio" name="inputGender" value="Male" checked="checked"> Male &nbsp;</label>
				<label class="radio">
				<input type="radio" name="inputGender" value="Female"> Female</label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputSkypeID">Skype ID</label>
				<div class="controls">
				<input type="text" name="inputSkypeID" placeholder="" value="<?php echo (isset($_POST['inputSkypeID'])) ? $_POST['inputSkypeID'] : ""; ?>"><span class="icon-info-sign"></span>
				</div>
			</div>
			<div class="control-group">
				
				<div class="controls">
							<input type="submit" class="btn btn-large btn-primary" name="submit" id="submit" value="Register" />
				</div>
			</div>
			</div>
			
		</div>	
	  </form>
    </div> <!-- /container -->
	

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</body>
</html>