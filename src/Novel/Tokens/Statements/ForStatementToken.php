<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\IToken;
use Novel\Core\Tokens\Expressions\IExpression;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\IConstValueToken;
use Novel\Core\Tokens\Statements\IForStatementToken;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\CodeScopeToken;


class ForStatementToken extends AbstractStatementToken implements IForStatementToken
{
	/** @var ICodeScopeToken */
	private $body;
	
	/** @var IExpression */
	private $condition;
	
	/** @var IExpression|null */
	private $initStatement = null;
	
	/** @var IExpression|null */
	private $loopStatement = null;
	
	
	/**
	 * @param IExpression|null $condition
	 * @param IExpression|null $initStatement
	 * @param IExpression|null $loopStatement
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(IExpression $condition = null,
								?IExpression $initStatement = null,
								?IExpression $loopStatement = null,
								$body = null)
	{
		parent::__construct(StatementNames::FOR_STATEMENT);
		
		$this->condition = $this->setupChild($condition ?: IConstValueToken::false());
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
	
	
	public function scope(): ICodeScopeToken
	{
		return $this->body;
	}
	
	public function setScope(ICodeScopeToken $scope)
	{
		$this->body = $this->setupChild($scope);
	}
	
	public function condition(): IExpression
	{
		return $this->condition;
	}
	
	public function initStatement(): ?IExpression
	{
		return $this->initStatement;
	}
	
	public function loopStatement(): ?IExpression
	{
		return $this->loopStatement;
	}
	
	public function setCondition(IExpression $expr): void
	{
		$this->condition = $this->setupChild($expr);
	}
	
	public function addToScope(IToken $token)
	{
		$this->scope()->add($token);
	}
	
	public function setInitStatement(IExpression $expr): void
	{
		$this->initStatement = $this->setupChild($expr);
	}
	
	public function setLoopStatement(IExpression $expr): void
	{
		$this->loopStatement = $this->setupChild($expr);
	}
}