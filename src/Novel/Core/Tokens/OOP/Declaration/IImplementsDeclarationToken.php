<?php
namespace Novel\Core\Tokens\OOP\Declaration;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INamedToken;


interface IImplementsDeclarationToken
{
	/**
	 * @param string|INamedToken|IName $target
	 */
	public function add($target): void;
}