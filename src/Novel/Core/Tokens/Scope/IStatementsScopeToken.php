<?php
namespace Novel\Core\Tokens\Scope;


use Novel\Core\IToken;
use Novel\Core\Tokens\Statements\IStatementToken;


interface IStatementsScopeToken extends IScopeToken 
{
	/**
	 * @param IToken|IToken[]|IStatementToken|IStatementToken[] $token
	 * @return static
	 */
	public function add(...$token): IStatementsScopeToken;
}