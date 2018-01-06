<?php
namespace Novel\Core\Tokens\Scope;


use Novel\Core\IToken;


interface IOODefinitionScopeToken extends IScopeToken 
{
	/**
	 * @param IToken|IToken[] $token
	 * @return static
	 */
	public function add(...$token): IOODefinitionScopeToken;
}