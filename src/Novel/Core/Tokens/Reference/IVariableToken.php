<?php
namespace Novel\Core\Tokens\Reference;


use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Core\Tokens\Generic\IVariableReferenceToken;


/**
 * $a
 * self::$a
 * ClassName::$a
 */
interface IVariableToken extends 
	IVariableReferenceToken, 
	ICallableReferenceToken, 
	IValueExpression, 
	INamedToken
{
	
}