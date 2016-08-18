<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Curriculum Advisors / Developers FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>カリキュラム監修者</h1>

						<div class="row">
							<div class="col-sm-3">
								<img src="/images/annafaktorovich.jpg" alt="Anna Faktorovich" class="img-responsive center-block">
							</div>						
							<div class="col-sm-9">
								<h3>Dr. Anna Faktorovich（アナ・ファクトロヴィチ博士）</h3>
								<p>アナフォラ文学出版の社長、アナ・ファクトロヴィチ博士。常勤講師として大学で3年間英語を指導。英文学評論博士号、比較文学修士号を取得。著作「スコット、ディケンズ、スティーブンソンの小説に見られるジャンルとしての批評」をマクファーランド出版から2013年2月に出版。</p> 		
								</br>
								<p>新作「ファンタジー、空想科学、ロマンス、宗教、ミステリーのジャンルにおける定型的執筆手法」を2014年4月にマクファーランドから出版。また、詩集「即興の議論（フォーマイト出版）」を2011年に、詩集「アテネを巡る戦い（アナフォラ出版 ）」を2012年に出版。2013年には子供向け絵本「ナマケモノと私（アナフォラ出版）」の着想、デザイン、詩作を担当。</p> 							
								</br>
								<p>また、作家と出版社を対象とした「本制作ガイド （現第３版）」では、本の編集、デザイン、マーケティングについての意見をまとめました。年３回出版の相互査読雑誌、ペンシルベニア文学ジャーナルの編集、寄稿も担当。著作原稿はEBSCO やProQuest、雑誌紙面上でご覧いただけます。さらに、MLA、SAMLA、EAPSU、SWWC、BWWC、その他の多くの学会で研究成果を発表。MLA ビブリオグラフィー、ブラウン大学ミリタリーコレクション特別研究員。</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-9">
								<h3>Alexandra Moore（アレクサンドラ・ムーア）</h3>
								<p>英語学修士。カナダ、ブリティッシュコロンビア大学博士課程でシェイクスピアとルネッサンス戯曲を履修。英語指導にも携わっており、大学での英語授業カリキュラム及び教育資料の製作経験もあります。</p> 	
								</br>
								<p>修士課程と博士課程での研究にあたっては、カナダ社会人文科学研究評議会から非常に高名な研究助成金を獲得。</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-9">
								<h3>Linda Fryant (リンダ・フライアント)</h3>
								<p>ワシントン大学でフィクション文学の学位を取得。これまでに編集・批評に関わった記事は150稿以上にのぼります。ライティングの授業で教鞭を取っており、専門技術文書の作成や、アメリカ行政機関向け研究プログラムの開発にも携わってきました。写真家としても受賞歴を持ち、自身も多言語話者。</p> 	
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