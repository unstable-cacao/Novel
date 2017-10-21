<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpression;


interface IKeyValueToken extends IToken
{
	public function getKey(): IValueExpression;

	/**
	 * @param IValueExpression|string|int $exp
	 */
	public function setKey($exp): void;
	
	public function getValue(): IValueExpression;

	/**
	 * @param IValueExpression|mixed $exp
	 */
	public function setValue($exp): void;

	/**
	 * @param IValueExpression|string|int $key
	 * @param IValueExpression|mixed $val
	 * @return mixed
	 */
	public function set($key, $val);
}