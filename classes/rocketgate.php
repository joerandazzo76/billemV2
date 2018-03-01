<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/15/2018
 * Time: 1:22 PM
 */

use Rocketgate\GatewayRequest;
use Rocketgate\GatewayResponse;
use Rocketgate\GatewayService;

class rocketgate
{
	
	public $response;
	public $responseObject;
	
	public function __construct()
		//public function __construct(user $userObject)
	{
		
		$this->response = new rocketgateresponse();
		
		
	}
	
	public function processOLD($offerNumber)
	{
		
		
		if ($this->userObject->offerArray[$offerNumber]->transactionType == 'Purchase') {
			$this->performPurchase($this->userObject, $offerNumber);
			
		} else {
			if ($this->userObject->offerArray[$offerNumber]->transactionType == 'AuthOnly') {
				$this->performAuthOnly($this->userObject, $offerNumber);
			} else {
				throw new Exception('INVALID Processor set for offer in database');
			}
		}
		
	}
	
	public function performPurchase(user $userObject, offer $offer, $domainObject)
	{
		
		/*
	 * Copyright notice:
	 * (c) Copyright 2016 RocketGate
	 * All rights reserved.
	 *
	 * The copyright notice must not be removed without specific, prior
	 * written permission from RocketGate.
	 *
	 * This software is protected as an unpublished work under the U.S. copyright
	 * laws. The above copyright notice is not intended to effect a publication of
	 * this work.
	 * This software is the confidential and proprietary information of RocketGate.
	 * Neither the binaries nor the source code may be redistributed without prior
	 * written permission from RocketGate.
	 *
	 * The software is provided "as-is" and without warranty of any kind, express, implied
	 * or otherwise, including without limitation, any warranty of merchantability or fitness
	 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
	 * special, incidental, indirect, consequential or other damages of any kind, or any damages
	 * whatsoever arising out of or in connection with the use or performance of this software,
	 * including, without limitation, damages resulting from loss of use, data or profits, and
	 * whether or not advised of the possibility of damage, regardless of the theory of liability.
	 *
	 */

//	Allocate the objects we need for the test.
//
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();

//
//	Setup the Purchase request.
//
		$request->Set(GatewayRequest::MERCHANT_ID(), $userObject->domainObject->rocketGateMerchantId);
		//$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $userObject->domainObject->rocketGateMerchantPasword);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), '62sbLZVcZhjKFuJA');

// For example/testing, we set the order id and customer as the unix timestamp as a convienent sequencing value
// appending a test name to the order id to facilitate some clarity when reviewing the tests
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->clickID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->offerArray[$offerNumber]->idoffer);
		
		
		$request->Set(GatewayRequest::AMOUNT(), $userObject->offerArray[$offerNumber]->amount);
		$request->Set(GatewayRequest::CARDNO(), $userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $userObject->cvv2);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $userObject->offerArray[$offerNumber]->rebillAmount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $userObject->offerArray[$offerNumber]->rebillFrequency);
		$request->Set(GatewayRequest::REBILL_START(), $userObject->offerArray[$offerNumber]->rebillStart);
		
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $userObject->affID);
		
		//$request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
		//$request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
		//$request->Set(GatewayRequest::BILLING_STATE(), "NV");
		//$request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
		//$request->Set(GatewayRequest::BILLING_COUNTRY(), "US");


// Risk/Scrub Request Setting
		$request->Set(GatewayRequest::SCRUB(), $userObject->offerArray[$offerNumber]->scrub);
		$request->Set(GatewayRequest::CVV2_CHECK(), $userObject->offerArray[$offerNumber]->cvv2Check);
		$request->Set(GatewayRequest::AVS_CHECK(), $userObject->offerArray[$offerNumber]->avsCheck);

//
//	Setup test parameters in the service and
//	request.
//
		$service->SetTestMode(TRUE);

