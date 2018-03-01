<?php

/*
Input   $_SESSION['data']['user']['username']
        $_SESSION['data']['user']['email']
            $_SESSION['data']['offer']
                $_SESSION['data']['offer'][$key]['customerID']
                $_SESSION['data']['offer'][$key]['transactID']
                $_SESSION['data']['offer'][$key]['invoiceID'] // optional
                urlencode($_SESSION['data']['offer'][$key]['cardHash']) //optional
*/
include $_SERVER['DOCUMENT_ROOT'] . '/lib/config.php';
//print_r($_SESSION);
if (!isset($_SESSION['data']['offer'])) {
	send_to('prelander.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1"/>
	<link href = "<?= CSS . "/main.css" ?>" rel = "stylesheet" type = "text/css"/>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity = "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		  crossorigin = "anonymous"/>
	<script type = "text/javascript" src = "js/jquery_2.1.3_jquery.min.js"></script>
	<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
			integrity = "sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
			crossorigin = "anonymous"></script>
	<script type = "text/javascript" src = "js/main.js"></script>
	
	<title> <?= DOMAIN ?> </title>

</head>

<body>
<div class = "success">
	<div class = "text-center container-fluid">
		<div class = "row page-header">
			<div class = "container">
				<div class = "center-block">
					<img class = "img-responsive col-sm-4 col-sm-offset-4" src = "<?= IMAGES . "/logo.png" ?>"
						 alt = "<?= DOMAIN ?>">
				</div>
			</div>
		</div>
	</div>
	<div class = "container">
		<div class = "row">
			<div class = "text-center top_text">
				<h2 class = "h1 heading_text"> <?php
					if (isset($_SESSION['data']['user']['username'])) {
						echo $_SESSION['data']['user']['username'] . ", thanks for registering!";
					} else {
						echo "Thanks for upgrading!";
					}
					?>
				</h2>
				<p><?php if (isset($_SESSION['data']['user']['email'])) {
						echo $_SESSION['data']['user']['email'] .
							"<p>Please save your transaction information shown below:</p>";
						
					} else {
						echo "<p>Please save your transaction information shown below:</p>";
					}
					?></p>
			
			
			</div>
			
			<?php
			$colCount = 12 / count($_SESSION['data']['offer']);
			foreach ($_SESSION['data']['offer'] as $key => $val) {
				
				print "<div class=\"row columns_wrap\">\n";
				print "<div class=\"col-xs-10 col-sm-" . $colCount . " column\">\n";
				print "<div class=\"content_wrap\">\n";
				print "<h3> " . $key . " </h3>\n";
				print "<div class=\"text_wrap\">\n";
				print "<p>Transaction succeeded</p>\n";
				print "<p>Customer ID: " . $_SESSION['data']['offer'][$key]['customerID'] . "</p>\n";
				print "<p>Transaction ID: " . $_SESSION['data']['offer'][$key]['transactID'] . "</p>\n";
				//print "<p>InvoiceID: " . $_SESSION['data']['offer'][$key]['invoiceID'] . "</p>\n";
				//print "<p>CardHash: " . $_SESSION['data']['offer'][$key]['cardHash'] . "</p>\n";
				
				//print "?custid=" . $_SESSION['data']['offer'][$key]['customerID'] . "&invoiceid=" . $_SESSION['data']['offer'][$key]['invoiceID'] . "&cardhash=" . urlencode($_SESSION['data']['offer'][$key]['cardHash']);
				
				print "</div>\n";
				print "</div>\n";
				print "</div>";
				
				
			}
			
			?>
		
		
		</div>
		<div class = "row" align = "center">
			<input class = "btn btn-primary btn-lg huge pink-btn" type = "submit" name = "submit" id = "submit"
				   value = "ENTER"
				   onclick = "location.href='<?= $_SESSION['data']['offer']['Dating']['autoLoginURL'] ?>'">
		</div>
	
	</div>

</body>

</html>
<?php
$contents                     = array();
$contents['User']['username'] = $_SESSION['data']['user']['username'];
$contents['User']['email']    = $_SESSION['data']['user']['email'];

foreach ($_SESSION['data']['offer'] as $key => $val) {
	$contents[$key]['customerID'] = $_SESSION['data']['offer'][$key]['customerID'];
	$contents[$key]['transactID'] = $_SESSION['data']['offer'][$key]['transactID'];
}

//var_dump($contents);
$html = "";
foreach ($contents as $key => $val) {
	$html .= "<div><h3>" . $key . "<h3></div><br>";
	
	foreach ($contents[$key] as $key2 => $val2) {
		$html .= "<b>" . $key2 . "</b>: " . $val2 . "<br>";
		
	}
}
//echo $html;


//print_x(json_encode($contents));

if (SEND_EMAIL) {
	$mail = new PHPMailer();                              // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->SMTPDebug = 0;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host       = 'smtp.mailgun.org';                       // Specify main and backup SMTP servers
		$mail->SMTPAuth   = true;                               // Enable SMTP authentication
		$mail->Username   = 'postmaster@alerts.hitpink.com';                 // SMTP username
		$mail->Password   = '3da509a3ccc2ff68803';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 587;                                    // TCP port to connect to
		
		//Recipients
		$mail->setFrom('receipt@alerts.hitpink.com', 'hitpink Receipt');
		
		$mail->addAddress($_SESSION['data']['user']['email']);     // Add a recipient
		//$mail->addAddress("web-diz3a@mail-tester.com");     // TEST EMAIL
		$mail->addBCC('jason@moneylovers.com');
		$mail->addBCC('joe@leadmaxllc.com');
		
		
		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		
		//Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Save this for your records';
		$mail->Body    = $html;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		$mail->send();
		//echo 'Message has been sent';
	} catch (Exception $e) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
}
?>


