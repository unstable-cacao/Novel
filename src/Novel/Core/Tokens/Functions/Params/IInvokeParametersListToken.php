<?php
namespace Novel\Core\Tokens\Functions\Params;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IInvokeParametersListToken extends IToken
{
	/**
	 * @param IToken[]|IToken ...$item
	 */
	public function add(...$item): void;
	
	public function set(int $index, IValueExpressionToken $item): void;
}