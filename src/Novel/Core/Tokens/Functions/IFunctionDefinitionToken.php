<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Generic\IValueExpression;


interface IFunctionDefinitionToken extends INamedToken 
{
	public function setParameterList(IParamListDefinition $list): void;
	public function getParameterList(): IParamListDefinition;
	
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

	/**
	 * @param string|INameToken|IName $type
	 */
	public function setReturnType($type): void;
	public function getReturnType(): string;
	public function getReturnTypeName(): IName;
	public function getReturnTypeToken(): INameToken;
}