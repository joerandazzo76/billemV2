<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content - Type" content = "text / html; charset = utf - 8"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<link href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel = "stylesheet"
		  integrity = "sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin = "anonymous">
	
	<link href = "<?= CSS . "/main.css" ?>" rel = "stylesheet" type = "text/css"/>
	<script src = "https://code.jquery.com/jquery-3.2.1.js"
			integrity = "sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin = "anonymous"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
			integrity = "sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
			crossorigin = "anonymous"></script>
	
	<script type = "text/javascript" src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
			integrity = "sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
			crossorigin = "anonymous"></script>
	<script type = "text/javascript" src = "js/main.js"></script>
	
	<title> <?= DOMAIN ?> </title>
</head>

<body>
<br>

<div class = "text-center container-fluid">
	<div class = "row page-header checkout_form package2">
		<div class = "container">
			<div class = "center-block">
				<img class = "img-responsive col-sm-4 col-sm-offset-4" src = "<?= IMAGES ?>/logo-live.png" alt = "<?= DOMAIN ?>">
			</div>
		</div>
	</div>
</div>
<div class = "container checkout_form package2">
	<div class = "container-fluid text-center title">
		<img src = "<?= IMAGES ?>/join-head.gif" alt = "">
		<h3> Sign up for a No Charge LIFETIME MEMBERSHIP!</h3>
		
		<!--        <div class="vip_check">
					<input class="d-inline" type="checkbox" name="vip" id="vip" checked>
					<label class="d-inline" for="vip">Special Offer</label>
				</div>-->
	
	
	</div>
	<?php
	if (isset($_POST['submit']) == "submit" && isset($offer)) {
		if ($offer->dating->purchase_status == false || $offer->live->purchase_status == false || $offer->video->purchase_status == false) {
			echo "<p align='center' style='color:#ffffff;background-color:red;'>" . "Oops, something went wrong. Please verify your information or try another card." . "</p>";
			if (DEBUG_PRINT) {
				var_dump($offer->dating->purchase_status);
				var_dump($offer->live->purchase_status);
				var_dump($offer->video->purchase_status);
			}
			
		}
	}
	
	
	?>
	<div class = "row content_wrap justify-content-center">
		<div class = "col-12 col-md-8 column">
			
			<form class = "form-horizontal container-fluid" method = "post"
				  action = "<?php echo $_SERVER['DOCUMENT_URI']; ?>">
				<fieldset>
					<!-- Form Name -->
					<legend class = "text-center text-uppercase">Secure Checkout</legend>
					
					<!-- Text input-->
					<div class = "row">
						<div class = "form-group col-md-6">
							<label class = "control-label" for = "customerFirstName">First Name:</label>
							<input id = "customerFirstName" name = "customerFirstName" type = "text" placeholder = ""
								   class = "form-control input-md" required = ""
								   value = "<?php
								   if (isset($_SESSION['user']->firstName)) {
									   echo $_SESSION['user']->firstName;
								   } ?>">
						</div>
						<div class = "form-group col-md-6">
							<label class = "control-label" for = "customerLastName">Last Name:</label>
							<input id = "customerLastName" name = "customerLastName" type = "text" placeholder = ""
								   class = "form-control input-md" required = ""
								   value = "<?php
								   if (isset($_SESSION['user']->lastName)) {
									   echo $_SESSION['user']->lastName;
								   } ?>">
						
						</div>
					</div>
					
					<div class = "row">
						<div class = "form-group col-md-6">
							<label class = "control-label float-left" for = "cardNo">Card Number:</label>
							<img class = "float-left" src = "<?= IMAGES ?>/visa-logo.png" alt = "">
							<img class = "float-left" src = "<?= IMAGES ?>/mc-logo.png" alt = "">
							<input id = "cardNo" name = "cardNo" type = "text" placeholder = ""
								   class = "form-control input-md" required = ""
								   value = "">
						</div>
						<div class = "form-group col-md-3">
							<label class = "control-label" for = "expireMonth">Month:</label>
							<select id = "expireMonth" name = "expireMonth" class = "form-control" required = "" onChange = 'alert(expireMonth.options.selectedIndex)'>
								<option value = '01'>01</option>
								<option value = '02'>02</option>
								<option value = '03'>03</option>
								<option value = '04'>04</option>
								<option value = '05'>05</option>
								<option value = '06'>06</option>
								<option value = '07'>07</option>
								<option value = '08'>08</option>
								<option value = '09'>09</option>
								<option value = '10'>10</option>
								<option value = '11'>11</option>
								<option value = '12'>12</option>
							</select>
						</div>
						
						
						<div class = "form-group col-md-3">
							<label class = "control-label" for = "expireYear">Year: </label>
							<select id = "expireYear" name = "expireYear" class = "form-control year" required = "" onChange = 'alert(expireYear.selectedIndex)'>
								
								<?php
								$year = date('Y');
								foreach (range(0, 10) as $i) {
									echo "<option value=\"" . ($year + $i) . "\">" . ($year + $i) . "</option>";
									
								}
								?>
							
							</select>
						</div>
					</div>
					
					
					<div class = "row">
						<div class = "form-group col-md-6">
							<label class = "control-label" for = "cvv2">CVV2</label>
							<input id = "cvv2" name = "cvv2" type = "text" placeholder = "" class = "form-control input-md"
								   required = "" value = "<?php
							if (isset($_SESSION['user']->cvv2)) {
								echo $_SESSION['user']->cvv2;
							} ?>">
						</div>
						<div class = "form-group col-md-3" hidden>
							<input id = "expireMonth_Hidden" name = "expireMonth_Hidden" type = "text" placeholder = "" class = "form-control input-md"
								   required = "" value = "<?php
							if (isset($_SESSION['user']->expMonth)) {
								echo($_SESSION['user']->expMonth - 1);
							} ?>">
						
						
							<input id = "expireYear_Hidden" name = "expireYear_Hidden" type = "text" placeholder = "" class = "form-control input-md"
								   required = "" value = "<?php
							if (isset($_SESSION['user']->expYear)) {
								echo($_SESSION['user']->expYear-$year);
							} ?>">
						</div>
						<!--<div class="form-group col-md-6">
                            <label class="control-label" for="billingCity">City:</label>
                            <input id="billingCity" name="billingCity" type="text" placeholder=""
                                   class="form-control input-md" required=""
                                   value="<?php /*if (isset($_POST['billingCity'])) {
                                       echo $_POST['billingCity'];
                                   } */ ?>">
                        </div>-->
					</div>
					
					
					<!--<div class="row">

						<div class="form-group col-md-6">
							<label class="control-label" for="billingState">State:</label>
							<select id="billingState" name="billingState" class="form-control" required="">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
							</select>
						</div>-->
					<!-- Text input-->
					<!--<div class="form-group col-md-6">
                            <label class="control-label" for="billingZipCode">Zip Code:</label>
                            <input id="billingZipCode" name="billingZipCode" type="text" placeholder=""
                                   class="form-control input-md" required=""
                                   value="<?php /*if (isset($_POST['billingZipCode'])) {
                                       echo $_POST['billingZipCode'];
                                   } */ ?>">
                        </div>
                    </div>-->
					
					
					<div class = "row">
						<label class = "custom-control custom-checkbox col-md-12">
							<input type = "checkbox" class = "custom-control-input" required checked>
							<span class = "custom-control-indicator"></span>
							<span class = "custom-control-description">I have read and agree to the <a data-toggle = "modal"
																									   href = "#tosModal">Terms Of Service</a></span>
						</label>
					
					</div>
					<!--        <div class="row" hidden>
								<label class="custom-control custom-checkbox col-md-12">
									<div class="">
										<input type="checkbox" name="vip_hidden" id="vip_hidden" checked>
		
										<label for="vip_hidden">Special Offer</label>
									</div>
								</label>
		
							</div>-->
					
					
					<div class = "row submit">
						<div class = "form-group col-md-12">
							
							<button type = "button" name = "button" id = "button"
									class = "btn btn-primary text-uppercase">
								Submit Info
							</button>
						
						</div>
						<p>Your special offer will include a trial to <?php echo DOMAIN ?>.com with access to premium
						   videos and cams,
						   it will renew for twenty nine ninety five a month after twenty four hours and
						   monthly until cancelled. You will be billed discreetly
						   by <?= MID_NAME ?> <?= MID_PHONE_NUMBER ?></p>
					</div>
					
					<div class = "modal hide" id = "tosModal" tabindex = "-1" role = "dialog" aria-labelledby = "tosModalLabel"
						 aria-hidden = "true">
						<div class = "modal-dialog" role = "document">
							<div class = "modal-content">
								<div class = "modal-header">
									<h5 class = "modal-title" id = "exampleModalLabel">Terms Of Service</h5>
									<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
										<span aria-hidden = "true">&times;</span>
									</button>
								</div>
								<div class = "modal-body">
									<h3>Revised: 11-22-16</h3>
									<p><?= MID_NAME ?> (&ldquo;we,&rdquo; &ldquo;us&rdquo; or
													   &ldquo;<?= MID_NAME ?>&rdquo;) offers&nbsp;our site&nbsp;(&ldquo;Site&rdquo;) to
													   you the user (&ldquo;You&rdquo;) as a service available through our website (&ldquo;Site&rdquo;)
													   subject to these Terms and Conditions (&ldquo;Terms&rdquo;). Unless expressly
													   stated otherwise, these Terms shall apply to Your use of the Site and/or any
													   other service, application, software, plug-in, component, functionality or
													   program created or made available by us.</p>
									<p>These Terms, as well as any and all Agreements referenced and incorporated
									   herein, shall form a binding contract between You and <?= MID_NAME ?>. By
									   registering for Site, You indicate, represent and warrant that You have read and
									   assent to these Terms and that You have the legal capacity to do so.</p>
									<h3>Registration</h3>
									<p>Before using the Service, Servicers will be asked to register an account through
									   the Site (&ldquo;Servicer Account&rdquo;). In order to register for a Servicer
									   Account, You will be asked to provide personal information (&ldquo;Personal
									   Information&rdquo;), including but not limited to Your name, Your email address,
									   Your city, state and/or zip code, Your phone number, Your phone service provider
									   (or &ldquo;carrier&rdquo;). Further, transactions may be conducted over the
									   Service by credit card only through a third party provider. As such, You will be
									   asked to provide Your credit card information. Our policies with respect to the
									   storage, use, and sharing of Personal Information is discussed in greater detail
									   under &ldquo;Privacy&rdquo;, below.</p>
									<p>You agree that the information You provide during registration, including but not
									   limited to the Personal Information, is true and accurate. You agree that You
									   alone will be using Your Servicer Account and that You will not permit any other
									   individual, <?= MID_NAME ?>, or other entity to use Your Servicer Account.</p>
									<h3>Subscription, Credits and Fees</h3>
									<p>You grant permission to <?= MID_NAME ?> to make charges to Your credit card as
									   provided and disclosed on the payment form and as further provided under the
									   terms of this Agreement. Your subscription will renew on the original purchase
									   date of each month at the listed rates for&nbsp;Site effective at the time of
									   Your registration and in accordance with all of the terms of this Agreement.
									   SUBSCRIPTIONS ARE AUTOMATCIALLY RECURRING SUBSCRIPTIONS.</p>
									<h3>Proper Service</h3>
									<p>You agree that You will use the Service in compliance with all applicable local,
									   state, national, and international laws, rules and regulations. You shall not,
									   shall not agree to, and shall not authorize or encourage any third party to: (a)
									   use the service to harass other Servicers or QCAs; (b) prevent others from using
									   the Service; (c) use the Service for any fraudulent or inappropriate purpose.
									   ALL COMMUNICATIONS BETWEEN USERS AND QCAs SHALL TAKE PLACE THROUGH THE SERVICE.
									   ANY OUTSIDE COMMUNICATION BETWEEN USERS AND QCAs IS STRICTLY PROHIBITED. Any
									   violation of the above may result in immediate termination of this Agreement and
									   Your account, and may, <span class = "font-italic">inter alia</span>, subject You
									   to state and federal penalties and other legal consequences. <?= MID_NAME ?>
									   reserves the right, but shall have no obligation, to investigate Your use of the
									   Service in order to determine whether a violation of the Agreement has occurred
									   or to comply with any applicable law, regulation, legal process or governmental
									   request.</p>
									<h3>Intellectual Property</h3>
									<p>Servicers of our Site may view information, communications, software, photos,
									   video, graphics, music, sounds, message boards, chat, and other original
									   content, material and services (&ldquo;Content&rdquo;). You acknowledge and
									   agree that all Content presented to You on the Site is protected by copyrights,
									   trademarks, service marks, patents and/or other proprietary rights and laws.</p>
									<p>The source of the Content may vary between Servicers and <?= MID_NAME ?>. To the
									   extent that Content originates from <?= MID_NAME ?>, such Content is the sole
									   property of <?= MID_NAME ?>. You are only permitted to use Content
									   from <?= MID_NAME ?> as expressly permitted by us. Except for a single copy made
									   for personal use only, You may not copy, reproduce, modify, republish, upload,
									   post, transmit, or distribute documents or information from the Site in any form
									   or by any means without prior written permission from us. You are solely
									   responsible for obtaining permission before reusing any Content that is
									   available on the Site.</p>
									<p>To the extent that the Services provide Servicers an opportunity to post, store
									   and exchange information, materials, data, files, programs, ideas and opinions (&quot;Servicer
									   Content&quot;), You hereby represent and warrant that You have all necessary
									   rights in and to all Servicer Content that You provide and all information
									   contained therein. By uploading or submitting content to the Site, You agree to
									   and hereby do grant, and You represent and warrant that You have the right to
									   grant <?= MID_NAME ?> and the Servicers of the Site an irrevocable, perpetual,
									   non-exclusive, royalty-free, fully sub-licensable, fully paid up, worldwide
									   license to use, copy, publicly perform, digitally perform, publicly display, and
									   distribute such content and to prepare derivative works of, or incorporate into
									   other works, such content.</p>
									<p>Any unauthorized use of the Content appearing on the Site may violate copyright,
									   trademark, and/or other applicable laws and could result in criminal or civil
									   penalties. We do not warrant or represent that Your use of Content displayed on
									   or obtained through the Site will not infringe the rights of third parties.</p>
									<h3>Notices and Procedure for Making Claims of Copyright Infringement</h3>
									<p><?= MID_NAME ?> respects copyright law and expects Servicers to do the same.</p>
									<p>If You believe that Your work has been copied in a way that constitutes copyright
									   infringement, please provide <?= MID_NAME ?>&rsquo;s Agent for Notice of claims
									   of copyright or other intellectual property infringement (&quot;Agent&quot;) the
									   written information specified below:</p>
									<ul>
										<li>1. An electronic or physical signature of the owner or of the person
											authorized to act on behalf of the owner of the copyright interest;
										</li>
										<li>2. A description of the copyrighted work that You claim has been infringed
											upon;
										</li>
										<li>3. Identification of the material that is claimed to be infringing or to be
											the subject of infringing activity as well as a description of where the
											material that You claim is infringing is located on the Web site, including
											a universal locator (&ldquo;URL&rdquo;) address;
										</li>
										<li>4. Your name, mailing address, telephone number, and e-mail address;</li>
										<li>5. A statement by You that You have a good-faith belief that the disputed
											use is not authorized by the copyright owner, its agent, or the law; and
										</li>
										<li>6. A statement by You, made under penalty of perjury, that the above
											information in Your notice is accurate and that You are the copyright owner
											or authorized to act on the copyright owner's behalf.
										</li>
									</ul>
									<p>Our Agent can be reached at <a
												href = "mailto:support@hitpink.com">support@<?= DOMAIN ?>.com</a>.</p>
									<p><?= MID_NAME ?> reserves the right, in its sole discretion, to determine whether
													   and what action to take in response to each such notification, and any action or
													   inaction in a particular instance shall not dictate or limit our response to a
													   future complaint.</p>
									<h3>Consent to Electronic Communications and Solicitation</h3>
									<p>By registering with Site, You understand that we may send You communications or
									   data from&nbsp;Site regarding the Services, including but not limited to (i)
									   notices about Your use of the Services, including any notices concerning
									   violations of use, (ii) updates, and (iii) promotional information and materials
									   regarding <?= MID_NAME ?> or other products and services via electronic mail. We
									   give You the opportunity to opt-out of receiving electronic mail from us by
									   following the opt-out instructions provided in the messages sent.</p>
									<h3>Personal Service</h3>
									<p>The Service is made available to You for Your personal use only. You must provide
									   current, accurate identification, contact, and other information that may be
									   required as part of the registration process and/or continued use of the
									   Service. You are responsible for maintaining the confidentiality of Your Service
									   password and account, and are responsible for all activities that occur
									   thereunder. You may only display the Content of the Service for Your own
									   personal use (i.e., non-commercial use). You may not otherwise copy, reproduce,
									   alter, modify, create derivative works, or publicly display any Content, without
									   the prior written permission of <?= MID_NAME ?>. All rights reserved. If You
									   believe that Your work has been copied and posted in the Site in any way that
									   constitutes copyright infringement, please provide our Copyright Agent with a
									   Notice of Copyright Infringement.</p>
									<p>Adults Only</p>
									<p>You understand that by using the Services You may be exposed to Content that You
									   may find offensive, indecent or objectionable and that, in this respect, You use
									   the Services at Your own risk.</p>
									<p>You represent and warrant to <?= MID_NAME ?> that Your use of the Service
									   constitutes an unequivocal request to receive sexually explicit material via
									   access to the Site and You make the following statements and representations
									   to <?= MID_NAME ?> (and which are relied upon by <?= MID_NAME ?>) as a material
									   inducement to provide the Service: UNDER PENALTY OF PERJURY, I SWEAR/AFFIRM THAT
									   AS OF THIS MOMENT, I AM AN ADULT, AT LEAST 18 YEARS OF AGE (21 IN AL, MS, NE,
									   WY, AND ANY OTHER LOCATION WHERE 18 IS NOT THE AGE OF MAJORITY). I PROMISE THAT
									   I WILL NOT PERMIT ANY OTHER PERSON(S) TO HAVE ACCESS TO ANY OF THE MATERIALS
									   CONTAINED WITHIN THE SITE. I UNDERSTAND THAT WHEN I GAIN ACCESS TO THE SITE, I
									   WILL BE EXPOSED TO VISUAL IMAGES, VERBAL DESCRIPTIONS, AND AUDIO SOUNDS OF A
									   SEXUALLY EXPLICIT NATURE. I AM VOLUNTARILY CHOOSING TO DO SO, BECAUSE I WANT TO
									   VIEW, READ AND/OR HEAR THE VARIOUS MATERIALS WHICH ARE AVAILABLE, FOR MY
									   PERSONAL ENJOYMENT, INFORMATION AND/OR EDUCATION. MY CHOICE IS A MANIFESTATION
									   OF MY INTEREST IN SEXUAL MATTERS, WHICH, I BELIEVE, IS BOTH HEALTHY AND NORMAL
									   AND WHICH, IN MY EXPERIENCE, IS GENERALLY SHARED BY AVERAGE ADULTS IN MY
									   COMMUNITY. I AM FAMILIAR WITH THE STANDARDS IN MY COMMUNITY REGARDING THE
									   ACCEPTANCE OF SUCH SEXUALLY ORIENTED MATERIALS, AND THE MATERIALS I EXPECT TO
									   ENCOUNTER AND ACCESS THROUGH THE SERVICE ARE WITHIN THOSE STANDARDS IN MY
									   JUDGMENT; THAT THE AVERAGE ADULT IN MY COMMUNITY ACCEPTS THE VIEWING AND
									   ACCESSING OF SUCH MATERIALS BY WILLING ADULTS IN CIRCUMSTANCES SUCH AS THIS,
									   WHICH OFFER REASONABLE INSULATION FROM THE MATERIALS FOR MINORS AND UNWILLING
									   ADULTS; AND THAT THE AVERAGE ADULT IN MY COMMUNITY WOULD NOT FIND SUCH MATERIALS
									   TO APPEAL TO A PRURIENT INTEREST OR TO BE PATENTLY OFFENSIVE. I FURTHER
									   REPRESENT AND WARRANT THAT I HAVE NOT NOTIFIED ANY GOVERNMENTAL AGENCY,
									   INCLUDING THE U.S. POSTAL SERVICE, THAT I DO NOT WISH TO RECEIVE SEXUALLY
									   ORIENTED MATERIAL.</p>
									<h3>Description of Services</h3>
									<p><?= MID_NAME ?> offers the&nbsp;Services to You for the exclusive purpose of Your
													   personal and private recreation, entertainment, and enjoyment (the &ldquo;Service&rdquo;).
													   Specifically, as a Service, <span class = "text-uppercase"><?= MID_NAME ?></span>
													   offers the Site to subscribers as a venue for communication between consenting
													   adults that are interested in forming relationships of a romantic nature. <span
												class = "text-uppercase"><?= MID_NAME ?></span> makes no representations
													   or warranties concerning the possibility or likelihood that its subscribers will
													   actually enter into relationships with fellow subscribers. For more information,
													   please see &ldquo;Warranty&rdquo; below.</p>
									<p><?= MID_NAME ?> also offers its subscribers access to Quality Control Agents
													   (QCAs) for the purpose of entertainment and communication. You understand that
													   QCA profiles represent no actual live person and the text and images contained
													   in these profiles do not represent any real person, any likeness can be
													   considered purely coincidental. A QCA may likely contact you for the purpose of
													   entertainment via kiss, hotlist, message, email notification, instant message or
													   any other form of communication or interaction within the Site to enhance your
													   enjoyment, YOU UNDERSTAND AND AGREE THAT YOU MAY BE CONTACTED FOR ENTERTAINMENT
													   ONLY. QCAs are offered to enhance your experience with the Site, encourage
													   further participation or interaction with the Site and to monitor member
													   activities to maintain compliance with these Terms of Service. QCAs shall not be
													   considered as suitable or even available dating companions but merely a form of
													   entertainment provided as part of the Service.</p>
									<p>You further understand that these communications may be computer or personally
									   generated and sent to free or paid members of the Site and are designed to
									   promote further participation in the Services and monitor participation of the
									   Site. These messages may be sent to more than one member at the same or similar
									   times. If a member responds to a communication sent by a QCA the member may
									   receive one or more additional computer or personally generated communications
									   from the QCA profile.</p>
									<h3>Servicer Representations and Warranties</h3>
									<p>You represent and warrant that (1) all of the information provided by You to
									   participate in the Services is correct, accurate and current; (ii) You have all
									   necessary right, power and authority to enter into this Agreement and to perform
									   the acts required of You hereunder; and (iii) Your sole and exclusive purpose
									   for access to Spice Date is Your own personal recreation and enjoyment, and not
									   for purposeful investigation, reportage, or commercial gain.</p>
									<h3>Refusal of Service; Termination; Suspension.</h3>
									<p><?= MID_NAME ?> reserves the right in its sole discretion to refuse, suspend, or
													   terminate the Service to anyone at any time without notice for any reason. If
													   Your Account is terminated, You may only be entitled to the cash equivalent the
													   then current month&rsquo;s subscription fees, prorated for the number of days
													   remaining for that month, at the sole discretion of <?= MID_NAME ?>. For more
													   information, please see &ldquo;Damages,&rdquo; below. Any and all questions
													   related to the suspension or termination of Your Account should be directed to
										<a href = "mailto:support@hitpink.com">support@<?= DOMAIN ?>.com</a>.</p>
									<h3>Privacy</h3>
									<p>As a condition to using the Service, You agree to the terms of
									   this <?= MID_NAME ?> Privacy Policy as it may be updated from time to time. We
									   understand that privacy is important to You. You do, however, agree
									   that <?= MID_NAME ?> may monitor, edit or disclose Your Personal Information,
									   including the content of Your emails, if required to do so in order to comply
									   with any valid legal process or governmental request (such as a search warrant,
									   subpoena, statute, or court order), for reasons associated with risk of personal
									   safety or property of any person, or as otherwise provided in these Terms.</p>
									<p>You agree that <?= MID_NAME ?> may freely, for any sound business purpose,
									   disclose, disseminate, sell, lease or transfer any Personal Information or
									   correspondence provided to it by You or otherwise obtained from any source
									   concerning You to any other person. All data, information, compilations,
									   statistical analyses, profiles, membership history and transaction records,
									   including postings, and all associated data, are the sole and absolute property
									   of <?= MID_NAME ?> and all such information, including that obtained from You,
									   may be used for any sound business purpose. In the routine course of its
									   business, <?= MID_NAME ?> will verify Your credit card information and email
									   address and determine whether Your credit card number is associated with a
									   pattern of refusal to pay charges for internet services. Your failure to pay
									   charges for this Site may be reported to other sites or services that maintain
									   records of such events. Any content of any email or instant messenger service
									   provided to <?= MID_NAME ?> may be read, stored, and used by its personnel. As a
									   visitor to&nbsp;Site if You provided Your email address in a registration
									   membership process or posted it on Site, You thereby authorize <?= MID_NAME ?>
									   and any entities that it becomes involved with or merges with, the right to use
									   and/or sell Your valid email address for any marketing programs or
									   communications with You.</p>
									<p>Personal Information collected by <?= MID_NAME ?> may be stored and processed in
									   the United States or any other country in which <?= MID_NAME ?> or its agents
									   maintain facilities. By using the Service, You consent to any such transfer of
									   information outside of Your country.</span></p>
									<h3>Warranty</h3>
									<p><?= MID_NAME ?> does not represent that the Service is reliable, accurate,
													   complete, or otherwise valid. <?= MID_NAME ?> cannot guarantee, and assumes no
													   obligation to verify the accuracy of any information submitted by its users, nor
													   does <?= MID_NAME ?> assume any obligation to monitor the activities of its
													   users. No information, whether written or oral, obtained by you
													   from <?= MID_NAME ?> shall create any warranty not expressly stated in this
													   Agreement. THE SERVICE IS PROVIDED &quot;AS IS&quot; WITH NO WARRANTY OF ANY
													   KIND AND YOU USE THE SERVICE AT YOUR OWN RISK. <span
												class = "text-uppercase"><?= MID_NAME ?></span> EXPRESSLY DISCLAIMS ANY
													   WARRANTY, EXPRESS OR IMPLIED, REGARDING THE SERVICE, INCLUDING BUT NOT LIMITED
													   TO ANY IMPLIED WARRANTY OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR
													   NON-INFRINGEMENT.</p>
									<h3>Damages</h3>
									<p>UNDER NO CIRCUMSTANCES WILL <span class = "text-uppercase"><?= MID_NAME ?></span>
									   BE LIABLE TO YOU FOR ANY INDIRECT, INCIDENTAL, CONSEQUENTIAL, SPECIAL OR
									   EXEMPLARY DAMAGES ARISING OUT OF OR IN CONNECTION WITH USE OF THE SERVICE
									   WHETHER OR NOT YOU HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. UNDER
									   NO CIRCUMSTANCES SHALL <span class = "text-uppercase"><?= MID_NAME ?></span> BE
									   LIABLE TO YOU FOR ANY AMOUNT FOR SERVICES RENDERED PURSUANT TO THIS AGREEMENT.
									</p>
									<h3>Indemnification</h3>
									<p>You agree to hold harmless and indemnify <?= MID_NAME ?>, and its employees,
									   agents and representatives, from and against any third party claim arising from
									   or in any way related to Your use of the Service, including any liability or
									   expense arising from all claims, losses, damages (actual and consequential),
									   suits, judgments, litigation costs and attorneys' fees, of every kind and
									   nature.</p>
									<h3>Liability</h3>
									<h3>To the maximum extent permitted by applicable law, You hereby release, and waive
										all claims against <?= MID_NAME ?> and its employees and agents from any and all
										liability for claims, damages (actual and consequential), costs and expenses
										(including litigation costs and attorneys' fees) of every kind and nature,
										arising out of or in any way connected with Your use of the Service.</h3>
									<h3>Modifications to the Agreement</h3>
									<p>We reserve the right, at our sole discretion, to change, modify or otherwise
									   alter these Terms at any time. Therefore, we encourage You to check the date of
									   our Terms whenever You visit the Site to check if they have been updated.
									   Servicers should also review this agreement on a regular basis to keep
									   themselves apprised of any changes. If You do not agree to the revised Terms,
									   Your sole recourse is to immediately stop all use of the Services. Your
									   continued use of the Services following the posting of modifications will
									   constitute Your acceptance of the revised Terms. Following the posting of
									   modifications, such modifications shall become effective immediately upon Your
									   continued use of the Services. Should You have any questions regarding the use
									   of our Site or Service, please contact us at <a
												href = "mailto:support@hitpink.com">support@<?= DOMAIN ?>.com</a>.</p>
									<h3>Severability</h3>
									<p>If any provision of these Terms is held to be invalid or unenforceable, such
									   provision shall be deemed superseded by a valid enforceable provision that most
									   closely matches the intent of the original provision and the remaining
									   provisions shall be enforced.</span></p>
									<h3>Exercise</h3>
									<p>The failure of <?= MID_NAME ?> to exercise or enforce any right or provision of
									   these Terms shall not constitute a waiver of such right or provision.</span></p>
									<h3>Choice of Law; Jurisdiction</h3>
									<p>This agreement shall be interpreted in accordance with the laws of the State of
									   Missouri. By using the Service, You acknowledge and agree that any disputes
									   arising out of or relating to these Terms, as well as all agreements referenced
									   and incorporated herein, shall be subject to the exclusive jurisdiction of the
									   state or federal courts of the State of Missouri.</p>
									<h3>Entire Agreement</h3>
									<p>This Agreement constitutes the entire agreement between <?= MID_NAME ?> and You
									   with respect to the subject matter hereof.</p>
									<h3>Contact Us</h3>
									<p>If You have any questions or comments about these Terms or the Service, please
									   contact us at <a href = "mailto:support@hitpink.com">support@<?= DOMAIN ?>.com</a>
									</p>
									<h3>Cancelling your membership:</h3>
									<p>Please visit the My Account page and click the &quot;Cancel my membership&quot;
									   button. You will be required to input your subscription data that was received
									   in an email when you upgraded. If you cannot find this information please
									   contact support at the Contact Us link.</p>
									<h3>Dispute Resolution:</h3>
									<p>Please visit the Contact Us page at for any disputes you have with our website.
									   We are ready to work with you on any issues, and will do our best to make sure
									   you are satisfied. Cancelling and acquiring a refund is a simple process, which
									   can be don't manually at or via support once provided with the proper
									   credentials. Our refund policy and process is listed below.</p>
									<h3>Refund Policy:</h3>
									<p>We will offer a full refund to any member who is not satisfied with our service.
									   We simply ask for a valid explanation of the reason for your request, and upon
									   approval a full refund will be given. We pride ourselves on customer
									   satisfaction, even for a customer that is terminating their service, so please
									   speak with customer support if you wish to receive a refund for your paying
									   subscription.</p>
									<h3>3 Easy Steps:</h3>
									<ul>
										<li>1) Contact Customer Support</li>
										<li>2) Submit your request for a refund with an explanation</li>
										<li>3) Receive your refund</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				
				
				</fieldset>
			</form>
		</div> <!-- col -->
	</div><!-- row -->
	
		  <!--<div class="container-fluid description">
        <div class="row">
            <div class="col-12">
                <p>Vip offer will include a token purchase to
                    live.<?php /*echo strip_out_subdomain($_SERVER['SERVER_NAME']) */ ?> of thirty
                    dollars and a fourteen day
                    free trial of videos.<?php /*echo strip_out_subdomain($_SERVER['SERVER_NAME']) */ ?> an exclusive library
                    of
                    adult content
                    which will rebill at twenty
                    nine ninety five a month until cancelled.</p>
            </div>
        </div>
    </div>-->
	<div class = "logos row justify-content-center">
		<div class = "col-3 col-md-2">
			<img class = "img-fluid" src = "<?= IMAGES ?>/secure-logo.png" alt = "">
		</div>
		<div class = "col-3 col-md-2">
			<img class = "img-fluid" src = "<?= IMAGES ?>/ssl-logo.png" alt = "">
		</div>
		<div class = "col-3 col-md-2">
			<img class = "img-fluid" src = "<?= IMAGES ?>/asacp-logo.jpg" alt = "">
		</div>
	</div>


</div><!-- container -->

<div class = "spinner activate" id = "spinner" hidden>
	<div class = "loader"></div>
</div>
</body>

</html>
