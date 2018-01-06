<?php
namespace Novel\Core\Tokens\FlowControl;


use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Statements\IFlowControlStatmentToken;


interface IWhileStatementToken extends IFlowControlStatmentToken
{
	public function setCondition(IValueExpressionToken $token): void;
	public function getCondition(): IValueExpressionToken;
	
	public function setBody(ICodeScopeToken $body): void; 
	public function getBody(): ICodeScopeToken;
}