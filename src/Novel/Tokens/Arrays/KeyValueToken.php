<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IKeyValueToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\ConstValueToken;


class KeyValueToken extends AbstractToken implements IKeyValueToken
{
	/** @var IValueExpressionToken */
	private $key;
	
	/** @var IValueExpressionToken */
	private $value;
	
	
	public function getKey(): IValueExpressionToken
	{
		return $this->key;
	}
	
	/**
	 * @param IValueExpressionToken|string|int $exp
	 */
	public function setKey($exp): void
	{
		if (!($exp instanceof IValueExpressionToken))
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
	
	public function getValue(): IValueExpressionToken
	{
		return $this->value;
	}
	
	/**
	 * @param IValueExpressionToken|mixed $exp
	 */
	public function setValue($exp): void
	{
		if (!($exp instanceof IValueExpressionToken))
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
	 * @param IValueExpressionToken|string|int $key
	 * @param IValueExpressionToken|mixed $val
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