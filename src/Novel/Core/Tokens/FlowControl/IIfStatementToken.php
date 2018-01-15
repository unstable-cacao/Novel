<?php
namespace Novel\Core\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Abstraction\Statements\IFlowControlStatementToken;
use Novel\Core\Tokens\FlowControl\IfStatement\IIfConditionToken;


interface IIfStatementToken extends IFlowControlStatementToken
{
	public function createCondition(?IValueExpressionToken $condition = null, ?IToken $operation = null): IIfConditionToken;
	public function addCondition(IIfConditionToken $conditionToken): void;
	
	/**
	 * @return IIfConditionToken[]
	 */
	public function getConditions(): array;
	
	/**
	 * @return ICodeScopeToken
	 */
	public function getElseStatement(): ICodeScopeToken;
	
	public function hasElseStatement(): bool;
}