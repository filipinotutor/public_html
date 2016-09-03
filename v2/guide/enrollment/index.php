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
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default accordion-caret">
							<div class="panel-heading" role="tab" id="headingOne">
							  <h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								  <b>ステップ 1 - スカイプアカウントの設定 </b>
								</a>
							  </h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							  <div class="panel-body">
									
									<strong><i>( スカイプのアカウントをすでにお持ちの方はこちらのステップを飛ばし、ステップ２へお進み下さい) </i></strong>
									<h3 class="steps-main">I. Skypeをインストール</h3>
									全てのクラスはスカイプ上で行われます。Skypeはとても使いやすい無料音声、ビデオソフトウエアです。以下のステップにそってSkypeをインストールして下さい。
									<ol class="steps">
									<li>こちらのリンクからskypeをダウンロードしてください。<a href="http://www.skype.com/en/download-skype/skype-for-computer/" target="_Blank">http://www.skype.com/en/download-skype/skype-for-computer/</a>
									<img src="/images/skype-dl1.jpg" alt="skype-dl" class="img-responsive">
									</li>
									<li>使用する<strong>デバイスを選択して下さい。</strong>
									<img src="/images/skype-device1.jpg" alt="skype-device" class="img-responsive">
									</li>
									<li><strong>ダウンロードする</strong>のボタンを探しクリックします。
									<img src="/images/skype-dl-button1.jpg" alt="skype-dl-button" class="img-responsive">
									</li>
									<li>ダウンロードされたファイルから<strong>Skypeをインストールする</strong>をクリックします。 </li>
									<li><strong>インストールの説明</strong>にそって進みます。</li>
									</ol>

									<h3 class="steps-main">II. Skype 登録</h3>
									インストールが終了すると以下のログイン画面が表示されます。以下の説明にそって登録を完成させましょう。
									<ol class="steps">
									<li>アカウントを作成する。
									<img src="/images/skype-accnt.jpg" alt="skype-accnt" class="img-responsive">
									</li>
									<li>必要な欄に入力する。
									<img src="/images/skype-fields.jpg" alt="skype-fields" class="img-responsive"> 
									</li>
									<li>同意するをクリックする。
									<img src="/images/skype-cntinue.jpg" alt="skype-cntinue" class="img-responsive">
									</li>
									</ol>

									<h3 class="steps-main">Skype にサインイン</h3>
									<ol class="steps">
									<li>登録時に設定した<strong>Skypeネームとパスワードを入力する。</strong>
									<img src="/images/skype-enter.jpg" alt="skype-enter" class="img-responsive">
									</li>
									<li><strong>Skype のセットアツプ終了</strong><br>矢印に示されている自分のスカイプユーザーネームを忘れないようにメモしておきましょう。
									<img src="/images/skype-cmplt.jpg" alt="skype-cmplt" class="img-responsive"></li>
									</ol>
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo">
							  <h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  <b>ステップ 2 – 登録 </b>
								</a>
							  </h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							  <div class="panel-body">
							  
								<ol class="steps">
									<li>サイトマップにある<strong>今すぐ登録する</strong>のリンクをクリックする。  <p><img alt="sign-up" src="/images/sign-up.jpg" width="400px"></p></li>
									<li>登録フォームの全ての欄を埋めていきます。スカイプIDはステップ１で先程作ったアカウントを記入して下さい。<p><img alt="student-reg" src="/images/studnt-reg.jpg" width="500px"></p></li>
									<li><strong>登録</strong>ボタンをクリックし登録フォームを提出します。</li>
									<li>ご自分のemailをチェックし、そちらに送られてきた確認のリンクをクリックしてステップにそって登録の確認を済ませます。</li>
									<li>ステップ３に進みレッスンを開始しです。</li>
								</ol>
								
								
								
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingThree">
							  <h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								   <b>ステップ 3 - レッスンを予約する </b>
								</a>
							  </h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							  <div class="panel-body">
							  
								<ol class="steps">
									<li>右上にあるサイト上のログインをクリックし、自分のアカウントにログインする。 
										<p><img src="/images/login-link.jpg" /></p>
									</li>
									<li>新しい生徒には私達からクレジット２つ分（２つのクラスと同じ）をプレゼント致します。このクレジットを使いレッスンを予約して下さい。<b>“クラスを予約する”　</b>をクリックし最初のレッスンを予約しましょう。
										<p><img src="/images/btn-book.jpg" /></p>
									</li>
									<li>チューターを選択します。チューターのプロフィールボックスから<b>“選択”</b>ボタンをクリックする。選択されたチューターのスケジュールがカレンダーとして以下のように表示されます。 
										<p><img src="/images/sample-profile.jpg" /></p>
									</li>
									<li><b>希望する日時を</b>曜日と時間のボックスから選択します。</li>
									<li>選択したスケジュールを確認し大丈夫であれば　<b>“保存”</b>ボタンを押します。
										<p><img src="/images/btn-save.jpg" /></p>
									</li>
									<li>自分のスケジュールはトップメニューの<b>“クラススケジュール”</b>　又はサイドバーから　<b>“クラスを見る”</b>　を使って確認が可能です。レッスンのスケジュールを確認して最初のレッスンに備えましょう。</li>
									
								</ol>
								
							  </div>
							</div>
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