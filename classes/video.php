<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 2/1/2018
 * Time: 12:02 PM
 */

use \Curl\Curl;

class video
{
	private $videoCurl;
	
	/**
	 * video constructor.
	 */
	public function __construct()
	{
	}
	
	public function allowAccess($getData)
	{
		
		$url = "http://hitpink.com/feed/postback.php?" . http_build_query($getData);
		
		$this->videoCurl = new Curl();
		$this->videoCurl->setOpt(CURLOPT_FOLLOWLOCATION, TRUE);
		
		$this->videoCurl->get($url);
		echo_space($this->videoCurl->response);
		
		
	}
	
}