<?php
namespace Novel\Core\Tokens\Consts;


use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\INamedToken;


interface IConstDeclarationToken extends INamedToken
{
	/**
	 * @param IValueExpressionToken|string|int|float|double|null $value
	 */
	public function setValue($value): void;
	
	public function getValue(): IConstValueToken;
}