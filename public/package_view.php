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
		<h4>VIEW PACKAGE RECORDS</h4>
		
		
		<table align = "center" class = "table table-striped table-bordered">
			<thead>
			<tr>
				<th colspan = "3">&nbsp;</th>
				<th colspan = "3"><a href = "package_add.php" title = "Add New"><span class = "btn btn-mini"><img
									src = "assets/icons/add.png" width = "16" height = "16">Add New</span></a></th>
			</tr>
			<tr>
				
				<th>idpackage</th>
				<th>Name</th>
				<th>PostbackSuccess</th>
				<th>PostbackFail</th>
				<th>Domain Iddomain</th>
				<th>Timestamp</th>
				<th colspan = "3" width = "15%">Actions</th>
			</tr>
			</thead>
			<tbody>
			
			<?php
			$na = new package();
			//delete a record. You can decide to it on another page
			if (isset($_GET['idpackage'])) {
				if ($_GET['idpackage']) {
					$del = $na->Delete($_GET['idpackage']);
				}
			}
			//Select all records
			$result = $na->SelectAll();
			//Loop through
			foreach ($result as $rows) {
				?>
				<tr>
					<td><?php echo ucwords($rows->idpackage); ?></td>
					<td><?php echo ucwords($rows->name); ?></td>
					<td><?php echo ucwords($rows->postbackSuccess); ?></td>
					<td><?php echo ucwords($rows->postbackFail); ?></td>
					<td><?php echo ucwords($rows->domain_iddomain); ?></td>
					<td><?php echo ucwords($rows->timestamp); ?></td>
					<td class = "btn-group"><a href = "package_update.php?idpackage=<?php echo $rows->idpackage; ?>"
											   title = "Update"><span class = "btn btn-mini"><img
										src = "assets/icons/update.png" width = "16" height = "16"></span></a>
						<a href = "package_view.php?idpackage=<?php echo $rows->idpackage; ?>" title = "Delete"> <span
									class = "btn btn-mini"><img src = "assets/icons/delete.png" width = "16"
																height = "16"></span></a>
						<a href = "package_details.php?idpackage=<?php echo $rows->idpackage; ?>"
						   title = "Details"><span class = "btn btn-mini"><img src = "assets/icons/details.png"
																			   width = "16" height = "16"></span></a>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>