<?php 

	include("includes/main_class.php"); 



	$my_access = new Main_Class(false);





	// $my_access->language = "de"; // use this selector to get messages in other languages

	if (isset($_GET['activate']) && isset($_GET['ident'])) { // this two variables are required for activating/updating the account/password

		$my_access->auto_activation = true; // use this (true/false) to stop the automatic activation

		$my_access->activate_account($_GET['activate'], $_GET['ident']); // the activation method 

	}

	if (isset($_GET['validate']) && isset($_GET['id'])) { // this two variables are required for activating/updating the new e-mail address

		$my_access->validate_email($_GET['validate'], $_GET['id']); // the validation method 

	}

	if (isset($_POST['Submit'])) {

		$my_access->save_login = (isset($_POST['remember'])) ? $_POST['remember'] : "no"; // use a cookie to remember the login

		$my_access->count_visit = false; // if this is true then the last visitdate is saved in the database (field extra info)

		$my_access->login_user($_POST['login'], $_POST['password']); // call the login method

		

	} 

	$msg = $my_access->the_msg; 





	$root = $_SERVER['DOCUMENT_ROOT'];

	$folder = '';

	

	$path = $root.$folder."/template/";



	

	$title = "Filipino Tutor";

	$metad = "Your Premier Online English Tutorial Site";

	

	include($path.'header.php');

	

	

?>



<div id="content">

	<div class="container">

		<div class="row">

			<div class="col-sm-9">

				<div id="post">

					<div class="inner">



						<h1 class="entry-title">登録</h1> 



						  <form class="form-signin form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form">

						  <?php

							echo $msg;

						?>	

							<div class="row">

							<div class="col-sm-8 col-sm-offset-2">

								<div class="form-group">

								<label class="control-label col-sm-4" for="inputUsername">ユーザーネーム</label>

								<div class="controls col-sm-5">

								<input type="text" class="form-control input-block-level" placeholder="Username" name="login" size="20" value="<?php echo (isset($_POST['login'])) ? $_POST['login'] : $my_access->user; ?>">

								</div>

								</div>	

								<div class="form-group">

								<label class="control-label col-sm-4" for="inputUsername">パスワード</label>

								<div class="controls col-sm-5">

								<input type="password"  class="form-control input-block-level" placeholder="Password" name="password" size="8" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">	

								</div>

								</div>

								<div class="form-group">

								<div class="col-sm-4"></div>

								<div class="controls col-sm-6">
								
								  <input type="checkbox" name="remember" value="yes" <?php echo ($my_access->is_cookie == true) ? " checked" : ""; ?>> 
								
								
								自動ログイン?

								 </div>

								 </div>

								<div class="form-group">

								<div class="col-sm-4"></div>

								<div class="col-sm-6">

								<button class="btn btn-large btn-primary" type="submit" name="Submit">ログイン</button>								

								<br />まだアカウント無しか。? <a href="register.php">今すぐ登録.</a>

								<br /><a href="forgot_password.php">パスワードをお忘れですか？</a>

								</div>

								</div>

							</div>

							</div>

						  </form>

	

					</div>

				</div>

			</div>

			<?php include($path.'sidebar.php'); ?>

		</div>

	</div>

</div>

<?php include($path.'footer.php'); ?>





