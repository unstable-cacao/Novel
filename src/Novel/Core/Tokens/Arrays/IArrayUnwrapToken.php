<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IArrayUnwrapToken extends IValueExpressionToken
{
	public function setTarget(IToken $target): void;
	public function getTarget(): ?IToken;
}