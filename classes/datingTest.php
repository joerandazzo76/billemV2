<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 2/2/2018
 * Time: 3:23 PM
 */

class datingTest extends dating
{
	
	/**
	 * datingTest constructor.
	 */
	public function __construct()
	{
	}
	
	
	public function signUpTestSuccess()
	{
		
		$_SESSION['autoLoginURL'] = "https://hitpink.com/?login=JoeTest175&auto=8eee109bbfe6b1d76ea59b0e040708da&type=cams";
		
		
	}
	public function signUpTestFail()
	{
		$_SESSION['autoLoginURL'] = "";
	}
	
	
}