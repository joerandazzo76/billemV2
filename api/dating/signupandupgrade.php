<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/22/2018
 * Time: 4:58 PM
 * /api/dating/signupandupgrade.php
 */
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


if (!empty($_GET)) {
	
	$dating = new dating();
	$dating->signUp($_GET);
	
} else {
	echo "NOTHING SET";
}
