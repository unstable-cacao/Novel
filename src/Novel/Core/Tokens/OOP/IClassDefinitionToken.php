<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\Declaration\IConstsDefinitionToken;


interface IClassDefinitionToken extends 
	INamedToken,
	IConstsDefinitionToken
{
	
}