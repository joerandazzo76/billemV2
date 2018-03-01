<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 10/20/2017
 * Time: 12:50 PM
 */


class Validate
{
	public $validUsername = false;
	public $validEmail    = false;
	public $validPassword = false;
	public $userName = '';
	public $email = '';
	public $password1 = '';
	public $password2 = '';
	
	
	
	
	function __construct()
	{
	
		
	}
	
	function DatingUserame($username)
	{
		$this->userName = $username;
		if (strlen($this->userName) < 4) {
			return '4 - 15 characters please. ';
		}
		if (is_numeric($this->userName[0])) {
			return 'First character must be a letter. ';
		}
		$usernameCheckUrl = "https://xfriends.com/api/check.php?username=" . $this->userName;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $usernameCheckUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$usernameCheckResponse = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		curl_close($ch);
		
		if ($usernameCheckResponse == 1) {
			$this->validUsername = true;
			return true;
			
		} else {
			$this->validUsername = false;
			return false;
		}
		
	}
	
	function DatingEmail($email)
	{
		
		$this->email = $email;
		if (strlen($this->email) < 4) {
			return '4 - 15 characters please. ';
		}
		if (is_numeric($this->email[0])) {
			return 'First character must be a letter. ';
		}
		if (strpos($this->email, '@') == false) {
			return 'Invalid Email ';
		}
		
		$emailCheckUrl = "https://xfriends.com/api/check.php?email=" . $this->email;
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $emailCheckUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$emailCheckResponse = curl_exec($ch);
		
		if ($errno = curl_errno($ch)) {
			$error_message = curl_strerror($errno);
			print_x("cURL error ({$errno}):\n {$error_message}");
		}
		
		
		curl_close($ch);
		
		if ($emailCheckResponse == 1) {
			$this->validEmail = true;
			return true;
			
		} else {
			$this->validEmail = false;
			return false;
		}
		
	}
	
	function Password($password1, $password2)
	{
		$this->password1 = $password1;
		$this->password2 = $password2;
		
		if ($this->password1 === $this->password2) {
			$this->validPassword = true;
			return true;
		} else {
			$this->validPassword = false;
			return false;
		}
		
		
	}
	
	public function validateDating()
	{
		if (
			(dating::validateUserName($this->userData->username)) &&
			(dating::validateEmail($this->userData->email))) {
			return true;
		} else {
			return false;
		}
	}
	
}