<?php
namespace Novel\Core\Tokens\Reference;


use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Core\Tokens\Generic\IVariableReferenceToken;


/**
 * Refers to:
 * 
 * $this
 */
interface IThisToken extends 
	IVariableReferenceToken, 
	ICallableReferenceToken,
	IValueExpression
{
	
}