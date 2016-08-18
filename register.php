<?php 

	include("includes/main_class.php"); 



$new_user = new Main_Class;

// $new_member->language = "de"; // use this selector to get messages in other languages



	$root = $_SERVER['DOCUMENT_ROOT'];

	$folder = '';

	

	$path = $root.$folder."/template/";



	

	$title = "Apply As Student - Filipino Tutor";

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
					<p>下記のフォームを記入して登録して下さい。</p>


	<?php



if(isset($_POST['submit']))

{

	// if you don't like the confirm feature use a copy of the password variable

	$new_user->register_user($_POST['inputUsername'], $_POST['inputFirstName'], $_POST['inputLastName'],  $_POST['inputEmail'],  $_POST['inputConfirmEmail'], $_POST['inputPassword'], $_POST['inputConfirmPassword'], $_POST['inputGender'], $_POST['inputSkypeID']); // the register method


	require_once('includes/recaptchalib.php');

	$privatekey = "6LcOFyQTAAAAABTeAlOvnOHs-YeAgJHKC0E8iLll";

	$resp = recaptcha_check_answer ($privatekey,

                                $_SERVER["REMOTE_ADDR"],

                                $_POST["recaptcha_challenge_field"],

                                $_POST["recaptcha_response_field"]);


  if (!$resp->is_valid) {

    echo '<div class="alert alert-danger" style="width:67%;"><a class="close" data-dismiss="alert">&times;</a>Please enter the correct validation code.</div>';

  } else {

    echo '<div style="width:70%;">'.$error = $new_user->the_msg.'</div>'; // error message

  }

 
}

?>

	

	<div>

	<form class="register form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" role="form">

	<div>

		<div class="row">

		<div class="col-sm-12">		
		    <div class="row"></div>
            <div class="col-lg-6">
			
			<div class="form-group1">

				<label class="control-label" for="inputUsername">ユーザーネーム</label>

				<div class="controls">

				<input type="text" class="form-control" name="inputUsername" placeholder="" value="<?php echo (isset($_POST['inputUsername'])) ? $_POST['inputUsername'] : ""; ?>" title="Enter your username [minimum of 6 characters]">

				</div>

			</div>



			<div class="form-group1">

				<label class="control-label" for="inputFirstName">名</label>

				<div class="controls">
						<input type="text" name="inputLastName" class="form-control" placeholder="" value="<?php echo (isset($_POST['inputLastName'])) ? $_POST['inputLastName'] : ""; ?>" title="Enter your Last Name">

				</div>

			</div>

			<div class="form-group1">

				<label class="control-label" for="inputFirstName">姓</label>

				<div class="controls">
				      <input type="text" name="inputFirstName" class="form-control" placeholder="" value="<?php echo (isset($_POST['inputFirstName'])) ? $_POST['inputFirstName'] : ""; ?>" title="Enter your First Name">
				</div>

			</div>

			<div class="form-group1">

				<label class="control-label" for="inputEmail">メールアドレス</label>

				<div class="controls">

				<input type="text" name="inputEmail" class="form-control" placeholder="" value="<?php echo (isset($_POST['inputEmail'])) ? $_POST['inputEmail'] : ""; ?>" title="Enter a valid email address">

				</div>

			</div>

			<div class="form-group1">

				<label class="control-label" for="inputConfirmEmail">メールアドレス確認</label>

				<div class="controls">

				<input type="text" name="inputConfirmEmail" class="form-control" placeholder="" value="<?php echo (isset($_POST['inputConfirmEmail'])) ? $_POST['inputConfirmEmail'] : ""; ?>" title="Enter your email address again">

				</div>

			</div>

			<div class="form-group1">

				<label class="control-label" for="inputPassword">パスワード</label>

				<div class="controls">

				<input type="password" name="inputPassword" class="form-control" placeholder="" value="<?php echo (isset($_POST['inputPassword'])) ? $_POST['inputPassword'] : ""; ?>" title="Enter your password [minimum of 4 characters]">

				</div>

			</div>
            
			<div class="form-group1">

				<label class="control-label" for="inputPassword">パスワード確認</label>

				<div class="controls">

				<input type="password" name="inputConfirmPassword" class="form-control" placeholder="" value="<?php echo (isset($_POST['inputConfirmPassword'])) ? $_POST['inputConfirmPassword'] : ""; ?>" title="Enter your password again">

				</div>

			</div>
			
			</div>
			
			<div class="col-lg-6">
			
			<div class="form-group1">

				<label class="control-label" for="inputGender">性別</label>

				<div class="controls">

				<label class="radio">

				<input type="radio" name="inputGender" value="Male" checked="checked" title="Select if you are a male"> 男性 &nbsp;</label>

				<label class="radio">

				<input type="radio" name="inputGender" value="Female" title="Select if you are a female">女性</label>

				</div>

			</div>

			<div class="form-group1">

				<label class="control-label" for="inputSkypeID">Skype ID</label>

				<div class="controls">

				<input type="text" name="inputSkypeID" placeholder="" class="form-control" value="<?php echo (isset($_POST['inputSkypeID'])) ? $_POST['inputSkypeID'] : ""; ?>" title="Enter your Skype ID"><span class="icon-info-sign"></span>

				</div>

			</div>

			<div class="form-group1">
                   
				<label class="control-label" for="inputPassword">下記に見えている文字または数字を入力して下さい。</label>
                
				<div class="table-responsive">
				<div class="controls">

					<?php

					  require_once('includes/recaptchalib.php');

					  $publickey = "6LcOFyQTAAAAANfy3v39v8G0ZAXPJPYXfcXSBhX_"; // you got this from the signup page

					  echo recaptcha_get_html($publickey);

					?>



				</div>
				</div>

			</div>
            </div>
            
			<div class="clearfix"></div>
			<div class="col-lg-12"><hr></div>
			
			<div class="form-group1">

				<div class="controls col-sm-3 text-left">

					<input type="submit" class="btn btn-large btn-primary" name="submit" id="submit" value="登録する" />		

				</div>
                <div class="col-sm-9">
					<div class="col-lg-12 label-info"  style="word-wrap:break-word;color:white;">
						登録後、自動的に2クレジットポイントが付与されます。無料体験レッスン2回分としてお使い下さい。
					</div>
				</div>
			</div>
			
		</div>

		</div>	

    </div> <!-- /container -->

	</form>

</div>


					</div>

				</div>

			</div>	

			<?php include($path.'sidebar.php'); ?>

		</div>

	</div>

</div>

<?php include($path.'footer.php'); ?>

