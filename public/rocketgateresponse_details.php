<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';


//Call Class
$na = new rocketgateresponse();
//Select one record
if (isset($_GET['idresponse'])) {
	$rows = $na->SelectOne($_GET['idresponse']);
} ?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW ROCKETGATERESPONSE DETAILS</title>
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
		<h3>ROCKETGATERESPONSE DETAILS</h3>
		<table width = "74%" align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th>&nbsp;</th>
				<th><a href = "rocketgateresponse_view.php">Back</a></th>
			</tr>
			
			<tr>
				<th width = "279">AuthNo</th>
				<th width = "321"><?php echo ucwords($rows->authNo); ?></th>
			</tr>
			
			<tr>
				<th width = "279">MerchantInvoiceID</th>
				<th width = "321"><?php echo ucwords($rows->merchantInvoiceID); ?></th>
			</tr>
			
			<tr>
				<th width = "279">MerchantAccount</th>
				<th width = "321"><?php echo ucwords($rows->merchantAccount); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ApprovedAmount</th>
				<th width = "321"><?php echo ucwords($rows->approvedAmount); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardLastFour</th>
				<th width = "321"><?php echo ucwords($rows->cardLastFour); ?></th>
			</tr>
			
			<tr>
				<th width = "279">Version</th>
				<th width = "321"><?php echo ucwords($rows->version); ?></th>
			</tr>
			
			<tr>
				<th width = "279">MerchantCustomerID</th>
				<th width = "321"><?php echo ucwords($rows->merchantCustomerID); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ReasonCode</th>
				<th width = "321"><?php echo ucwords($rows->reasonCode); ?></th>
			</tr>
			
			<tr>
				<th width = "279">RetrievalNo</th>
				<th width = "321"><?php echo ucwords($rows->retrievalNo); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardIssuerName</th>
				<th width = "321"><?php echo ucwords($rows->cardIssuerName); ?></th>
			</tr>
			
			<tr>
				<th width = "279">PayType</th>
				<th width = "321"><?php echo ucwords($rows->payType); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardHash</th>
				<th width = "321"><?php echo ucwords($rows->cardHash); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardDebitCredit</th>
				<th width = "321"><?php echo ucwords($rows->cardDebitCredit); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardRegion</th>
				<th width = "321"><?php echo ucwords($rows->cardRegion); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardDescription</th>
				<th width = "321"><?php echo ucwords($rows->cardDescription); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardCountry</th>
				<th width = "321"><?php echo ucwords($rows->cardCountry); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardType</th>
				<th width = "321"><?php echo ucwords($rows->cardType); ?></th>
			</tr>
			
			<tr>
				<th width = "279">BankResponseCode</th>
				<th width = "321"><?php echo ucwords($rows->bankResponseCode); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ApprovedCurrency</th>
				<th width = "321"><?php echo ucwords($rows->approvedCurrency); ?></th>
			</tr>
			
			<tr>
				<th width = "279">GuidNo</th>
				<th width = "321"><?php echo ucwords($rows->guidNo); ?></th>
			</tr>
			
			<tr>
				<th width = "279">CardExpiration</th>
				<th width = "321"><?php echo ucwords($rows->cardExpiration); ?></th>
			</tr>
			
			<tr>
				<th width = "279">ResponseCode</th>
				<th width = "321"><?php echo ucwords($rows->responseCode); ?></th>
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