<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Named\NameToken;


trait TWithReturnTypeToken
{
	/** @var INameToken */
	private $returnTypeToken = null;
	
	
	/**
	 * @param string|INameToken|IName|null $type
	 */
	public function setReturnType($type): void
	{
		if (!is_null($type) && !($type instanceof INameToken))
		{
			$type = new NameToken($type);
		}
		
		$this->returnTypeToken = $type;
	}
	
	public function getReturnType(): ?string
	{
		return ($this->returnTypeToken ? $this->returnTypeToken->getName() : null);
	}
	
	public function getReturnTypeName(): ?IName
	{
		return ($this->returnTypeToken ? $this->returnTypeToken->getNameObject() : null);
	}
	
	public function getReturnTypeToken(): ?INameToken
	{
		return $this->returnTypeToken;
	}
	
	public function hasReturnType(): bool
	{
		return !is_null($this->returnTypeToken);
	}
}