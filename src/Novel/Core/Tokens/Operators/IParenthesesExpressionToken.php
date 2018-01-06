<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface IParenthesesExpressionToken extends IToken
{
	public function setTarget(IToken $target): void;
	public function getTarget(): IToken;
}