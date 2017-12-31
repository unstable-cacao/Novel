<?php
namespace Novel\Core\Tokens\Consts;


use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IConstValueToken extends IValueExpressionToken
{
	/**
	 * @return mixed
	 */
	public function getValue();

	/**
	 * @param mixed $value
	 */
	public function setValue($value): void;
	
	public static function true(): IConstValueToken;
	public static function false(): IConstValueToken;
	public static function null(): IConstValueToken;
}