<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 2/2/2018
 * Time: 3:13 PM
 */

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');


$dating = new datingTest();
$dating->signUpTestSuccess();

send_to("http://".$_SERVER['SERVER_NAME'].'/success.php');
