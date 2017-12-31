<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDeclarationToken;


interface IInterfaceToken extends 
	IOOPToken, 
	INamedToken
{
	public function getDefinitionToken(): IInterfaceDefinitionToken;
	public function getDeclarationToken(): IInterfaceDeclarationToken;
}