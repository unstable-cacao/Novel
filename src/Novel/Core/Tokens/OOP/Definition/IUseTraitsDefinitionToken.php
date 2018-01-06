<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Scope\IOODefinitionScopeToken;


interface IUseTraitsDefinitionToken extends IOODefinitionScopeToken
{
	/**
	 * @param string|INamedToken|string[]|INamedToken[] $item
	 */
	public function addTrait(...$item): void;
}