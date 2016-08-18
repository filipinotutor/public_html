<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Affordable Pricing FilipinoTutor.com";
	$metad = "";
	
	include("includes/main_class.php");
	$page_protect = new Main_Class;
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>レッスンはお手ごろ価格</h1>

						<p>まず初めにFilipinoTutor.comから皆さんに２回分の無料レッスンをプレゼントいたします。本日<a href="/register.php">登録 </a>をすませば無料のトライアルレッスンだけでなく私達が提供するオンライン英語教材の全てにアクセス可能です。</p>
						
					
						<ul class="price-features">
							<li><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp; 新しい生徒全員に<b>２回分のトライアルレッスン </b></li>
							<li><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;クラスは２５分間の長さ</li>
						</ul>
					
						
						<table id="pricingtb" class="table table-condensed">
						<tr class="main-heading">
							<td></td>
							<td>クラスの数(クレジット)</td>
							<td>ご利用可能日数( 有効期限)</td>
							<td>価格</td>
							<td>&nbsp;</td>
						</tr>
						<tr class="heading">
							<td>ビジネス 英会話</td>
							<td></td>
							<td></td>
							<td></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><b>スタンダード　プロ</b></td>
							<td>30 クラス ( 1 日１レッスンの計算 )</td>
							<td>30 日</td>
							<td><b>11,100円/月</b><br /><small>１レッスン＝370 円 </small></td>
							<td><a href="/register.php" class="btn btn-success btn-sm">登録</a></td>
						</tr>
						<tr>
							<td><b>バリュープロ</b></td>
							<td>60 クラス ( 1 日２レッスンの計算 )</td>
							<td>30 日</td>
							<td><b>17,760円/月</b><br /><small>１レッスン＝296 円 </small></td>
							<td><a href="/register.php" class="btn btn-success btn-sm">登録</a></td>
						</tr>
						<tr class="heading">
							<td>ESL</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td><b>スターター</b></td>
							<td>14 クラス ( 14 レッスン )</td>
							<td>30 日</td>
							<td><b>4,200円/月</b><br /><small>１レッスン＝300 円 </small></td>
							<td><a href="/register.php" class="btn btn-success btn-sm">登録</a></td>
						</tr>
						<tr>
							<td><b>バリュー</b></td>
							<td>30 クラス ( 1 日１レッスン計算 )</td>
							<td>30 日</td>
							<td><b>5,800円/月</b><br /><small>１レッスン＝193 円 </small></td>
							<td><a href="/register.php" class="btn btn-success btn-sm">登録</a></td>
						</tr>
						<tr>
							<td><b>バリュープラス</b></td>
							<td>60 クラス （１日2 レッスン計算）</td>
							<td>30 日</td>
							<td><b>9,700円/月</b><br /><small>１レッスン＝162 円 </small></td>
							<td><a href="/register.php" class="btn btn-success btn-sm">登録</a></td>
						</tr>
						</table>
						
					</div>
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>