<?php 

	require($_SERVER['DOCUMENT_ROOT']."/includes/db_config.php"); 


	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	
	$title = "User Logout";
	$metad = "";
	
	include($path.'header.php');
	
	
?>

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>Logged out!</h1>
						<p><a href="/login.php" class="btn btn-sm btn-danger">Login (again)</a></p>
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>




