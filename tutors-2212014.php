<?php 
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Our Tutors</title>
<meta name='robots' content='noindex,nofollow' />
<link rel="alternate" type="application/rss+xml" title="FilipinoTutor.com &raquo; Feed" href="http://filipinotutor.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="FilipinoTutor.com &raquo; Comments Feed" href="http://filipinotutor.com/comments/feed/" />
<link rel="canonical" href="http://filipinotutor.com/signup/" />
<link rel='stylesheet' id='manhattan-theme-css'  href='http://filipinotutor.com/wp/wp-content/themes/manhattan/style.css?ver=2.0.0' type='text/css' media='all' />
<script type='text/javascript' src='http://filipinotutor.com/wp/wp-includes/js/comment-reply.min.js?ver=3.6'></script>
<script type='text/javascript' src='http://filipinotutor.com/wp/wp-includes/js/jquery/jquery.js?ver=1.10.2'></script>
<script type='text/javascript' src='http://filipinotutor.com/wp/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://filipinotutor.com/wp/xmlrpc.php?rsd" />
<link rel="Shortcut Icon" href="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/favicon.ico" type="image/x-icon" />
<link rel="pingback" href="http://filipinotutor.com/wp/xmlrpc.php" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

<!-- login form -->
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://filipinotutor.com/js/main-js.js"></script>
<script src="http://filipinotutor.com/js/ajax-jquery-pagination.js"></script>
<link href="http://filipinotutor.com/css/style.css" rel="stylesheet">
 <style type="text/css">
      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 0px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      /*.form-horizontal {
        max-width: 80%;
        padding: 19px 29px 40px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
    */
    </style>
 <script>
$(function() {
var tooltips = $( "[title]" ).tooltip();
$(document)(function() {
tooltips.tooltip( "open" );
})
.insertAfter( "form" );
});
</script>    

<link rel="stylesheet" type="text/css" href="http://filipinotutor.com/wp/wp-content/themes/manhattan/css/style.css" />
<script type="text/javascript" src="http://filipinotutor.com/wp/wp-content/themes/manhattan/js/modernizr.custom.79639.js"></script>
<noscript>
	<link rel="stylesheet" type="text/css" href="http://filipinotutor.com/wp/wp-content/themes/manhattan/css/styleNoJS.css" />
</noscript></head>
<body class="page page-id-23 page-template-default header-full-width content-sidebar"><div id="wrap"><div id="header"><div class="wrap"><div class="logo"><a href="http://filipinotutor.com/"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/logo.png" /></a></div>
<div class="tagline">
	Your Premier Online English Tutorial Site
</div>
<div class="right">
	<ul class="top-links">
		<li><a href="#">Inquire</a></li>
		<li><a href="http://filipinotutor.com/register.php">Sign Up</a></li>
		<li><a href="#login" data-toggle="modal" class="login">Login</a></li>
	</ul>
	<a href="#" class="btn-free">Free Trial Lessons<br /><span>Avail two free trial classes now</span></a>
</div>
<!-- Modal -->
<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Sign in</h3>
</div>
<div class="modal-body">
      <form class="form-signin" method="post" action="http://filipinotutor.com/login.php">
		<input type="text" class="input-block-level" placeholder="Username" name="login" size="20" value="">
		
		<input type="password"  class="input-block-level" placeholder="Password" name="password" size="8" value="">
        <label class="checkbox">
          <input type="checkbox" name="remember" value="yes" > Automatic login?
		  
        </label>
        <button class="btn btn-large btn-primary" type="submit" name="Submit">Sign in</button>
		<br />No account yet? <a href="http://filipinotutor.com/register.php">Register here.</a>
	  	<br /><a href="http://filipinotutor.com/forgot_password.php">Forgot your password?</a>
      </form>
</div>
</div>

 </div></div><div id="nav"><div class="wrap"><ul id="menu-main" class="menu genesis-nav-menu menu-primary js-superfish"><li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-15"><a href="http://filipinotutor.com/">Home</a></li>
<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="http://filipinotutor.com/about/">About</a>
<ul class="sub-menu">
	<li id="menu-item-27" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27"><a href="http://filipinotutor.com/about/">Company Profile</a></li>
	<li id="menu-item-65" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-65"><a href="http://filipinotutor.com/about/mission/">Mission</a></li>
	<li id="menu-item-64" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-64"><a href="http://filipinotutor.com/about/value-proposition/">Value Proposition</a></li>
