<?php
/*
* =======================================================================
* CLASSNAME:        domain
* DATE CREATED:      09-01-2018
* FOR TABLE:          domain
* FOR DATA BASE:    billemV2
* IMPORTANT:
* the 'sanitize()' keyword is a defined function to prevent sql injection located @ lib/functions.php
* 'post()' is also defined function located @ lib/funtions.php
* You can further improve these functions if necessary.
* =======================================================================
*/

//Begin class
class domain
{
	public $iddomain;
	public $name;
	public $rocketGateMerchantId;
	public $rocketGateMerchantPasword;
	public $camRID;
	public $midName;
	public $midPhoneNumber;
	public $emailFrom;
	public $emailHost;
	public $emailUserName;
	public $emailPassword;
	public $emailCC;
	public $timestamp;
	
	// Table Columns
	//(iddomain,name,rocketGateMerchantId,rocketGateMerchantPasword,camRID,midName,midPhoneNumber,emailFrom,emailHost,emailUserName,emailPassword,emailCC,timestamp)
	// Table Prepare Columns
	//(:iddomain,:name,:rocketGateMerchantId,:rocketGateMerchantPasword,:camRID,:midName,:midPhoneNumber,:emailFrom,:emailHost,:emailUserName,:emailPassword,:emailCC,:timestamp)
	
	//Constructor
	public function __construct(
		$iddomain = '',
		$name = '',
		$rocketGateMerchantId = '',
		$rocketGateMerchantPasword = '',
		$camRID = '',
		$midName = '',
		$midPhoneNumber = '',
		$emailFrom = '',
		$emailHost = '',
		$emailUserName = '',
		$emailPassword = '',
		$emailCC = '',
		$timestamp = '')
	{
	
	}
	
	public function getAllNames()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT `name` FROM domain");
		
		return $record->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function getAllNamesWithDomainID()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT `name`,`iddomain` FROM `domain` WHERE 1");
		
		return $record->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function SelectAll()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT * FROM domain");
		
		return $record->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function select_all()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM domain ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function get_count()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT COUNT(*) FROM domain ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
	
	public function get_column_names()
	{
		$db   = DB::getInstance();
		$rows = $db->query("SELECT * FROM domain LIMIT 1");
		for ($i = 0; $i < $rows->columnCount(); $i++) {
			$column    = $rows->getColumnMeta($i);
			$columns[] = $column ['name'];
		}
		
		return $columns;
	}
	
