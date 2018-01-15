<?php
namespace Novel\Core\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Core\Tokens\Abstraction\Statements\IFlowControlStatementToken;
use Novel\Core\Tokens\FlowControl\ForeachStatement\IForeachIterationToken;


interface IForeachStatementToken extends IFlowControlStatementToken
{
	public function getIteration(): IForeachIterationToken;
	public function getBody(): ICodeScopeToken;

	/**
	 * @param string|IToken $target
	 * @param string|IToken $item
	 * @param string|IToken|null $value IF set, $item is treated as the key and value as the value.
	 * @return IForeachIterationToken
	 */
	public function setIteration($target, $item, $value = null): IForeachIterationToken;
}