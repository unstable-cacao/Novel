<?php
namespace Novel\Core\Tokens\Scope;


use Novel\Core\IToken;


interface IOODefinitionScopeToken extends IScopeToken 
{
	/**
	 * @param IToken|IToken[] $token
	 */
	public function add(...$token);
}