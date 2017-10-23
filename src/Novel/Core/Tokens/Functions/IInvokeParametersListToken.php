<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpression;


interface IInvokeParametersListToken extends IToken
{
	/**
	 * @param IValueExpression|IValueExpression[] $item
	 */
	public function add($item): void;
	
	public function set(int $index, IValueExpression $item): void;
	public function clear(): void;
}