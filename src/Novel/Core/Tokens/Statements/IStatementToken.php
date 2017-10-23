<?php
namespace Novel\Core\Tokens\Statements;


use Novel\Core\IToken;


interface IStatementToken extends IToken
{
	/**
	 * @param IToken[]|IToken $item
	 */
	public function add($item): void;
}