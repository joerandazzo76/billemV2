<?php
/*
* =======================================================================
* CLASSNAME:        offer
* DATE CREATED:      09-01-2018
* FOR TABLE:          offer
* FOR DATA BASE:    billemV2
* IMPORTANT:
* the 'sanitize()' keyword is a defined function to prevent sql injection located @ lib/functions.php
* 'post()' is also defined function located @ lib/funtions.php
* You can further improve these functions if necessary.
* =======================================================================
*/

//Begin class
class offer
{
	public $idoffer;
	public $name;
	public $amount;
	public $rebillStart;
	public $rebillAmount;
	public $rebillFrequency;
	public $transactionType;
	public $var1;
	public $var2;
	public $var3;
	public $postbackSuccess;
	public $postbackFail;
	public $package_idpackage;
	public $scrub;
	public $cvv2Check;
	public $avsCheck;
	public $makePurchase;
	//public  $offerArray;
	//private $rocketGate;
	public $offerStatus = array();
	public $timestamp;
	public $response;
	
	// Table Columns
	//(idoffer,name,amount,rebillStart,rebillAmount,rebillFrequency,transactionType,var1,var2,var3,postbackSuccess,postbackFail,package_idpackage,timestamp,scrub,cvv2Check,avsCheck,makePurchase)
	// Table Prepare Columns
	//(:idoffer,:name,:amount,:rebillStart,:rebillAmount,:rebillFrequency,:transactionType,:var1,:var2,:var3,:postbackSuccess,:postbackFail,:package_idpackage,:timestamp,:scrub,:cvv2Check,:avsCheck,:makePurchase)
	
	//Constructor
	public function __construct(
		$idoffer = '',
		$name = '',
		$amount = '',
		$rebillStart = '',
		$rebillAmount = '',
		$rebillFrequency = '',
		$transactionType = '',
		$var1 = '',
		$var2 = '',
		$var3 = '',
		$postbackSuccess = '',
		$postbackFail = '',
		$package_idpackage = '',
		
		$scrub = '',
		$cvv2Check = '',
		$avsCheck = '',
		$userObject = '',
		$makePurchase = '',
		$offerStatus = '',
		$response = ''
	
	)
	{
		$this->offerStatus = $offerStatus;
		$this->response    = new rocketgateresponse();
		
		//$this->setOfferDetails($offerArray);
		
	}
	
	public function getIT($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE package_idpackage=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return ($stmt->fetch(PDO::FETCH_OBJ));
		
	}
	
	public static function getOfferByPackageId($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE package_idpackage=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return ($stmt->fetch(PDO::FETCH_OBJ));
		
	}
	
	public static function getOfferARRAYByPackageId($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE package_idpackage=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return ($stmt->fetchAll(PDO::FETCH_ASSOC));
		
	}
	
	public function SelectAll()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT * FROM offer");
		
		return $record->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function select_all()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function get_count()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT COUNT(*) FROM offer ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
	
	public function get_column_names()
	{
		$db   = DB::getInstance();
		$rows = $db->query("SELECT * FROM offer LIMIT 1");
		for ($i = 0; $i < $rows->columnCount(); $i++) {
			$column    = $rows->getColumnMeta($i);
			$columns[] = $column ['name'];
		}
		
		return $columns;
	}
	
