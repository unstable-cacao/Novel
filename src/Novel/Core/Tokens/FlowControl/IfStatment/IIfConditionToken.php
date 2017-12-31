<?php
namespace Novel\Core\Tokens\FlowControl\IfStatment;


use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IIfConditionToken extends IToken
{
	public function getBody(): ICodeScopeToken;
	public function getCondition(): IValueExpressionToken;
	public function setCondition(IValueExpressionToken $exp): void;
}