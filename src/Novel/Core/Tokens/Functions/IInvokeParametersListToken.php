<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IInvokeParametersListToken extends IToken
{
	/**
	 * @param IValueExpressionToken|IValueExpressionToken[] $item
	 */
	public function add($item): void;
	
	public function set(int $index, IValueExpressionToken $item): void;
	public function clear(): void;
}