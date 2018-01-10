<?php
namespace Novel\Tokens\FlowControl\IfStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\FlowControl\IfStatement\IIfConditionToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class IfConditionToken extends AbstractChildlessToken implements IIfConditionToken
{
	/** @var IToken */
	private $condition;
	
	/** @var  ICodeScopeToken */
	private $body;
	
	
	public function __construct(?IToken $condition = null)
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
	
	public function getCondition(): IToken
	{
		return $this->condition;
	}
	
	public function setCondition(IToken $exp): void
	{
		$this->condition = $exp;
	}
}