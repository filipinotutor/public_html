<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Enrollment Guide - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>ご利用までのながれ</h1>

						<p>簡単３ステップでレッスン開始、下のボタンをクリックして始めましょう。  </p>
						<div class="row">
							<div class="col-sm-4">
								<a href="/guide/enrollment/step1.php" class="btn btn-success btn-lg guide-button">1<br />Skypeのセットアップ</a>
							</div>
							<div class="col-sm-4">
								<a href="/guide/enrollment/step2.php" class="btn btn-primary btn-lg guide-button">2<br />登録</a>
							</div>
							<div class="col-sm-4">
								<a href="/guide/enrollment/step3.php"class="btn btn-warning btn-lg guide-button">3<br />レッスン予約</a>
							</div>
						</div>

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>