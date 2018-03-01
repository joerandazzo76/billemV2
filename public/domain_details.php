<?php

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


include '../public/nav.php';
include '../public/header.php';

//Call Class
$na = new domain();
//Select one record
if (isset($_GET['iddomain'])) {
	$rows = $na->SelectOne($_GET['iddomain']);
} ?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW DOMAIN DETAILS</title>
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
		<h3>DOMAIN DETAILS</h3>
		<table width = "74%" align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th>&nbsp;</th>
				<th><a href = "domain_view.php">Back</a></th>
			</tr>
			
			<tr>
				<th width = "279">Name</th>
				<th width = "321"><?php echo ucwords($rows->name); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RocketGateMerchantId</th>
				<th width = "321"><?php echo ucwords($rows->rocketGateMerchantId); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RocketGateMerchantPasword</th>
				<th width = "321"><?php echo ucwords($rows->rocketGateMerchantPasword); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CamRID</th>
				<th width = "321"><?php echo ucwords($rows->camRID); ?></th>
			</tr>
			
			<tr>
				<th width = "279">MidName</th>
				<th width = "321"><?php echo ucwords($rows->midName); ?></th>
			</tr>
			
			<tr>
				<th width = "279">MidPhoneNumber</th>
				<th width = "321"><?php echo ucwords($rows->midPhoneNumber); ?></th>
			</tr>
			
			<tr>
				<th width = "279">EmailFrom</th>
				<th width = "321"><?php echo ucwords($rows->emailFrom); ?></th>
			</tr>
			
			<tr>
				<th width = "279">EmailHost</th>
				<th width = "321"><?php echo ucwords($rows->emailHost); ?></th>
			</tr>
			
			<tr>
				<th width = "279">EmailUserName</th>
				<th width = "321"><?php echo ucwords($rows->emailUserName); ?></th>
			</tr>
			
			<tr>
				<th width = "279">EmailPassword</th>
				<th width = "321"><?php echo ucwords($rows->emailPassword); ?></th>
			</tr>
			
			<tr>
				<th width = "279">EmailCC</th>
				<th width = "321"><?php echo ucwords($rows->emailCC); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Timestamp</th>
				<th width = "321"><?php echo ucwords($rows->timestamp); ?></th>
			</tr>
			</thead>
		</table>
	</div>
</div>
</body>
</html>