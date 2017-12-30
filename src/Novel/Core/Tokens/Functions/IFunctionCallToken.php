<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Functions\Params\IInvokeParametersListToken;


interface IFunctionCallToken extends IValueExpressionToken
{
	public function getTarget(): IToken;
	public function setTarget(IToken $token): void;
	
	public function getParametersList(): IInvokeParametersListToken;
	public function setParametersList(IInvokeParametersListToken $token): void;

	/**
	 * @param IValueExpressionToken|IValueExpressionToken[] $item
	 */
	public function addParameter(...$item): void;
}