//
//	Perform the Purchase transaction.
//
		
		if ($service->PerformPurchase($request, $response)) {
			/*			print "PerformPurchase succeeded\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n";
						print "AVS: " . $response->Get(GatewayResponse::AVS_RESPONSE()) . "\n";
						print "CVV2: " . $response->Get(GatewayResponse::CVV2_CODE()) . "\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Card Issuer: " . $response->Get(GatewayResponse::CARD_ISSUER_NAME()) . "\n";
						print "Account: " . $response->Get(GatewayResponse::MERCHANT_ACCOUNT()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			$this->response = $response->params;
			
			rocketgateResponse::insertResponseToDatabase($response);
			
			return true;
		} else {
			/*			print "PerformPurchase failed\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Exception: " . $response->Get(GatewayResponse::EXCEPTION()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
			
			return false;
		}
		
		
	}
	
	public function performAuthOnly(user $userObject, offer $offer, domain $domainObject)
	{
		
		/*
	 * Copyright notice:
	 * (c) Copyright 2016 RocketGate
	 * All rights reserved.
	 *
	 * The copyright notice must not be removed without specific, prior
	 * written permission from RocketGate.
	 *
	 * This software is protected as an unpublished work under the U.S. copyright
	 * laws. The above copyright notice is not intended to effect a publication of
	 * this work.
	 * This software is the confidential and proprietary information of RocketGate.
	 * Neither the binaries nor the source code may be redistributed without prior
	 * written permission from RocketGate.
	 *
	 * The software is provided "as-is" and without warranty of any kind, express, implied
	 * or otherwise, including without limitation, any warranty of merchantability or fitness
	 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
	 * special, incidental, indirect, consequential or other damages of any kind, or any damages
	 * whatsoever arising out of or in connection with the use or performance of this software,
	 * including, without limitation, damages resulting from loss of use, data or profits, and
	 * whether or not advised of the possibility of damage, regardless of the theory of liability.
	 *
	 */

//	Allocate the objects we need for the test.
//
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();

//
//	Setup the Purchase request.
//
		$request->Set(GatewayRequest::MERCHANT_ID(), $userObject->domainObject->rocketGateMerchantId);
		//$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $userObject->domainObject->rocketGateMerchantPasword);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), '62sbLZVcZhjKFuJA');

// For example/testing, we set the order id and customer as the unix timestamp as a convienent sequencing value
// appending a test name to the order id to facilitate some clarity when reviewing the tests
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->clickID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->offerArray[$offerNumber]->name);
		
		
		$request->Set(GatewayRequest::AMOUNT(), $userObject->offerArray[$offerNumber]->amount);
		$request->Set(GatewayRequest::CARDNO(), $userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $userObject->cvv2);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $userObject->offerArray[$offerNumber]->rebillAmount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $userObject->offerArray[$offerNumber]->rebillFrequency);
		$request->Set(GatewayRequest::REBILL_START(), $userObject->offerArray[$offerNumber]->rebillStart);
		
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $userObject->affID);
		
		//$request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
		//$request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
		//$request->Set(GatewayRequest::BILLING_STATE(), "NV");
		//$request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
		//$request->Set(GatewayRequest::BILLING_COUNTRY(), "US");


// Risk/Scrub Request Setting
		$request->Set(GatewayRequest::SCRUB(), $userObject->offerArray[$offerNumber]->scrub);
		$request->Set(GatewayRequest::CVV2_CHECK(), $userObject->offerArray[$offerNumber]->cvv2Check);
		$request->Set(GatewayRequest::AVS_CHECK(), $userObject->offerArray[$offerNumber]->avsCheck);

//
//	Setup test parameters in the service and
//	request.
//
		$service->SetTestMode(TRUE);

