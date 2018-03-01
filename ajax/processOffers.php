<?php

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

echo_space("----PROCESSING OFFERS----START");
print_x($_POST);
$userObject = new user();
$userObject->setAdditionalUserInfo($_POST);
$userObject->processUser();
$userObject->setSession();
Log::Log2File(json_encode($_SESSION));
print_x("----PROCESSING OFFERS---- DONE");
print_x($_SESSION);
