<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;


interface IClassToken extends IToken, INamedToken
{
	public function getDeclarationToken(): IClassDefinitionToken;
	public function getScopeToken(): IClassScopeToken;
}