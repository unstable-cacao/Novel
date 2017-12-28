<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\INamedToken;


/**
 * $a = <<<'EOF'
 * 
 * EOF;
 */
interface INowdocToken extends IValueExpressionToken, INamedToken
{
	/**
	 * @param string|IPlainTextToken $text
	 */
	public function setText($text): void;
	
	/**
	 * @param string|IPlainTextToken $text
	 */
	public function addText($text): void;
	
	public function getText(): string;
	public function getPlainText(): IPlainTextToken;
}