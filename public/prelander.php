<?php

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

$userObject = new user();


if (isset($_POST['submit'])) {
	//todo build user varifier
	$userObject->setUserPrelanderData();
	if ($userObject->validate()) {
		$userObject->setSession();
		send_to('/index.php');
	}
	
	
}

if ($_SERVER['REMOTE_ADDR'] == '96.73.53.178' || $_SERVER['REMOTE_ADDR'] == '192.168.10.1') {
	echo_space('<button type="button">FakeUser</button>');
}


include($_SERVER['DOCUMENT_ROOT'] . '/public/package/' . $userObject->packageId . '/prelander.php');
print_x($userObject);
?>
<script>
	
	// A $( document ).ready() block.
	$(document).ready(function () {
		console.log("ready!");
		console.log("Done!");
		
		$("button").click(function () {
			
			fakeUser();
		});
		
		
		function fakeUser() {
			
			var ranNumber = randomNumber(1000, 100000);
			
			
			$('#username').val('JoeTest' + ranNumber); //creates a fake username "JoeTest19364"
			$('#password1').val('password' + ranNumber); //creates a fake password "password19364"
			$('#password2').val('password' + ranNumber); //creates a fake password "password19364"
			$('#email').val('JoeTest' + ranNumber + '@joe.com'); //creates a fake email "JoeTest19364@joe.com"
			
			
			function randomNumber(min, max) {
				return Math.floor(Math.random() * (max - min + 1) + min);
			}
			
			
		}
		
		
	});


</script>

