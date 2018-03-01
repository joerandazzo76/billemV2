<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/19/2018
 * Time: 7:03 PM
 */

class billem
{
	public static function signUpDating()
	{
		echo_space("#########################");
		print_x($_SESSION);
		//$userObject = new user();
		$dating = new dating();
		//$dating->setOfferObjects($userObject);
		echo_space("#########################");
		//print_x($userObject);
		$dating->signUp($_SESSION['all']['user']);
	}
	
	public static function signUpCam()
	{
		echo_space("#########################");
		
		print_x($_SESSION);
		//$userObject = new user();
		$cam = new cam();
		//$dating->setOfferObjects($userObject);
		echo_space("#########################");
		//print_x($userObject);
		cam::signUp($_SESSION['all']['user']);
		
	}
	
	
	//------------------------------------------------
	// 					SOMETHING HERE
	//------------------------------------------------
}