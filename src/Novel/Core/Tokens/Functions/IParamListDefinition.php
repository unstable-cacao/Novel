<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\Generic\IValueExpression;


interface IParamListDefinition extends IToken
{
	/**
	 * @param array|IParamDefinitionToken|string $item
	 * @return IParamListDefinition
	 */
	public function add($item): IParamListDefinition;

	/**
	 * @param string|INameToken|IName null $type
	 * @param string|INameToken|IName $name
	 * @param IValueExpression|null|mixed $defaultValue
	 * @return IParamListDefinition
	 */
	public function addParameter($type, $name, $defaultValue): IParamListDefinition;
}