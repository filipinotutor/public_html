<?php	

	$root = $_SERVER['DOCUMENT_ROOT'];

	$folder = '';

	

	$path = $root.$folder."/template/";

	$title = "Filipino Tutor";

	$metad = "Your Premier Online English Tutorial Site";

	

	include($path.'header.php');

?>

<div id="slider" class="sl-slider-wrapper hidden-xs">

	<div class="sl-slider">

		<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

			<div class="sl-slide-inner">

				<div class="bg-img bg-img-1"></div>				

				<div class="lessons">

					<img src="images/lesson-icon.png" />

					<h2>レッスンを選ぶ</h2>

					<p>バラエティ豊富な各種コースから、</br>あなただけのレッスンを。</p>

				</div>

			</div>

		</div> 

		

		<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">

			<div class="sl-slide-inner">

				<div class="bg-img bg-img-2"></div>

				<div class="tutor">
					<img src="images/tutor-icon.png" />
					<h2>自分に合った</br>講師と</h2>
					<p>優秀な講師と効率的なレッスンを。英語教授法プログラムを修了した講師のみが在籍。あなたのニーズに合う講師をお選びいただけます。</p>
				</div>
			</div>

		</div>

		

		<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">

			<div class="sl-slide-inner">

				<div class="bg-img bg-img-3"></div>

				<div class="schedule">

					<img src="images/sched-icon.png" />

					<h2>お好みの日程で</h2>

					<p>Skypeでマイペースにレッスン。</br>お好みの日程、時間帯を</br>お選びいただけます。</p>

				</div>

			</div>

		</div> 

	</div><!-- /sl-slider -->

	<nav id="nav-arrows" class="nav-arrows">

		<span class="nav-arrow-prev">Previous</span>

		<span class="nav-arrow-next">Next</span>

	</nav>

	<nav id="nav-dots" class="nav-dots">

		<span class="nav-dot-current"></span>

		<span></span>

		<span></span>

	</nav>



</div><!-- /slider-wrapper -->



<div id="home">

	<div id="home-top">

		<div class="container">

			<div class="row">

				<!--<h3 class="why">なぜ我が社を</h3>-->

				<div id="home-why">

					<div class="col-sm-3 col1">

						<h4>高い英語力</h4>

						<p>最高のレッスンをお届けするために、講師の経歴は厳しくチェック。大学を卒業していること、英語教授法プログラムを修了していることを条件に採用しています。</p>

					</div>

					<div class="col-sm-3 col2">

						<h4>頼れる講師陣</h4>

						<p>安心してレッスンを受けていただけるよう、講師の人柄も重要視。経験豊富でフレンドリーな講師達だから、楽しみながら英語力が身につきます。</p>

					</div>

					<div class="col-sm-3 col3">

						<h4>豊富な教材</h4>

						<p>基本英語からビジネス英語まで、内容とレベルを選択しあなたにピッタリのレッスンを。学習目的や進歩に合わせて自由に変更可能です。</p>

					</div>

					<div class="col-sm-3 col4">

						<h4>お手頃価格で</h4>

						<p>英語学習をもっと身近にするため、料金はお手頃価格に設定。また、メンバー登録（無料）で体験レッスンを２回ご利用いただけますので、是非お試しください。
登録後は全ての教材をご利用いただけます。</p>

					</div>

				</div>

				<!--<p align="center"><a href="/why-us.php" class="btn btn-success btn-md">もっとありますよ</a></p>-->

			</div>

		</div>

	</div>
	

	<div id="business">
	    <div class="container">
			<div id="business-english"> 
	    	    <div class="row home-bottom">

					<div class="col-sm-6">
						<img src="images/home-bottom.jpg" class="img-responsive center-block"/>
					</div>
					<div class="col-sm-6">
						<h2>ビジネス英語を学ぼう</h2>
						<p>私達が特別に準備をしたビジネス英会話レッスンで自信を持って職場で英会話ができるようになるでしょう。交渉や電話等でのカスタマーサービスで利用される英会話が上達すること間違いなし。</p>
						<p><a href="/curriculum/business-english.php"> もっと詳しく知る</a></p>
					</div>
				</div>
			</div>
	    </div>
	</div>
	

	<div id="home-bottom">

		<div class="container">

			<div class="row">

				<div class="col-sm-6">

					<h3>今すぐカンタン♪３ステップでレッスン開始</h3>

					<div id="steps">

						<div class="row">

							<div class="col-sm-2"><div class="num">1</div></div>

							<div class="txt col-sm-10">

								<h4>Skype のセットアップ </h4>

								<p>レッスンは全てSkypeでマンツーマン。ビデオ通話ソフトSkypeは無料、設定もカンタンです。</p>

							</div>

						</div>

						<div class="row">

							<div class="col-sm-2"><div class="num">2</div></div>

							<div class="txt col-sm-10">

								<h4>FilipinoTutor.comに登録</h4>

								<p>登録は無料です。ご登録いただくだけで、もれなく無料体験レッスン２回分をプレゼント 。</p>

							</div>

						</div>

						<div class="row">

							<div class="col-sm-2"><div class="num">3</div></div>

							<div class="txt col-sm-10">

								<h4>レッスンを予約して学習開始！</h4>

								<p>登録後すぐに無料体験レッスン２回分をお試しいただけます。</p>

							</div>

						</div>

					</div>

					

				</div>

				<div class="col-sm-3">



					<h3>FAQ</h3>

					

					<ul>

						<li><a href="/guide/faq.php#courses">どのようなコースがありますか？</a></li>

						<li><a href="/guide/faq.php#instructors">どのような先生がいるのですか？
</a></li>

						<li><a href="/guide/faq.php#skype">Skypeとは何ですか？
</a></li>

						<li><a href="/guide/faq.php#start">どうやって始めますか？</a></li>

						<li><a href="/guide/faq.php#lesson-change">どうやってレッスンを始めるのですか？
	</a></li>

						<!--<li><a href="/guide/faq.php#lesson-cost">レッスン予約は変更できますか？
</a></li>-->

						<li><a href="/guide/faq.php#reservation">予約キャンセルは可能ですか？
</a></li>

					</ul>

				</div>

				<div class="col-sm-3">

					<h3>コミュニティに参加</h3>

					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=576850172446898&version=v2.0";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-like-box" data-href="https://www.facebook.com/filipinotutor" data-width="270" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>





				</div>

			</div>

		</div>

	</div><!-- end #home-bottom -->



</div>

<?php	

	include($path.'footer.php');

?>