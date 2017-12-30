<?php
namespace Novel\Core\Tokens\Functions\Params;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IParamListDefinition extends IToken
{
	public const NO_DEFAULT_VALUE = 'IParamListDefinition_NoDefValue';
	
	
	/**
	 * @param IParamDefinitionToken[]|string[]|INamedToken[]|IParamDefinitionToken|string|INamedToken $item
	 * @return IParamListDefinition
	 */
	public function add(...$item): IParamListDefinition;

	/**
	 * @param string|INamedToken null $type
	 * @param string|INamedToken $name
	 * @param IValueExpressionToken|null|mixed $defaultValue
	 * @return IParamListDefinition
	 */
	public function addParameter($type, $name, $defaultValue = self::NO_DEFAULT_VALUE): IParamListDefinition;
}