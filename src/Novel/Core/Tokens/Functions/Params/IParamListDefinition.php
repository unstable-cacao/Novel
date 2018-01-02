<?php
namespace Novel\Core\Tokens\Functions\Params;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\INameToken;


interface IParamListDefinition extends IToken
{
	public const NO_DEFAULT_VALUE = 'IParamListDefinition_NoDefValue';
	
	
	/**
	 * @param IParamDefinitionToken[]|string[]|INameToken[]|IParamDefinitionToken|string|INameToken $item
	 * @return IParamListDefinition
	 */
	public function add(...$item): IParamListDefinition;

	/**
	 * @param string|INameToken null $type
	 * @param string|INameToken $name
	 * @param IValueExpressionToken|null|mixed $defaultValue
	 * @return IParamListDefinition
	 */
	public function addParameter($type, $name, $defaultValue = self::NO_DEFAULT_VALUE): IParamListDefinition;
}