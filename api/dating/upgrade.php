<?php
include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/22/2018
 * Time: 12:43 PM
 */

include($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
echo_space("----EXECUTING DATING UPGRADE----");
dating::upgrade($_GET);

