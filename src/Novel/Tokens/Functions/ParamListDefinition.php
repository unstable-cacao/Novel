<?php
namespace Novel\Tokens\Functions;


use Novel\Core\Tokens\Functions\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\IParamListDefinition;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;


class ParamListDefinition implements IParamListDefinition
{
	/**
	 * @param array|IParamDefinitionToken|string $item
	 * @return IParamListDefinition
	 */
	public function add($item): IParamListDefinition
	{
		// TODO: Implement add() method.
	}
	
	/**
	 * @param string|INameToken|IName null $type
	 * @param string|INameToken|IName $name
	 * @param IValueExpression|null|mixed $defaultValue
	 * @return IParamListDefinition
	 */
	public function addParameter($type, $name, $defaultValue): IParamListDefinition
	{
		// TODO: Implement addParameter() method.
	}
}