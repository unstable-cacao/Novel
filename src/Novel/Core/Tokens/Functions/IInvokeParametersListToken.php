<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Tokens\Base\IExpressionToken;


interface IInvokeParametersListToken extends IToken
{
	/**
	 * @param IExpressionToken|IExpressionToken[] $item
	 */
	public function add($item): void;
	
	public function set(int $index, IExpressionToken $item): void;
	public function clear(): void;
}