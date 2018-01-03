<?php
namespace Novel\Core\Tokens\OOP\ClassType;


use Novel\Core\Tokens\OOP\Definition\IConstsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMethodsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IUseTraitsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMemberVariablesDefinitionToken;


interface IMemberClassDefinitionToken extends
	IUseTraitsDefinitionToken,
	IConstsDefinitionToken,
	IMethodsDefinitionToken,
	IMemberVariablesDefinitionToken
{
	
}