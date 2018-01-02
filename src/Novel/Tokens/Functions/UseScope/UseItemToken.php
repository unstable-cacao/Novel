<?php
namespace Novel\Tokens\Functions\UseScope;


use Novel\Core\Tokens\Functions\UseScope\IUseItemToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class UseItemToken extends AbstractChildlessToken implements IUseItemToken
{
	use TNamedToken;
	
	
	/** @var bool */
	private $isByReference = false;
	
	
	/**
	 * @param string|IName|INameToken $name
	 */
	public function __construct($name)
	{
		$this->setName($name);
	}
	
	
	public function setIsByReference(bool $isByReference): void
	{
		$this->isByReference = $isByReference;
	}
	
	public function isByReference(): bool
	{
		return $this->isByReference;
	}
}