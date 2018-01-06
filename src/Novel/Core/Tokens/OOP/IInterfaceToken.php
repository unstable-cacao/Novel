<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDeclarationToken;


interface IInterfaceToken extends IOODefinitionToken
{
	public function getDeclarationToken(): IInterfaceDeclarationToken;
	public function getDefinitionToken(): IInterfaceDefinitionToken;
}