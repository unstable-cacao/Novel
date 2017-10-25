<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IKeyValueToken;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\ConstValueToken;


class KeyValueToken extends AbstractToken implements IKeyValueToken
{
	/** @var IValueExpression */
	private $key;
	
	/** @var IValueExpression */
	private $value;
	
	
	public function getKey(): IValueExpression
	{
		return $this->key;
	}
	
	/**
	 * @param IValueExpression|string|int $exp
	 */
	public function setKey($exp): void
	{
		if (!($exp instanceof IValueExpression))
		{
			if (!is_string($exp) && !is_int($exp))
				throw new \Exception("Key can be of type int, string or instance of IValueExpression only");
			
			$this->key = new ConstValueToken($exp);
		}
		else
		{
			$this->key = $exp;
		}
		
		$this->key->setParent($this);
	}
	
	public function getValue(): IValueExpression
	{
		return $this->value;
	}
	
	/**
	 * @param IValueExpression|mixed $exp
	 */
	public function setValue($exp): void
	{
		if (!($exp instanceof IValueExpression))
		{
			$this->value = new ConstValueToken($exp);
		}
		else
		{
			$this->value = $exp;
		}
		
		$this->value->setParent($this);
	}
	
	/**
	 * @param IValueExpression|string|int $key
	 * @param IValueExpression|mixed $val
	 */
	public function set($key, $val): void
	{
		$this->setKey($key);
		$this->setValue($val);
	}
	
	public function count(): int
	{
		return 2;
	}
	
	public function hasChildren(): bool
	{
		return true;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [
			$this->key,
			$this->value
		];
	}
}