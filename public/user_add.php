<?php

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';

//user_view.php rep the page you are redirecting it to after submission
$na     = new user();
$result = $na->Insert('user_view.php');
?>
<!DOCTYPE html >
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>FORM FOR USER</title>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
<div class = "container">
	<div class = "row">
		<div class = "col-md-7">
			<fieldset>
				<legend>Form Details</legend>
				<form action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id = "form"
					  class = "form-horizontal" enctype = "multipart/form-data">
					<div class = "form-group">
						<label class = "" for = "firstName">First Name</label>
						
						<input type = "text" class = "form-control" name = "firstName" maxlength = "45" value = ""
							   id = "firstName"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "lastName">Last Name</label>
						
						<input type = "text" class = "form-control" name = "lastName" maxlength = "45" value = ""
							   id = "lastName"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardHash">Card Hash</label>
						
						<input type = "text" class = "form-control" name = "cardHash" maxlength = "45" value = ""
							   id = "cardHash"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "expMonth">Exp Month</label>
						
						<input type = "text" class = "form-control" name = "expMonth" maxlength = "45" value = ""
							   id = "expMonth"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "expYear">Exp Year</label>
						
						<input type = "text" class = "form-control" name = "expYear" maxlength = "45" value = ""
							   id = "expYear"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "email">Email</label>
						
						<input type = "text" class = "form-control" name = "email" maxlength = "45" value = ""
							   id = "email"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "userName">User Name</label>
						
						<input type = "text" class = "form-control" name = "userName" maxlength = "45" value = ""
							   id = "userName"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "password">Password</label>
						
						<input type = "text" class = "form-control" name = "password" maxlength = "45" value = ""
							   id = "password"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "ipAddress">Ip Address</label>
						
						<input type = "text" class = "form-control" name = "ipAddress" maxlength = "45" value = ""
							   id = "ipAddress"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "firstSix">First Six</label>
						
						<input type = "text" class = "form-control" name = "firstSix" maxlength = "6" value = ""
							   id = "firstSix"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "lastFour">Last Four</label>
						
						<input type = "text" class = "form-control" name = "lastFour" maxlength = "4" value = ""
							   id = "lastFour"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "rocketGateCustomerID">Rocket Gate Customer ID</label>
						
						<input type = "text" class = "form-control" name = "rocketGateCustomerID" maxlength = "45"
							   value = "" id = "rocketGateCustomerID"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "clickID">Click ID</label>
						
						<input type = "text" class = "form-control" name = "clickID" maxlength = "11" value = ""
							   id = "clickID"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "affID">Aff ID</label>
						
						<input type = "text" class = "form-control" name = "affID" maxlength = "11" value = ""
							   id = "affID"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "timestamp">Timestamp</label>
						
						<input type = "text" class = "form-control" name = "timestamp" maxlength = "19" value = ""
							   id = "timestamp"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "domain_iddomain">Domain Iddomain</label>
						
						<input type = "text" class = "form-control" name = "domain_iddomain" maxlength = "10" value = ""
							   id = "domain_iddomain"/>
					</div>
					
					<div class = "form-actions">
						<input type = "submit" name = "button" class = "btn btn-primary btn-large" value = "Register"/>
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</div>
</body></html>