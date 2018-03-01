<?php
/**
 * Created by PhpStorm.
 * User: joera
 * Date: 1/11/2018
 * Time: 3:34 PM
 */

class Constants
{
	public $css;
	public $images;
	public $domain;
//	public $constantArray;
	
	public function __construct()
	{
		$this->css    = '';
		$this->images = '';
		$this->domain = '';
//		$this->constantArray = array();
	}
	
	public function setCss($value)
	{
		$this->css = $value;
	}
	
	public function setImages($value)
	{
		$this->images= $value;
	}
	
	public function setDomain($value)
	{
		$this->domain = $value;
	}
	
	public function saveConstants()
	{
		$this->setCss(CSS);
		$this->setImages(IMAGES);
		$this->setDomain(DOMAIN);
		
	}
	public function defineConstants(){
		define('DOMAIN', $this->domain);
		define('CSS', $this->css);
		define('IMAGES', $this->images);
	}
	
	
	
	
}