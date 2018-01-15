<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDeclarationToken;


interface IInterfaceToken extends IOOToken
{
	public function getDeclarationToken(): IInterfaceDeclarationToken;
	public function getDefinitionToken(): IInterfaceDefinitionToken;
}