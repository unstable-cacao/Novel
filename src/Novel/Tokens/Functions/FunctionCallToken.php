<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IFunctionCallToken;
use Novel\Core\Tokens\Functions\Params\IInvokeParametersListToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class FunctionCallToken extends AbstractChildlessToken implements IFunctionCallToken
{
	/** @var IToken */
	private $target;
	
	/** @var IInvokeParametersListToken */
	private $parameterList;
	
	
	public function getTarget(): IToken
	{
		return $this->target;
	}
	
	public function setTarget(IToken $token): void
	{
		$this->target = $token;
	}
	
	public function getParametersList(): IInvokeParametersListToken
	{
		return $this->parameterList;
	}
	
	public function setParametersList(IInvokeParametersListToken $token): void
	{
		$this->parameterList = $token;
	}
	
	/**
	 * @param IValueExpressionToken|IValueExpressionToken[] $item
	 */
	public function addParameter(...$item): void
	{
		$this->parameterList->add(...$item);
	}
}