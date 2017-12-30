<?php
namespace Novel\Core\Tokens\OOP\TraitType;


use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\OOP\Definition\IConstsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMethodsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IUseTraitsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IVariablesDefinitionToken;


interface ITraitDefinitionToken extends 
	IScopeToken,
	IUseTraitsDefinitionToken,
	IConstsDefinitionToken,
	IMethodsDefinitionToken,
	IVariablesDefinitionToken
{
	
}