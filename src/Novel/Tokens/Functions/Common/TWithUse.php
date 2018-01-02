<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\Functions\UseScope\IUseScopeToken;
use Novel\Core\Tokens\INamedToken;


trait TWithUse
{
	/** @var IUseScopeToken */
	private $useToken;
	
	
	public function hasUseScope(): bool
	{
		return $this->useToken->hasChildren();
	}
	
	public function getUseToken(): IUseScopeToken
	{
		return $this->useToken;
	}
	
	/**
	 * @param INamedToken|INamedToken[]|string|string[] $item
	 */
	public function addUseItem(...$item): void
	{
		$this->useToken->add(...$item);
	}
}