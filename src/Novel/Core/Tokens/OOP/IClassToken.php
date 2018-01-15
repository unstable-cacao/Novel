<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\OOP\ClassType\IClassDefinitionToken;
use Novel\Core\Tokens\OOP\ClassType\IClassDeclarationToken;


interface IClassToken extends IOOToken
{
	public function getDeclarationToken(): IClassDeclarationToken;
	public function getDefinitionToken(): IClassDefinitionToken;
}