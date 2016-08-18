<?php 
	$path=true;
	$root = $_SERVER['DOCUMENT_ROOT'];
	$folder = '';
	$path = $root.$folder."/template/";
	$title = "Filipino Tutor";
	$metad = "Your Premier Online English Tutorial Site";
    include("includes/main_class.php"); 
	$page_protect = new Main_Class;
	// $page_protect->login_page = "login.php"; // change this only if your login is on another page
	//$page_protect->access_page($_SERVER['PHP_SELF'], "", 1); // change this value to test differnet access levels (default: 1 = low and 10 high)
	//$page_protect->get_user_info();
	ini_set("date.timezone", "Asia/Manila"); // set timezone
	//       get student info----------
	/*
		$page_protect->get_student_info($page_protect->user_id); //from users table
		if($page_protect->has_profile_student($page_protect->user_id))
		{
			$page_protect->get_student_profile($page_protect->user_id);	//from students table
		}
	*/
	//$hello_name = ($page_protect->user_first_name != "") ? $page_protect->user_first_name : $page_protect->user;
	if (isset($_GET['action']) && $_GET['action'] == "log_out") {
		$page_protect->log_out(); // the method to log off
	}
		include($path.'header.php');
?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div id="post">
					<div class="inner">
						<h1 class="entry-title">FilipinoTutor.comの講師について</h1></br>
						<p>優秀な先生から学ぶことは、学習過程においてとても重要です。最高のレッスンを確実にお届けするために、FilipinoTutor.comは講師を厳選しています。講師の採用条件は、フィリピンのトップ大学で英語学またはコミュニケーション学の学位を取得していること。さらに、英語教授プログラムの修了が必須です。講師として指導を始めた後も、パーソナリティテストを含めた評価を継続的に実施。信頼できる指導力の維持に力を入れております。知識豊富でフレンドリーな講師陣が、あらゆる面であなたの英語学習をサポート。学習者ひとり一人の希望や学習スタイルに合わせた最適のレッスンを提供できるよう努めております。
						</p>

						<p>						この講師陣の中からあなたに合った講師をお選びいただき、レッスンを行います。講師の資格や詳細情報はFilipinoTutor.comのウェブサイトから閲覧可能です。あなたにぴったりの講師を見つけましょう。また、講師・レッスン内容の変更はいつでも可能です。学習目的・英語力・学習スタイルに合わせて、最適の講師・レッスンをお選びください。あなたの要望に柔軟に対応できるのが FilipinoTutor.com の利点です。
						</p>
						
						<p>FilipinoTutor.com は高い指導力と優れたサービス内容に誇りを持っています。みなさまから頂いた意見は、すべからくレッスンに反映させ、さらなるサービス向上と講師トレーニングに活かします。授業内容や学習効果、どれだけ楽しんで学習できたかなど、お気軽に意見をお寄せください。
						</p>

						<div class="row">
							<div class="col-sm-3">
								<p align="center"><img src="/images/tutor-ericca.jpg" alt="" class="img-responsive" /><br /><b>Ericca B. Gabriel</b><br />ESL Tutor<br /><a href="#tutorEricca" role="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tutorEricca">View Profile</a></p>
							</div>
							<div class="col-sm-3">
								<p align="center"><img src="/images/tutor-cvelasco.jpg" alt="" class="img-responsive" /><br /><b>Ms. Carla Mei P. Velasco</b><br />ESL/Business English Tutor<br /><a href="#tutorCarla" role="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tutorCarla">View Profile</a></p>
							</div>
							<div class="col-sm-3">
								<p align="center"><img src="/images/tutor-fatima.jpg" alt="" class="img-responsive" /><br /><b>Fatima Rosario T. Abrugar</b><br />ESL/Business English Tutor<br /><a href="#tutorPam" role="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tutorPam">View Profile</a></p>
							</div>
							<div class="col-sm-3">
								<p align="center"><img src="/images/tutor-karen.jpg" alt="" class="img-responsive" /><br /><b>Karen Paula V. Manalo</b><br />ESL/Business English Tutor<br /><a href="#tutorPaula" role="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tutorPaula">View Profile</a></p>
							</div>
							
							<!-- Modal -->
							<div class="modal fade bs-example-modal-sm" id="tutorEricca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog">
								<div class="modal-content">
									<!-- <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 id="myModalLabel">Tutor Aicca</h3>
									</div> -->

									<div class="modal-body">
										<div class="row">
											<div class="col-sm-5">
												<img src="/images/tutor-ericca.jpg" alt="Photo" class="img-thumbnail" style="align:left;" height="300px"><br>
												<audio src="../audio/tutors/tutor29c3206505bdb8f10608f1e3cd86d453.mp3" controls="controls" style="width: 220px;margin-top:5px;"></audio>
											</div>
											<div class="col-sm-7">
												<h3>Ericca B. Gabriel</h3>
												<h4>ESL Tutor</h4>
												<p>Good day! I am Ericca of Filipinotutor. You can call me Aicca.  When I have free time, I do watch TV shows or movies. I also love watching anime, I started liking anime ever since I was a little kid, I also like listening to music, no specific genre. As long as I enjoy the beat and sometimes it also depends on the mood. I also love food, for me eating food is happiness, especially when you eat together with your family or friends. For me, teaching is a new journey that I am excited to experience. I am here to guide you in learning the English language. As your tutor you can expect my classes to be enjoyable and fun learning experience. So see you in one of my classes.</p>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									</div>
								</div>
							</div>
							</div>
							
							
							<!-- Modal -->
							<div class="modal fade bs-example-modal-sm" id="tutorCarla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 id="myModalLabel">Tutor Mei</h3>
									</div>

									<div class="modal-body">
										<div class="row">
											<div class="col-sm-5">
												<img src="/images/tutor-cvelasco.jpg" class="img-thumbnail" style="align:left;"><br>
												<audio src="/audio/tutors/tutor5895752e7da2b5377f70cc63e6d6f072.mp3" controls="controls" style="width: 220px;margin-top:5px;">
											</audio>
											</div>
											<div class="col-sm-7">
												<p>Hi Everyone! Welcome to FilipinoTutor.com! My Name is Carla Mei. You can call me teacher Mei. I'm from the Philippines. I finished a year of study in Electronics Technology and I'm taking up Computer Design and Programming. I worked as an English tutor for almost three years, both online and offline. I attended trainings and seminars for English Proficiency and for an ESL Instructor in my former institution. I also worked as a kindergarten teacher in a private school. Having these experiences enabled me to meet, teach and deal with people of all levels from different countries. I love to learn about their cultures and try their foods. These help me know them even more. In addition, I am also a nature-lover and I enjoy taking photos of nature. I like to travel and explore the beauty of a place. I also like to surf the internet and read informational articles during my free time. It would be a delight for me to share my experiences and impart my knowledge. I look forward to sharing and learning with you in our class. Thank you so much and have a good day!</p>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									</div>
								</div>
							</div>
							</div>
							
							
							<!-- Modal -->
							<div class="modal fade bs-example-modal-sm" id="tutorPam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 id="myModalLabel">Tutor Pam</h3>
									</div>

											<div class="modal-body">
									<div class="row">
										<div class="col-sm-5">
											<img src="/images/tutor-fatima.jpg" class="img-thumbnail" style="align:left;"><br>
											<audio src="../audio/tutors/Fatima Rosarioc3484636bdd6843cbef00d7a9394af37.mp3" controls="controls" style="width: 220px;margin-top:5px;">
										</audio></div>
										<div class="col-sm-7">
											<p style="vertical-align:top;">Hello! My name is Pam, and I am someone who is passionate in every work that I do. I have a strong sense of professionalism which means I value time, and I don't have attendance or tardiness issues. I've significant years of experience in the Outsourcing industry as Communication Skills Trainer, Sales Coach, and a Project manager. This means that I have dealt with a great number of people from almost all walks of life. Again , I am passionate in every task at hand, which also translates that I am someone who always strives for excellence. 

											My extensive experience in conducting Effective Communication using English showcases my flexibility and people skills. I have taught English to students from various age group in a classroom setting, and online. For me, it is fulfilling to see how people can learn from me, and how I can inspire them to do well and to know more. In a way, I am also learning from my students because of their individual needs as a learner. 

											Outside work, I am an avid reader, traveler and an aspiring cook. I love trying out new dishes, and my family is quite optimistic in this interest . Well, they really most of the time. 

											Learning English  can be easy, and challenging … and in my class, I'll be with you in every step to make sure that you would become an effective communicator. And whenever we have the chance, it's going be a fun activity to look forward to.
											</p>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									</div>
								</div>
							</div>
							</div>
							
							<!-- Modal -->
							<div class="modal fade bs-example-modal-sm" id="tutorPaula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 id="myModalLabel">Tutor Paula</h3>
									</div>

									<div class="modal-body">
										<div class="row">
											<div class="col-sm-5">
												<img src="/images/tutor-karen.jpg" class="img-thumbnail" style="align:left;"><br>
												<audio src="../audio/tutors/tutor96cb04592571451526fb7b9c88f27bcf.mp3" controls="controls" style="width: 220px;margin-top:5px;">
											</audio></div>
											<div class="col-sm-7">
												<p style="vertical-align:top;">Hi. I'm Karen Paula Manalo and you can call me Paula. I'm 27 years old. I graduated with a bachelor's degree in Biology. Being a nature lover, I majored in Wildlife Biology. However, I've always had a passion for English that's why I also took courses such as Basic English, Reading Intro Writing in English, Speech Communication, Voice and Diction, and IELTS test preparation. I was trained in public speaking especially in using the English language for more than 10 years. I used to join many public speaking competitions when I was younger until I reached first year college. I am also into sports especially martial arts like Taekwondo and boxing. Aside from this, I've been teaching for about 5 years now. I taught face to face students for about 3 years. This includes grade school, middle school and even college students. I then became an online English teacher to Japanese and Thais for 2 years. My passion for teaching and the English language continues with fulfilling enjoyment as I meet new people from different places and share my knowledge and skills with them. I'm certain that I can be of good help to others wanting to further improve their English skills may it be reading, writing, listening, and speaking including practicing proper grammar. My goal is to be of help to others in enhancing their English skills and becoming confident in expressing themselves using the English language. I'm excited to learn and study English with you here at FilipinoTutor.com.</p>
											</div>
										</div>
									</div>

									<div class="modal-footer">

										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									</div>
								</div>
								
							</div>
							</div>
							
							
						</div>
					
						<hr />
						
						<p align="center"><a href="/register.php" class="btn btn-small btn-success">Register to View More Tutors</a></p>
					
						
						
				    </div> 
				</div>
			</div>
			<?php include($path.'sidebar.php'); ?>
		</div>
	</div>
</div>
<?php include($path.'footer.php'); ?>



