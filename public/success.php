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


include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
print_x($_SESSION);


//$user       = new user();
//$userObject = $_SESSION['done'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<meta name = "viewport" content = "width=device-width, initial-scale=1"/>
	<link href = "<?= CSS . "/main.css" ?>" rel = "stylesheet" type = "text/css"/>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity = "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin = "anonymous"/>
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
					if (isset($_SESSION['user'])) {
						echo $_SESSION['user']->userName . ", thanks for registering!";
					} else {
						echo "Thanks for upgrading!";
					}
					?>
				</h2>
				<p><?php if (isset($_SESSION['user'])) {
						echo $_SESSION['user']->email . "<p>Please save your transaction information shown below:</p>";
						//print_x($_SESSION);
						
						
					} else {
						echo "<p>Please save your transaction information shown below:</p>";
					}
					?></p>
			
			
			</div>
			
			<?php
			//echo_space(count($_SESSION['done']['user']->offerArray));
			$colCount = (12 / count($_SESSION['done']->offerArray));
			foreach ($_SESSION['done']->offerArray as $key => $val) {
				print "<div class=\"row columns_wrap\">\n";
				print "<div class=\"col-xs-10 col-sm-" . $colCount . " column\">\n";
				print "<div class=\"content_wrap\">\n";
				print "<h3> " . strtoupper($_SESSION['done']->offerArray[$key]->name) . " </h3>\n";
				print "<div class=\"text_wrap\">\n";
				print "<p>Transaction succeeded</p>\n";
				print "<p>Customer ID: " . $_SESSION['done']->offerArray[$key]->response->merchantCustomerID . "</p>\n";
				print "<p>Transaction ID: " . $_SESSION['done']->offerArray[$key]->response->merchantInvoiceID . "</p>\n";
				print "<p>UserName: " . $_SESSION['done']->userName . "</p>\n";
				print "<p>Password: " . $_SESSION['done']->password . "</p>\n";
				//print_x($responce);
				
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
			<input class = "btn btn-primary btn-lg huge pink-btn" type = "submit" name = "submit" id = "submit" value = "ENTER"
				   onclick = "location.href='<?php if (isset($_SESSION['autoLoginURL'])) {
					   echo $_SESSION['autoLoginURL'];
				   } else {
					   echo "https://" . DOMAIN . ".com";
				   } ?>'">
		</div>
	
	</div>

</body>

</html>


-->

