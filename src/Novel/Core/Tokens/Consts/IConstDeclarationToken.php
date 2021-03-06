<?php
namespace Novel\Core\Tokens\Consts;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;


interface IConstDeclarationToken extends INamedToken
{
	/**
	 * @param IToken|string|int|float|double|null $value
	 */
	public function setValue($value): void;
	
	public function getValue(): IToken;
}