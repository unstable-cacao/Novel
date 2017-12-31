<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\TraitType\ITraitDefinitionToken;
use Novel\Core\Tokens\OOP\TraitType\ITraitDeclarationToken;


interface ITraitToken extends 
	IOOPToken, 
	INamedToken
{
	public function getDefinitionToken(): ITraitDefinitionToken;
	public function getDeclarationToken(): ITraitDeclarationToken;
}