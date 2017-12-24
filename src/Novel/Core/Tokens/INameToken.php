<?php
namespace Novel\Core\Tokens;


use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


/**
 * Refers to any name:
 * 
 * $a - a is INameToken
 * self::$b - b is INameToken
 * substr('ab', 1, 2); - substr is INameToken
 */
interface INameToken extends 
	ICallableReferenceToken,
	IValueExpressionToken
{
	public function getName(): string;
	public function getNameObject(): IName;
}