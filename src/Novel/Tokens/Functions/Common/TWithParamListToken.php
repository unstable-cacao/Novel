<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\Functions\Params\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\Params\IParamListDefinition;
use Novel\Core\Tokens\INamedToken;


trait TWithParamListToken
{
	/** @var IParamListDefinition */
	private $paramListToken;
	
	
	public function getParamListToken(): IParamListDefinition
	{
		return $this->paramListToken;
	}
	
	/**
	 * @param IParamDefinitionToken[]|string[]|INamedToken[]|IParamDefinitionToken|string|INamedToken $item ...$item
	 */
	public function addParam(...$item): void
	{
		$this->paramListToken->add(...$item);
	}
}