<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Core\Tokens\IConstValueToken;
use Novel\Tokens\Base\AbstractTreeToken;


class ConstValueToken extends AbstractTreeToken implements IConstValueToken
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
	
	/**
	 * @param mixed $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
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