	public function SelectOne($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM domain WHERE iddomain=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function Delete($id)
	{
		$dbc = new dboptions();
		$dbc->dbDelete('domain', 'iddomain', $id);
	}
	
	public function Insert($redirect_to)
	{
		$dbc = new dboptions();
		
		$submit = post('button');
		if ($submit) {
			
			$this->iddomain = "";
			$values         =
				array(array('name'                      => post('name'),
							'rocketGateMerchantId'      => post('rocketGateMerchantId'),
							'rocketGateMerchantPasword' => post('rocketGateMerchantPasword'),
							'camRID'                    => post('camRID'), 'midName' => post('midName'),
							'midPhoneNumber'            => post('midPhoneNumber'), 'emailFrom' => post('emailFrom'),
							'emailHost'                 => post('emailHost'), 'emailUserName' => post('emailUserName'),
							'emailPassword'             => post('emailPassword'), 'emailCC' => post('emailCC')));
			$dbc->dbInsert('domain', $values);
			send_to($redirect_to);
		}
	}
	
	public function Update($redirect_to)
	{
		$id                              = post('iddomain');
		$this->name                      = post('name');
		$this->rocketGateMerchantId      = post('rocketGateMerchantId');
		$this->rocketGateMerchantPasword = post('rocketGateMerchantPasword');
		$this->camRID                    = post('camRID');
		$this->midName                   = post('midName');
		$this->midPhoneNumber            = post('midPhoneNumber');
		$this->emailFrom                 = post('emailFrom');
		$this->emailHost                 = post('emailHost');
		$this->emailUserName             = post('emailUserName');
		$this->emailPassword             = post('emailPassword');
		$this->emailCC                   = post('emailCC');
		$this->timestamp                 = post('timestamp');
		
		$submit = post('button');
		if ($submit) {
			
			$db   = DB::getInstance();
			$sql  =
				" UPDATE domain SET  name ='$this->name',rocketGateMerchantId ='$this->rocketGateMerchantId',rocketGateMerchantPasword ='$this->rocketGateMerchantPasword',camRID ='$this->camRID',midName ='$this->midName',midPhoneNumber ='$this->midPhoneNumber',emailFrom ='$this->emailFrom',emailHost ='$this->emailHost',emailUserName ='$this->emailUserName',emailPassword ='$this->emailPassword',emailCC ='$this->emailCC',timestamp ='$this->timestamp' WHERE iddomain = :id ";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function insert_new($redirect_to)
	{
		
		$this->name                      = post('name');
		$this->rocketGateMerchantId      = post('rocketGateMerchantId');
		$this->rocketGateMerchantPasword = post('rocketGateMerchantPasword');
		$this->camRID                    = post('camRID');
		$this->midName                   = post('midName');
		$this->midPhoneNumber            = post('midPhoneNumber');
		$this->emailFrom                 = post('emailFrom');
		$this->emailHost                 = post('emailHost');
		$this->emailUserName             = post('emailUserName');
		$this->emailPassword             = post('emailPassword');
		$this->emailCC                   = post('emailCC');
		//$this->timestamp = post('timestamp');
		
		$submit = post('button');
		if ($submit) {
			
			$db = DB::getInstance();
			
			$sql  = " INSERT INTO domain (
name,rocketGateMerchantId,rocketGateMerchantPasword,camRID,midName,midPhoneNumber,emailFrom,emailHost,emailUserName,emailPassword,emailCC,timestamp
) VALUES (
:name,:rocketGateMerchantId,:rocketGateMerchantPasword,:camRID,:midName,:midPhoneNumber,:emailFrom,:emailHost,:emailUserName,:emailPassword,:emailCC,:timestamp
)";
			$stmt = $db->prepare($sql);
			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":rocketGateMerchantId", $rocketGateMerchantId);
			$stmt->bindparam(":rocketGateMerchantPasword", $rocketGateMerchantPasword);
			$stmt->bindparam(":camRID", $camRID);
			$stmt->bindparam(":midName", $midName);
			$stmt->bindparam(":midPhoneNumber", $midPhoneNumber);
			$stmt->bindparam(":emailFrom", $emailFrom);
			$stmt->bindparam(":emailHost", $emailHost);
			$stmt->bindparam(":emailUserName", $emailUserName);
			$stmt->bindparam(":emailPassword", $emailPassword);
			$stmt->bindparam(":emailCC", $emailCC);
			
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function getDomainDetails($iddomain)
	{
		
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM domain WHERE name=:domainName";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':domainName', $this->domainName);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
		
		
	}
	
	public function getCurrentDomainName()
	{
		return explode('.', $_SERVER['HTTP_HOST'])[1];
	}
	
	public function handelDomain()
	{
		
		$this->setDomainDetailsByDomainName($this->getCurrentDomainName());
		$this->setConstants();
		
	}
	
	private function setDomainDetailsByDomainName($domainName)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM domain WHERE name = :domainName";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':domainName', $domainName);
		$stmt->execute();
		$this->setDomainDetailsToDomain($stmt->fetch(pdo::FETCH_OBJ));
		
	}
	
	public function setConstants()
	{
		//------------------------------------------------------------------
		//This step is to make frontEnd work without changing existing code
		//todo update frontend to remove this method
		//------------------------------------------------------------------
		
		define('CSS', '/public/css/' . $this->getCurrentDomainName());
		define('IMAGES', '/public/images/' . $this->getCurrentDomainName());
		define('DOMAIN', $this->getCurrentDomainName());
		define('MID_NAME', $this->getCurrentDomainMidName());
		define('MID_PHONE_NUMBER', $this->getCurrentDomainMidPhoneNumber());
	}
	
	public function setDomainDetailsToDomain($domainObject)
	{
		
		if ($domainObject!='') {
			foreach ($domainObject as $domainKey => $domainValue) {
				$this->$domainKey = $domainValue;
			
			}
		}else{
			trigger_error("DOMAIN NOT IN DATABASE", E_USER_ERROR) ;
		}
		
	}
	
	private function getCurrentDomainMidName()
	{
		return $this->midName;
	}
	
	private function getCurrentDomainMidPhoneNumber()
	{
		
		return $this->midPhoneNumber;
		
	}
	
}

?>
    
    