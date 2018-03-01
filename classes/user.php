<?php

use \Curl\Curl;

/*
* =======================================================================
* CLASSNAME:        user
* DATE CREATED:      09-01-2018
* FOR TABLE:          user
* FOR DATA BASE:    billemV2
* IMPORTANT:
* the 'sanitize()' keyword is a defined function to prevent sql injection located @ lib/functions.php
* 'post()' is also defined function located @ lib/funtions.php
* You can further improve these functions if necessary.
* =======================================================================
*/


class user
{
	public  $iduser;
	public  $email;
	public  $userName;
	public  $password;
	public  $firstName;
	public  $lastName;
	public  $cardHash;
	public  $cardNumber;
	public  $expMonth;
	public  $expYear;
	public  $cvv2;
	public  $firstSix;
	public  $lastFour;
	public  $clickID;
	public  $affID;
	public  $rocketGateCustomerID;
	public  $ipAddress;
	public  $domainObject;
	public  $packageObject;
	public  $offerArray    = array();
	public  $packageId;
	public  $validPassword = false;
	public  $validateObject;
	public  $password1;
	public  $password2;
	public  $cardhash;
	public  $merchantInvoiceID;
	public  $autoLoginURL;
	private $testId;
//public $offerObject;
//public  $processObject;
//public  $responseFromRocketGateObject = array();
//private $rocketGateObject = array();
//public $reponseArray;
//public $processPackageObject;


//Constructor7
	public function __construct()
	{
		
		$this->iduser               = (isset($_SESSION['user']->iduser) ? $_SESSION['user']->iduser : '');
		$this->firstName            = (isset($_SESSION['user']->firstName) ? $_SESSION['user']->firstName : '');
		$this->lastName             = (isset($_SESSION['user']->lastName) ? $_SESSION['user']->lastName : '');
		$this->cardHash             = (isset($_SESSION['user']->cardHash) ? $_SESSION['user']->cardHash : '');
		$this->cardNumber           = (isset($_SESSION['user']->cardNo) ? $_SESSION['user']->cardNo : '');
		$this->cvv2                 = (isset($_SESSION['user']->cvv2) ? $_SESSION['user']->cvv2 : '');
		$this->expMonth             = (isset($_SESSION['user']->expMonth) ? $_SESSION['user']->expMonth : '');
		$this->expYear              = (isset($_SESSION['user']->expYear) ? $_SESSION['user']->expYear : '');
		$this->email                = (isset($_SESSION['user']->email) ? $_SESSION['user']->email : '');
		$this->userName             = (isset($_SESSION['user']->userName) ? $_SESSION['user']->userName : '');
		$this->password             = (isset($_SESSION['user']->password) ? $_SESSION['user']->password : '');
		$this->email                = (isset($_SESSION['user']->email) ? $_SESSION['user']->email : '');
		$this->ipAddress            = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
		$this->firstSix             = '';
		$this->lastFour             = '';
		$this->rocketGateCustomerID = time();
		$this->clickID              = (isset($_SESSION['user']->clickID) ? $_SESSION['user']->clickID : '');
		$this->affID                = (isset($_SESSION['user']->affID) ? $_SESSION['user']->affID : '');
		$this->packageId            = (isset($_SESSION['user']->packageId) ? $_SESSION['user']->packageId : '1');
		$this->validPassword        = (isset($_SESSION['user']->validPassword) ? $_SESSION['user']->validPassword : false);
		$this->autoLoginURL         = (isset($_SESSION['user']->autoLoginURL) ? $_SESSION['user']->autoLoginURL : '');
		$this->cardNumber           = '';
		
		$this->setGetVariables();
		$this->setDomainDetails();
		$this->setPackageDetails();
		$this->setOfferArray();
		
		
	}
	
	public static function getClickId()
	{
		if (isset($_SESSION['user']->clickID)) {
			return $_SESSION['user']->clickID;
		} else {
			return '';
		}
		
	}
	
