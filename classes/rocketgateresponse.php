<?php
/*
* =======================================================================
* CLASSNAME:        rocketgateResponse
* DATE CREATED:      15-01-2018
* FOR TABLE:          rocketgateResponse
* FOR DATA BASE:    billemV2
* IMPORTANT:
* the 'sanitize()' keyword is a defined function to prevent sql injection located @ lib/functions.php
* 'post()' is also defined function located @ lib/funtions.php
* You can further improve these functions if necessary.
* =======================================================================
*/

//Begin class
class rocketgateresponse
{
	public $idresponse;
	public $authNo;
	public $merchantInvoiceID;
	public $responsecol;
	public $merchantAccount;
	public $approvedAmount;
	public $cardLastFour;
	public $version;
	public $merchantCustomerID;
	public $reasonCode;
	public $retrievalNo;
	public $responsecol1;
	public $cardIssuerName;
	public $payType;
	public $cardHash;
	public $cardDebitCredit;
	public $cardRegion;
	public $cardDescription;
	public $cardCountry;
	public $cardType;
	public $bankResponseCode;
	public $approvedCurrency;
	public $guidNo;
	public $cardExpiration;
	public $responsecol2;
	public $responseCode;
	public $timestamp;
	public $domain_iddomain;
	// Table Columns
	//(idresponse,authNo,merchantInvoiceID,responsecol,merchantAccount,approvedAmount,cardLastFour,version,merchantCustomerID,reasonCode,retrievalNo,responsecol1,cardIssuerName,payType,cardHash,cardDebitCredit,cardRegion,cardDescription,cardCountry,cardType,bankResponseCode,approvedCurrency,guidNo,cardExpiration,responsecol2,responseCode,timestamp,domain_iddomain)
	// Table Prepare Columns
	//(:idresponse,:authNo,:merchantInvoiceID,:responsecol,:merchantAccount,:approvedAmount,:cardLastFour,:version,:merchantCustomerID,:reasonCode,:retrievalNo,:responsecol1,:cardIssuerName,:payType,:cardHash,:cardDebitCredit,:cardRegion,:cardDescription,:cardCountry,:cardType,:bankResponseCode,:approvedCurrency,:guidNo,:cardExpiration,:responsecol2,:responseCode,:timestamp,:domain_iddomain)
	
	//Constructor
	public function __construct(
		$idresponse = '',
		$authNo = '',
		$merchantInvoiceID = '',
		$responsecol = '',
		$merchantAccount = '',
		$approvedAmount = '',
		$cardLastFour = '',
		$version = '',
		$merchantCustomerID = '',
		$reasonCode = '',
		$retrievalNo = '',
		$responsecol1 = '',
		$cardIssuerName = '',
		$payType = '',
		$cardHash = '',
		$cardDebitCredit = '',
		$cardRegion = '',
		$cardDescription = '',
		$cardCountry = '',
		$cardType = '',
		$bankResponseCode = '',
		$approvedCurrency = '',
		$guidNo = '',
		$cardExpiration = '',
		$responsecol2 = '',
		$responseCode = '',
		$timestamp = '',
		$domain_iddomain = '')
	{
		$this->idresponse         = $idresponse;
		$this->authNo             = $authNo;
		$this->merchantInvoiceID  = $merchantInvoiceID;
		$this->responsecol        = $responsecol;
		$this->merchantAccount    = $merchantAccount;
		$this->approvedAmount     = $approvedAmount;
		$this->cardLastFour       = $cardLastFour;
		$this->version            = $version;
		$this->merchantCustomerID = $merchantCustomerID;
		$this->reasonCode         = $reasonCode;
		$this->retrievalNo        = $retrievalNo;
		$this->responsecol1       = $responsecol1;
		$this->cardIssuerName     = $cardIssuerName;
		$this->payType            = $payType;
		$this->cardHash           = $cardHash;
		$this->cardDebitCredit    = $cardDebitCredit;
		$this->cardRegion         = $cardRegion;
		$this->cardDescription    = $cardDescription;
		$this->cardCountry        = $cardCountry;
		$this->cardType           = $cardType;
		$this->bankResponseCode   = $bankResponseCode;
		$this->approvedCurrency   = $approvedCurrency;
		$this->guidNo             = $guidNo;
		$this->cardExpiration     = $cardExpiration;
		$this->responsecol2       = $responsecol2;
		$this->responseCode       = $responseCode;
		$this->timestamp          = $timestamp;
		$this->domain_iddomain    = $domain_iddomain;
		
	}
	
