<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\IToken;


/**
 * $a = "ab{$cd}ef"
 * 
 * InStringExpression => {$cd}
 */
interface IInStringExpressionToken extends IToken
{
	
}