//
//	Perform the Purchase transaction.
//
		
		if ($service->PerformAuthOnly($request, $response)) {
			/*			print "PerformAuthOnly succeeded\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n";
						print "AVS: " . $response->Get(GatewayResponse::AVS_RESPONSE()) . "\n";
						print "CVV2: " . $response->Get(GatewayResponse::CVV2_CODE()) . "\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Card Issuer: " . $response->Get(GatewayResponse::CARD_ISSUER_NAME()) . "\n";
						print "Account: " . $response->Get(GatewayResponse::MERCHANT_ACCOUNT()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
			
		} else {
			/*			print "PerformAuthOnly failed\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Exception: " . $response->Get(GatewayResponse::EXCEPTION()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
		}
		
		
		print "<br>";
	}
	
	public function performPurchaseNEW(user $userObject)
	{
		
		echo_space(__METHOD__);
		/*
	 * Copyright notice:
	 * (c) Copyright 2016 RocketGate
	 * All rights reserved.
	 *
	 * The copyright notice must not be removed without specific, prior
	 * written permission from RocketGate.
	 *
	 * This software is protected as an unpublished work under the U.S. copyright
	 * laws. The above copyright notice is not intended to effect a publication of
	 * this work.
	 * This software is the confidential and proprietary information of RocketGate.
	 * Neither the binaries nor the source code may be redistributed without prior
	 * written permission from RocketGate.
	 *
	 * The software is provided "as-is" and without warranty of any kind, express, implied
	 * or otherwise, including without limitation, any warranty of merchantability or fitness
	 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
	 * special, incidental, indirect, consequential or other damages of any kind, or any damages
	 * whatsoever arising out of or in connection with the use or performance of this software,
	 * including, without limitation, damages resulting from loss of use, data or profits, and
	 * whether or not advised of the possibility of damage, regardless of the theory of liability.
	 *
	 */

//	Allocate the objects we need for the test.
//
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();


//
//	Setup the Purchase request.
//
		$request->Set(GatewayRequest::MERCHANT_ID(), $userObject->domainObject->rocketGateMerchantId);
		//$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $userObject->domainObject->rocketGateMerchantPasword);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), '62sbLZVcZhjKFuJA');

// For example/testing, we set the order id and customer as the unix timestamp as a convienent sequencing value
// appending a test name to the order id to facilitate some clarity when reviewing the tests
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->clickID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->offerObject->idoffer);
		
		
		$request->Set(GatewayRequest::AMOUNT(), $userObject->offerObject->amount);
		$request->Set(GatewayRequest::CARDNO(), $userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $userObject->cvv2);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $userObject->offerObject->rebillAmount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $userObject->offerObject->rebillFrequency);
		$request->Set(GatewayRequest::REBILL_START(), $userObject->offerObject->rebillStart);
		
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $userObject->affID);
		
		//$request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
		//$request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
		//$request->Set(GatewayRequest::BILLING_STATE(), "NV");
		//$request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
		//$request->Set(GatewayRequest::BILLING_COUNTRY(), "US");


// Risk/Scrub Request Setting
		$request->Set(GatewayRequest::SCRUB(), $userObject->offerObject->scrub);
		$request->Set(GatewayRequest::CVV2_CHECK(), $userObject->offerObject->cvv2Check);
		$request->Set(GatewayRequest::AVS_CHECK(), $userObject->offerObject->avsCheck);

//
//	Setup test parameters in the service and
//	request.
//
		$service->SetTestMode(TRUE);

