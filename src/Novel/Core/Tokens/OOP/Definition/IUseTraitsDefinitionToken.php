<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\IScopeToken;


interface IUseTraitsDefinitionToken extends IScopeToken
{
	/**
	 * @param string|INamedToken|string[]|INamedToken[] $item
	 */
	public function addTrait(...$item): void;
}