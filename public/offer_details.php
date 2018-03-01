<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


include '../public/nav.php';
include '../public/header.php';


//Call Class
$na = new offer();
//Select one record
if (isset($_GET['idoffer'])) {
	$rows = $na->SelectOne($_GET['idoffer']);
} ?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW OFFER DETAILS</title>
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
		<h3>OFFER DETAILS</h3>
		<table width = "74%" align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th>&nbsp;</th>
				<th><a href = "offer_view.php">Back</a></th>
			</tr>
			
			<tr>
				<th width = "279">Name</th>
				<th width = "321"><?php echo ucwords($rows->name); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Amount</th>
				<th width = "321"><?php echo ucwords($rows->amount); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RebillStart</th>
				<th width = "321"><?php echo ucwords($rows->rebillStart); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RebillAmount</th>
				<th width = "321"><?php echo ucwords($rows->rebillAmount); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RebillFrequency</th>
				<th width = "321"><?php echo ucwords($rows->rebillFrequency); ?></th>
			</tr>
			
			<tr>
				<th width = "279">TransactionType</th>
				<th width = "321"><?php echo ucwords($rows->transactionType); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Var1</th>
				<th width = "321"><?php echo ucwords($rows->var1); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Var2</th>
				<th width = "321"><?php echo ucwords($rows->var2); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Var3</th>
				<th width = "321"><?php echo ucwords($rows->var3); ?></th>
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
				<th width = "279">Package idpackage</th>
				<th width = "321"><?php echo ucwords($rows->package_idpackage); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Timestamp</th>
				<th width = "321"><?php echo ucwords($rows->timestamp); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Scrub</th>
				<th width = "321"><?php echo ucwords($rows->scrub); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Cvv2Check</th>
				<th width = "321"><?php echo ucwords($rows->cvv2Check); ?></th>
			</tr>
			
			<tr>
				<th width = "279">AvsCheck</th>
				<th width = "321"><?php echo ucwords($rows->avsCheck); ?></th>
			</tr>
			
			<tr>
				<th width = "279">MakePurchase</th>
				<th width = "321"><?php echo ucwords($rows->makePurchase); ?></th>
			</tr>
			</thead>
		</table>
	</div>
</div>
</body>
</html>