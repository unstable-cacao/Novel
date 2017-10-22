<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpression;


interface IArrayUnwrapToken extends IValueExpression
{
	public function setTarget(IToken $target): void;
	public function getTarget(): ?IToken;
}