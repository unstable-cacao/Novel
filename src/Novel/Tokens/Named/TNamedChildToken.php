<?php
namespace Novel\Tokens\Named;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\INamedToken;


trait TNamedChildToken
{
	protected abstract function getChildNameToken(): INamedToken; 
	
	
	/**
	 * @param string|IName|INameToken $name
	 */
	public function setName($name): void
	{
		$this->getChildNameToken()->setName($name);
	}
	
	public function getName(): string
	{
		return $this->getChildNameToken()->getName();
	}
	
	public function getNameToken(): INameToken
	{
		return $this->getChildNameToken()->getNameToken();
	}
	
	public function getNameObject(): IName
	{
		return $this->getChildNameToken()->getNameObject();
	}
}