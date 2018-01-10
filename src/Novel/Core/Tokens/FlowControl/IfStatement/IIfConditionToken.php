<?php
namespace Novel\Core\Tokens\FlowControl\IfStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;


interface IIfConditionToken extends IToken
{
	public function setBody(ICodeScopeToken $body): void;
	public function getBody(): ICodeScopeToken;
	public function getCondition(): IToken;
	public function setCondition(IToken $exp): void;
}