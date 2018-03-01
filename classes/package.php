<?php
/*
* =======================================================================
* CLASSNAME:        package
* DATE CREATED:      09-01-2018
* FOR TABLE:          package
* FOR DATA BASE:    billemV2
* IMPORTANT:
* the 'sanitize()' keyword is a defined function to prevent sql injection located @ lib/functions.php
* 'post()' is also defined function located @ lib/funtions.php
* You can further improve these functions if necessary.
* =======================================================================
*/

//Begin class
class package
{
	public $idpackage;
	public $name;
	public $postbackSuccess;
	public $postbackFail;
	public $domain_iddomain;
	public $packageStatus;
	public $offerStatusArray = array();
	
	
	// Table Columns
	//(idpackage,name,postbackSuccess,postbackFail,timestamp,domain_iddomain)
	// Table Prepare Columns
	//(:idpackage,:name,:postbackSuccess,:postbackFail,:timestamp,:domain_iddomain)
	
	
	public function __construct()
	{
	
	
	}
	
	public function SelectAll()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT * FROM package");
		
		return $record->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function select_all()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM package ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function get_count()
	{
		$db   = DB::getInstance();
		$sql  = "SELECT COUNT(*) FROM package ";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
	
	public function get_column_names()
	{
		$db   = DB::getInstance();
		$rows = $db->query("SELECT * FROM package LIMIT 1");
		for ($i = 0; $i < $rows->columnCount(); $i++) {
			$column    = $rows->getColumnMeta($i);
			$columns[] = $column ['name'];
		}
		
		return $columns;
	}
	
	public function SelectOne($id)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM package WHERE idpackage=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function Delete($id)
	{
		$dbc = new dboptions();
		$dbc->dbDelete('package', 'idpackage', $id);
	}
	
	public function Insert($redirect_to)
	{
		$dbc = new dboptions();
		
		$submit = post('button');
		if ($submit) {
			
			$this->idpackage = "";
			$values          = array(array('name'            => post('name'),
										   'postbackSuccess' => post('postbackSuccess'),
										   'postbackFail'    => post('postbackFail'), 'timestamp' => post('timestamp'),
										   'domain_iddomain' => post('domain_iddomain')));
			$dbc->dbInsert('package', $values);
			send_to($redirect_to);
		}
	}
	
	public function Update($redirect_to)
	{
		$id                    = post('idpackage');
		$this->name            = post('name');
		$this->postbackSuccess = post('postbackSuccess');
		$this->postbackFail    = post('postbackFail');
		$this->domain_iddomain = post('domain_iddomain');
		
		$submit = post('button');
		if ($submit) {
			
			$db   = DB::getInstance();
			$sql  =
				" UPDATE package SET  name ='$this->name',postbackSuccess ='$this->postbackSuccess',postbackFail ='$this->postbackFail',domain_iddomain ='$this->domain_iddomain' WHERE idpackage = :id ";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function insert_new($redirect_to)
	{
		
		$this->name            = post('name');
		$this->postbackSuccess = post('postbackSuccess');
		$this->postbackFail    = post('postbackFail');
		
		$this->domain_iddomain = post('domain_iddomain');
		
		$submit = post('button');
		if ($submit) {
			
			$db = DB::getInstance();
			
			$sql  = " INSERT INTO package (name,postbackSuccess,postbackFail,domain_iddomain) VALUES (:name,:postbackSuccess,:postbackFail,:domain_iddomain)";
			$stmt = $db->prepare($sql);
			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":postbackSuccess", $postbackSuccess);
			$stmt->bindparam(":postbackFail", $postbackFail);
			$stmt->bindparam(":domain_iddomain", $domain_iddomain);
			$stmt->execute();
			send_to($redirect_to);
		}
		
	}
	
	public function handelPackage($packageId)
	{
		$this->getIdPackageByDomainId($packageId);
	}
	
	public function getAllNamesWithPackageID()
	{
		$dbc    = new dboptions();
		$record = $dbc->rawSelect("SELECT `name`,`idpackage` FROM `package` WHERE 1");
		
		return $record->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	public function process($packageObject)
	{
		echo_space(__METHOD__);
		$this->setPackageDetailsToPackage($packageObject);
		$this->processPostbacks($packageObject);
	}
	
	public function processPackageNEW($packagePostback)
	{
		$postBackArray  = explode('::', $packagePostback);
		$postBackClass  = $postBackArray[0];
		$postBackMethod = $postBackArray[1];
		$postBackClass::$postBackMethod(user::getClickId());
		
		
	}
	
	public static function getLimitFromGet()
	{
		if (isset($_GET['limit'])) {
			return $_GET['limit'];
		} else {
			return null;
		}
		
	}
	
	private function setPackageIdByDomainId($currentDomainId)
	{
		
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM package WHERE domain_iddomain=:domainID";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':domainID', $currentDomainId);
		$stmt->execute();
		$this->packageId = ($stmt->fetch(pdo::FETCH_OBJ));
		
		
	}
	
	private function setPackageDetailsToPackage($packageObject)
	{
		foreach ($packageObject as $offerKey => $offerValue) {
			$this->$offerKey = $offerValue;
			
			
		}
	}
	
	public function getPackageDetailsByDomainId($domainId)
	{
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM package WHERE domain_iddomain=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $domainId, PDO::PARAM_INT);
		$stmt->execute();
		
		$this->setPackageDetails($stmt->fetch(PDO::FETCH_OBJ));
		
	}
	
	public function getPackageDetailsByPackageId($packageId)
	{
		
		$db   = DB::getInstance();
		$sql  = "SELECT * FROM package WHERE idpackage=:id ";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $packageId, PDO::PARAM_INT);
		$stmt->execute();
		$this->setPackageDetails($stmt->fetch(PDO::FETCH_OBJ));
		
		
	}
	
	private function setPackageDetails($packageObject)
	{
		foreach ($packageObject as $packageKey => $packageValue) {
			$this->$packageKey = $packageValue;
		}
	}
	
	public function processPostbacks(package $packageObject)
	{
		//echo_space(__METHOD__);
		
		
		if (in_array("Fail", $packageObject->offerStatusArray) === true) {
			echo_space("FAIL POSTBACK");
			if ($packageObject->postbackFail != "") {
				$this->processPackageNEW($packageObject->postbackFail);
			} else {
				echo_space("NOTHING TO DO");
			}
			
		} else {
			echo_space("SUCCESS POSTBACK");
			if ($packageObject->postbackSuccess != "") {
				$this->processPackageNEW($packageObject->postbackSuccess);
			} else {
				echo_space("NOTHING TO DO");
			}
			
		}
		/*foreach ($packageObject->offerStatusArray as $offerStatusKey=>$offerStatusValue){
			
			if ($packageObject->offerStatusArray[$offerStatusKey] != "Success"){
				return false;
			}else{
				echo_space($packageObject->offerStatusArray[$offerStatusKey]);
			}
		}
		
		if ($packageObject->packageStatus == true) {
			$this->processPostback($packageObject->postbackSuccess);
		} else {
			$this->processPostback($packageObject->postbackFail);
		}*/
	}
	
	private function processPostback($postback)
	{
	
	}
	
	//-------------------------------------------------------------------
	// KEEP FOR LATER USE
	//-------------------------------------------------------------------
	
}


