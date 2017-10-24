<?php

namespace Novel\Core\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpression;


interface IPushElementOperation extends IToken
{
	public function setTarget(IValueExpression $valueExpression): void;
	public function getTarget(): IValueExpression;
	
	public function setValue(IValueExpression $valueExpression): void;
	public function getValue(): IValueExpression;
}