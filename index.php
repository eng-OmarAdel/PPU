<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/-->
<!DOCTYPE html>
<html>
<head>
<title>Min App a Category Flat Bootstarp Responsive Website Template| Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Min App Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>

</head>
<body>
		<div class="header">
			<div class="header-top">
				<div class="container">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png"></a>
				</div>
				<div class="top-menu">
					 <span class="menu"> </span>
					 <ul>
						<!-- <li><a href="#about" class="scroll">about us</a></li> -->
						<li><a href="#services" class="scroll">services</a></li>
					</ul>
					</div>
					<div class="clearfix"> </div>
					 <!-- script-for-menu -->
		 <script>
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle("slow" , function(){
						});
					});
		 </script>
		 <!-- script-for-menu -->

					</div>
				</div>
				</div>
				<div class="banner">
					<div class="container">
						<div class="banner-grids">
						<div class="col-md-3">
						</div>
						<div class="col-md-6 right-grid slider">
						<div class="callbacks_container">
			  		<ul class="rslides" id="slider">
					 <li>
					 <h1>Pay your bills</h1>
					<p>Currently, you can just submit your reading. We are working on the payment option.</p>

					</li>
				 	<li>
					<h1>Light</h1>
					<p>While scanning your meter please make sure that light intensity is good.
          Make sure there's no light reflections from the meter.</p>

				 	</li>
          <li>
					<h1>Clear Image</h1>
					<p>Try to put the reading exactly in the black rectangle.</p>
					<!-- <a href="#" class="button hvr-shutter-in-horizontal">more info</a> -->
					</li>
			  </ul>
		  </div>
		  </div>
      <div class="col-md-3">
      </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	</div>

			<div class="content">
				<div class="service-section" id="services">
					<div class="container">
						<h3> our services</h3>
            <?php if(isset($GLOBALS['reading'])){
              if(isset($GLOBALS['low'])){
                echo '<div class="alert alert-danger" role="alert">
                        '.$GLOBALS["low"].': '.$GLOBALS["reading"].'
                      </div>';
                unset($GLOBALS['low']);
              }
              elseif (isset($GLOBALS['high'])) {
                echo '<div class="alert alert-danger" role="alert">
                        '.$GLOBALS["high"].': '.$GLOBALS["reading"].'
                      </div>';
                unset($GLOBALS['high']);

              }
              else{
                echo '<div class="alert alert-success" role="alert">
                        Your usage is: '.$GLOBALS['reading'].'
                      </div>';
              }
              unset($GLOBALS['reading']);
            } ?>
						<div class="service-grids">
							<div class="col-md-4 service-grid">
                <a href="cam.html?service=electricity">
  								<img src="images/electricity.png">
  								<h4>Electricity</h4>
  								<p>Click me to read your meter.</p>
                </a>
							</div>
							<div class="col-md-4 service-grid">
                <a href="cam.html?service=water">
  								<img src="images/water.png">
  								<h4>Water</h4>
  								<p>Click me to read your meter. </p>
                </a>
							</div>
							<div class="col-md-4 service-grid">
                <a href="cam.html?service=naturalgas">
  								<img src="images/naturalgas.png">
  								<h4>Natural Gas</h4>
  								<p>Click me to read your meter. </p>
                </a>
              </div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="about-section" id="about" >
					<div class="container">
						<!-- <h3>about</h3>
						<div class="about-grids">
							<div class="col-md-6 left-about">
								<div class="about-grid1">
									<h4>Tempees.com</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus augue vitae est volutpat eleifend. Donec lobortis tellus quis nulla varius nec sagittis dui vestibulum. Mauris volutpat tellus id est suscipit placerat. Integer ut feugiat nisi. Etiam dictum condimentum mauris, nec pellentesque augue dignissim ut. Integer commodo vulputate ipsum at vehicula. Fusce sit amet metus quam. In hac habitasse platea dictumst.</p>
									</div>
									<div class="about-grid2">
										<h4>skills</h4>
										<section id="skills">
					<progress value="90" max="100"> </progress><span>HTML/HTML5</span>
					<progress value="95" max="100"> </progress><span>CSS/CSS3</span>
					<progress value="85" max="100"> </progress><span>Photoshop / IlLustrator</span>
					<progress value="80" max="100"> </progress><span>Mobile design / Responsive design</span>
					</section>

								</div>
						    </div>
						   <div class="col-md-6 right-about">
							  <div class="google-map">
							  	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3021.0814617966994!2d-73.96467908332265!3d40.782223218920294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2589a018531e3%3A0xb9df1f7387a94119!2sCentral+Park!5e0!3m2!1sen!2sin!4v1420805667126"></iframe>
								</div>
								<div class="contact">
									<form>
								<input type="text" class="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name ';}">
								 <input type="text" class="text" value="phone " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'phone ';}">
								 <input type="text" class="text" value="Email " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email ';}">
									<div class="contact1">
									<textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message </textarea>
					 					<input type="submit" value="send">
								</form>
								</div>
							</div>
						</div>
								<div class="clearfix"></div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="footer-section">
					<div class="container">
						<div class="footer-top">
					<p> Copyright &copy;2015  All rights  Reserved | Template by<a href="http://w3layouts.com" target="target_blank">W3Layouts</a></p>
					</div>
					<script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear'
					 		};
							*/

							$().UItoTop({ easingType: 'easeOutQuart' });

						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


					</div>
					</div>
</body>
</html>
