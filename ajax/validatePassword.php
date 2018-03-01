<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/19/2018
 * Time: 6:16 AM
 */
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

echo user::vaildatePasswordStatic($_POST['password'], $_POST['password2']);
