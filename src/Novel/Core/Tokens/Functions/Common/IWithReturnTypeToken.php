<?php
namespace Novel\Core\Tokens\Functions\Common;


use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;


interface IWithReturnTypeToken extends IToken
{
	/**
	 * @param string|INameToken|IName $type
	 */
	public function setReturnType($type): void;
	public function getReturnType(): string;
	public function getReturnTypeName(): IName;
	public function getReturnTypeToken(): INameToken;
}