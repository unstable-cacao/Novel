<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\OOP\TraitType\ITraitDefinitionToken;
use Novel\Core\Tokens\OOP\TraitType\ITraitDeclarationToken;


interface ITraitToken extends IOODefinitionToken
{
	public function getDeclarationToken(): ITraitDeclarationToken;
	public function getDefinitionToken(): ITraitDefinitionToken;
}