	// SELECT ALL
	public function SelectAll()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT * FROM rocketgateResponse");
		
		return $record->fetchAll(PDO::FETCH_OBJ);
	}
	
	// SELECT All 2
	public function select_all()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM rocketgateResponse ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	// SELECT All 2
	public function get_count()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT COUNT(*) FROM rocketgateResponse ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
	
	// Get column names
	public function get_column_names()
	{
		$db   = DB::getInstance();
		$rows = $db->query("SELECT * FROM rocketgateResponse LIMIT 1");
		for ($i = 0; $i < $rows->columnCount(); $i++) {
			$column    = $rows->getColumnMeta($i);
			$columns[] = $column ['name'];
		}
		
		return $columns;
	}
	
	// SELECT ONE
	public function SelectOne($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM rocketgateResponse WHERE idresponse=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	// DELETE
	public function Delete($id)
	{
		$dbc = new dboptions();
		$dbc->dbDelete('rocketgateResponse', 'idresponse', $id);
	}
	
	// INSERT
	public function Insert($redirect_to)
	{
		$dbc = new dboptions();
		
		$submit = post('button');
		if ($submit) {
			
			$this->idresponse = "";
			$values           = array(array('authNo'       => post('authNo'), 'merchantInvoiceID' => post('merchantInvoiceID'), 'responsecol' => post('responsecol'), 'merchantAccount' => post('merchantAccount'), 'approvedAmount' => post('approvedAmount'), 'cardLastFour' => post('cardLastFour'),
											'version'      => post('version'), 'merchantCustomerID' => post('merchantCustomerID'), 'reasonCode' => post('reasonCode'), 'retrievalNo' => post('retrievalNo'), 'responsecol1' => post('responsecol1'), 'cardIssuerName' => post('cardIssuerName'),
											'payType'      => post('payType'), 'cardHash' => post('cardHash'), 'cardDebitCredit' => post('cardDebitCredit'), 'cardRegion' => post('cardRegion'), 'cardDescription' => post('cardDescription'), 'cardCountry' => post('cardCountry'),
											'cardType'     => post('cardType'), 'bankResponseCode' => post('bankResponseCode'), 'approvedCurrency' => post('approvedCurrency'), 'guidNo' => post('guidNo'), 'cardExpiration' => post('cardExpiration'), 'responsecol2' => post('responsecol2'),
											'responseCode' => post('responseCode'), 'timestamp' => post('timestamp'), 'domain_iddomain' => post('domain_iddomain')));
			$dbc->dbInsert('rocketgateResponse', $values);
			send_to($redirect_to);
		}
	}
	
	// UPDATE
	public function Update($redirect_to)
	{
		$id                       = post('idresponse');
		$this->authNo             = post('authNo');
		$this->merchantInvoiceID  = post('merchantInvoiceID');
		$this->responsecol        = post('responsecol');
		$this->merchantAccount    = post('merchantAccount');
		$this->approvedAmount     = post('approvedAmount');
		$this->cardLastFour       = post('cardLastFour');
		$this->version            = post('version');
		$this->merchantCustomerID = post('merchantCustomerID');
		$this->reasonCode         = post('reasonCode');
		$this->retrievalNo        = post('retrievalNo');
		$this->responsecol1       = post('responsecol1');
		$this->cardIssuerName     = post('cardIssuerName');
		$this->payType            = post('payType');
		$this->cardHash           = post('cardHash');
		$this->cardDebitCredit    = post('cardDebitCredit');
		$this->cardRegion         = post('cardRegion');
		$this->cardDescription    = post('cardDescription');
		$this->cardCountry        = post('cardCountry');
		$this->cardType           = post('cardType');
		$this->bankResponseCode   = post('bankResponseCode');
		$this->approvedCurrency   = post('approvedCurrency');
		$this->guidNo             = post('guidNo');
		$this->cardExpiration     = post('cardExpiration');
		$this->responsecol2       = post('responsecol2');
		$this->responseCode       = post('responseCode');
		$this->timestamp          = post('timestamp');
		$this->domain_iddomain    = post('domain_iddomain');
		
		$submit = post('button');
		if ($submit) {
			
			$db   = DB::getInstance();
			$sql  =
				" UPDATE rocketgateResponse SET  authNo ='$this->authNo',merchantInvoiceID ='$this->merchantInvoiceID',responsecol ='$this->responsecol',merchantAccount ='$this->merchantAccount',approvedAmount ='$this->approvedAmount',cardLastFour ='$this->cardLastFour',version ='$this->version',merchantCustomerID ='$this->merchantCustomerID',reasonCode ='$this->reasonCode',retrievalNo ='$this->retrievalNo',responsecol1 ='$this->responsecol1',cardIssuerName ='$this->cardIssuerName',payType ='$this->payType',cardHash ='$this->cardHash',cardDebitCredit ='$this->cardDebitCredit',cardRegion ='$this->cardRegion',cardDescription ='$this->cardDescription',cardCountry ='$this->cardCountry',cardType ='$this->cardType',bankResponseCode ='$this->bankResponseCode',approvedCurrency ='$this->approvedCurrency',guidNo ='$this->guidNo',cardExpiration ='$this->cardExpiration',responsecol2 ='$this->responsecol2',responseCode ='$this->responseCode',timestamp ='$this->timestamp',domain_iddomain ='$this->domain_iddomain' WHERE idresponse = :id ";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	// Insert
	public function insert_new($redirect_to)
	{
		
		$this->authNo             = post('authNo');
		$this->merchantInvoiceID  = post('merchantInvoiceID');
		$this->responsecol        = post('responsecol');
		$this->merchantAccount    = post('merchantAccount');
		$this->approvedAmount     = post('approvedAmount');
		$this->cardLastFour       = post('cardLastFour');
		$this->version            = post('version');
		$this->merchantCustomerID = post('merchantCustomerID');
		$this->reasonCode         = post('reasonCode');
		$this->retrievalNo        = post('retrievalNo');
		$this->responsecol1       = post('responsecol1');
		$this->cardIssuerName     = post('cardIssuerName');
		$this->payType            = post('payType');
		$this->cardHash           = post('cardHash');
		$this->cardDebitCredit    = post('cardDebitCredit');
		$this->cardRegion         = post('cardRegion');
		$this->cardDescription    = post('cardDescription');
		$this->cardCountry        = post('cardCountry');
		$this->cardType           = post('cardType');
		$this->bankResponseCode   = post('bankResponseCode');
		$this->approvedCurrency   = post('approvedCurrency');
		$this->guidNo             = post('guidNo');
		$this->cardExpiration     = post('cardExpiration');
		$this->responsecol2       = post('responsecol2');
		$this->responseCode       = post('responseCode');
		$this->domain_iddomain    = post('domain_iddomain');
		
		$submit = post('button');
		if ($submit) {
			
			$db = DB::getInstance();
			
			$sql  = " INSERT INTO rocketgateResponse (
authNo,merchantInvoiceID,responsecol,merchantAccount,approvedAmount,cardLastFour,version,merchantCustomerID,reasonCode,retrievalNo,responsecol1,cardIssuerName,payType,cardHash,cardDebitCredit,cardRegion,cardDescription,cardCountry,cardType,bankResponseCode,approvedCurrency,guidNo,cardExpiration,responsecol2,responseCode,domain_iddomain
) VALUES (
:authNo,:merchantInvoiceID,:responsecol,:merchantAccount,:approvedAmount,:cardLastFour,:version,:merchantCustomerID,:reasonCode,:retrievalNo,:responsecol1,:cardIssuerName,:payType,:cardHash,:cardDebitCredit,:cardRegion,:cardDescription,:cardCountry,:cardType,:bankResponseCode,:approvedCurrency,:guidNo,:cardExpiration,:responsecol2,:responseCode,:domain_iddomain
)";
			$stmt = $db->prepare($sql);
			$stmt->bindparam(":authNo", $authNo);
			$stmt->bindparam(":merchantInvoiceID", $merchantInvoiceID);
			$stmt->bindparam(":responsecol", $responsecol);
			$stmt->bindparam(":merchantAccount", $merchantAccount);
			$stmt->bindparam(":approvedAmount", $approvedAmount);
			$stmt->bindparam(":cardLastFour", $cardLastFour);
			$stmt->bindparam(":version", $version);
			$stmt->bindparam(":merchantCustomerID", $merchantCustomerID);
			$stmt->bindparam(":reasonCode", $reasonCode);
			$stmt->bindparam(":retrievalNo", $retrievalNo);
			$stmt->bindparam(":responsecol1", $responsecol1);
			$stmt->bindparam(":cardIssuerName", $cardIssuerName);
			$stmt->bindparam(":payType", $payType);
			$stmt->bindparam(":cardHash", $cardHash);
			$stmt->bindparam(":cardDebitCredit", $cardDebitCredit);
			$stmt->bindparam(":cardRegion", $cardRegion);
			$stmt->bindparam(":cardDescription", $cardDescription);
			$stmt->bindparam(":cardCountry", $cardCountry);
			$stmt->bindparam(":cardType", $cardType);
			$stmt->bindparam(":bankResponseCode", $bankResponseCode);
			$stmt->bindparam(":approvedCurrency", $approvedCurrency);
			$stmt->bindparam(":guidNo", $guidNo);
			$stmt->bindparam(":cardExpiration", $cardExpiration);
			$stmt->bindparam(":responsecol2", $responsecol2);
			$stmt->bindparam(":responseCode", $responseCode);
			$stmt->bindparam(":domain_iddomain", $domain_iddomain);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public static function insertResponseToDatabase($response)
	{
		$db   = DB::getInstance();
		$sql  = " INSERT INTO rocketgateResponse (authNo,merchantInvoiceID,merchantAccount,approvedAmount,cardLastFour,version,merchantCustomerID,reasonCode,retrievalNo,							cardIssuerName,payType,cardHash,cardDebitCredit,cardRegion,cardDescription,cardCountry,cardType,bankResponseCode,approvedCurrency,guidNo,cardExpiration,responseCode
					) VALUES (
					:authNo,:merchantInvoiceID,:merchantAccount,:approvedAmount,:cardLastFour,:version,:merchantCustomerID,:reasonCode,:retrievalNo,:cardIssuerName,:payType,						:cardHash,:cardDebitCredit,:cardRegion,:cardDescription,:cardCountry,:cardType,:bankResponseCode,:approvedCurrency,:guidNo,:cardExpiration,:responseCode
					)";
		$stmt = $db->prepare($sql);
		$stmt->bindparam(":authNo", $response->params['authNo']);
		$stmt->bindparam(":merchantInvoiceID", $response->params['merchantInvoiceID']);
		$stmt->bindparam(":merchantAccount", $response->params['merchantAccount']);
		$stmt->bindparam(":approvedAmount", $response->params['approvedAmount']);
		$stmt->bindparam(":cardLastFour", $response->params['cardLastFour']);
		$stmt->bindparam(":version", $response->params['version']);
		$stmt->bindparam(":merchantCustomerID", $response->params['merchantCustomerID']);
		$stmt->bindparam(":reasonCode", $response->params['reasonCode']);
		$stmt->bindparam(":retrievalNo", $response->params['retrievalNo']);
		$stmt->bindparam(":cardIssuerName", $response->params['cardIssuerName']);
		$stmt->bindparam(":payType", $response->params['payType']);
		$stmt->bindparam(":cardHash", $response->params['cardHash']);
		$stmt->bindparam(":cardDebitCredit", $response->params['cardDebitCredit']);
		$stmt->bindparam(":cardRegion", $response->params['cardRegion']);
		$stmt->bindparam(":cardDescription", $response->params['cardDescription']);
		$stmt->bindparam(":cardCountry", $response->params['cardCountry']);
		$stmt->bindparam(":cardType", $response->params['cardType']);
		$stmt->bindparam(":bankResponseCode", $response->params['bankResponseCode']);
		$stmt->bindparam(":approvedCurrency", $response->params['approvedCurrency']);
		$stmt->bindparam(":guidNo", $response->params['guidNo']);
		$stmt->bindparam(":cardExpiration", $response->params['cardExpiration']);
		$stmt->bindparam(":responseCode", $response->params['responseCode']);
		
		$stmt->execute();
		
	}
	
	public function SelectAllReverse($limit = '', $offset = '')
	{
		if ($limit !== '') {
			$limit = " LIMIT " . $limit;
		}
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM rocketgateResponse ORDER BY `idresponse` DESC " . $limit;
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public static function getLimitFromGet()
	{
		if (isset($_GET['limit'])) {
			return $_GET['limit'];
			
		} else {
			echo "LIMIT NOT SET";
			return '';
		}
		
		
	}
	
	
} // end class

?>
    
    