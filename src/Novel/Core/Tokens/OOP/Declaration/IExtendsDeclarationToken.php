<?php
namespace Novel\Core\Tokens\OOP\Declaration;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\OOP\Common\IDeclarationToken;


interface IExtendsDeclarationToken extends IDeclarationToken
{
	/**
	 * @param string|INamedToken|IName $target
	 */
	public function add($target): void;
}