<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\Tokens\Generic\IValueExpression;


/**
 * $a = <<<EOF
 * 
 * EOF;
 */
interface IHeredocToken extends IStringExpressionToken
{

}