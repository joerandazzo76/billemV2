<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 12/8/2017
 * Time: 12:10 PM
 */
class cake
{
	static function PostConversion($clickID)
	{
		
		if (isset($clickID)) {
			
			$conversion_endpoint_url = "https://click-connect.com/p.ashx?a=1&f=pb&e=1&r=" . $clickID;
			echo $conversion_endpoint_url . "\n";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $conversion_endpoint_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$conversion_response = curl_exec($ch);   //RESPONCE XML
			$xml                 = simplexml_load_string($conversion_response);
			print_r($xml);
			if ($errno = curl_errno($ch)) {
				$error_message = curl_strerror($errno);
				echo("cURL error ({$errno}):\n {$error_message}");
			}
			curl_close($ch);
		}
		
		
	}

	
}