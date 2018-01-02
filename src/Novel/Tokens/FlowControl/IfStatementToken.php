<?php
namespace Novel\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\FlowControl\IIfStatementToken;
use Novel\Core\Tokens\FlowControl\IfStatement\IIfConditionToken;

use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Scope\CodeScopeToken;
use Novel\Tokens\FlowControl\IfStatement\IfConditionToken;


class IfStatementToken extends AbstractChildlessToken implements IIfStatementToken
{
	private $conditions = [];
	private $else = null;
	

	public function createCondition(?IValueExpressionToken $condition = null, ?IToken $operation = null): IIfConditionToken
	{
		$ifCondition = new IfConditionToken($condition);
		
		if ($operation)
			$ifCondition->getBody()->add($operation);
		
		$this->conditions[] = $ifCondition;
		
		return $ifCondition;
	}

	public function addCondition(IIfConditionToken $conditionToken): void
	{
		$this->conditions[] = $conditionToken;
	}

	/**
	 * @return IIfConditionToken[]
	 */
	public function getConditions(): array
	{
		return $this->conditions;
	}

	/**
	 * @return ICodeScopeToken
	 */
	public function getElseStatement(): ICodeScopeToken
	{
		if (!$this->else)
			$this->else = new CodeScopeToken();
		
		return $this->else;
	}
}