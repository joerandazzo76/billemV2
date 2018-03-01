<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';

//Call Class
$na = new package();
//Select one record
if (isset($_GET['idpackage'])) {
	$rows = $na->SelectOne($_GET['idpackage']);
} ?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW PACKAGE DETAILS</title>
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
		<h3>PACKAGE DETAILS</h3>
		<table width = "74%" align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th>&nbsp;</th>
				<th><a href = "package_view.php">Back</a></th>
			</tr>
			
			<tr>
				<th width = "279">Name</th>
				<th width = "321"><?php echo ucwords($rows->name); ?></th>
			</tr>
			
			<tr>
				<th width = "279">PostbackSuccess</th>
				<th width = "321"><?php echo ucwords($rows->postbackSuccess); ?></th>
			</tr>
			
			<tr>
				<th width = "279">PostbackFail</th>
				<th width = "321"><?php echo ucwords($rows->postbackFail); ?></th>
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