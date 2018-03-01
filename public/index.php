<?php


include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

$userObject = new user();
$userObject->checkIfVarified();
print_x($userObject);
Log::Log2File("Hello World");
include($_SERVER['DOCUMENT_ROOT'] . "/public/package/" . $userObject->packageId . '/index.php');

?>
<script>
	
	// A $( document ).ready() block.
	$(document).ready(function () {
		console.log("ready!");

		document.getElementById("expireMonth").options.selectedIndex = $('#expireMonth_Hidden').val();
		document.getElementById("expireYear").options.selectedIndex = $('#expireYear_Hidden').val();
		
		$("#button").click(function () {
			var data = {
				'firstName': $('#customerFirstName').val(),
				'lastName': $('#customerLastName').val(),
				'cardNumber': $('#cardNo').val(),
				'expMonth': $('#expireMonth').val(),
				'expYear': $('#expireYear').val(),
				'cvv2': $('#cvv2').val()
			};
			
			processOffers(data);
			
		});
		timeout();
		$('#spinner').attr('hidden', true);
		console.log("Done!");
	});
	
	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + exdays);
		console.log(d.getTime() + exdays);
		var expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	
	function checkCookie() {
		var user = getCookie("session_timer");
		if (user != "") {
			//console.log("Welcome again " + user);
		} else {
			<?php
/*			session_destroy();
			*/?>
			console.log("session_destroy " + user);
			location.reload();
			
			if (user != "" && user != null) {
				setCookie("session_timer", user, 60 * 5);
			}
		}
	}
	
	function timeout() {
		setTimeout(function () {
			// Do Something Here
			// create a recursive loop.
			//checkCookie();  // NOT BEING USED KEEP FOR LATER IMPLIMATION
			timeout();
		}, 1000);
	}
	
	function checkFields(data) {
		if (data[1] === "") {
			throw ("MISSING FIELDS " + data[0]);
		}
		
	}
	
	function processOffers(data) {
		$.ajax({
			beforeSend: function () {
				console.log("processOffers ajax ---- START ");
				$('#spinner').attr('hidden', false);
			},
			url: '/ajax/processOffers.php',
			type: 'POST',
			complete: function () {
				$('#spinner').attr('hidden', true);
				console.log("processOffers ajax ---- DONE ");
				//window.location.href = "success.php"; //todo --------------------------------
			},
			data: data,
			success: function (response) {
				console.log($.trim(response));
			}
		});
		
	}


</script>

