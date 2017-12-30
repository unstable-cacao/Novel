<?php
namespace Novel\Core\Tokens\OOP\InterfaceType;


use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\OOP\Definition\IConstsDefinitionToken;
use Novel\Core\Tokens\OOP\Definition\IMethodStubsDefinitionToken;


interface IInterfaceDefinitionToken extends 
	IScopeToken,
	IConstsDefinitionToken,
	IMethodStubsDefinitionToken
{

}