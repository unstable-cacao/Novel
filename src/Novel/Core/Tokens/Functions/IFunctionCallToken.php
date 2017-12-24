<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;


interface IFunctionCallToken extends IValueExpressionToken, ICallableReferenceToken
{
	public function getTarget(): ICallableReferenceToken;
	public function setTarget(ICallableReferenceToken $token): void;
	
	public function getParametersList(): IInvokeParametersListToken;
	public function setParametersList(IInvokeParametersListToken $token);

	/**
	 * @param IValueExpressionToken|IValueExpressionToken[] $item
	 * @return mixed
	 */
	public function addParameter($item);
}