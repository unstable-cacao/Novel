<?php
namespace Novel\Core\Tokens\FlowControl\IfStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IIfConditionToken extends IToken
{
	public function setBody(ICodeScopeToken $body): void;
	public function getBody(): ICodeScopeToken;
	public function getCondition(): IValueExpressionToken;
	public function setCondition(IValueExpressionToken $exp): void;
}