	public function setAdditionalUserInfo($data)
	{
		
		
		//$this->email      = $data['email'];
		//$this->userName   = $data['userName'];
		//$this->password   = $data['password'];
		$this->firstName  = $data['firstName'];
		$this->lastName   = $data['lastName'];
		$this->expMonth   = $data['expMonth'];
		$this->expYear    = $data['expYear'];
		$this->cvv2       = $data['cvv2'];
		$this->cardNumber = $data['cardNumber'];
		$this->firstSix   = substr($this->cardNumber, 0, 5);
		$this->lastFour   = substr($this->cardNumber, -4, 4);
		$this->setSession();
		
		
	}
	
	public function validate()
	{
		
		$this->validateObject = new Validate();
		$this->validateObject->password($this->password1, $this->password2);
		$this->validateObject->DatingUserame($this->userName);
		$this->validateObject->DatingEmail($this->email);
		
		if ($this->validateObject->validPassword == true && $this->validateObject->validUsername == true && $this->validateObject->validEmail == true) {
			$this->password = $this->password1;
			
			//$this->setCookie("session_timer", 60 * 5); // NOT IN USE KEEP FOR LATER IMPLIMATION
			
			return true;
		} else {
			return false;
		}
	}
	
	public function setUserPrelanderData()
	{
		
		$this->userName  = $_POST['username'];
		$this->email     = $_POST['email'];
		$this->password1 = $_POST['password1'];
		$this->password2 = $_POST['password2'];
		
		
	}
	
	public function SelectAll()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT * FROM user");
		
		return $record->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function select_all()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM user ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function get_count()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT COUNT(*) FROM user ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
	
	public function get_column_names()
	{
		$db   = DB::getInstance();
		$rows = $db->query("SELECT * FROM user LIMIT 1");
		for ($i = 0; $i < $rows->columnCount(); $i++) {
			$column    = $rows->getColumnMeta($i);
			$columns[] = $column ['name'];
		}
		
		return $columns;
	}
	
