<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\Base\IExpressionToken;
use Novel\Tokens\CodeScopeToken;
use Novel\Tokens\ConstValueToken;


class DoWhileStatement extends AbstractStatementToken
{
	/** @var CodeScopeToken */
	private $body;
	
	/** @var IExpressionToken */
	private $condition;
	
	
	/**
	 * @param IExpressionToken|null $condition
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(IExpressionToken $condition = null, $body = null)
	{
		parent::__construct(StatementNames::DO_WHILE_STATEMENT);
		
		$this->condition = $this->setupChild($condition ?: ConstValueToken::false());
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
	
	public function condition(): IExpressionToken
	{
		return $this->condition;
	}
	
	public function setCondition(IExpressionToken $expr): void
	{
		$this->condition = $this->setupChild($expr);
	}
	
	public function addToScope(IToken $token)
	{
		$this->scope()->add($token);
	}
}