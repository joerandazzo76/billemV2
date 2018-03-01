<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/22/2018
 * Time: 5:10 PM
 */
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


echo_space("----EXECUTING CAM SIGN UP----");

print_x($_GET);

if (!empty($_GET)) {
	
	$camOffer = new cam();
	$camOffer->signUp($_GET);
	
} else {
	echo "NOTHING SET";
}

