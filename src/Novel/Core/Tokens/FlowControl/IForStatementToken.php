<?php
namespace Novel\Core\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\Statements\IFlowControlStatmentToken;
use Novel\Core\Tokens\FlowControl\ForStatement\IForIterationToken;


interface IForStatementToken extends IFlowControlStatmentToken
{
	public function getIteration(): IForIterationToken;
	public function setIterationToken(IForIterationToken $token): void;
	public function setIteration(IToken $definition, IToken $condition, IToken $operation): void;
	
	public function setBody(ICodeScopeToken $token): void;
	public function getBody(): ICodeScopeToken;
}