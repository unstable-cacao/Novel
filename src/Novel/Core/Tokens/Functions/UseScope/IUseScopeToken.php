<?php
namespace Novel\Core\Tokens\Functions\UseScope;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;


interface IUseScopeToken extends IToken
{
	/**
	 * @param INamedToken|INamedToken[]|string|string[] $item
	 */
	public function add(...$item): void;
}