<?php
namespace Novel\Tokens\Scope;


use Novel\Core\IToken;
use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\Statements\IStatementToken;
use Novel\Tokens\Base\AbstractParentToken;
use Novel\Tokens\Statements\ExpressionStatementToken;


abstract class AbstractScopeToken extends AbstractParentToken implements IScopeToken
{
	/**
	 * @param IToken[] $children
	 */
	public function __construct(...$children)
	{
		if ($children)
			$this->add($children);
	}
	
	
	/**
	 * @param IToken|IToken[]|IStatementToken|IStatementToken[] $tokens
	 */
	public function add(...$tokens)
	{
		foreach ($tokens as $token)
		{
			if (is_array($token))
			{
				$this->add(...$token);
			}
			else
			{
				$this->addChildren(ExpressionStatementToken::toStatement($token));
			}
		}
	}
}