</ul>
</li>
<li id="menu-item-94" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-94"><a href="http://filipinotutor.com/why-us/">Why Us</a></li>
<li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20"><a href="http://filipinotutor.com/guide/">Guide</a>
<ul class="sub-menu">
	<li id="menu-item-174" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-174"><a href="http://filipinotutor.com/guide/enrollment/">Enrollment Guide</a></li>
	<li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100"><a href="http://filipinotutor.com/guide/lesson/">Lesson Guide</a></li>
	<li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62"><a href="http://filipinotutor.com/guide/requirements/">Lesson Requirements</a></li>
	<li id="menu-item-61" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-61"><a href="http://filipinotutor.com/guide/faq/">FAQ</a></li>
</ul>
</li>
<li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="http://filipinotutor.com/curriculum/">Curriculum</a>
<ul class="sub-menu">
	<li id="menu-item-151" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-151"><a href="http://filipinotutor.com/curriculum/courses/">Courses Offered</a></li>
	<li id="menu-item-150" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-150"><a href="http://filipinotutor.com/curriculum/advisors/">Curriculum Advisors</a></li>
	<li id="menu-item-153" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-153"><a href="http://filipinotutor.com/curriculum/learn-english/">Why Learn English</a></li>
</ul>
</li>
<li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21"><a href="http://filipinotutor.com/tutors/">Our Tutors</a></li>
<li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="http://filipinotutor.com/pricing/">Affordable Pricing</a></li>
<li id="menu-item-25" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-23 current_page_item menu-item-25"><a href="http://filipinotutor.com/signup/">Sign Up</a></li>
</ul></div></div><div id="inner"><div id="content-sidebar-wrap"><div class="hfeed"><div class="post-23 page type-page status-publish hentry entry">
<div style="width:507px;">
 <div class="container">
      
      
      
			  <div class="span8">
			
			  <!-- pagination --------------------->
			  <h1 class="entry-title">Our Tutors</h1>
              It's important that you learn from the best. To guarantee a high quality of service, each of our instructors has completed either an English or Communications degree from the top Universities in the Philippines. Our tutors are friendly, knowledgeable and ready to guide you through the process of learning English/improving your English skills. They have all been required to complete extensive training and they undergo ongoing evaluations including personality tests, and are able to cater to specific learning desires and styles. You can browse our tutors and view their credentials and other details in order to select one that meets your needs. Not only can you choose the lesson, level of difficulty, and topics you can also select and change your tutor at any point in time. This means you can select the tutor who can best cater to your interests, level of English, and learning styles as your needs and learning demands change over time.
				<br /><br />
				We take pride in offering access to a high standard of education and service, which is why we encourage students to provide feedback. By sharing feedback about their lesson, the effectiveness and how much they enjoy working with their tutor, we ensure that our tutors undergo ongoing training and review to make sure our students are getting the best tutoring experience possible.
                <br /><br />
		 	
						
			<?php	
			$per_page = 4; 

			//getting number of rows and calculating no of pages
			$sql = "SELECT * FROM tutors";
			$rsd = mysql_query($sql);
			$count = mysql_num_rows($rsd);
			$pages = ceil($count/$per_page);
			
			?>
			
			
			<div id="content"></div>
			<div id="loading" ></div>
			<div class="pagination">
			
					<ul id="pagination">
						<?php
						//Show page links
						for($i=1; $i<=$pages; $i++)
						{
							echo '<li class="pages" id="'.$i.'"><span>'.$i.'</span></li>';
						}
						?>
			</ul>	
			</div>
			
			   <!-- <div class="well">
                <?php
				if(isset($_GET['tutor_id']))
				{
                $page_protect->get_tutor_info($_GET['tutor_id']);
				}
				?>
				Chosen Tutor: <strong><?php echo '<a href="#myModal'. $_GET['tutor_id'].'" role="button" class="btn" data-toggle="modal"><img style="width:40px;" class="img-rounded" src="'.$page_protect->tutor_photo.'"> '. $page_protect->tutor_nick_name;?></a></strong>
               
			    </div>
                
                -->
               </div> 
			
			
			  <!-- pagination --------------------->
	  

    </div> <!-- /container -->
</div>


<div class="entry-content"></div></div></div><div id="sidebar" class="sidebar widget-area"><div id="text-8" class="widget widget_text"><div class="widget-wrap">			<div class="textwidget"><div id="get-started">
<a href="http://filipinotutor.com/signup/"><h3>Get Started Today</h3>
<p>Register now<img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/morearrow.png"></p></a>
</div></div>
		</div></div>
<div id="text-6" class="widget widget_text"><div class="widget-wrap">			<div class="textwidget"><a href="http://filipinotutor.com/guide/enrolment/"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/steps.jpg" /></a></div>
		</div></div>
