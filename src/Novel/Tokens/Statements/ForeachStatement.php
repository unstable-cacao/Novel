<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\CodeScopeToken;
use Novel\Tokens\Expressions\ForeachIterationExpression;


class ForeachStatement extends AbstractStatementToken
{
	/** @var CodeScopeToken */
	private $body;
	
	/** @var ForeachIterationExpression */
	private $iterationExpression;
	
	
	/**
	 * @param ForeachIterationExpression $iterationExpression
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(ForeachIterationExpression $iterationExpression, $body = null)
	{
		parent::__construct(StatementNames::FOREACH_STATEMENT);
		
		$this->iterationExpression = $this->setupChild($iterationExpression);
		$this->body = $this->setupChild(CodeScopeToken::class);
		
		if ($body)
		{
			$this->body->add($body);
		}
	}
	
	
	public function scope(): CodeScopeToken
	{
		return $this->body;
	}
	
	public function iterationExpression(): ForeachIterationExpression
	{
		return $this->iterationExpression;
	}
	
	public function setIterationExpression(ForeachIterationExpression $expr): void
	{
		$this->iterationExpression = $this->setupChild($expr);
	}
	
	public function addToScope(IToken $token): ForeachStatement
	{
		$this->scope()->add($token);
		return $this;
	}
}