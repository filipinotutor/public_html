<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "About FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>FilipinoTutor.comについて</h1>
						</br>
						<p align="center"><iframe width="560" height="315" src="https://www.youtube.com/embed/e3a7yV7yk4w" frameborder="0" allowfullscreen></iframe></p>
						</br>
						<p>FilipinoTutor.com は最高のレッスンをお手頃価格でお届けするマンツーマンのオンライン英会話教室です。Skypeを活用して、世界中に効率よくレッスンをお届けします。</p>
						</br>
						<p>ひとり一人のニーズに合わせて柔軟にレッスンを組めるオンライン学習法ですので、あなたにピッタリのレッスンが見つかります。基礎英文法から、ESL、TOEFL、ビジネス英語まで、豊富な教材と多様なコースを揃えています。コース内容をさらに充実させるため、新しい教材の作成に常に取り組んでいます。</p>
						</br>
						<p>FilipinoTutor.comのレッスンはSkypeでの会話形式ですので、積極的にレッスンに参加でき、効率よく英語を身につけることが可能です。学習者の要望、英語上達度、レッスン満足度などを考慮しながら、丁寧にレッスンを進めます。</p>
						</br>
						<p>インターネットに慣れていない方でも使いやすいウェブサイトを作成しました。FilipinoTutor.com なら、あなたの予定やニーズに合わせて、柔軟にスケジュールを立てることができます。英語学習の武器として、FilipinoTutor.comをどんどんご活用ください。</p>

					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>