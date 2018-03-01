<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/16/2018
 * Time: 4:14 PM
 */

use \Curl\Curl;

/**
 * @property  serializedObject
 */
class processor
{
	
	public $userObject;
	public $responseArray;
	public $postbackArray;
	public $curlResponse;
	
	
	public function __construct(user $userObject)
	{
	
	
		
	}
	
	public function processOffers()
	{
		$this->processOffersViaRocketGate();
	}
	
	private function processOffersViaRocketGate()
	{
		foreach ($this->userObject->offerArray as $offerNumber => $value) {
			$rocketgate = new rocketgate($this->userObject);
			$rocketgate->process($offerNumber);
			//$this->setPostback($offerNumber);
			$this->responseArray[$offerNumber] = new rocketgateresponse();
			$this->responseArray[$offerNumber] = $rocketgate->response;
			
		}
		
	}
	
	public function processPackage()
	{
	
	}
	
	private function processPostbackSuccessResponse($postbackResponse)
	{
		$postbackResponse = json_decode($postbackResponse);
		$name             = strtolower($postbackResponse->name);
		$className        = new $name($postbackResponse);
		$className->postbackSuccess();
	}
	
	private function processPostbackFailResponse($postbackResponse)
	{
		$postbackResponse = json_decode($postbackResponse);
		$name             = strtolower($postbackResponse->name);
		$className        = new $name($postbackResponse);
		$className->postbackFail();
	}
	
	
	//-------------------------------------------------------------------
	// KEEP FOR LATER USE
	//-------------------------------------------------------------------
	private function processPostbackSuccess($offer)
	{
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/api/' . $offer->name . '/postbackfail.php')) {
			$postback = 'http://' . $_SERVER['SERVER_NAME'] . '/api/' . $offer->name . '/postbackfail.php';
			
			print_x("CURL SUCCESS POSTBACK: " . $postback);
			
			
			$curl = new Curl();
			$curl->post($postback, $offer);
			if ($curl->error) {
				echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
			} else {
				$this->processPostbackSuccessResponse($curl->response);
			}
			
		}
	} //NOT IN USE
	private function processPostbackFail($offer)
	{
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/api/' . $offer->name . '/postbackfail.php')) {
			$postback = 'http://' . $_SERVER['SERVER_NAME'] . '/api/' . $offer->name . '/postbackfail.php';
			
			print_x("CURL FAIL POSTBACK: " . $postback);
			
			
			$curl = new Curl();
			$curl->post($postback, $offer);
			if ($curl->error) {
				echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
			} else {
				$this->processPostbackFailResponse($curl->response);
			}
			
		}
	} //NOT IN USE
	private function setPostback($offerNumber)
	{
		$this->postbackArray[$offerNumber] = new postback($this->userObject, $offerNumber);
	}
}