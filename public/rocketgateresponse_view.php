<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';


?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW PACKAGE RECORDS</title>
	
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
		<h3></h3>
		<h4>VIEW ROCKETGATERESPONSE RECORDS</h4>
		
		
		<table align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th colspan = "3">&nbsp;</th>
				<th colspan = "3"><a href = "rocketgateresponse_add.php" title = "Add New">
						<span class = "btn btn-mini">
							<img src = "assets/icons/add.png" width = "16" height = "16">
							Add New
						</span></a></th>
				<th>
				<th colspan = "3">
					<a href = "rocketgateresponse_view.php?limit=10">10 </a>
					<a href = "rocketgateresponse_view.php?limit=50">50 </a>
					<a href = "rocketgateresponse_view.php?limit=100">100 </a>
					<a href = "rocketgateresponse_view.php">ALL </a>
				
				
				</th>
			</tr>
			
			
			<tr>
				<th>idresponse</th>
				<th>AuthNo</th>
				<th>MerchantInvoiceID</th>
				<th>MerchantAccount</th>
				<th>ApprovedAmount</th>
				<th>CardLastFour</th>
				<th>Version</th>
				<th>MerchantCustomerID</th>
				<th>ReasonCode</th>
				<th>RetrievalNo</th>
				<th>CardIssuerName</th>
				<th>PayType</th>
				<th>CardHash</th>
				<th>CardDebitCredit</th>
				<th>CardRegion</th>
				<th>CardDescription</th>
				<th>CardCountry</th>
				<th>CardType</th>
				<th>BankResponseCode</th>
				<th>ApprovedCurrency</th>
				<th>GuidNo</th>
				<th>CardExpiration</th>
				<th>ResponseCode</th>
				<th>Timestamp</th>
				<th colspan = "3" width = "15%">Actions</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$na = new rocketgateresponse();
			//delete a record. You can decide to it on another page
			if (isset($_GET['idresponse'])) {
				if ($_GET['idresponse']) {
					$del = $na->Delete($_GET['idresponse']);
				}
			}
			//Select all records
			$result = $na->SelectAllReverse(rocketgateResponse::getLimitFromGet());
			//Loop through
			foreach ($result as $rows) {
				?>
				<tr>
					<td><?php echo ucwords($rows->idresponse); ?></td>
					<td><?php echo ucwords($rows->authNo); ?></td>
					<td><?php echo ucwords($rows->merchantInvoiceID); ?></td>
					<td><?php echo ucwords($rows->merchantAccount); ?></td>
					<td><?php echo ucwords($rows->approvedAmount); ?></td>
					<td><?php echo ucwords($rows->cardLastFour); ?></td>
					<td><?php echo ucwords($rows->version); ?></td>
					<td><?php echo ucwords($rows->merchantCustomerID); ?></td>
					<td><?php echo ucwords($rows->reasonCode); ?></td>
					<td><?php echo ucwords($rows->retrievalNo); ?></td>
					<td><?php echo ucwords($rows->cardIssuerName); ?></td>
					<td><?php echo ucwords($rows->payType); ?></td>
					<td><?php echo ucwords($rows->cardHash); ?></td>
					<td><?php echo ucwords($rows->cardDebitCredit); ?></td>
					<td><?php echo ucwords($rows->cardRegion); ?></td>
					<td><?php echo ucwords($rows->cardDescription); ?></td>
					<td><?php echo ucwords($rows->cardCountry); ?></td>
					<td><?php echo ucwords($rows->cardType); ?></td>
					<td><?php echo ucwords($rows->bankResponseCode); ?></td>
					<td><?php echo ucwords($rows->approvedCurrency); ?></td>
					<td><?php echo ucwords($rows->guidNo); ?></td>
					<td><?php echo ucwords($rows->cardExpiration); ?></td>
					<td><?php echo ucwords($rows->responseCode); ?></td>
					<td><?php echo ucwords($rows->timestamp); ?></td>
					<td class = "btn-group"><a href = "rocketgateresponse_update.php?idresponse=<?php echo $rows->idresponse; ?>" title = "Update"><span class = "btn btn-mini"><img src = "assets/icons/update.png" width = "16" height = "16"></span></a>
						<a href = "rocketgateresponse_view.php?idresponse=<?php echo $rows->idresponse; ?>" title = "Delete"> <span class = "btn btn-mini"><img src = "assets/icons/delete.png" width = "16" height = "16"></span></a>
						<a href = "rocketgateresponse_details.php?idresponse=<?php echo $rows->idresponse; ?>" title = "Details"><span class = "btn btn-mini"><img src = "assets/icons/details.png" width = "16" height = "16"></span></a>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>