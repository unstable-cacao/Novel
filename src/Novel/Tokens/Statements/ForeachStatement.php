<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\IToken;
use Novel\Core\Tokens\Expressions\IForeachIterationExpression;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\Statements\IForStatement;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\CodeScopeToken;


class ForeachStatement extends AbstractStatementToken implements IForStatement
{
	/** @var ICodeScopeToken */
	private $body;
	
	/** @var IForeachIterationExpression */
	private $iterationExpression;
	
	
	/**
	 * @param IForeachIterationExpression $iterationExpression
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(IForeachIterationExpression $iterationExpression, $body = null)
	{
		parent::__construct(StatementNames::FOREACH_STATEMENT);
		
		$this->iterationExpression = $this->setupChild($iterationExpression);
		$this->body = $this->setupChild(CodeScopeToken::class);
		
		if ($body)
		{
			$this->body->add($body);
		}
	}
	
	
	public function scope(): ICodeScopeToken
	{
		return $this->body;
	}
	
	public function setScope(ICodeScopeToken $scope)
	{
		$this->body = $this->setupChild($scope);
	}
	
	public function iterationExpression(): IForeachIterationExpression
	{
		return $this->iterationExpression;
	}
	
	public function setIterationExpression(IForeachIterationExpression $expr): void
	{
		$this->iterationExpression = $this->setupChild($expr);
	}
	
	public function addToScope(IToken $token): ForeachStatement
	{
		$this->scope()->add($token);
		return $this;
	}
}