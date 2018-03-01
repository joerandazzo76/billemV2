<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<meta name = "viewport" content = "width=device-width"/>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity = "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		  crossorigin = "anonymous">
	<link href = "<?= CSS . "/main.css" ?>" rel = "stylesheet" type = "text/css"/>
	<link rel = "icon" href = "favicon.ico" type = "image/x-icon">
	<script type = "text/javascript" src = "js/jquery_2.1.3_jquery.min.js"></script>
	<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
			integrity = "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
			crossorigin = "anonymous"></script>
	<script type = "text/javascript" src = "js/main.js"></script>
	<title> <?= DOMAIN ?> </title>
</head>
<body>
<!--wrapper-->
<div class = "prelander">
	<!--holder-->
	<div class = "header">
		<div class = "container">
			<div class = "top_sec row">
				<div class = "logo col-xs-12 col-sm-3 pull-left">
					<a href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/logo.png" alt = "<?= DOMAIN ?>">
					</a>
				</div>
				<div class = "top_rt col-xs-12 col-sm-9">
					<div class = "buttons_wrap pull-right">
						<a href = "#signup_form">Sign Up Now</a>
					</div>
				</div>
			</div>
		</div><!-- holder -->
	</div><!-- header -->
	<div class = "main_bg">
		<div class = "container">
			<div class = "row">
				<div class = "heading_main col-xs-12 text-center">
					<span>SIGN UP</span> FOR THE HOTTEST HOOK UPS YOU WILL EVER HAVE!
				</div>
				<div class = "steps col-xs-12"></div>
			</div>
			<div class = "row form_section">
				<div class = "image_gallery col-xs-12 col-sm-6"><!--main_bg_gal-->
					<div class = "row text-center">
						<a class = "col-xs-6" href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/img1.jpg"
															  alt = ""/></a>
						<a class = "col-xs-6" href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/img2.jpg"
															  alt = ""/></a>
					</div>
					<div class = "row">
						<a class = "col-xs-6" href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/img3.jpg"
															  alt = ""/></a>
						<a class = "col-xs-6" href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/img4.jpg"
															  alt = ""/></a>
					</div>
					<div class = "row">
						<a class = "col-xs-6" href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/img5.jpg"
															  alt = ""/></a>
						<a class = "col-xs-6" href = "#"><img class = "img-responsive" src = "<?= IMAGES ?>/img6.jpg"
															  alt = ""/></a>
					</div>
				</div>
				<div class = "form_column col-xs-12 col-sm-6">
					<form method = "post" action = "<?php echo $_SERVER['REQUEST_URI']; ?>"
						  id = "signup_form">
						<fieldset>
							<legend class = "text-center">Join <span>Now!</span></legend>
							<!-- Text input-->
							<div class = "row">
								
								<div class = "col-xs-12">
									<label class = "" for = "username">Username</label>
									<input id = "username" name = "username" type = "text" placeholder = "Username"
										   class = "form-control input-md" required = ""
										   value = "<?php if (isset($userObject->userName)) {
											   if ($userObject->userName) {
												   echo $userObject->userName;
											   }
										   } ?>">
									<?php if (isset($userObject->validateObject->validUsername)) {
										if ($userObject->validateObject->validUsername != 1) {
											echo "<p align='center' style='color:#ffffff;background-color:red;'>" .
												"Username taken, please try again" . "</p>";
										}
									} ?>
									<span id = "usernameStatus"></span>
									<br>
								
								</div>
							</div>
							<!-- Password input-->
							<div class = "row">
								<div class = "col-xs-6">
									<label class = "" for = "password1">Password</label>
									
									<input id = "password1" name = "password1" type = "password" placeholder = "Password"
										   class = "form-control input-md" required = "" pattern = ".{0}|.{8,}" title = "Password requires a minimum of eight(8) characters">`
								
								</div>
								
								<div class = "col-xs-6">
									<label class = "" for = "password">Password</label>
									<input id = "password2" name = "password2" type = "password"
										   placeholder = "Password" class = "form-control input-md" required = "" pattern = ".{0}|.{8,}" title = "Password requires a minimum of eight(8) characters">
									<?php
									if (isset($userObject->validateObject->validPassword)) {
										if ($userObject->validateObject->validPassword != 1) {
											echo "<p align='center' style='color:#ffffff;background-color:red;'>" .
												"Passwords do not match" . "</p>";
											
										}
										
									}
									
									?>
									<br>
								</div>
							
							</div>
							<div class = "row">
								<div class = "col-xs-12">
									<label class = "" for = "email">Email</label>
									
									<input id = "email" name = "email" type = "email" placeholder = "Email Address"
										   class = "form-control input-md" required = ""
										   value = "<?php if ($userObject->email) {
											   echo $userObject->email;
										   } ?>">
									<?php
									if (isset($userObject->validateObject->validEmail)) {
										if ($userObject->validateObject->validEmail != 1) {
											echo "<p align='center' style='color:#ffffff;background-color:red;'>" .
												"Email taken, please try again" . "</p>";
										}
										
									}
									?>
									<span id = "emailStatus"></span>
								</div>
							</div>
							<!-- Button -->
							<div class = "row">
								<div class = "col-xs-12">
									<div class = "form-actions">
										<input id = "button_submit" type = "submit" name = "submit" class = "btn"
											   value = "join">
									</div>
								</div>
							
							</div>
						</fieldset>
					</form>
					<div class = "row list">
						<ul class = "list-unstyled col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-2 col-lg-8 col-lg-offset-2">
							<li><p>The hottest singles looking to score!</p></li>
							<li><p>Thousands of local sexy members!</p></li>
							<li><p>Click, connect and hookup tonight!</p></li>
						</ul>
					</div>
				
				</div><!-- form column -->
			</div><!-- form_section -->
			<ul class = "row bottom_sec list-unstyled">
				<li class = "col-xs-12 col-sm-4 text-center"><p>100% Free Membership</p></li>
				<li class = "col-xs-12 col-sm-4 text-center"><p>Trusted Verification To Keep You Safe</p></li>
				<li class = "col-xs-12 col-sm-4 text-center"><p>Click Now To Connect With Sexy Matches</p></li>
			</ul>
			<div class = "mobile_button">
				<a href = "#signup_form">Sign Up Now</a>
			</div>
			<div class = "slider">
				<div id = "my_carousel" class = "carousel slide" data-ride = "carousel">
					<ol class = "carousel-indicators">
						<li data-target = "#my_carousel" data-slide-to = "0" class = "active"></li>
						<li data-target = "#my_carousel" data-slide-to = "1"></li>
						<li data-target = "#my_carousel" data-slide-to = "2"></li>
						<li data-target = "#my_carousel" data-slide-to = "3"></li>
					</ol>
					<div class = "carousel-inner">
						<div class = "item active">
							<h2>What people are saying about <?= DOMAIN ?>.com:</h2>
							<p>"<?= DOMAIN ?>.com blew my mind away – amazing women and very easy to browse! Keep it
							   up..."
							   (mark12) "Every time I go online I find more and more beautiful women ready to please
							   and super friendly! Excellent site" (jimicool)</p>
						</div>
						<div class = "item">
							<h2>What people are saying about <?= DOMAIN ?>.com:</h2>
							<p>"so many choices to make between all the sexy women on here! I'm hooked!" (luvindude4u)
							   "I can't stop logging on to <?= DOMAIN ?>. I don't wanna miss out on playing with these
							   hot
							   women on here!!" (hardascanb)</p>
						</div>
						<div class = "item">
							<h2>What people are saying about <?= DOMAIN ?>.com:</h2>
							<p>"Is this site for real? I didn't think so at first but after many long nights of fun I am
							   a believer!" (AlphaMale69) "These women are the real deal. Sexy as can be and will do
							   anything for you on cam!!" (TopDog)</p>
						</div>
						<div class = "item">
							<h2>What people are saying about <?= DOMAIN ?>.com:</h2>
							<p>"So glad I found this site! It can keep you busy for hours chatting with one hot woman to
							   another. I don't have a life anymore lol" (FineBro) "Easy to use and easy to find what
							   you're looking for. I was sold after 5 minutes!" (DrSex)</p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- container -->
		<div class = "footer text-center">
			<div class = "container">
				<p>This website is strictly for adults only! This website contains sexually explicit content.</p>
				<p>You must be at least 18 years of age to enter this website.</p>
				<p><a data-toggle = "modal" data-target = "#popup" href = "#popup">18 U.S.C. 2257 Record-Keeping
																				   Requirements
																				   Compliance Statement</a></p>
				<p>© 2015 | All Rights Reserved </p>
			</div>
		</div>
	</div><!--main_bg-->
</div><!--wrapper-->

<div id = "popup" class = "prelander modal fade" role = "dialog">
	<div class = "modal-dialog">
		<div class = "modal-content">
			<div class = "modal-header">
				<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
				<h2>18 U.S.C. 2257 Record-Keeping Requirements Compliance Statement</h2>
			</div>
			<div class = "modal-body">
				<p>All models, actors, actresses or other persons that appear in any visual depiction of actual sexually
				   explicit conduct contained in this Website were over the age of eighteen years at the time of the
				   creation of such depictions.</p>
				
				<p>Some visual depictions displayed on this Website are exempt from the provision of 18 U.S.C. section
				   2257 and 28 C.F.R. 75 because said visual depictions do not consist of depictions of conduct as
				   specifically listed in 18 U.S.C section 2256 (2) (A) through (D), but are merely depictions of
				   non-sexually explicit nudity, or are depictions of simulated sexual conduct, or are otherwise exempt
				   because the visual depictions were created prior to July 3, 1995.</p>
				
				<p>The records required to be maintained pursuant to 18 USC ¡ì 2257 and its applicable regulations are
				   kept by the following person:</p>
				
				<p>
					Custodian of Records<br>
					Social Logic, LLC<br>
					9 Coconut Drive<br>
					Suite 139<br>
					San Pedro, Belize<br>
				</p>
				
				<p>Exemption Statement Content Produced by Third Parties: The operators of this website are not the
				   producers of any depictions of actual or simulated sexually explicit conduct submitted by its third
				   party users / members. Instead, the activities of the operators of this website, with respect to
				   such content, are limited to the transmission, storage, retrieval, hosting and/or formatting of
				   depictions posted directly to the website by third party users, on areas of the website under the
				   users control. Pursuant to Title 18 U.S.C. 2257(h)(2)(B) (iii) and Title 18 U.S.C. 2257(h)(2)(B) (v)
				   and 47 U.S.C. 230(c), Member information is not similarly maintained and the operators of this
				   website reserve the right to delete content posted by users which the operators deem to be indecent,
				   obscene, defamatory or inconsistent with their policies and terms of service.</p>
			</div>
		</div>
	</div>
</div> <!-- popup -->


</body>
</html>