	public function SelectOne($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM user WHERE iduser=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function Delete($id)
	{
		$dbc = new dboptions();
		$dbc->dbDelete('user', 'iduser', $id);
	}
	
	public function Insert($redirect_to)
	{
		$dbc = new dboptions();
		
		$submit = post('button');
		if ($submit) {
			
			$this->iduser = "";
			$values       = array(array('firstName'            => post('firstName'), 'lastName' => post('lastName'),
										'cardHash'             => post('cardHash'), 'expMonth' => post('expMonth'),
										'expYear'              => post('expYear'), 'email' => post('email'),
										'userName'             => post('userName'), 'password' => post('password'),
										'ipAddress'            => post('ipAddress'), 'firstSix' => post('firstSix'),
										'lastFour'             => post('lastFour'),
										'rocketGateCustomerID' => post('rocketGateCustomerID'),
										'clickID'              => post('clickID'), 'affID' => post('affID'),
										'domain_iddomain'      => post('domain_iddomain')));
			$dbc->dbInsert('user', $values);
			send_to($redirect_to);
		}
	}
	
	public function Update($redirect_to)
	{
		$id                         = post('iduser');
		$this->firstName            = post('firstName');
		$this->lastName             = post('lastName');
		$this->cardHash             = post('cardHash');
		$this->expMonth             = post('expMonth');
		$this->expYear              = post('expYear');
		$this->email                = post('email');
		$this->userName             = post('userName');
		$this->password             = post('password');
		$this->ipAddress            = post('ipAddress');
		$this->firstSix             = post('firstSix');
		$this->lastFour             = post('lastFour');
		$this->rocketGateCustomerID = post('rocketGateCustomerID');
		$this->clickID              = post('clickID');
		$this->affID                = post('affID');
		$this->domain_iddomain      = post('domain_iddomain');
		
		$submit = post('button');
		if ($submit) {
			
			$db   = DB::getInstance();
			$sql  =
				" UPDATE user SET  firstName ='$this->firstName',lastName ='$this->lastName',cardHash ='$this->cardHash',expMonth ='$this->expMonth',expYear ='$this->expYear',email ='$this->email',userName ='$this->userName',password ='$this->password',ipAddress ='$this->ipAddress',firstSix ='$this->firstSix',lastFour ='$this->lastFour',rocketGateCustomerID ='$this->rocketGateCustomerID',clickID ='$this->clickID',affID ='$this->affID',domain_iddomain ='$this->domain_iddomain' WHERE iduser = :id ";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function insert_new($redirect_to)
	{
		
		$this->firstName            = post('firstName');
		$this->lastName             = post('lastName');
		$this->cardHash             = post('cardHash');
		$this->expMonth             = post('expMonth');
		$this->expYear              = post('expYear');
		$this->email                = post('email');
		$this->userName             = post('userName');
		$this->password             = post('password');
		$this->ipAddress            = post('ipAddress');
		$this->firstSix             = post('firstSix');
		$this->lastFour             = post('lastFour');
		$this->rocketGateCustomerID = post('rocketGateCustomerID');
		$this->clickID              = post('clickID');
		$this->affID                = post('affID');
		
		$this->domain_iddomain = post('domain_iddomain');
		
		$submit = post('button');
		if ($submit) {
			
			$db = DB::getInstance();
			
			$sql  = "INSERT INTO user (
firstName,lastName,cardHash,expMonth,expYear,email,userName,password,ipAddress,firstSix,lastFour,rocketGateCustomerID,clickID,affID,domain_iddomain
) VALUES (
:firstName,:lastName,:cardHash,:expMonth,:expYear,:email,:userName,:password,:ipAddress,:firstSix,:lastFour,:rocketGateCustomerID,:clickID,:affID,:domain_iddomain
)";
			$stmt = $db->prepare($sql);
			$stmt->bindparam(":firstName", $firstName);
			$stmt->bindparam(":lastName", $lastName);
			$stmt->bindparam(":cardHash", $cardHash);
			$stmt->bindparam(":expMonth", $expMonth);
			$stmt->bindparam(":expYear", $expYear);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":userName", $userName);
			$stmt->bindparam(":password", $password);
			$stmt->bindparam(":ipAddress", $ipAddress);
			$stmt->bindparam(":firstSix", $firstSix);
			$stmt->bindparam(":lastFour", $lastFour);
			$stmt->bindparam(":rocketGateCustomerID", $rocketGateCustomerID);
			$stmt->bindparam(":clickID", $clickID);
			$stmt->bindparam(":affID", $affID);
			$stmt->bindparam(":domain_iddomain", $domain_iddomain);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function setObjects()
	{
		$this->constantsObject = new Constants();
		$this->constantsObject->saveConstants();
	}
	
	public function setGetVariables()
	{
		if (isset($_GET['clickid'])) {
			$this->clickID = $_GET['clickid'];
		}
		if (isset($_GET['affid'])) {
			$this->affID = $_GET['affid'];
		}
		if (isset($_GET['pid'])) {
			$this->packageId = $_GET['pid'];
		}
		
		
	}
	
	public function setGetVariablesTEST()
	{
		$this->testId = "test" . count::next();
		$this->clickID = $this->testId;
		$this->affID   = $this->testId;
		
		if (isset($_GET['pid'])) {
			$this->packageId = $_GET['pid'];
		} else {
			$this->packageId = '1';
		}
		
		
	}
	
	public function getPackageDetails()
	{
		$this->packageObject = new package();
		$this->packageObject->getPackageDetails($this->package);
	}
	
	public function setSession()
	{
		$_SESSION['user'] = $this;
		echo "Session variables are set.";
	}
	
	public function setDomainDetails()
	{
		$this->domainObject = new domain();
		$this->domainObject->handelDomain();
	}
	
	public function setPackageDetails()
	{
		$this->packageObject = new package();
		$this->packageObject->getPackageDetailsByPackageId($this->packageId);
	}
	
	public function fakeUser($redirect = '')
	{
		$_SESSION['user']->userName  = "tempUserName" . rand(1, 1000000);
		$_SESSION['user']->password  = "11111ff11";
		$_SESSION['user']->email     = "fakeEmail" . rand(1, 1000000) . "@fake.com";
		$_SESSION['user']->packageId = $this->packageId;
		$this->validPassword         = true;
		
		send_to($redirect);
		
		
	}
	
	public function setOfferDetails()
	{
		$this->offerObject = new offer();
		$this->offerObject->getOfferDetailsByPackageId($this->packageId);
		
	}
	
	public function setOfferArray()
	{
		
		$this->offerArray = array();
		
		//TODO rewrite
		foreach (offer::getOfferIdsOfAllOffersInPackage($this->packageId) as $offerKey => $offerValue) {
			
			$this->offerArray[$offerKey] = (object)[];
			$this->offerArray[$offerKey] = new offer();
			$this->offerArray[$offerKey]->setOfferDetails($offerValue->idoffer);
			//$this->offerArray[0]->getOfferDetailsByPackageId($offerValue->idoffer);
			//$this->offerArray[$offerKey]              = offer::getOfferById($offerValue->idoffer);
			$this->offerArray[$offerKey]->response = new rocketgateresponse();
			//$this->offerArray[$offerKey]->offerObject->offerStatus = '';
			//$this->offerArray[$offerKey]->offerObject->response = '';
		}
		
		
	}
	
	public function setOfferObject()
	{
		$this->offerObject = new offer();
		$this->offerObject->getOfferDetailsByPackageId($this->packageObject->idpackage);
	}
	
	public function checkIfVarified()
	{
		//TODO rewrite
		if ($this->password == '') {
			send_to('/prelander.php');
			return false;
		}else{
			return true;
		}
		
	}
	
	public function processOffers()
	{
		
		$this->processObject = new processor($this);
		
		
	}
	
	public function validateUser($userData)
	{
		if (user::vaildatePassword($userData['password'], $userData['password2'])) {
			$this->setUserVarified('index.php');
		}
		
		
		//$validate = new Validate($userData);
		//if ($validate->validateDating()) {
		//	$this->setUserVarified('index.php');
		//};
		
		
	}
	
	public function processPackage(package $packageObject)
	{
		echo_space(__METHOD__);
		$this->packageObject = new package();
		$this->packageObject->process($packageObject);
		
		
	}
	
	public function processOffersNEW()
	{
		$offer = new offer();
		$offer->processOffersNEW($this, $this->offerArray, $this->domainObject);
		$package = new package();
		$package->processPackageNEW($this->packageObject, $this->clickID);
		
	}
	
	public function process()
	{
		
		$this->offerArray = offer::getOfferARRAYByPackageId($this->packageId);
		//print_x($this->offerArray);
		
		foreach (offer::getOfferIdsOfAllOffersInPackage($this->packageId) as $offerId) {
			$this->offerObject = new offer;
			$this->offerObject->setOfferDetails($offerId->idoffer);
			$this->offerObject->processViaRocketGate($this);
			$this->packageObject->offerStatusArray[$offerId->idoffer] = $this->offerObject->offerStatus;
			$_SESSION['packageObject'][$offerId->idoffer]             = $this->offerObject->offerStatus;
			//$this->prcessOfferViaRocketGate($this);
			
		}
		
		//$this->packageObject->offerStatusArray[1] = "Fail";
		
		$this->processPackage($this->packageObject);
		$this->setSession();
		
		//$this->offerArray = offer::getOfferARRAYByPackageId($this->packageId);
		//$this->offerArray->processOffersNEW($this->offerArray, $this->domainObject);
		//$package = new package();
		//$package->processPackageNEW($this->packageObject, $this->clickID);
		
	}
	
	public function processUser()
	{
		echo_space(__METHOD__);
		
		foreach ($this->offerArray as $offerNumber => $value) {
			
			echo_space("----PROCESSING OFFER " . $value->name . "----");
			$rocketGateObject = new rocketgate();
			if ($rocketGateObject->process($this, $this->offerArray[$offerNumber])) {
				$this->offerArray[$offerNumber]->response = $rocketGateObject->response;
				echo_space("----PROCESSING POSTBACK SUCCESS----" . "\n" .
					" offer number: " . $this->offerArray[$offerNumber]->idoffer . "\n" .
					" offer name: " . $value->name . "\n" .
					" offer postbackSuccess: " . $this->offerArray[$offerNumber]->postbackSuccess
				);
				if ($this->offerArray[$offerNumber]->postbackSuccess != '') {
					$this->processPostbackUsingCurl($this->offerArray[$offerNumber]->postbackSuccess, $offerNumber);
				}
			} else {
				echo_space("----PROCESSING POSTBACK FAIL----" . "\n" .
					" offer number: " . $this->offerArray[$offerNumber]->idoffer . "\n" .
					" offer name: " . $value->name . "\n" .
					" offer postbackFail: " . $this->offerArray[$offerNumber]->postbackFail
				);
				if ($this->offerArray[$offerNumber]->postbackFail != '') {
					$this->processPostbackUsingCurl($this->offerArray[$offerNumber]->postbackFail, $offerNumber);
				}
			}
			
			echo_space("----PROCESSING OFFER " . $value->name . "---- DONE");
		}
	}
	
	public function checkCookie()
	{
		print_x($_COOKIE);
		if ($_COOKIE['asdad'] == 10) {
			
			print_x($_COOKIE['asdad']);
			
		} else {
			//session_destroy();
		}
	}
	
	
	private function prcessOfferViaRocketGate(user $userObject)
	{
		$rocketGate = new rocketgate();
		$rocketGate->processNEW($this);
		
	}
	
	private function processTest(user $userObject, $offerId)
	{
		$this->offerObject = new offer();
		$this->offerObject->setOfferDetails($offerId);
		$this->prcessOfferViaRocketGate($this);
	}
	
	public function processPostback($offerPostback)
	{
		$postBackArray  = explode('::', $offerPostback);
		$postBackClass  = $postBackArray[0];
		$postBackMethod = $postBackArray[1];
		$postBackClass::$postBackMethod();
		
		
	}
	
	
	private function processPostbackUsingCurl($postbackUrl, $offerNumber)
	{
		echo_space(__METHOD__);
		
		$postbackUrl = "http://" . $_SERVER['HTTP_HOST'] . $postbackUrl;
		$postbackUrl = $this->replaceHashVariables($postbackUrl, $offerNumber);
		
		$curl = new Curl();
		$curl->get($postbackUrl);
		echo_space("---- SENDING CURL ---- " . $postbackUrl);
		echo_space("---- CURL RESPONSE ---- " . $curl->response);
		if ($curl->error) {
			echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
		} else {
			$this->processPostbackSuccessResponse($curl->response);
			
			
		}
		
	}
	
	private function setCookie($name = '', int $param)
	{
		setcookie($name, $param, time() + $param);
	}
	
	private function processPostbackSuccessResponse($response)
	{
		echo_space(__METHOD__ . " //todo processPostbackSuccessResponse? json");
		//todo processPostbackSuccessResponse? json.
		if (is_array($response)) {
			$responseArray = json_decode($response, TRUE);
			foreach ($responseArray as $responseKey => $responseValue) {
				$this->$responseKey = $responseValue;
			}
		}
		
		
	}
	
	private function replaceHashVariables($postbackUrl, $offerNumber)
	{
		echo_space(__METHOD__);
		
		$postbackUrl = str_replace('#firstName#', $this->firstName, $postbackUrl);
		$postbackUrl = str_replace('#lastName#', $this->lastName, $postbackUrl);
		$postbackUrl = str_replace('#ipAddress#', $this->ipAddress, $postbackUrl);
		$postbackUrl = str_replace('#email#', $this->email, $postbackUrl);
		$postbackUrl = str_replace('#userName#', $this->userName, $postbackUrl);
		$postbackUrl = str_replace('#password#', $this->password, $postbackUrl);
		$postbackUrl = str_replace('#rocketGateCustomerID#', $this->rocketGateCustomerID, $postbackUrl);
		$postbackUrl = str_replace('#merchantInvoiceID#', $this->merchantInvoiceID, $postbackUrl);
		$postbackUrl = str_replace('#cardhash#', urlencode($this->offerArray[$offerNumber]->response->cardHash), $postbackUrl);
		$postbackUrl = str_replace('#clickID#', $this->clickID, $postbackUrl);
		$postbackUrl = str_replace('#var1#', $this->offerArray[$offerNumber]->var1, $postbackUrl);
		$postbackUrl = str_replace('#var2#', $this->offerArray[$offerNumber]->var2, $postbackUrl);
		$postbackUrl = str_replace('#var3#', $this->offerArray[$offerNumber]->var3, $postbackUrl);
		
		return $postbackUrl;
	}
	
	private function printSession()
	{
		print_x($_SESSION['user']);
	}
	
	private function processPostbackResponse($response)
	{
	
	}
}




