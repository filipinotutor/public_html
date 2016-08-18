<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Why Learn English FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>どうして今、英語を学ぶのか？</h1>
                             <img src="/images/why-learn.jpg" alt="Why Learn English" align="right" style="margin-left: 10px;">
							<p>英語が急速な勢いで世界経済の共通言語になりつつあることは周知の事実です。今こそ、便利なオンライン英会話レッスンで語学力を向上させ、将来のチャンスにつなげましょう。</p> 							
							<p>FilipinoTutor.comのフレンドリーで経験豊富な講師陣が、あらゆる面からあなたをサポート。オンラインマンツーマン指導で、効果的かつ楽しい参加型レッスンを提供します。</p> 							
							<p>また、ご利用いただける教材は非常に豊富。レッスン時間の長さもあなた次第。英語力・学習スタイル・目的・予算・予定などに合わせて、柔軟にレッスン内容やスケジュールをお選びいただけます。あなたにぴったりの学習環境で、目標達成をしっかりサポートします。</p>
							
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>