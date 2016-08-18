<?php	
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	
	$path = $root.$folder."/template/";

	$title = "Courses FilipinoTutor.com";
	$metad = "";
	
	include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1>Courses</h1>                        						
						<div class="courses-page">					
							<div class="row">							
								<div class="col-lg-6">							
										<div class="course-desc">								
											<div class="col-lg-4">										
											<img src="../images/business-eng.png" class="img-responsive center-block" alt="">									</div>									
											<div class="col-lg-8">					
											<h3>ビジネス英語</h3>					
											<p>会議やプレゼンテーションで使える英語を学習します。特に、ビジネス英会話、メールや手紙の書き方に力を入れたレッスンです。</p>		
											</div>									
										</div>	

										
										<div class="course-desc">										
											<div class="col-lg-4">											
											<img src="../images/basic-advanced-grammar.png" class="img-responsive center-block" alt="">
											</div>										
											<div class="col-lg-8">											
											<h3>子供英会話</h3>											
											<p>ABC、123から始める子供向け英語レッスンです。一から英語を始める子にも、もっと英語力を伸ばしたい子にもオススメ。</p>										
											</div>									
										</div>									
										<div class="course-desc">										
											<div class="col-lg-4">											
											<img src="../images/vocabulary-building.png" class="img-responsive center-block" alt="">
											</div>									
											<div class="col-lg-8">											
											<h3>単語力アップ </h3>											
											<p>定期的な単語学習で語彙を増やしましょう。日常会話でよく使う言葉、言い回し、熟語を豊富にリストアップしました。</p>										
											</div>									
										</div>									
										<!--<div class="course-desc">										
											<div class="col-lg-4">											
											<img src="../images/uni-level-english.png" class="img-responsive center-block" alt="">
											</div>									
											<div class="col-lg-8">											
											<h3>University-Level English</h3>											
											<p>Sed lectus. Nullam sagittis. Nunc sed turpis. Cras risus ipsum, faucibus ut, ullamcorper id, varius ac, leo. Praesent ac massa at ligula laoreet iaculis.</p>										
											</div>									
										</div>-->														
								</div>							 
								<div class="col-lg-6">							    

								<div class="course-desc">										
								<div class="col-lg-4">											
								<img src="../images/pronounciation.png" class="img-responsive center-block" alt="">								</div>										
								<div class="col-lg-8">											
								<h3>発音練習 </h3>											
								<p>正しい発音を学びます。単語だけでなく、句単位での適切な発音も練習します。正確な発音ができると、どんな状況でも自信を持って発言できるようになります。
</p>										
								</div>									
								</div>									
								<!--<div class="course-desc">										
								<div class="col-lg-4">											
								<img src="../images/uni-exam.png" class="img-responsive center-block" alt="">										</div>										
								<div class="col-lg-8">					
								<h3>University Exam Preparation</h3>									
								<p>Sed lectus. Nullam sagittis. Nunc sed turpis. Cras risus ipsum, faucibus ut, ullamcorper id, varius ac, leo. Praesent ac massa at ligula laoreet iaculis.</p>										</div>
								</div>	-->
								
								<div class="course-desc">										
									<div class="col-lg-4">											
									<img src="../images/toefl.png" class="img-responsive center-block" alt="">										</div>										
									<div class="col-lg-8">											
									<h3>TOEFL、ESL、TOEIC</h3>											
									<p>TOEFL、TOEIC の準備をしましょう。ひとり一人のレベルに合わせた模擬試験もご利用いただけます。</p>										
									</div>									
								</div>	
								
								
								<div class="course-desc">										
									<div class="col-lg-4">											
									<img src="../images/uni-level-english.png" class="img-responsive center-block" alt="">
									</div>										
									<div class="col-lg-8">											
									<h3>基礎英文法と上級文法 </h3>											
									<p>基礎から上級英文法までを網羅したワークシートと文法演習です。楽しみながらも、痒いところに手が届く文法レッスンです。</p>										
									</div>									
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