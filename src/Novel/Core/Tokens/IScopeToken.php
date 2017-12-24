<?php
namespace Novel\Core\Tokens;


use Novel\Core\IToken;


interface IScopeToken extends IToken
{
	/**
	 * @param IToken|IToken[] $token
	 */
	public function add($token);
}