<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\Tokens\Generic\IValueExpressionToken;


/**
 * $a = <<<EOF
 * 
 * EOF;
 */
interface IHeredocToken extends IStringExpressionToken
{

}