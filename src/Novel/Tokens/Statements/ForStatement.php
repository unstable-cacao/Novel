<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\Base\IExpressionToken;
use Novel\Tokens\CodeScopeToken;
use Novel\Tokens\ConstValueToken;


class ForStatement extends AbstractStatementToken
{
	/** @var CodeScopeToken */
	private $body;
	
	/** @var IExpressionToken */
	private $condition;
	
	/** @var IExpressionToken|null */
	private $initStatement = null;
	
	/** @var IExpressionToken|null */
	private $loopStatement = null;
	
	
	/**
	 * @param IExpressionToken|null $condition
	 * @param IExpressionToken|null $initStatement
	 * @param IExpressionToken|null $loopStatement
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(IExpressionToken $condition = null, 
								?IExpressionToken $initStatement = null, 
								?IExpressionToken $loopStatement = null, 
								$body = null)
	{
		parent::__construct(StatementNames::FOR_STATEMENT);
		
		$this->condition = $this->setupChild($condition ?: ConstValueToken::false());
		$this->body = $this->setupChild(CodeScopeToken::class);
		
		if ($initStatement)
		{
			$this->initStatement = $this->setupChild($initStatement);
		}
		
		if ($loopStatement)
		{
			$this->loopStatement = $this->setupChild($loopStatement);
		}
		
		if ($body)
		{
			$this->body->add($body);
		}
	}
	
	
	public function scope(): CodeScopeToken
	{
		return $this->body;
	}
	
	public function condition(): IExpressionToken
	{
		return $this->condition;
	}
	
	public function initStatement(): ?IExpressionToken
	{
		return $this->initStatement;
	}
	
	public function loopStatement(): ?IExpressionToken
	{
		return $this->loopStatement;
	}
	
	public function setCondition(IExpressionToken $expr): void
	{
		$this->condition = $this->setupChild($expr);
	}
	
	public function addToScope(IToken $token)
	{
		$this->scope()->add($token);
	}
	
	public function setInitStatement(IExpressionToken $expr): void
	{
		$this->initStatement = $this->setupChild($expr);
	}
	
	public function setLoopStatement(IExpressionToken $expr): void
	{
		$this->loopStatement = $this->setupChild($expr);
	}
}