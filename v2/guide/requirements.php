<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Class Requirements - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>Class Requirements</h1>

						<p></p>

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>