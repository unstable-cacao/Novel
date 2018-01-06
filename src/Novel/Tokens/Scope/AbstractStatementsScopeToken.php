<?php
namespace Novel\Tokens\Scope;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\IStatementsScopeToken;
use Novel\Core\Tokens\Statements\IStatementToken;
use Novel\Tokens\Base\AbstractParentToken;
use Novel\Tokens\Statements\ExpressionStatementToken;


abstract class AbstractStatementsScopeToken extends AbstractParentToken implements IStatementsScopeToken
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
	 * @return static|IStatementsScopeToken
	 */
	public function add(...$tokens): IStatementsScopeToken
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