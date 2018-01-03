<?php
namespace Novel\Tokens\OOP\InterfaceType;


use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Tokens\OOP\Definition\TConstsDefinitionToken;
use Novel\Tokens\OOP\Definition\TMethodStubsDefinitionToken;
use Novel\Tokens\Scope\AbstractScopeToken;


class InterfaceDefinitionToken extends AbstractScopeToken implements IInterfaceDefinitionToken
{
	use TConstsDefinitionToken;
	use TMethodStubsDefinitionToken;
}