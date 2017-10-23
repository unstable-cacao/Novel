<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;


interface IFunctionCallToken extends IValueExpression, ICallableReferenceToken
{
	public function getTarget(): ICallableReferenceToken;
	public function setTarget(ICallableReferenceToken $token): void;
	
	public function getParametersList(): IInvokeParametersListToken;
	public function setParametersList(IInvokeParametersListToken $token);

	/**
	 * @param IValueExpression|IValueExpression[] $item
	 * @return mixed
	 */
	public function addParameter($item);
}