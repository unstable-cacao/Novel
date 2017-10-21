<?php
namespace Novel\Core\Tokens;


use Novel\Core\IToken;


interface IStatement extends IToken
{
	/**
	 * @param IToken[]|IToken $item
	 */
	public function add($item): void;
}