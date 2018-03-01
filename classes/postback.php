<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/16/2018
 * Time: 5:53 PM
 */

class postback
{
	
	/**
	 * postback constructor.
	 */
	public $postbackSuccess;
	public $postbackFail;
	//public $userObject;
	
	public function __construct($responseArray, $offerNumber)
	{
		$this->setPostBackSuccess($responseArray, $offerNumber);
		$this->setPostBackFail($responseArray, $offerNumber);
		
	}
	
	private function setPostBackSuccess($userObject, $offerNumber)
	{
		$this->postbackSuccess = $userObject->offerArray[$offerNumber]->postbackSuccess;
	}
	
	private function setPostBackFail( $userObject, $offerNumber)
	{
		$this->postbackFail = $userObject->offerArray[$offerNumber]->postbackFail;
	}
	
	
	//-------------------------------------------------------------------
	// KEEP FOR LATER USE
	//-------------------------------------------------------------------
	
}