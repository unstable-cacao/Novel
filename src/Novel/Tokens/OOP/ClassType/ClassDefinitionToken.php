<?php
namespace Novel\Tokens\OOP\ClassType;


use Novel\Core\Tokens\OOP\ClassType\IClassDefinitionToken;
use Novel\Tokens\OOP\Definition\TConstsDefinitionToken;
use Novel\Tokens\OOP\Definition\TMemberVariablesDefinitionToken;
use Novel\Tokens\OOP\Definition\TMethodsDefinitionToken;
use Novel\Tokens\OOP\Definition\TMethodStubsDefinitionToken;
use Novel\Tokens\OOP\Definition\TUseTraitsDefinitionToken;
use Novel\Tokens\Scope\AbstractStatementsScopeToken;


class ClassDefinitionToken extends AbstractStatementsScopeToken implements IClassDefinitionToken
{
	use TUseTraitsDefinitionToken;
	use TConstsDefinitionToken;
	use TMethodStubsDefinitionToken;
	use TMethodsDefinitionToken;
	use TMemberVariablesDefinitionToken;
}