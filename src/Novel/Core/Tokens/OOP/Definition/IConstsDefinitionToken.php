<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\IAccessibilityToken;
use Novel\Core\Tokens\OOP\Common\IDefinitionScopeToken;


interface IConstsDefinitionToken extends IToken, IDefinitionScopeToken
{
	/**
	 * @param string|IName|INamedToken $name
	 * @param int|string|bool|float|array|IToken $value
	 * @param string|IAccessibilityToken $access
	 * @return mixed
	 */
	public function addConst($name, $value, $access = AccessType::PUBLIC);
	
	
}