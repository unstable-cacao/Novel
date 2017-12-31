<?php
namespace Novel\Core\Tokens\Functions\Common;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\UseScope\IUseScopeToken;


interface IWithUse
{
	public function hasUseScope(): bool;
	public function getUseToken(): IUseScopeToken;

	/**
	 * @param INamedToken|INamedToken[]|string|string[] $item
	 */
	public function addUseItem(...$item): void;
}