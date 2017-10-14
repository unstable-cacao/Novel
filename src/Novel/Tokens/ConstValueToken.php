<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IExpressionToken;


class ConstValueToken extends AbstractToken implements IExpressionToken
{
	public function __construct($value)
	{
		parent::__construct('TODO');
	}


	public static function true(): ConstValueToken 
	{
		
	}
	
	public static function false(): ConstValueToken
	{
		
	}
}