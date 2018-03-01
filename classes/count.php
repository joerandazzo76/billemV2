<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 2/2/2018
 * Time: 2:20 PM
 */

class count
{
	
	
	public static function next()
	{
		
		$dateAdded = time();
		$db        = DB::getInstance();
		
		$sql = " INSERT INTO count (dateAdded) VALUES (:dateAdded)";
		
		$stmt = $db->prepare($sql);
		$stmt->bindparam(":dateAdded", $dateAdded);
		$stmt->execute();
		
		return $db->lastInsertId();
		
	}
}