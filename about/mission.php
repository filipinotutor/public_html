<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Mission - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>目指していること</h1>
						 </br>
						<p>手頃な価格で、ハイクオリティの英語教育を世界に。</p>
</br>
						<p>FilipinoTutor.comは優秀なフィリピン人講師によるオンライン英語レッスンを低価格で提供します。アジア、ラテンアメリカ、ヨーロッパでの家庭用e-チュートリアルの筆頭サービスとして、世界へのさらなる展開を目指します。</p> 						
						</br>
						<p>
良質な教育手法と最新技術を組み合わせて、誠実なサービスを提供します。一貫性のある、効果の高いサービスを皆様にお届けすることを誇りに、真面目にプログラムを作り上げました。
</p>

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>