<?php
namespace Novel\Tokens\FlowControl;


use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\FlowControl\IWhileStatementToken;

use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Scope\CodeScopeToken;
use Novel\Tokens\Consts\ConstValueToken;


class WhileStatementToken extends AbstractChildlessToken implements IWhileStatementToken
{
	/** @var IValueExpressionToken */
	private $condition;
	
	/** @var ICodeScopeToken */
	private $body;
	
	
	public function __construct(?IValueExpressionToken $condition = null)
	{
		if ($condition)
			$this->condition = $condition;
		else
			$this->condition = ConstValueToken::false();
		
		$this->body = new CodeScopeToken();
	}
	
	
	public function setCondition(IValueExpressionToken $token): void
	{
		$this->condition = $token;
	}
	
	public function getCondition(): IValueExpressionToken
	{
		return $this->condition;
	}
	
	public function setBody(ICodeScopeToken $body): void
	{
		$this->body = $body;
	}
	
	public function getBody(): ICodeScopeToken
	{
		return $this->body;
	}
}