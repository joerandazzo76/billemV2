<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';
$new = new rocketgateresponse();
$id  = $_GET['idresponse'];
//Select one record
$rows = $new->SelectOne($id);
//run update
//rocketgateresponse_view.php rep the page you are redirecting it to after submimission
$insert = $new->Update('rocketgateresponse_view.php');
?>

<!DOCTYPE html >
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>FORM FOR ROCKETGATERESPONSE</title>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
<div class = "container">
	<div class = "row">
		<div class = "col-md-7">
			<fieldset>
				<legend>Form Details</legend>
				<form action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post" id = "form" class = "form-horizontal" enctype = "multipart/form-data">
					<input type = "hidden" name = "idresponse" value = "<?php echo $rows->idresponse; ?>">
					<div class = "form-group">
						<label class = "" for = "authNo">Auth No</label>
						
						<input type = "text" class = "form-control" name = "authNo" maxlength = "45" value = "<?php echo $rows->authNo; ?>" id = "authNo"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "merchantInvoiceID">Merchant Invoice ID</label>
						
						<input type = "text" class = "form-control" name = "merchantInvoiceID" maxlength = "45" value = "<?php echo $rows->merchantInvoiceID; ?>" id = "merchantInvoiceID"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "merchantAccount">Merchant Account</label>
						
						<input type = "text" class = "form-control" name = "merchantAccount" maxlength = "45" value = "<?php echo $rows->merchantAccount; ?>" id = "merchantAccount"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "approvedAmount">Approved Amount</label>
						
						<input type = "text" class = "form-control" name = "approvedAmount" maxlength = "45" value = "<?php echo $rows->approvedAmount; ?>" id = "approvedAmount"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardLastFour">Card Last Four</label>
						
						<input type = "text" class = "form-control" name = "cardLastFour" maxlength = "45" value = "<?php echo $rows->cardLastFour; ?>" id = "cardLastFour"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "version">Version</label>
						
						<input type = "text" class = "form-control" name = "version" maxlength = "45" value = "<?php echo $rows->version; ?>" id = "version"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "merchantCustomerID">Merchant Customer ID</label>
						
						<input type = "text" class = "form-control" name = "merchantCustomerID" maxlength = "45" value = "<?php echo $rows->merchantCustomerID; ?>" id = "merchantCustomerID"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "reasonCode">Reason Code</label>
						
						<input type = "text" class = "form-control" name = "reasonCode" maxlength = "45" value = "<?php echo $rows->reasonCode; ?>" id = "reasonCode"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "retrievalNo">Retrieval No</label>
						
						<input type = "text" class = "form-control" name = "retrievalNo" maxlength = "45" value = "<?php echo $rows->retrievalNo; ?>" id = "retrievalNo"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardIssuerName">Card Issuer Name</label>
						
						<input type = "text" class = "form-control" name = "cardIssuerName" maxlength = "45" value = "<?php echo $rows->cardIssuerName; ?>" id = "cardIssuerName"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "payType">Pay Type</label>
						
						<input type = "text" class = "form-control" name = "payType" maxlength = "45" value = "<?php echo $rows->payType; ?>" id = "payType"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardHash">Card Hash</label>
						
						<input type = "text" class = "form-control" name = "cardHash" maxlength = "45" value = "<?php echo $rows->cardHash; ?>" id = "cardHash"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardDebitCredit">Card Debit Credit</label>
						
						<input type = "text" class = "form-control" name = "cardDebitCredit" maxlength = "45" value = "<?php echo $rows->cardDebitCredit; ?>" id = "cardDebitCredit"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardRegion">Card Region</label>
						
						<input type = "text" class = "form-control" name = "cardRegion" maxlength = "45" value = "<?php echo $rows->cardRegion; ?>" id = "cardRegion"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardDescription">Card Description</label>
						
						<input type = "text" class = "form-control" name = "cardDescription" maxlength = "45" value = "<?php echo $rows->cardDescription; ?>" id = "cardDescription"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardCountry">Card Country</label>
						
						<input type = "text" class = "form-control" name = "cardCountry" maxlength = "45" value = "<?php echo $rows->cardCountry; ?>" id = "cardCountry"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardType">Card Type</label>
						
						<input type = "text" class = "form-control" name = "cardType" maxlength = "45" value = "<?php echo $rows->cardType; ?>" id = "cardType"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "bankResponseCode">Bank Response Code</label>
						
						<input type = "text" class = "form-control" name = "bankResponseCode" maxlength = "45" value = "<?php echo $rows->bankResponseCode; ?>" id = "bankResponseCode"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "approvedCurrency">Approved Currency</label>
						
						<input type = "text" class = "form-control" name = "approvedCurrency" maxlength = "45" value = "<?php echo $rows->approvedCurrency; ?>" id = "approvedCurrency"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "guidNo">Guid No</label>
						
						<input type = "text" class = "form-control" name = "guidNo" maxlength = "45" value = "<?php echo $rows->guidNo; ?>" id = "guidNo"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cardExpiration">Card Expiration</label>
						
						<input type = "text" class = "form-control" name = "cardExpiration" maxlength = "45" value = "<?php echo $rows->cardExpiration; ?>" id = "cardExpiration"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "responseCode">Response Code</label>
						
						<input type = "text" class = "form-control" name = "responseCode" maxlength = "45" value = "<?php echo $rows->responseCode; ?>" id = "responseCode"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "timestamp">Timestamp</label>
						
						<input type = "text" class = "form-control" name = "timestamp" maxlength = "19" value = "<?php echo $rows->timestamp; ?>" id = "timestamp"/>
					</div>
					
					<div class = "form-actions">
						<input type = "submit" name = "button" class = "btn btn-primary btn-large" value = "Update"/>
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</div>
</body></html>