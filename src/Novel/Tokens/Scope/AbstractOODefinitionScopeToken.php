<?php
namespace Novel\Tokens\Scope;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\IOODefinitionScopeToken;
use Novel\Tokens\Base\AbstractParentToken;


abstract class AbstractOODefinitionScopeToken extends AbstractParentToken implements IOODefinitionScopeToken
{
	/**
	 * @param IToken|IToken[] $token
	 * @return static|IOODefinitionScopeToken
	 */
	public function add(...$token): IOODefinitionScopeToken
	{
		$this->addChildren(...$token);
		return $this;
	}
}