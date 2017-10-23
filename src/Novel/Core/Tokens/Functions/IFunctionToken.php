<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;


interface IFunctionToken extends IFunctionDefinitionToken
{
	public function setBody(ICodeScopeToken $body): void;
	public function getBody(): ICodeScopeToken;

	/**
	 * @param IToken|IToken[] $item
	 */
	public function addToBody($item): void;
}