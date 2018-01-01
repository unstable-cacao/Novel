<?php
namespace Novel\Core\Tokens;


use Novel\Core\IToken;
use Novel\Core\Tokens\Statements\IStatementToken;


interface IScopeToken extends IToken
{
	/**
	 * @param IToken|IToken[]|IStatementToken|IStatementToken[] $token
	 */
	public function add(...$token);
}