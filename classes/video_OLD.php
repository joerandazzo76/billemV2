<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 10/17/2017
 * Time: 2:53 PM
 */

class video_OLD
{
	var $userObject;
	var $referredCustomerID = "";
	var $email_status       = "";
	var $autoLoginURL       = '';
	public $offerObject;
	
	public function __construct($videoFields)
	{
		$this->offerObject = new offer();
		$this->setClassObjects($videoFields);
		
		
	}

	public function postbackFail(){
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}

	public function postbackSuccess(){
		//print_x(__CLASS__	.'->' . __FUNCTION__ . '()');
		
	}

	public function signUp()
	{
		
		
		$dating_endpoint_url =
			"https://hitpink.com/api/signup.php?email=" . $this->userObject->email . "&login=" . $this->userObject->userName . "&pass=" . $this->userObject->password . "&period=" . DATING_PERIOD . "&custid=" . $this->referredCustomerID . "&invoiceid=" . $this->invoiceId . "&cardhash=" .
			$this->cardHash . "&clickid=" . $this->userObject->clickID;
		Log::Log2File("offer->video->dating->Signup: SENDING: " . $dating_endpoint_url);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $dating_endpoint_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$dating_response = curl_exec($ch);
		
		Log::Log2File("offer->video->dating->Signup: RESPONCE: " . $dating_response);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		//print_x($dating_response);
		curl_close($ch);
		$segments = explode("|", $dating_response);
		
		
		if ($segments[0] == "1") {
			$this->signup_status                                 = true;
			$this->autoLoginURL                                  = $segments[4];
			$_SESSION['data']['offer']['Dating']['autoLoginURL'] = $this->autoLoginURL;
			Log::Log2File("offer->video->dating->Signup: autoLoginURL: " . $this->autoLoginURL);
			
			
		} else {
			$this->signup_status = false;
			Log::Log2File("offer->video->dating->Signup: FAILED ... DUP EMAIL???");
			
		}
		
		
		Log::Log2File("offer->video->dating->Signup: SETTING Timeframe:32");
		$videoSignUpURL = "https://hitpink.com/feed/postback.php?email=" . $this->userObject->email . "&timeframe=32";
		/*            $fields = array(
						'email' => $this->userObject->email,
						'timeframe' => "14"
					);*/
		//Log::Log2File($videoSignUpURL);
		//Log::Log2File("offer->video->dating->Signup: SENDING: " . $videoSignUpURL);
		Log::Log2File("offer->video->dating->Signup: TIMEFRAME SENDING: " . $videoSignUpURL);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $videoSignUpURL);
		curl_setopt($ch, CURLOPT_INTERFACE, $_SERVER['SERVER_ADDR']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$response = curl_exec($ch);
		Log::Log2File("offer->video->dating->Signup: TIMEFRAME RESPONCE: " . $response);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			Log::Log2File("cURL error ({$errno}):\n {$error_message}");
		}
		
		curl_close($ch);
		
		return $response;
		
		
	}

	public function upgradeVideo()
	{
		
		$datingUpgradeURL = "https://hitpink.com/feed/postback.php?email=" . $this->email . "&timeframe=" . $this->timeframe;
		print_x("offer->Dating->UPGRADE VIDEO : SENDING: " . $datingUpgradeURL);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $datingUpgradeURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$dating_response = curl_exec($ch);
		print_x("offer->Dating->UPGRADE VIDEO : RESPONCE: " . $dating_response);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		curl_close($ch);
		
		
	}
	
	public function liveSignUp()
	{
		$liveSignUpURL = "http://processor.live.hitpink.com/php-rocketgate-class/postback_oneclick.cgi?";
		$fields        = array(
			'action'              => "join",
			'custFirstName'       => $this->userObject->firstName,
			'custLastName'        => $this->userObject->lastName,
			'custCity'            => $this->userObject->city,
			'custState'           => $this->userObject->state,
			'custZip'             => $this->userObject->zip,
			'custCountry'         => "US",
			'custIP'              => $this->userObject->ipAddress,
			'custEmail'           => $this->userObject->email,
			'custPassword'        => $this->userObject->password,
			'referredCustomerID'  => $this->referredCustomerID,
			'referringMerchantID' => $this->rg_merchant_id,
			'siteid'              => $this->merchant_site_id,
			'cardHash'            => $this->cardHash,
			'cardFirst6'          => $this->userObject->firstSixCC,
			'cardLast4'           => $this->userObject->lastFourCC,
			'cardExpiration'      => $this->userObject->expMonth . substr($this->userObject->expYear, 2),
			'referrerid'          => CAM_RID
		
		);
		
		$query = http_build_query($fields);
		Log::Log2File("Offer->Live->SignUp: " . $liveSignUpURL . $query);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $liveSignUpURL);
		curl_setopt($ch, CURLOPT_INTERFACE, $_SERVER['SERVER_ADDR']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
		$response = curl_exec($ch);
		Log::Log2File("Offer->Live->SignUp: RESPONCE" . $response);
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		curl_close($ch);
		
		if (DEBUG_PRINT) {
			print_x($response);
		}
		
		if ($response == "OK") {
			$this->signup_status = true;
			
			
		} else {
			$this->signup_status = false;
			
		}
	}
	
	private function setClassObjects($videoObject)
	{
		foreach ($videoObject as $videoKey => $videoValue) {
			
			$this->offerObject->$videoKey = $videoValue;
			
		}
	}
	
	public function upgradeUser($timeFrame)
	{
		dating::upgradeUser($this->userObject->email, $timeFrame);
	}
	
}