<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IKeyValueToken extends IToken
{
	public function getKey(): IValueExpressionToken;

	/**
	 * @param IValueExpressionToken|string|int $exp
	 */
	public function setKey($exp): void;
	
	public function getValue(): IValueExpressionToken;

	/**
	 * @param IValueExpressionToken|mixed $exp
	 */
	public function setValue($exp): void;

	/**
	 * @param IValueExpressionToken|string|int $key
	 * @param IValueExpressionToken|mixed $val
	 */
	public function set($key, $val): void;
}