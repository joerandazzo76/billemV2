<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/17/2018
 * Time: 11:58 AM
 */

use \Curl\Curl;

class dating
{
	
	var $purchase_status = false;
	var $signupStatus    = false;
	
	var    $transactID         = "";
	var    $referredCustomerID = "";
	var    $invoiceID          = "";
	var    $cardHash           = "";
	var    $autoLoginURL;
	public $datingFields;
	
	public  $email;
	public  $login;
	public  $pass;
	public  $period;
	public  $custid;
	public  $invoiceid;
	public  $cardhash;
	public  $clickid;
	public  $signup_status = "false";
	public  $offerObject;
	public  $response;
	private $datiningCurl;
	
	
	public function __construct()
	{
		//$this->offerObject = new offer();
		//$this->setOfferObjects($datingObject);
		
		
	}
	
	public static function validateUserName($username)
	{
		if (strlen($username) < 4) {
			return '4 - 15 characters please. ';
		}
		if (is_numeric($username[0])) {
			return 'First character must be a letter. ';
		}
		$usernameCheckUrl = "https://xfriends.com/api/check.php?username=" . $username;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $usernameCheckUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$usernameCheckResponse = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		curl_close($ch);
		
		if ($usernameCheckResponse == 1) {
			return true;
			
			
		} else {
			return false;
			
		}
	}
	
	public static function validateEmail($email)
	{
		
		if (strlen($email) < 4) {
			return '4 - 15 characters please. ';
		}
		if (is_numeric($email[0])) {
			return 'First character must be a letter. ';
		}
		if (strpos($email, '@') == false) {
			return 'Invalid Email ';
		}
		
		$emailCheckUrl = "https://xfriends.com/api/check.php?email=" . $email;
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $emailCheckUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$emailCheckResponse = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		
		curl_close($ch);
		
		if ($emailCheckResponse == 1) {
			return true;
			
			
		} else {
			return false;
			
		}
		
		
	}
	
	public static function upgrade($getData)
	{
		
		
		$datingUpgradeURL = "https://hitpink.com/feed/postback.php?" . http_build_query($getData);
		echo_space($datingUpgradeURL);
		
		$curl = new Curl();
		$curl->get($datingUpgradeURL);
		if ($curl->error) {
			echo_space('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
		} else {
			echo_space($curl->response);
		}
		
	}
	
	private function processSignUpResponse()
	{
		//echo_space(__METHOD__);
		
		$segments = explode("|", $this->datiningCurl->response);
		if (!$this->datiningCurl->error && $segments[0] != "0") {
			$this->setAutoLoginURL($segments[4]);
			
			
			return true;
		} else {
			
			
			return false;
		}
		
		
	}
	
	public function postbackFail()
	{
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}
	
	public function postbackSuccess()
	{
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}
	
	public static function signUp_OLD($postData, bool $returnResponse = false)
	{
		/*
		https://hitpink.com/api/signup.php?
		email=#email#  //required
		&login=#userName#
		&pass=#password#
		&period=#period#
		&custid=#referredCustomerID#
		&invoiceid=#invoiceID#
		&cardhash=#cardHash#
		&clickid=#clickID#
		&timeframe=#timeframe#
		*/
		
		//email=#email#
		//&period=#period# **** gold membership in days
		//&clickid=#clickid#
		//&custid=#custid#
		//&invoiceid=#invoiceid#
		//&cardhash=#cardhash#
		$dating_endpoint_url = "https://hitpink.com/api/signup.php?" . http_build_query($postData);
		echo_break($dating_endpoint_url);
		$curl = new Curl();
		//$curl->setOpt(CURLOPT_HEADER, true);
		$curl->get($dating_endpoint_url);
		
		if ($curl->error) {
			echo_break('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
		} else {
			if (dating::processSignUpResponse($curl->response)) {
				if ($returnResponse == true) {
					return array(true, $curl->response);
				} else {
					return true;
				}
			}
			
			
		}
		
		
	}
	
	public function signUp($userInfo)
	{
		//echo_space(__METHOD__);
		//echo_space("----EXECUTING DATING SIGN UP----");
		
		$dating_endpoint_url = "https://hitpink.com/api/signup.php?" . http_build_query($userInfo);
		
		$this->datiningCurl = new Curl();
		//$this->datiningCurl->setOpt(CURLOPT_HEADER, true);
		$this->datiningCurl->get($dating_endpoint_url);
		
		if ($this->processSignUpResponse()) {
			//echo_space("----DATING SIGN UP SUCCESS---- RESPONSE = " . $this->datiningCurl->response);
			$autoLoginURL = ["autoLoginURL" => $this->autoLoginURL];
			echo json_encode($autoLoginURL); //todo json response
			return true;
		} else {
			//echo_space("----DATING SIGN UP FAIL---- RESPONSE = " . $this->datiningCurl->response);
			$autoLoginURL = ["autoLoginURL" => "FAIL"];
			echo json_encode($autoLoginURL); //todo json response
			
			return false;
		}
		
		
	}
	
	
	
	public static function upgradeUser($email, $period, $custid = '', $invoiceId = '', $cardhash = '')
	{
		
		$upgradeUserDatingURL = "http://hitpink.com/api/upgradeuserdating.php";
		
		$fields = array(
			'email'     => $email,
			'period'    => $period,
			'custid'    => $custid,
			'invoiceid' => $invoiceId,
			'cardhash'  => $cardhash
		);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $upgradeUserDatingURL);
		curl_setopt($ch, CURLOPT_INTERFACE, $_SERVER['SERVER_ADDR']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		$response = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		curl_close($ch);
		
		return json_encode($response);
	}
	
	public function checkUsername()
	{
		
		$usernameCheckUrl = "https://xfriends.com/api/check.php?username=" . $this->userObject->userName;
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $usernameCheckUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$usernameCheckResponse = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		
		curl_close($ch);
		
		if ($usernameCheckResponse == "1") {
			$this->username_status = true;
		} else {
			$this->username_status = false;
		}
		
	}
	
	public function checkUsernameStatic($email)
	{
		
		$usernameCheckUrl = "https://xfriends.com/api/check.php?username=" . $email;
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $usernameCheckUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$usernameCheckResponse = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		
		curl_close($ch);
		
		return $usernameCheckResponse;
	}
	
	public function setOfferObjects($datingObject)
	{
		foreach ($datingObject as $datingKey => $datingValue) {
			$this->offerObject->$datingKey = $datingValue;
			
		}
		
		
	}

	
	private function getAutoLoginUrl($response)
	{
		
		$segments = explode("|", $response);
		
		switch ($segments[0]) {
			case "0": //signup failed
				
				return false;
			case "1": //signup success
				
				return $segments[4];
		}
		
		
	}
	
	private function setAutoLoginURL($autoLoginURL)
	{
		
		$this->autoLoginURL = $autoLoginURL;
		
		//print_x($_SESSION);
	}
	
	private function confirmResponse()
	{
	
	}
	
	private function setStatus()
	{
	
	}


}