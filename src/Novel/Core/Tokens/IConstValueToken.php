<?php
namespace Novel\Core\Tokens;


use Novel\Core\Tokens\Expressions\IExpression;


interface IConstValueToken extends IExpression
{
	/**
	 * @return mixed
	 */
	public function value();
	
	
	public static function true(): IConstValueToken;
	
	public static function false(): IConstValueToken;
	
	public static function null(): IConstValueToken;
}