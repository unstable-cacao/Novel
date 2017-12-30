<?php
namespace Novel\Core\Tokens\OOP\ClassType;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\Declaration\IExtendsDeclarationToken;
use Novel\Core\Tokens\OOP\Declaration\IImplementsDeclarationToken;


interface IClassDeclarationToken extends 
	INamedToken,
	IExtendsDeclarationToken,
	IImplementsDeclarationToken
{

}