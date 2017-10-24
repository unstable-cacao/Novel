<?php
namespace Novel\Core\Tokens\Arrays;


use Novel\Core\Tokens\Generic\IValueExpression;


interface IArrayAccessToken extends IValueExpression
{
	public function setTarget(IValueExpression $value): void;
	public function getTarget(): IValueExpression;
	
	public function setKey(IValueExpression $key): void;
	public function getKey(): IValueExpression;
}