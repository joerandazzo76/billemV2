<?php

class DB
{
	private static $instance = NULL;
	
	private function __construct()
	{
	}
	
	public static function getInstance()
	{
		
		if (!self::$instance) {
			self::$instance =
				new PDO("" . getenv('DB_TYPE') . ":host=" . getenv('LOCALHOST') . ";dbname=" . getenv('DB_NAME') . "", getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		return self::$instance;
	}
	
	private function __clone()
	{
	}
}