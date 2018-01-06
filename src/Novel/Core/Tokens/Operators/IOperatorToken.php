<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface IOperatorToken extends IToken
{
	public function getOperator(): string;
}