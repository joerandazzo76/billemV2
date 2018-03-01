<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';

//offer_view.php rep the page you are redirecting it to after submission
$na             = new offer();
$result         = $na->Insert('offer_view.php');
$packages       = new package();
$packagesWithID = $packages->getAllNamesWithPackageID();
?>
<!DOCTYPE html >
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>FORM FOR OFFER</title>
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
						<label class = "" for = "name">Name</label>
						
						<input type = "text" class = "form-control" name = "name" maxlength = "45" value = ""
							   id = "name"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "amount">Amount</label>
						
						<input type = "text" class = "form-control" name = "amount" maxlength = "45" value = ""
							   id = "amount"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "rebillStart">Rebill Start</label>
						
						<input type = "text" class = "form-control" name = "rebillStart" maxlength = "45" value = ""
							   id = "rebillStart"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "rebillAmount">Rebill Amount</label>
						
						<input type = "text" class = "form-control" name = "rebillAmount" maxlength = "45" value = ""
							   id = "rebillAmount"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "rebillFrequency">Rebill Frequency</label>
						
						<input type = "text" class = "form-control" name = "rebillFrequency" maxlength = "45" value = ""
							   id = "rebillFrequency"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "transactionType">Transaction Type</label>
						
						<input type = "text" class = "form-control" name = "transactionType" maxlength = "45" value = ""
							   id = "transactionType"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "var1">Var1</label>
						
						<input type = "text" class = "form-control" name = "var1" maxlength = "45" value = ""
							   id = "var1"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "var2">Var2</label>
						
						<input type = "text" class = "form-control" name = "var2" maxlength = "45" value = ""
							   id = "var2"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "var3">Var3</label>
						
						<input type = "text" class = "form-control" name = "var3" maxlength = "45" value = ""
							   id = "var3"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "postbackSuccess">Postback Success </label>
						<p><font size = "3">/api/{offerName}/{method}.php?</font>
							<font size = "1">email=#email#&login=#userName#&pass=#password#&custid=#rocketGateCustomerID#&invoiceid=#merchantInvoiceID#&cardhash=#cardhash#&clickid=#clickID#&var1=#var1#&var2=#var2#&var3=#var3#</font></p>
						
						<input type = "text" class = "form-control" name = "postbackSuccess" maxlength = "255" value = ""
							   id = "postbackSuccess"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "postbackFail">Postback Fail</label>
						
						<input type = "text" class = "form-control" name = "postbackFail" maxlength = "255" value = ""
							   id = "postbackFail"/>
					</div>
					
					<div class = "form-group">
						
						<label class = "" for = "package_idpackage">Package Idpackage</label>
						<select multiple class = "form-control input-sm " id = "package_idpackage"
								name = "package_idpackage">
							<?php
							foreach ($packagesWithID as $package) {
								echo "<option value='" . $package['idpackage'] . "'>" . $package['name'] . "</option>";
							}
							?>
						
						</select>
					</div>
					<div class = "form-group">
						<label class = "" for = "timestamp">Timestamp</label>
						
						<input type = "text" class = "form-control" name = "timestamp" maxlength = "19" value = ""
							   id = "timestamp"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "scrub">Scrub</label>
						
						<input type = "text" class = "form-control" name = "scrub" maxlength = "45" value = ""
							   id = "scrub"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "cvv2Check">Cvv2Check</label>
						
						<input type = "text" class = "form-control" name = "cvv2Check" maxlength = "45" value = ""
							   id = "cvv2Check"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "avsCheck">Avs Check</label>
						
						<input type = "text" class = "form-control" name = "avsCheck" maxlength = "45" value = ""
							   id = "avsCheck"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "makePurchase">Make Purchase</label>
						
						<input type = "text" class = "form-control" name = "makePurchase" maxlength = "1" value = ""
							   id = "makePurchase"/>
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