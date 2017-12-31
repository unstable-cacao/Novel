<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\Functions\Common\IWithUse;
use Novel\Core\Tokens\Functions\UseScope\IUseScopeToken;
use Novel\Core\Tokens\INamedToken;


class WithUse implements IWithUse
{
	/** @var IUseScopeToken|null */
	private $useToken;
	
	
	public function hasUseScope(): bool
	{
		return $this->useToken ? true : false;
	}
	
	public function getUseToken(): IUseScopeToken
	{
		// TODO: Implement getUseToken() method.
	}
	
	/**
	 * @param INamedToken|INamedToken[]|string|string[] $item
	 */
	public function addUseItem(...$item): void
	{
		// TODO: Implement addUseItem() method.
	}
}