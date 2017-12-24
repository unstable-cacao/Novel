<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IArrayAccessToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Tokens\Base\AbstractToken;


class ArrayAccessToken extends AbstractToken implements IArrayAccessToken
{
	/** @var IValueExpressionToken */
	private $target;
	
	/** @var IValueExpressionToken */
	private $key;
	
	
	public function setTarget(IValueExpressionToken $value): void
	{
		$value->setParent($this);
		$this->target = $value;
	}
	
	public function getTarget(): IValueExpressionToken
	{
		return $this->target;
	}
	
	public function setKey(IValueExpressionToken $key): void
	{
		$key->setParent($this);
		$this->key = $key;
	}
	
	public function getKey(): IValueExpressionToken
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