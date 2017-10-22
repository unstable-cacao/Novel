<?php
namespace Novel\Core\Tokens;


use Novel\Core\IToken;


interface ICodeScopeToken
{
	/**
	 * @param IToken|IToken[] $token
	 */
	public function add($token);
}