<?php
namespace Novel\Core\Tokens\Scope;


use Novel\Core\IToken;
use Novel\Core\Tokens\Abstraction\Statements\IStatementToken;


interface IStatementsScopeToken extends IScopeToken 
{
	/**
	 * @param IToken|IToken[]|IStatementToken|IStatementToken[] $token
	 * @return static
	 */
	public function add(...$token): IStatementsScopeToken;
}