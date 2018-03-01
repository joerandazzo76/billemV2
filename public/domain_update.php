<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

include '../public/nav.php';
include '../public/header.php';


$new = new domain();
$id  = $_GET['iddomain'];
//Select one record
$rows = $new->SelectOne($id);
//run update
//domain_view.php rep the page you are redirecting it to after submimission
$insert = $new->Update('domain_view.php');
?>

<!DOCTYPE html >
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8"/>
	<title>FORM FOR DOMAIN</title>
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
					<input type = "hidden" name = "iddomain" value = "<?php echo $rows->iddomain; ?>">
					<div class = "form-group">
						<label class = "" for = "name">Name</label>
						
						<input type = "text" class = "form-control" name = "name" maxlength = "45"
							   value = "<?php echo $rows->name; ?>" id = "name"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "rocketGateMerchantId">Rocket Gate Merchant Id</label>
						
						<input type = "text" class = "form-control" name = "rocketGateMerchantId" maxlength = "45"
							   value = "<?php echo $rows->rocketGateMerchantId; ?>" id = "rocketGateMerchantId"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "rocketGateMerchantPasword">Rocket Gate Merchant Pasword</label>
						
						<input type = "text" class = "form-control" name = "rocketGateMerchantPasword" maxlength = "45"
							   value = "<?php echo $rows->rocketGateMerchantPasword; ?>"
							   id = "rocketGateMerchantPasword"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "camRID">Cam RID</label>
						
						<input type = "text" class = "form-control" name = "camRID" maxlength = "45"
							   value = "<?php echo $rows->camRID; ?>" id = "camRID"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "midName">Mid Name</label>
						
						<input type = "text" class = "form-control" name = "midName" maxlength = "45"
							   value = "<?php echo $rows->midName; ?>" id = "midName"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "midPhoneNumber">Mid Phone Number</label>
						
						<input type = "text" class = "form-control" name = "midPhoneNumber" maxlength = "45"
							   value = "<?php echo $rows->midPhoneNumber; ?>" id = "midPhoneNumber"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "emailFrom">Email From</label>
						
						<input type = "text" class = "form-control" name = "emailFrom" maxlength = "45"
							   value = "<?php echo $rows->emailFrom; ?>" id = "emailFrom"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "emailHost">Email Host</label>
						
						<input type = "text" class = "form-control" name = "emailHost" maxlength = "45"
							   value = "<?php echo $rows->emailHost; ?>" id = "emailHost"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "emailUserName">Email User Name</label>
						
						<input type = "text" class = "form-control" name = "emailUserName" maxlength = "45"
							   value = "<?php echo $rows->emailUserName; ?>" id = "emailUserName"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "emailPassword">Email Password</label>
						
						<input type = "text" class = "form-control" name = "emailPassword" maxlength = "45"
							   value = "<?php echo $rows->emailPassword; ?>" id = "emailPassword"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "emailCC">Email CC</label>
						
						<input type = "text" class = "form-control" name = "emailCC" maxlength = "45"
							   value = "<?php echo $rows->emailCC; ?>" id = "emailCC"/>
					</div>
					
					<div class = "form-group">
						<label class = "" for = "timestamp">Timestamp</label>
						
						<input type = "text" class = "form-control" name = "timestamp" maxlength = "19"
							   value = "<?php echo $rows->timestamp; ?>" id = "timestamp"/>
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