	public function SelectOne($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE idoffer=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function Delete($id)
	{
		$dbc = new dboptions();
		$dbc->dbDelete('offer', 'idoffer', $id);
	}
	
	public function Insert($redirect_to)
	{
		$dbc = new dboptions();
		
		$submit = post('button');
		if ($submit) {
			
			$this->idoffer = "";
			$values        =
				array(array('name'              => post('name'), 'amount' => post('amount'),
							'rebillStart'       => post('rebillStart'), 'rebillAmount' => post('rebillAmount'),
							'rebillFrequency'   => post('rebillFrequency'),
							'transactionType'   => post('transactionType'),
							'var1'              => post('var1'),
							'var2'              => post('var2'),
							'var3'              => post('var3'),
							'postbackSuccess'   => post('postbackSuccess'),
							'postbackFail'      => post('postbackFail'),
							'package_idpackage' => post('package_idpackage'),
							'cvv2Check'         => post('cvv2Check'),
							'avsCheck'          => post('avsCheck'),
							'makePurchase'      => post('makePurchase')));
			
			$dbc->dbInsert('offer', $values);
			send_to($redirect_to);
		}
	}
	
	public function Update($redirect_to)
	{
		$id                      = post('idoffer');
		$this->name              = post('name');
		$this->amount            = post('amount');
		$this->rebillStart       = post('rebillStart');
		$this->rebillAmount      = post('rebillAmount');
		$this->rebillFrequency   = post('rebillFrequency');
		$this->transactionType   = post('transactionType');
		$this->var1              = post('var1');
		$this->var2              = post('var2');
		$this->var3              = post('var3');
		$this->postbackSuccess   = post('postbackSuccess');
		$this->postbackFail      = post('postbackFail');
		$this->package_idpackage = post('package_idpackage');
		$this->scrub             = post('scrub');
		$this->cvv2Check         = post('cvv2Check');
		$this->avsCheck          = post('avsCheck');
		$this->makePurchase      = post('makePurchase');
		
		$submit = post('button');
		if ($submit) {
			
			$db   = DB::getInstance();
			$sql  =
				" UPDATE offer SET  name ='$this->name',amount ='$this->amount',rebillStart ='$this->rebillStart',rebillAmount ='$this->rebillAmount',rebillFrequency ='$this->rebillFrequency',transactionType ='$this->transactionType',var1 ='$this->var1',var2 ='$this->var2',var3 ='$this->var3',postbackSuccess ='$this->postbackSuccess',postbackFail ='$this->postbackFail',package_idpackage ='$this->package_idpackage',scrub ='$this->scrub',cvv2Check ='$this->cvv2Check',avsCheck ='$this->avsCheck',makePurchase ='$this->makePurchase' WHERE idoffer = :id ";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function insert_new($redirect_to)
	{
		
		$this->name              = post('name');
		$this->amount            = post('amount');
		$this->rebillStart       = post('rebillStart');
		$this->rebillAmount      = post('rebillAmount');
		$this->rebillFrequency   = post('rebillFrequency');
		$this->transactionType   = post('transactionType');
		$this->var1              = post('var1');
		$this->var2              = post('var2');
		$this->var3              = post('var3');
		$this->postbackSuccess   = post('postbackSuccess');
		$this->postbackFail      = post('postbackFail');
		$this->package_idpackage = post('package_idpackage');
		$this->timestamp         = post('timestamp');
		$this->scrub             = post('scrub');
		$this->cvv2Check         = post('cvv2Check');
		$this->avsCheck          = post('avsCheck');
		$this->makePurchase      = post('makePurchase');
		
		$submit = post('button');
		if ($submit) {
			
			$db = DB::getInstance();
			
			$sql  = " INSERT INTO offer (
name,amount,rebillStart,rebillAmount,rebillFrequency,transactionType,var1,var2,var3,postbackSuccess,postbackFail,package_idpackage,timestamp,scrub,cvv2Check,avsCheck,makePurchase
) VALUES (
:name,:amount,:rebillStart,:rebillAmount,:rebillFrequency,:transactionType,:var1,:var2,:var3,:postbackSuccess,:postbackFail,:package_idpackage,:timestamp,:scrub,:cvv2Check,:avsCheck,:makePurchase
)";
			$stmt = $db->prepare($sql);
			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":amount", $amount);
			$stmt->bindparam(":rebillStart", $rebillStart);
			$stmt->bindparam(":rebillAmount", $rebillAmount);
			$stmt->bindparam(":rebillFrequency", $rebillFrequency);
			$stmt->bindparam(":transactionType", $transactionType);
			$stmt->bindparam(":var1", $var1);
			$stmt->bindparam(":var2", $var2);
			$stmt->bindparam(":var3", $var3);
			$stmt->bindparam(":postbackSuccess", $postbackSuccess);
			$stmt->bindparam(":postbackFail", $postbackFail);
			$stmt->bindparam(":package_idpackage", $package_idpackage);
			$stmt->bindparam(":timestamp", $timestamp);
			$stmt->bindparam(":scrub", $scrub);
			$stmt->bindparam(":cvv2Check", $cvv2Check);
			$stmt->bindparam(":avsCheck", $avsCheck);
			$stmt->bindparam(":makePurchase", $makePurchase);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function setUser(user $userObject)
	{
		$this->userObject = $userObject;
		
	}
	
	public function processPayment(user $userObject)
	{
		$this->userObject = $userObject;
		print_x("PROCESS PAYMENT FOR OFFER CODE GOES HERE...");
		print_x($this->userObject);
		//////////////////////////////////////
		//	Allocate the objects
		//////////////////////////////////////
		
		$request  = new GatewayRequest();
		$response = new GatewayResponse();
		$service  = new GatewayService();
		
		//////////////////////////////////////
		//	Setup the Purchase request
		//  FOR Live SITE .
		//////////////////////////////////////
		
		$request->Set(GatewayRequest::MERCHANT_ID(), $this);
		$request->Set(GatewayRequest::MERCHANT_PASSWORD(), $this->userObject->domainObject->domainDetails->rocketGateMerchantPasword);
		
		$request->Set(GatewayRequest::MERCHANT_CUSTOMER_ID(), $this->userObject->rocketGateCustomerID);
		$request->Set(GatewayRequest::MERCHANT_INVOICE_ID(), $this->userObject->rocketGateCustomerID . '.Live');
		$request->Set(GatewayRequest::USERNAME(), $this->userObject->userName);
		$request->Set(GatewayRequest::CUSTOMER_PASSWORD(), $this->userObject->password);
		
		
		$request->Set(GatewayRequest::CARDNO(), $this->userObject->cardNumber);
		$request->Set(GatewayRequest::EXPIRE_MONTH(), $this->userObject->expMonth);
		$request->Set(GatewayRequest::EXPIRE_YEAR(), $this->userObject->expYear);
		$request->Set(GatewayRequest::CVV2(), $this->userObject->cvv2);
		
		$request->Set(GatewayRequest::CUSTOMER_FIRSTNAME(), $this->userObject->firstName);
		$request->Set(GatewayRequest::CUSTOMER_LASTNAME(), $this->userObject->lastName);
		$request->Set(GatewayRequest::EMAIL(), $this->userObject->email);
		$request->Set(GatewayRequest::IPADDRESS(), $this->userObject->ipAddress);
		
		$request->Set(GatewayRequest::AFFILIATE(), $this->userObject->affID);
		$request->Set(GatewayRequest::UDF01(), $this->userObject->udf1);
		$request->Set(GatewayRequest::UDF02(), $this->userObject->udf2);
		$request->Set(GatewayRequest::MERCHANT_PRODUCT_ID(), $this->userObject->productID);
		
		$request->Set(GatewayRequest::CURRENCY(), "USD");
		
		//////////////////////////////////////
		// Risk/Scrub Request Setting
		//////////////////////////////////////
		
		$request->Set(GatewayRequest::SCRUB(), "ON");
		$request->Set(GatewayRequest::CVV2_CHECK(), "ON");
		$request->Set(GatewayRequest::AVS_CHECK(), "IGNORE");
		
		//////////////////////////////////////
		// Set transaction amount and frequency
		//////////////////////////////////////
		
		$request->Set(GatewayRequest::MERCHANT_SITE_ID(), $this->merchant_site_id);
		$request->Set(GatewayRequest::AMOUNT(), $this->amount);
		$request->Set(GatewayRequest::REBILL_START(), $this->rebill_start);
		$request->Set(GatewayRequest::REBILL_AMOUNT(), $this->rebill_amount);
		$request->Set(GatewayRequest::REBILL_FREQUENCY(), $this->rebill_frequency);
		
		//////////////////////////////////////
		//	Setup test parameters in the service and request.
		//////////////////////////////////////
		
		$service->SetTestMode(false);
		
		
		if ($service->PerformAuthOnly($request, $response)) {
			
			//      If the ROCKETGATE request succeeded, output the response. //
			print_x("Transaction succeeded" . "\n" .
				"Response Code: " . $response->Get(GatewayResponse::RESPONSE_CODE()) . "\n" .
				"Auth No: " . $response->Get(GatewayResponse::AUTH_NO()) . "\n" .
				"TransactID: " . $response->Get(GatewayResponse::TRANSACT_ID()) . "\n" .
				"Customer ID: " . $response->Get(GatewayResponse::MERCHANT_CUSTOMER_ID()) . "\n" .
				"Card Hash: " . $response->Get(GatewayResponse::CARD_HASH()) . "\n" .
				"Amount: $" . $this->amount . "\n"
			);
			
			
			$this->referredCustomerID = $response->Get(GatewayResponse::MERCHANT_CUSTOMER_ID());
			$this->cardHash           = $response->Get(GatewayResponse::CARD_HASH());
			$this->transactID         = $response->Get(GatewayResponse::TRANSACT_ID());
			$this->invoiceId          = $response->Get(GatewayResponse::MERCHANT_INVOICE_ID());
			$this->custId             = $response->Get(GatewayResponse::MERCHANT_CUSTOMER_ID());
			
			
			return true;
			
			
		} else {
			
			return false;
		}
		
	}
	
	public function processResponse()
	{
		print_x("PROCESS RESPONSE FOR OFFER CODE GOES HERE...");
	}
	
	public function processPostback($postback)
	{
		
		echo_space("PROCESS POSTBACK FOR OFFER CODE GOES HERE...");
		$this->processOFFERPOSTBACKNEW($postback);
	}
	
	public function processOFFERPOSTBACKNEW($postback)
	{
		echo_space($postback);
		$postBackArray  = explode('::', $postback);
		$postBackClass  = $postBackArray[0];
		$postBackMethod = $postBackArray[1];
		//echo "$postBackClass::$postBackMethod";
		$postBackClass::$postBackMethod();
		
		
	}
	
	public function processlog()
	{
		print_x("PROCESS LOG FOR OFFER CODE GOES HERE...");
	}
	
	public function getOffersByDomainId($iddomain)
	{
		
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE domain_iddomain=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $iddomain, PDO::PARAM_INT);
		$stmt->execute();
		
		$this->setOfferDetails($stmt->fetch(pdo::FETCH_OBJ));
	}
	
	public function getOfferDetailsByPackageId($idpackage)
	{
		
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE package_idpackage=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $idpackage, PDO::PARAM_INT);
		$stmt->execute();
		
		$this->offerArray = $stmt->fetch(PDO::FETCH_OBJ);
		
		
	}
	
	public function setOfferDetails($offerId)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE idoffer=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $offerId, PDO::PARAM_INT);
		$stmt->execute();
		
