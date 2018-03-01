<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


include '../public/nav.php';
include '../public/header.php';

?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW OFFER RECORDS</title>
	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<style type = "text/css">
		body {
			
			margin-left: 30px;
			margin-right: 30px;
		}
	</style>
</head>

<body>

<div class = "row">
	<div class = "col-md-8">
		
		<h3></h3>
		<h3></h3>
		<h4>VIEW OFFER RECORDS</h4>
		
		
		<table align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th colspan = "3">&nbsp;</th>
				<th colspan = "3"><a href = "offer_add.php" title = "Add New">
						<span class = "btn btn-mini">
							<img src = "assets/icons/add.png" width = "16" height = "16">Add New</span></a></th>
			</tr>
			<tr>
				<th>Name</>
				<th>Amount</th>
				<th>RebillStart</th>
				<th>RebillAmount</th>
				<th>RebillFrequency</th>
				<th>TransactionType</th>
				<th>Var1</th>
				<th>Var2</th>
				<th>Var3</th>
				<th>PostbackSuccess</th>
				<th>PostbackFail</th>
				<th>pid</th>
				<th>Timestamp</th>
				<th>Scrub</th>
				<th>Cvv2Check</th>
				<th>AvsCheck</th>
				<th>Purchase</th>
				<th colspan = "3">Actions</th>
			
			</tr>
			</thead>
			<tbody>
			
			<?php
			$na = new offer();
			//delete a record. You can decide to it on another page
			if (isset($_GET['idoffer'])) {
				if ($_GET['idoffer']) {
					$del = $na->Delete($_GET['idoffer']);
				}
			}
			//Select all records
			$result = $na->SelectAll();
			//Loop through
			foreach ($result as $rows) {
				?>
				<tr>
					<td><?php echo ucwords($rows->name); ?></td>
					<td><?php echo ucwords($rows->amount); ?></td>
					<td><?php echo ucwords($rows->rebillStart); ?></td>
					<td><?php echo ucwords($rows->rebillAmount); ?></td>
					<td><?php echo ucwords($rows->rebillFrequency); ?></td>
					<td><?php echo ucwords($rows->transactionType); ?></td>
					<td><?php echo ucwords($rows->var1); ?></td>
					<td><?php echo ucwords($rows->var2); ?></td>
					<td><?php echo ucwords($rows->var3); ?></td>
					<td><?php echo ucwords($rows->postbackSuccess); ?></td>
					<td><?php echo ucwords($rows->postbackFail); ?></td>
					<td><?php echo ucwords($rows->package_idpackage); ?></td>
					<td><?php echo ucwords($rows->timestamp); ?></td>
					<td><?php echo ucwords($rows->scrub); ?></td>
					<td><?php echo ucwords($rows->cvv2Check); ?></td>
					<td><?php echo ucwords($rows->avsCheck); ?></td>
					<td><?php echo ucwords($rows->makePurchase); ?></td>
					<td class = "btn-group"><a href = "offer_update.php?idoffer=<?php echo $rows->idoffer; ?>"
											   title = "Update"><span class = "btn btn-mini"><img
										src = "assets/icons/update.png" width = "16" height = "16"></span></a>
						<a href = "offer_view.php?idoffer=<?php echo $rows->idoffer; ?>" title = "Delete"> <span
									class = "btn btn-mini"><img src = "assets/icons/delete.png" width = "16"
																height = "16"></span></a>
						<a href = "offer_details.php?idoffer=<?php echo $rows->idoffer; ?>" title = "Details"><span
									class = "btn btn-mini"><img src = "assets/icons/details.png" width = "16"
																height = "16"></span></a>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>