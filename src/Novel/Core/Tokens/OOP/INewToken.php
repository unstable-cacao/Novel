<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\Functions\Params\IInvokeParametersListToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\INamedToken;


interface INewToken extends INamedToken
{
	public function getParametersList(): IInvokeParametersListToken;
	public function setParametersList(IInvokeParametersListToken $token): void;
	
	/**
	 * @param IValueExpressionToken|IValueExpressionToken[] $item
	 */
	public function addParameter(...$item): void;
}