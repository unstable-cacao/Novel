<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IArrayDefinitionToken extends IValueExpressionToken
{
	/**
	 * @param array|IKeyValueToken|IValueExpressionToken|mixed $item
	 */
	public function addItems($item): void;
}