//
//	Perform the Purchase transaction.
//
		
		if ($service->PerformPurchase($request, $response)) {
			/*			print "PerformPurchase succeeded\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n";
						print "AVS: " . $response->Get(GatewayResponse::AVS_RESPONSE()) . "\n";
						print "CVV2: " . $response->Get(GatewayResponse::CVV2_CODE()) . "\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Card Issuer: " . $response->Get(GatewayResponse::CARD_ISSUER_NAME()) . "\n";
						print "Account: " . $response->Get(GatewayResponse::MERCHANT_ACCOUNT()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			
			
			rocketgateResponse::insertResponseToDatabase($response);
			
			return true;
		} else {
			/*			print "PerformPurchase failed\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Exception: " . $response->Get(GatewayResponse::EXCEPTION()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
			
			return false;
		}
		
		
	}
	
	public function performAuthOnlyNEW(user $userObject)
	{
		
		/*
	 * Copyright notice:
	 * (c) Copyright 2016 RocketGate
	 * All rights reserved.
	 *
	 * The copyright notice must not be removed without specific, prior
	 * written permission from RocketGate.
	 *
	 * This software is protected as an unpublished work under the U.S. copyright
	 * laws. The above copyright notice is not intended to effect a publication of
	 * this work.
	 * This software is the confidential and proprietary information of RocketGate.
	 * Neither the binaries nor the source code may be redistributed without prior
	 * written permission from RocketGate.
	 *
	 * The software is provided "as-is" and without warranty of any kind, express, implied
	 * or otherwise, including without limitation, any warranty of merchantability or fitness
	 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
	 * special, incidental, indirect, consequential or other damages of any kind, or any damages
	 * whatsoever arising out of or in connection with the use or performance of this software,
	 * including, without limitation, damages resulting from loss of use, data or profits, and
	 * whether or not advised of the possibility of damage, regardless of the theory of liability.
	 *
	 */

//	Allocate the objects we need for the test.
//
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();

//
//	Setup the Purchase request.
//
		$request->Set(GatewayRequest::MERCHANT_ID(), $userObject->domainObject->rocketGateMerchantId);
		//$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $userObject->domainObject->rocketGateMerchantPasword);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), '62sbLZVcZhjKFuJA');

// For example/testing, we set the order id and customer as the unix timestamp as a convienent sequencing value
// appending a test name to the order id to facilitate some clarity when reviewing the tests
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->clickID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->offerObject->idoffer);
		
		
		$request->Set(GatewayRequest::AMOUNT(), $userObject->offerObject->amount);
		$request->Set(GatewayRequest::CARDNO(), $userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $userObject->cvv2);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $userObject->offerObject->rebillAmount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $userObject->offerObject->rebillFrequency);
		$request->Set(GatewayRequest::REBILL_START(), $userObject->offerObject->rebillStart);
		
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $userObject->affID);
		
		//$request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
		//$request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
		//$request->Set(GatewayRequest::BILLING_STATE(), "NV");
		//$request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
		//$request->Set(GatewayRequest::BILLING_COUNTRY(), "US");


// Risk/Scrub Request Setting
		$request->Set(GatewayRequest::SCRUB(), $userObject->offerObject->scrub);
		$request->Set(GatewayRequest::CVV2_CHECK(), $userObject->offerObject->cvv2Check);
		$request->Set(GatewayRequest::AVS_CHECK(), $userObject->offerObject->avsCheck);

//
//	Setup test parameters in the service and
//	request.
//
		$service->SetTestMode(TRUE);

