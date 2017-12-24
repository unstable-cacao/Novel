<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\Tokens\Generic\IValueExpressionToken;


/**
 * $a = <<<'EOF'
 * 
 * EOF;
 */
interface INowdocToken extends IValueExpressionToken
{
	/**
	 * @param string|IPlainTextToken $text
	 */
	public function setText($text): void;
	
	public function getText($text): string;
	public function getPlainText(): IPlainTextToken;
}