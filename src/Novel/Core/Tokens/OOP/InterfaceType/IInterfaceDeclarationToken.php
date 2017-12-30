<?php
namespace Novel\Core\Tokens\OOP\InterfaceType;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\Declaration\IExtendsDeclarationToken;


interface IInterfaceDeclarationToken extends 
	INamedToken,
	IExtendsDeclarationToken
{

}