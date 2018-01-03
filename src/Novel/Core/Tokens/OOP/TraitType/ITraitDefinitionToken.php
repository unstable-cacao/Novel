<?php
namespace Novel\Core\Tokens\OOP\TraitType;


use Novel\Core\Tokens\OOP\Definition\IConstsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMethodsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IUseTraitsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMemberVariablesDefinitionToken;


interface ITraitDefinitionToken extends
	IUseTraitsDefinitionToken,
	IConstsDefinitionToken,
	IMethodsDefinitionToken,
	IMemberVariablesDefinitionToken
{
	
}