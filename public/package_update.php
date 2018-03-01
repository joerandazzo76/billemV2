<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';

$new = new package();
$id  = $_GET['idpackage'];
//Select one record
$rows = $new->SelectOne($id);
$domains          = new domain();
$domainNameWithID = $domains->getAllNamesWithDomainID();

//run update
//package_view.php rep the page you are redirecting it to after submimission
$insert = $new->Update('package_view.php');
?>

<!DOCTYPE html >
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>FORM FOR PACKAGE</title>
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
					<input type = "hidden" name = "idpackage" value = "<?php echo $rows->idpackage; ?>">
					<div class = "form-group">
						<label class = "" for = "name">Name</label>
						
						<input type = "text" class = "form-control" name = "name" maxlength = "45"
							   value = "<?php echo $rows->name; ?>" id = "name"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "postbackSuccess">Postback Success</label>
						
						<input type = "text" class = "form-control" name = "postbackSuccess" maxlength = "45"
							   value = "<?php echo $rows->postbackSuccess; ?>" id = "postbackSuccess"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "postbackFail">Postback Fail</label>
						
						<input type = "text" class = "form-control" name = "postbackFail" maxlength = "45"
							   value = "<?php echo $rows->postbackFail; ?>" id = "postbackFail"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "timestamp">Timestamp</label>
						
						<input type = "text" class = "form-control" name = "timestamp" maxlength = "19"
							   value = "<?php echo $rows->timestamp; ?>" id = "timestamp"/>
					</div>
					
					<div class = "form-group">
						
						<label class = "" for = "domain_iddomain">Domain Iddomain</label>
						<select multiple class = "form-control input-sm " id = "domain_iddomain"
								name = "domain_iddomain">
							<?php
							foreach ($domainNameWithID as $domain) {
								echo "<option value='" . $domain['iddomain'] . "'>" . $domain['name'] . "</option>";
							}
							?>
						</select>
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