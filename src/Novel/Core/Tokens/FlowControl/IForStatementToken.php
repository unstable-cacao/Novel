<?php
namespace Novel\Core\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Core\Tokens\Abstraction\Statements\IFlowControlStatementToken;
use Novel\Core\Tokens\FlowControl\ForStatement\IForIterationToken;


interface IForStatementToken extends IFlowControlStatementToken
{
	public function getIteration(): IForIterationToken;
	public function setIterationToken(IForIterationToken $token): IForIterationToken;
	public function setIteration(IToken $definition, IToken $condition, IToken $operation): IForIterationToken;
	
	public function setBody(ICodeScopeToken $token): void;
	public function getBody(): ICodeScopeToken;
}