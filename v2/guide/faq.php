<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Frequently Asked Questions - FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>よくある質問</h1></br>
						<a href="#courses"></a>
						<h4 class="fix">どのようなコースがありますか？</h4> 
						<p>初心者から上級者まで、あらゆるレベルの方に合わせて幅広くレッスンを揃えております。学習者の興味とニーズに合ったレッスン内容を選び、自分専用のコースをお作りいただけます。</p>
						</br>
						<a href="#instructors"></a>
						<h4 class="fix">どのような先生がいるのですか？</h4> 
						<p>フィリピンの難関大学で英語学やコミュニケーション学の学位を取っていることが講師の前提条件です。教育に情熱を傾ける経験豊富な講師陣があなたの学習をサポートします。 レッスン開始時に、講師（個別指導の担当講師） をお選びいただき、全レッスンを通して同じ講師と勉強を続けることもできますし、毎回新しい講師をお選びいただくことも可能です。</p> 
						</br>
						<a href="#skype"></a>
						<h4 class="fix">Skypeとは何ですか？</h4> 
						<p>Skype（スカイプ）は無料のインターネットビデオ電話です。レッスンはSkypeでのマンツーマン会話形式。あなたの都合のいい時間に、都合のいい場所からレッスンに参加していただけます。また、英語力の上達もリアルに実感することが可能です。</p> 
						</br>
						<a href="#start"></a>
						<h4 class="fix">どうやってレッスンを始めるのですか？</h4>
						<p>とても簡単です。無料でSkypeをダウンロードしたら、あとは当サイトに登録するだけです。会員登録が完了すると、無料体験レッスン２回分をご利用いただけます。是非お試しください。</p> 
						</br>
						<a href="#lesson-change"></a>
						<h4 class="fix">レッスン予定は変更できますか？</h4>
						<p>もちろんです！学習したい内容や興味の対象はその時々で変わるものです。ご要望に合わせて、レッスン内容や難易度を選択いただけます</p>
						</br>
						<a href="#lesson-cost"></a>
						<h4 class="fix">レッスンにはどのくらいの費用がかかりますか？</h4> 
						</br>
						<a href="#reservation"></a>
						<h4 class="fix">予約キャンセルはいつでも可能ですか？</h4>
						<p>はい、レッスンのキャンセルや予定変更はいつでも可能です。</p>
</br>
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>