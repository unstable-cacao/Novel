<?php
namespace Novel\Core\Tokens\OOP\ClassType;


use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\OOP\Definition\IConstsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMethodsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IUseTraitsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IVariablesDefinitionToken;


interface IClassDefinitionToken extends 
	IScopeToken,
	IUseTraitsDefinitionToken,
	IConstsDefinitionToken,
	IMethodsDefinitionToken,
	IVariablesDefinitionToken
{
	
}