<?php
namespace Novel\Tokens;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;


trait TNamedToken
{
	/** @var NameToken */
	private $name;
	
	
	/**
	 * @param string|IName|INameToken $name
	 */
	public function setName($name): void
	{
		if (is_string($name) || $name instanceof IName)
		{
			$name = new NameToken($name);
			$this->name = new NameToken($name);
		}
		else if (!($name instanceof INameToken))
		{
			throw new \Exception("Name must be string, instance of IName or instance of INameToken");
		}
		
		$name->setParent($this);
		$this->name = $name;
	}
	
	public function getName(): string
	{
		return $this->name->getName();
	}
	
	public function getNameToken(): INameToken
	{
		return $this->name;
	}
	
	public function getNameObject(): IName
	{
		return $this->name->getNameObject();
	}
}