<div id="text-7" class="widget widget_text"><div class="widget-wrap">			<div class="textwidget"><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/pages/Filipino-Tutor/378406178951930" data-width="250" data-height="300" data-show-faces="true" data-stream="false" data-show-border="true" data-header="true"></div></div>
		</div></div>
</div></div></div><div id="footer" class="footer"><div class="wrap"><div class="row">
	<div class="col1">
		<h4>About Us</h4>
		<p>FilipinoTutor.com is an online tutoring service offering the highest quality service at an affordable price. We offer tutoring to students around the world who enjoy being able to take advantage of our convenient online lessons and exceptional service. <a href="http://filipinotutor.com/about/">Read More</a>.</p>
	</div>
	<div class="col2">
		<h4>Student Guide</h4>
		<ul>
			<li><a href="http://filipinotutor.com/guide/enrolment/">Enrolment Guide</a></li>
			<li><a href="http://filipinotutor.com/guide/lesson/">Lesson Guide</a></li>
			<li><a href="http://filipinotutor.com/guide/requirements/">Lesson Requirements</a></li>
			<li><a href="http://filipinotutor.com/guide/faq/">FAQ</a></li>
			<li><a href="http://filipinotutor.com/curriculum/courses/">Courses Offered</a></li>
			<li><a href="http://filipinotutor.com/pricing/">Affordable Pricing</a></li>
		</ul>
	</div>
	<div class="col3">
		<h4>Quick Links</h4>
		<ul>
			<li><a href="http://careers.filipinotutor.com/" target="_Blank">Tutor Application</a></li>
			<li><a href="http://filipinotutor.com/inquire/">Inquire</a></li>
			<li><a href="http://filipinotutor.com/help/">Help</a></li>
			<li><a href="http://filipinotutor.com/feedback/">Feedback</a></li>
			<li><a href="http://filipinotutor.com/sitemap/">Sitemap</a></li>
		</ul>
	</div>
	<div class="col4">
		<a href="http://filipinotutor.com/"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/logo-footer.png" /></a>
		<p>Copyright (C) 2013. All Rights Reserved.</p>
		<p class="email">email: <a href="mailto:hello@filipinotutor.com">hello@filipinotutor.com</a></p>
		<p><a href="http://filipinotutor.com/privacy/">Privacy</a></p>
	</div>
</div>
<div class="row-icons">
	<a href="https://www.facebook.com/pages/Filipino-Tutor/378406178951930" target="_Blank"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/fb-footer.png" /></a><a href=https://twitter.com/FilipinoTutor" target="_Blank"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/tweet-footer.png" /></a><a href="http://www.youtube.com/channel/UCBOkJ-mPi0lZebnLFHIie-g" target="_Blank"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/yt-footer.png" /></a><a href="https://plus.google.com/u/0/101394197468310358205/posts" target="_Blank"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/gplus-footer.png" /></a><a href="http://ph.linkedin.com/pub/filipino-tutor/79/530/427" target="_Blank"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/linkedn-footer.png" /></a><a href="#" target="_Blank"><img src="http://filipinotutor.com/wp/wp-content/themes/manhattan/images/skype-footer.png" /></a>
</div></div></div></div><script type="text/javascript" src="http://filipinotutor.com/wp/wp-content/themes/manhattan/js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="http://filipinotutor.com/wp/wp-content/themes/manhattan/js/jquery.slitslider.js"></script>
<script type="text/javascript">	
			$(function() {
			
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ),
						$nav = $( '#nav-dots > span' ),
						slitslider = $( '#slider' ).slitslider( {
							onBeforeChange : function( slide, pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':last' ).on( 'click', function() {

								slitslider.next();
								return false;

							} );

							$navArrows.children( ':first' ).on( 'click', function() {
								
								slitslider.previous();
								return false;

							} );

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slitslider.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slitslider.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();

				Page.init();

				/**
				 * Notes: 
				 * 
				 * example how to add items:
				 */

			
			});
		</script><script type='text/javascript' src='http://filipinotutor.com/wp/wp-content/themes/genesis/lib/js/menu/superfish.min.js?ver=1.7.4'></script>
<script type='text/javascript' src='http://filipinotutor.com/wp/wp-content/themes/genesis/lib/js/menu/superfish.args.min.js?ver=2.0.0'></script>
<script type='text/javascript' src='http://filipinotutor.com/wp/wp-content/themes/genesis/lib/js/menu/superfish.compat.min.js?ver=2.0.0'></script>
</body>

</html>
