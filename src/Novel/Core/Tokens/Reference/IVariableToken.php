<?php
namespace Novel\Core\Tokens\Reference;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Core\Tokens\Generic\IVariableReferenceToken;


interface IVariableToken extends 
	IVariableReferenceToken, 
	ICallableReferenceToken, 
	IValueExpressionToken
{
	
}