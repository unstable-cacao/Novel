<?php
namespace Novel\Tokens\OOP\InterfaceType;


use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Tokens\OOP\Definition\TConstsDefinitionToken;
use Novel\Tokens\OOP\Definition\TMethodStubsDefinitionToken;
use Novel\Tokens\Scope\AbstractStatementsScopeToken;


class InterfaceDefinitionToken extends AbstractStatementsScopeToken implements IInterfaceDefinitionToken
{
	use TConstsDefinitionToken;
	use TMethodStubsDefinitionToken;
}