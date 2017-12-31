<?php
namespace Novel\Tokens\Consts;


use Novel\Core\Tokens\Consts\IConstValueToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class ConstValueToken extends AbstractChildlessToken implements IConstValueToken
{
	/** @var mixed */
	private $value;
	
	
	public function __construct($value)
	{
		$this->setValue($value);
	}
	
	
	/**
	 * @return mixed
	 */
	public function value()
	{
		return $this->value;
	}
	
	/**
	 * @param mixed $value
	 */
	public function setValue($value): void
	{
		if (!is_scalar($value) && !is_null($value))
			throw new \Exception("ConstValue must be scalar or null");
		
		$this->value = $value;
	}
	
	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}
	
	
	public static function true(): IConstValueToken
	{
		return new static(true);
	}
	
	public static function false(): IConstValueToken
	{
		return new static(false);
	}
	
	public static function null(): IConstValueToken
	{
		return new static(null);
	}
}