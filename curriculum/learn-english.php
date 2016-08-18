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
						<h1>英語を学ぶ理由</h1>
						<img src="/images/why-learn.jpg" alt="Why Learn English" align="right" style="margin-left: 10px;">
</br>
							<p>世界経済において、急速な勢いで英語が中心言語になってきていることは周知の事実です。今こそ、便利なe-tutoringを活用して英語力を向上させるチャンスです。</p> 	</br>						
							<p>FilipinoTutor.comでは、フレンドリーで経験豊富な教師陣が、英語学習者をあらゆる面からいつでもサポートします。１対１の個人指導とインタラクティブなオンライン学習法を組み合わせて、効果的で楽しい参加型レッスンを提供します。</p> </br>							
							<p>授業内容や長さのバリエーションを豊富に取り揃えた幅広いレッスンの中から、学習者の都合、予算、英語レベルに最適のカリキュラムを自由にお選びいただけます。年齢、英語レベル、興味に関わらず、それぞれの学習スタイルとニーズに合ったコースを豊富に準備しています。各学習者の目標達成をしっかりサポートするべく、気軽かつハイクオリティの学習環境を整えました。</p>
							
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>