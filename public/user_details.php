<?php

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';

//Call Class
$na = new user();
//Select one record
if (isset($_GET['iduser'])) {
	$rows = $na->SelectOne($_GET['iduser']);
} ?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW USER DETAILS</title>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<style type = "text/css">
		body {
			margin-left: 30px;
		}
	</style>
</head>

<body>
<div class = "row">
	<div class = "col-md-8">
		<h3></h3>
		<h3>USER DETAILS</h3>
		<table width = "74%" align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th>&nbsp;</th>
				<th><a href = "user_view.php">Back</a></th>
			</tr>
			
			<tr>
				<th width = "279">FirstName</th>
				<th width = "321"><?php echo ucwords($rows->firstName); ?></th>
			</tr>
			
			<tr>
				<th width = "279">LastName</th>
				<th width = "321"><?php echo ucwords($rows->lastName); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardHash</th>
				<th width = "321"><?php echo ucwords($rows->cardHash); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ExpMonth</th>
				<th width = "321"><?php echo ucwords($rows->expMonth); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ExpYear</th>
				<th width = "321"><?php echo ucwords($rows->expYear); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Email</th>
				<th width = "321"><?php echo ucwords($rows->email); ?></th>
			</tr>
			
			<tr>
				<th width = "279">UserName</th>
				<th width = "321"><?php echo ucwords($rows->userName); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Password</th>
				<th width = "321"><?php echo ucwords($rows->password); ?></th>
			</tr>
			
			<tr>
				<th width = "279">IpAddress</th>
				<th width = "321"><?php echo ucwords($rows->ipAddress); ?></th>
			</tr>
			
			<tr>
				<th width = "279">FirstSix</th>
				<th width = "321"><?php echo ucwords($rows->firstSix); ?></th>
			</tr>
			
			<tr>
				<th width = "279">LastFour</th>
				<th width = "321"><?php echo ucwords($rows->lastFour); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RocketGateCustomerID</th>
				<th width = "321"><?php echo ucwords($rows->rocketGateCustomerID); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ClickID</th>
				<th width = "321"><?php echo ucwords($rows->clickID); ?></th>
			</tr>
			
			<tr>
				<th width = "279">AffID</th>
				<th width = "321"><?php echo ucwords($rows->affID); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Timestamp</th>
				<th width = "321"><?php echo ucwords($rows->timestamp); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Domain iddomain</th>
				<th width = "321"><?php echo ucwords($rows->domain_iddomain); ?></th>
			</tr>
			</thead>
		</table>
	</div>
</div>
</body>
</html>