//
//	Perform the Purchase transaction.
//
		
		if ($service->PerformAuthOnly($request, $response)) {
			/*			print "PerformAuthOnly succeeded\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n";
						print "AVS: " . $response->Get(GatewayResponse::AVS_RESPONSE()) . "\n";
						print "CVV2: " . $response->Get(GatewayResponse::CVV2_CODE()) . "\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Card Issuer: " . $response->Get(GatewayResponse::CARD_ISSUER_NAME()) . "\n";
						print "Account: " . $response->Get(GatewayResponse::MERCHANT_ACCOUNT()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
			
			return true;
		} else {
			/*			print "PerformAuthOnly failed\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Exception: " . $response->Get(GatewayResponse::EXCEPTION()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response->params);
			
			rocketgateResponse::insertResponseToDatabase($response);
			
			return false;
		}
		
		
	}
	
	private function setResponseFromRocketGate($response)
	{
		
		
		foreach ($response->params as $responseKey => $responseValue) {
			$this->response->$responseKey = $responseValue;
			//echo $responseKey . " ". $responseValue;
		}
		
		
	}
	
	public function process(user $userObject, offer $offerObject)
	{
		echo_space(__METHOD__);
		
		if ($offerObject->transactionType == 'Purchase') {
			if ($this->performPurchaseNEW2($userObject, $offerObject)) {
				//print_x("SUCCESS: ");
				//print_x($this->response);
				
				return true;
			} else {
				//print_x("FAIL: ");
				
				//print_x($this->response);
				
				return false;
			}
		}
		if ($offerObject->transactionType == 'AuthOnly') {
			if ($this->performAuthOnlyNEW2($userObject, $offerObject)) {
				//print_x($this->response);
				
				return true;
			} else {
				//print_x($this->response);
				
				return false;
			}
		}
		
		return false;
		
	}
	
	private function performPurchaseNEW2(user $userObject, offer $offerObject)
	{
		
		
		
		/*
	 * Copyright notice:
	 * (c) Copyright 2016 RocketGate
	 * All rights reserved.
	 *
	 * The copyright notice must not be removed without specific, prior
	 * written permission from RocketGate.
	 *
	 * This software is protected as an unpublished work under the U.S. copyright
	 * laws. The above copyright notice is not intended to effect a publication of
	 * this work.
	 * This software is the confidential and proprietary information of RocketGate.
	 * Neither the binaries nor the source code may be redistributed without prior
	 * written permission from RocketGate.
	 *
	 * The software is provided "as-is" and without warranty of any kind, express, implied
	 * or otherwise, including without limitation, any warranty of merchantability or fitness
	 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
	 * special, incidental, indirect, consequential or other damages of any kind, or any damages
	 * whatsoever arising out of or in connection with the use or performance of this software,
	 * including, without limitation, damages resulting from loss of use, data or profits, and
	 * whether or not advised of the possibility of damage, regardless of the theory of liability.
	 *
	 */

//	Allocate the objects we need for the test.
//
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();

//
//	Setup the Purchase request.
//
		$request->Set(GatewayRequest::MERCHANT_ID(), $userObject->domainObject->rocketGateMerchantId);
		//$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $userObject->domainObject->rocketGateMerchantPasword);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), '62sbLZVcZhjKFuJA');

// For example/testing, we set the order id and customer as the unix timestamp as a convienent sequencing value
// appending a test name to the order id to facilitate some clarity when reviewing the tests
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->clickID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $userObject->rocketGateCustomerID . '.' . $offerObject->idoffer);
		
		
		$request->Set(GatewayRequest::AMOUNT(), $offerObject->amount);
		$request->Set(GatewayRequest::CARDNO(), $userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $userObject->cvv2);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $offerObject->rebillAmount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $offerObject->rebillFrequency);
		$request->Set(GatewayRequest::REBILL_START(), $offerObject->rebillStart);
		
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $userObject->affID);
		
		//$request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
		//$request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
		//$request->Set(GatewayRequest::BILLING_STATE(), "NV");
		//$request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
		//$request->Set(GatewayRequest::BILLING_COUNTRY(), "US");


// Risk/Scrub Request Setting
		$request->Set(GatewayRequest::SCRUB(), $offerObject->scrub);
		$request->Set(GatewayRequest::CVV2_CHECK(), $offerObject->cvv2Check);
		$request->Set(GatewayRequest::AVS_CHECK(), $offerObject->avsCheck);

//
//	Setup test parameters in the service and
//	request.
//
		$service->SetTestMode(true);

