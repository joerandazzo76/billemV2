<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 2/1/2018
 * Time: 12:00 PM
 */
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

if (!empty($_GET)) {
	
	$video = new video();
	$video->allowAccess($_GET);
	
	
} else {
	echo "NOTHING SET";
}

