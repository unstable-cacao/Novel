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
		
		if (!is_scalar($value) && !is_null($value))
			throw new \Exception("ConstValue must be scalar or null");
		
		$this->value = $value;
	}
	
	
	/**
	 * @return mixed
	 */
	public function value()
	{
		return $this->value;
	}
	

	public static function true(): ConstValueToken 
	{
		return new static(true);
	}
	
	public static function false(): ConstValueToken
	{
		return new static(false);
	}
	
	public static function null(): ConstValueToken
	{
		return new static(null);
	}
}