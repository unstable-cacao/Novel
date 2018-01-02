<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Named\NameToken;


trait TWithReturnTypeToken
{
	/** @var INameToken */
	private $returnTypeToken;
	
	
	/**
	 * @param string|INameToken|IName $type
	 */
	public function setReturnType($type): void
	{
		if (!($type instanceof INameToken))
		{
			$type = new NameToken($type);
		}
		
		$type->setParent($this);
		$this->returnTypeToken = $type;
	}
	
	public function getReturnType(): string
	{
		return $this->returnTypeToken->getName();
	}
	
	public function getReturnTypeName(): IName
	{
		return $this->returnTypeToken->getNameObject();
	}
	
	public function getReturnTypeToken(): INameToken
	{
		return $this->returnTypeToken;
	}
}