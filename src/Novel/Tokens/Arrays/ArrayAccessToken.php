<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IArrayAccessToken;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Tokens\Base\AbstractToken;


class ArrayAccessToken extends AbstractToken implements IArrayAccessToken
{
	/** @var IValueExpression */
	private $target;
	
	/** @var IValueExpression */
	private $key;
	
	
	public function setTarget(IValueExpression $value): void
	{
		$value->setParent($this);
		$this->target = $value;
	}
	
	public function getTarget(): IValueExpression
	{
		return $this->target;
	}
	
	public function setKey(IValueExpression $key): void
	{
		$key->setParent($this);
		$this->key = $key;
	}
	
	public function getKey(): IValueExpression
	{
		return $this->key;
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
			$this->target,
			$this->key
		];
	}
}