<?php
namespace Novel\Core\Tokens\FlowControl\ForeachStatement;


use Novel\Core\IToken;


interface IForeachIterationToken extends IToken
{
	/**
	 * @param string|IToken $target
	 */
	public function setTarget($target): void;
	
	public function getTarget(): IToken;

	/**
	 * @param string|IToken $item
	 * @param string|IToken|null $value If set, $item treated as key and $value as value of the product.
	 */
	public function setProduct($item, $value = null): void;
	
	public function setProductToken(IForeachProductToken $token): void;
	
	public function getProductToken(): IForeachProductToken;
	public function hasKey(): bool;
}