		//$this->setOfferDetailsToOffer($stmt->fetch(PDO::FETCH_OBJ));
		$this->setOfferDetailsToOffer($stmt->fetch(PDO::FETCH_OBJ));
		
	}
	
	private function setOfferDetailsToOffer($offerObject)
	{
		
		foreach ($offerObject as $offerKey => $offerValue) {
			$this->$offerKey                   = $offerValue;
			
		}
		//$_SESSION['offerClass'][$offerKey] = $this;
	}
	
	public static function getOfferCountByIdPackage($idpackage)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT COUNT(*) FROM offer WHERE package_idpackage=$idpackage";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
	
	public static function process(user $userObject)
	{
		
		print_x("PROCESSING OFFER...");
		
		
		print_x("PROCESSING DONE...");
	}
	
	public static function getOfferIdsOfAllOffersInPackage($idpackage)
	{
		
		
		$db   = DB::getInstance();
		$sql  = "SELECT `idoffer` FROM offer WHERE package_idpackage=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $idpackage, PDO::FETCH_ASSOC);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_OBJ);
		
		
	}
	
	public static function getOfferById($id = '')
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM offer WHERE idoffer=:id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function processOffersNEW($offerArray, domain $domainObject)
	{
		foreach ($offerArray as $offerKey => $offerObject) {
			
			$this->setOfferDetailsToOffer($offerObject);
			
		}
		
	}
	
	public function processViaRocketGate(user $userObject)
	{
		
		
		$rocketGate = new rocketgate();
		$rocketGate->processNEW($userObject);
		$this->response = $rocketGate->response;
		if ($this->response->authNo != '') {
			$this->offerStatus = $rocketGate->response;
			$this->processPostback($userObject->offerObject->postbackSuccess);
			
		} else {
			$this->offerStatus = $rocketGate->response;
			$this->processPostback($userObject->offerObject->postbackSuccess);
			
		}
		
	}
	
	
	//-------------------------------------------------------------------
	// KEEP FOR LATER USE
	//-------------------------------------------------------------------
	
	private function processOfferNEW(user $userObject, offer $offerObject, domain $domainObject)
	{
		
		$this->rocketGate = new rocketgate();
		if ($this->rocketGate->processNEW($userObject, $offerObject, $domainObject)) {
			$this->response = $this->rocketGate->response;
			
			return true;
		} else {
			return false;
		}
		
	}
	
	private function setOfferArray($fetchAll)
	{
		print $fetchAll;
	}
}

?>
    
    