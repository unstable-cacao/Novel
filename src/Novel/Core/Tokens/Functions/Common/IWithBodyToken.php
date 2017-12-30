<?php
namespace Novel\Core\Tokens\Functions\Common;


use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;


interface IWithBodyToken
{
	public function getBody(): ICodeScopeToken;

	/**
	 * @param IToken[]|IToken ...$item
	 */
	public function addToBody(...$item): void;
}