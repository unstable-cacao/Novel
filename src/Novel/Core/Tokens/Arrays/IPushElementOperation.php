<?php

namespace Novel\Core\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IPushElementOperation extends IToken
{
	public function setTarget(IValueExpressionToken $valueExpression): void;
	public function getTarget(): IValueExpressionToken;
	
	public function setValue(IValueExpressionToken $valueExpression): void;
	public function getValue(): IValueExpressionToken;
}