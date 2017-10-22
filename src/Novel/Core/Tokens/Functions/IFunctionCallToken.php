<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Tokens\Base\IExpression;


interface IFunctionCallToken extends IExpression, ICallableReferenceToken
{
	public function getTarget(): ICallableReferenceToken;
	public function setTarget(ICallableReferenceToken $token): void;
	
	public function getParametersList(): IInvokeParametersListToken;
	public function setParametersList(IInvokeParametersListToken $token);

	/**
	 * @param IExpression|IExpression[] $item
	 * @return mixed
	 */
	public function addParameter($item);
}