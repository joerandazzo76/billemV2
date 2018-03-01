<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


include '../public/nav.php';
include '../public/header.php';



?>
<!DOCTYPE html >
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>VIEW DOMAIN RECORDS</title>
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
		<h4>VIEW DOMAIN RECORDS</h4>
		
		
		<table align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th colspan = "3">&nbsp;</th>
				<th colspan = "3"><a href = "domain_add.php" title = "Add New"><span class = "btn btn-mini"><img
									src = "assets/icons/add.png" width = "16" height = "16">Add New</span></a></th>
			</tr>
			<tr>
				<th>Name</th>
				<th>RocketGateMerchantId</th>
				<th>RocketGateMerchantPasword</th>
				<th>CamRID</th>
				<th>MidName</th>
				<th>MidPhoneNumber</th>
				<th>EmailFrom</th>
				<th>EmailHost</th>
				<th>EmailUserName</th>
				<th>EmailPassword</th>
				<th>EmailCC</th>
				<th>Timestamp</th>
				<th colspan = "3" width = "15%">Actions</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$na = new domain();
			//delete a record. You can decide to it on another page
			if (isset($_GET['iddomain'])) {
				if ($_GET['iddomain']) {
					$del = $na->Delete($_GET['iddomain']);
				}
			}
			//Select all records
			$result = $na->SelectAll();
			//Loop through
			foreach ($result as $rows) {
				?>
				<tr>
					<td><?php echo ucwords($rows->name); ?></td>
					<td><?php echo ucwords($rows->rocketGateMerchantId); ?></td>
					<td><?php echo ucwords($rows->rocketGateMerchantPasword); ?></td>
					<td><?php echo ucwords($rows->camRID); ?></td>
					<td><?php echo ucwords($rows->midName); ?></td>
					<td><?php echo ucwords($rows->midPhoneNumber); ?></td>
					<td><?php echo ucwords($rows->emailFrom); ?></td>
					<td><?php echo ucwords($rows->emailHost); ?></td>
					<td><?php echo ucwords($rows->emailUserName); ?></td>
					<td><?php echo ucwords($rows->emailPassword); ?></td>
					<td><?php echo ucwords($rows->emailCC); ?></td>
					<td><?php echo ucwords($rows->timestamp); ?></td>
					<td class = "btn-group"><a href = "domain_update.php?iddomain=<?php echo $rows->iddomain; ?>"
											   title = "Update"><span class = "btn btn-mini"><img
										src = "assets/icons/update.png" width = "16" height = "16"></span></a>
						<a href = "domain_view.php?iddomain=<?php echo $rows->iddomain; ?>" title = "Delete"> <span
									class = "btn btn-mini"><img src = "assets/icons/delete.png" width = "16"
																height = "16"></span></a>
						<a href = "domain_details.php?iddomain=<?php echo $rows->iddomain; ?>" title = "Details"><span
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