<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 2/1/2018
 * Time: 10:08 AM
 */

use \Curl\Curl;

class cam
{
	public function __construct()
	{
	
	
	}
	
	public function postbackFail()
	{
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}
	
	public function postbackSuccess()
	{
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}
	
	public function setClassObjects($offerObject)
	{
		foreach ($offerObject as $ObjectKey => $objectValue) {
			
			$this->offerObject->$ObjectKey = $objectValue;
			
		}
	}
	
	public static function signUp($getData) //todo FINISH
	{
		
		$liveSignUpURL = "http://processor.live.hitpink.com/rocketgate/postback_oneclick.cgi?" . http_build_query($getData);
		echo_space($liveSignUpURL); //todo CODE REVIEW
		echo_space("#####################################################");
		echo_space("############### NEED TO WHITELIST IP ################");
		echo_space("############### TO CONTINUE TESTING  ################");
		echo_space("#####################################################");
		/*
		$curl = new Curl();
		$curl->post($liveSignUpURL);
		if ($curl->error) {
			echo_space('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
		} else {
			echo_space($curl->response);
			
		}*/
		
	}
}
