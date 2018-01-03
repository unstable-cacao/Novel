<?php
namespace Novel\Tokens\OOP\TraitType;


use Novel\Core\Tokens\OOP\TraitType\ITraitDefinitionToken;
use Novel\Tokens\OOP\Definition\TConstsDefinitionToken;
use Novel\Tokens\OOP\Definition\TMemberVariablesDefinitionToken;
use Novel\Tokens\OOP\Definition\TMethodsDefinitionToken;
use Novel\Tokens\OOP\Definition\TMethodStubsDefinitionToken;
use Novel\Tokens\OOP\Definition\TUseTraitsDefinitionToken;
use Novel\Tokens\Scope\AbstractScopeToken;


class TraitDefinitionToken extends AbstractScopeToken implements ITraitDefinitionToken
{
	use TUseTraitsDefinitionToken;
	use TConstsDefinitionToken;
	use TMethodStubsDefinitionToken;
	use TMethodsDefinitionToken;
	use TMemberVariablesDefinitionToken;
}