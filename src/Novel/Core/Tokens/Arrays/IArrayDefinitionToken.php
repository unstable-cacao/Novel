<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\Tokens\Generic\IValueExpression;


interface IArrayDefinitionToken extends IValueExpression
{
	/**
	 * @param array|IKeyValueToken|IValueExpression|mixed $item
	 */
	public function addItems($item): void;
}