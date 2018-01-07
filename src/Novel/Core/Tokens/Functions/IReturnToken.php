<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;


interface IReturnToken extends IToken
{
	public function getValue(): IToken;
	
	/**
	 * @param IToken|mixed $token
	 */
	public function setValue($token): void;
}