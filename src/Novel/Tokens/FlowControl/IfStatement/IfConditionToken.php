<?php
namespace Novel\Tokens\FlowControl\IfStatement;


use Novel\Core\Tokens\FlowControl\IfStatement\IIfConditionToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class IfConditionToken extends AbstractChildlessToken implements IIfConditionToken
{
	/** @var IValueExpressionToken */
	private $condition;
	
	/** @var  ICodeScopeToken */
	private $body;
	
	
	public function __construct(?IValueExpressionToken $condition = null)
	{
		if ($condition)
			$this->setCondition($condition);
	}


	public function setBody(ICodeScopeToken $body): void
	{
		$this->body = $body;
	}
	
	public function getBody(): ICodeScopeToken
	{
		return $this->body;
	}
	
	public function getCondition(): IValueExpressionToken
	{
		return $this->condition;
	}
	
	public function setCondition(IValueExpressionToken $exp): void
	{
		$this->condition = $exp;
	}
}