<?php
namespace Novel\Core\Tokens\Strings;


/**
 * $a = <<<EOF
 * 
 * EOF;
 */
interface IHeredocToken extends IStringExpressionToken
{
	public function getName(): IPlainTextToken;
}