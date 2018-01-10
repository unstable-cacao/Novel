<?php
namespace Novel\Core\Tokens\OOP\Declaration;


use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\INameToken;


interface IExtendsDeclarationToken extends IToken
{
	/**
	 * @param string|INamedToken|IName $target
	 */
	public function addExtend($target): void;
	
	public function getExtend(): INameToken;
	
	public function isExtend(): bool;
}