<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 10/23/2017
 * Time: 12:36 PM
 */

class Log
{
	
	
	function __construct()
	{
		
		/*        $dirPath = $_SERVER['DOCUMENT_ROOT'] . '/log';
				$file = $_SERVER['DOCUMENT_ROOT'] . '/log/log2.txt';
		
				if (!file_exists($file)) {
					if (!file_exists($dirPath)) {
						mkdir($dirPath);
					}
					$file = fopen($file, 'w') or die("can't open file");
					fwrite($file, date("m/d/Y h:i:sa") . ": Log File Created!" . "\r\n");
					fclose($file);
				}*/
		
		
	}
	
	public static function Log2File($data)
	{
		
		$file = $_SERVER['DOCUMENT_ROOT'] . getenv('LOG_FILE');
		$current = file_get_contents($file);
		date_default_timezone_set(getenv('TIME_ZONE'));
		$current .= date("D, M d h:i:sa ") . DOMAIN .": " . $data . "\r\n";
		file_put_contents($file, $current);
		
	}
	
	public static function LogArray2File($data)
	{
		$file = $_SERVER['DOCUMENT_ROOT'] . getenv('LOG_FILE');
		$current = file_get_contents($file);
		date_default_timezone_set(getenv('TIME_ZONE'));
		$current .= date("D, M d h:i:sa ") . DOMAIN .": " . $data . "\r\n";
		file_put_contents($file, $current);
		
	}
	
	public static function PrintLog()
	{
		
		$file = $_SERVER['DOCUMENT_ROOT'] . getenv('LOG_FILE');
		print_x(file_get_contents($file));
		
		
	}
}