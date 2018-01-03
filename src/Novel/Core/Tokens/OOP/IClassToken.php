<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\ClassType\IMemberClassDefinitionToken;
use Novel\Core\Tokens\OOP\ClassType\IClassDeclarationToken;


interface IClassToken extends 
	IOOPToken, 
	INamedToken
{
	public function getDefinitionToken(): IMemberClassDefinitionToken;
	public function getDeclarationToken(): IClassDeclarationToken;
}