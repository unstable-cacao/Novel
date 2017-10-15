<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IExpressionToken;


class ConstValueToken extends AbstractToken implements IExpressionToken
{
	/** @var mixed */
	private $value;
	
	
	public function __construct($value)
	{
		parent::__construct(TokenNames::CONST_VALUE);
		$this->value = $value;
	}


	public static function true(): ConstValueToken 
	{
		return new static(true);
	}
	
	public static function false(): ConstValueToken
	{
		return new static(false);
	}
}