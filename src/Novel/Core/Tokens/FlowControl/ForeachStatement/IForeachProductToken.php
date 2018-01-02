<?php
namespace Novel\Core\Tokens\FlowControl\ForeachStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;


interface IForeachProductToken extends IToken
{
	/**
	 * @param string|INamedToken|null $item
	 */
	public function setKey($item = null): void;
	
	public function hasKey(): bool;
	public function getKey(): ?INamedToken;

	/**
	 * @param string|IToken $item
	 */
	public function setItem($item): void;
	
	public function getItem(): IToken;
}