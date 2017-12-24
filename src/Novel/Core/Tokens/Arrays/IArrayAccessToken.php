<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IArrayAccessToken extends IValueExpressionToken
{
	public function setTarget(IValueExpressionToken $value): void;
	public function getTarget(): IValueExpressionToken;
	
	public function setKey(IValueExpressionToken $key): void;
	public function getKey(): IValueExpressionToken;
}