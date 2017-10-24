<?php
namespace Novel\Core\Tokens;


use Novel\Core\Tokens\Generic\IValueExpression;


interface IConstValueToken extends IValueExpression
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