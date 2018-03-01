<?php

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';
?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW USER RECORDS</title>
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
		<h3></h3>
		<h4>VIEW USER RECORDS</h4>
		
		
		<table align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th colspan = "3">&nbsp;</th>
				<th colspan = "3"><a href = "user_add.php" title = "Add New"><span class = "btn btn-mini"><img
									src = "assets/icons/add.png" width = "16" height = "16">Add New</span></a></th>
			</tr>
			<tr>
				<th>FirstName</th>
				<th>LastName</th>
				<th>CardHash</th>
				<th>ExpMonth</th>
				<th>ExpYear</th>
				<th>Email</th>
				<th>UserName</th>
				<th>Password</th>
				<th>IpAddress</th>
				<th>FirstSix</th>
				<th>LastFour</th>
				<th>RocketGateCustomerID</th>
				<th>ClickID</th>
				<th>AffID</th>
				<th>Timestamp</th>
				<th>Domain Iddomain</th>
				<th colspan = "3" width = "15%">Actions</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$na = new user();
			//delete a record. You can decide to it on another page
			if (isset($_GET['iduser'])) {
				if ($_GET['iduser']) {
					$del = $na->Delete($_GET['iduser']);
				}
			}
			//Select all records
			$result = $na->SelectAll();
			//Loop through
			foreach ($result as $rows) {
				?>
				<tr>
					<td><?php echo ucwords($rows->firstName); ?></td>
					<td><?php echo ucwords($rows->lastName); ?></td>
					<td><?php echo ucwords($rows->cardHash); ?></td>
					<td><?php echo ucwords($rows->expMonth); ?></td>
					<td><?php echo ucwords($rows->expYear); ?></td>
					<td><?php echo ucwords($rows->email); ?></td>
					<td><?php echo ucwords($rows->userName); ?></td>
					<td><?php echo ucwords($rows->password); ?></td>
					<td><?php echo ucwords($rows->ipAddress); ?></td>
					<td><?php echo ucwords($rows->firstSix); ?></td>
					<td><?php echo ucwords($rows->lastFour); ?></td>
					<td><?php echo ucwords($rows->rocketGateCustomerID); ?></td>
					<td><?php echo ucwords($rows->clickID); ?></td>
					<td><?php echo ucwords($rows->affID); ?></td>
					<td><?php echo ucwords($rows->timestamp); ?></td>
					<td><?php echo ucwords($rows->domain_iddomain); ?></td>
					<td class = "btn-group"><a href = "user_update.php?iduser=<?php echo $rows->iduser; ?>"
											   title = "Update"><span class = "btn btn-mini"><img
										src = "assets/icons/update.png" width = "16" height = "16"></span></a>
						<a href = "user_view.php?iduser=<?php echo $rows->iduser; ?>" title = "Delete"> <span
									class = "btn btn-mini"><img src = "assets/icons/delete.png" width = "16"
																height = "16"></span></a>
						<a href = "user_details.php?iduser=<?php echo $rows->iduser; ?>" title = "Details"><span
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