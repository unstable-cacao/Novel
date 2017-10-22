<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\IToken;
use Novel\Core\Tokens\Expressions\IExpression;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\IConstValueToken;
use Novel\Core\Tokens\Statements\IDoWhileStatement;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\CodeScopeToken;


class DoWhileStatement extends AbstractStatementToken implements IDoWhileStatement
{
	/** @var ICodeScopeToken */
	private $body;
	
	/** @var IExpression */
	private $condition;
	
	
	/**
	 * @param IExpression|null $condition
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(IExpression $condition = null, $body = null)
	{
		parent::__construct(StatementNames::DO_WHILE_STATEMENT);
		
		$this->condition = $this->setupChild($condition ?: IConstValueToken::false());
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
	
	public function condition(): IExpression
	{
		return $this->condition;
	}
	
	public function setCondition(IExpression $expr): void
	{
		$this->condition = $this->setupChild($expr);
	}
	
	public function addToScope(IToken $token)
	{
		$this->scope()->add($token);
	}
}