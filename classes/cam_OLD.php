<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/17/2018
 * Time: 3:53 PM
 */
use \Curl\Curl;

class cam_OLD
{
	public $offerObject;
	public function __construct($camFields)
	{
		$this->offerObject = new offer();
		$this->setClassObjects($camFields);
		
	}
	public function postbackFail(){
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}
	public function postbackSuccess(){
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
		
		$liveSignUpURL = "http://processor.live.hitpink.com/php-rocketgate-class/postback_oneclick.cgi?" . http_build_query($getData);
		
		$curl = new Curl();
		$curl->post($liveSignUpURL);
		if ($curl->error) {
			echo_space('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
		} else {
			echo_space($curl->response);
			
		}
		
	}
	
}





