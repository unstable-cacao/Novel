<?php
namespace Novel\Tokens\OOP;


use Novel\Core\Tokens\Functions\Params\IInvokeParametersListToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\OOP\INewToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Functions\Params\InvokeParametersListToken;
use Novel\Tokens\Named\TNamedToken;


class NewToken extends AbstractChildlessToken implements INewToken
{
	use TNamedToken;
	
	
	/** @var IInvokeParametersListToken */
	private $parameterList;
	
	
	public function __construct(?string $name = null)
	{
		if ($name)
		{
			$this->setName($name);
		}
		
		$this->parameterList = new InvokeParametersListToken();
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