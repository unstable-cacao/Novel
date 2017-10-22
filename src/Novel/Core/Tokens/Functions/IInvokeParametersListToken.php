<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Tokens\Base\IExpression;


interface IInvokeParametersListToken extends IToken
{
	/**
	 * @param IExpression|IExpression[] $item
	 */
	public function add($item): void;
	
	public function set(int $index, IExpression $item): void;
	public function clear(): void;
}