//
//	Perform the Purchase transaction.
//
		
		if ($service->PerformPurchase($request, $response)) {
			/*			print "PerformPurchase succeeded\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n";
						print "AVS: " . $response->Get(GatewayResponse::AVS_RESPONSE()) . "\n";
						print "CVV2: " . $response->Get(GatewayResponse::CVV2_CODE()) . "\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Card Issuer: " . $response->Get(GatewayResponse::CARD_ISSUER_NAME()) . "\n";
						print "Account: " . $response->Get(GatewayResponse::MERCHANT_ACCOUNT()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			
			
			rocketgateResponse::insertResponseToDatabase($response);
			echo_space(__METHOD__ . " ----TRUE");
			return true;
		} else {
			/*			print "PerformPurchase failed\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Exception: " . $response->Get(GatewayResponse::EXCEPTION()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
			echo_space(__METHOD__ . " ----FALSE");
			return false;
		}
		
		
	}
	
	private function performAuthOnlyNEW2(user $userObject, offer $offerObject)
	{
		echo_space(__METHOD__);
		
		
		/*
	 * Copyright notice:
	 * (c) Copyright 2016 RocketGate
	 * All rights reserved.
	 *
	 * The copyright notice must not be removed without specific, prior
	 * written permission from RocketGate.
	 *
	 * This software is protected as an unpublished work under the U.S. copyright
	 * laws. The above copyright notice is not intended to effect a publication of
	 * this work.
	 * This software is the confidential and proprietary information of RocketGate.
	 * Neither the binaries nor the source code may be redistributed without prior
	 * written permission from RocketGate.
	 *
	 * The software is provided "as-is" and without warranty of any kind, express, implied
	 * or otherwise, including without limitation, any warranty of merchantability or fitness
	 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
	 * special, incidental, indirect, consequential or other damages of any kind, or any damages
	 * whatsoever arising out of or in connection with the use or performance of this software,
	 * including, without limitation, damages resulting from loss of use, data or profits, and
	 * whether or not advised of the possibility of damage, regardless of the theory of liability.
	 *
	 */

//	Allocate the objects we need for the test.
//
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();

//
//	Setup the Purchase request.
//
		$request->Set(GatewayRequest::MERCHANT_ID(), $userObject->domainObject->rocketGateMerchantId);
		//$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $userObject->domainObject->rocketGateMerchantPasword);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), '62sbLZVcZhjKFuJA');

// For example/testing, we set the order id and customer as the unix timestamp as a convienent sequencing value
// appending a test name to the order id to facilitate some clarity when reviewing the tests
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $userObject->rocketGateCustomerID . '.' . $userObject->clickID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $userObject->rocketGateCustomerID . '.' . $offerObject->idoffer);
		
		
		$request->Set(GatewayRequest::AMOUNT(), $offerObject->amount);
		$request->Set(GatewayRequest::CARDNO(), $userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $userObject->cvv2);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $offerObject->rebillAmount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $offerObject->rebillFrequency);
		$request->Set(GatewayRequest::REBILL_START(), $offerObject->rebillStart);
		
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $userObject->affID);
		
		//$request->Set(GatewayRequest::BILLING_ADDRESS(), "123 Main St");
		//$request->Set(GatewayRequest::BILLING_CITY(), "Las Vegas");
		//$request->Set(GatewayRequest::BILLING_STATE(), "NV");
		//$request->Set(GatewayRequest::BILLING_ZIPCODE(), "89141");
		//$request->Set(GatewayRequest::BILLING_COUNTRY(), "US");


// Risk/Scrub Request Setting
		$request->Set(GatewayRequest::SCRUB(), $offerObject->scrub);
		$request->Set(GatewayRequest::CVV2_CHECK(), $offerObject->cvv2Check);
		$request->Set(GatewayRequest::AVS_CHECK(), $offerObject->avsCheck);

//
//	Setup test parameters in the service and
//	request.
//
		$service->SetTestMode(TRUE);

//
//	Perform the Purchase transaction.
//
		
		if ($service->PerformAuthOnly($request, $response)) {
			/*			print "PerformPurchase succeeded\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n";
						print "AVS: " . $response->Get(GatewayResponse::AVS_RESPONSE()) . "\n";
						print "CVV2: " . $response->Get(GatewayResponse::CVV2_CODE()) . "\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Card Issuer: " . $response->Get(GatewayResponse::CARD_ISSUER_NAME()) . "\n";
						print "Account: " . $response->Get(GatewayResponse::MERCHANT_ACCOUNT()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			
			
			rocketgateResponse::insertResponseToDatabase($response);
			
			return true;
		} else {
			/*			print "PerformPurchase failed\n";
						print "GUID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n";
						print "Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n";
						print "Reason Code: " . $response->Get(GatewayResponse::REASON_CODE()) . "\n";
						print "Exception: " . $response->Get(GatewayResponse::EXCEPTION()) . "\n";
						print "Scrub: " . $response->Get(GatewayResponse::SCRUB_RESULTS()) . "\n";*/
			$this->setResponseFromRocketGate($response);
			rocketgateResponse::insertResponseToDatabase($response);
			
			return false;
		}
		
		
	}
	
	public function processNEW(user $userObject)
	{
		
		
		if ($userObject->offerObject->transactionType == 'Purchase') {
			if ($this->performPurchaseNEW($userObject)) {
				return true;
			}
		}
		if ($userObject->offerObject->transactionType == 'AuthOnly') {
			if ($this->performAuthOnlyNEW($userObject)) {
				return true;
			}
		}
		
		return false;
		
	}
}





