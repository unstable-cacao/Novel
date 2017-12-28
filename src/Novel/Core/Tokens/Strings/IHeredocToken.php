<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\Tokens\INamedToken;


/**
 * $a = <<<EOF
 * 
 * EOF;
 */
interface IHeredocToken extends IStringExpressionToken, INamedToken
{
	
}