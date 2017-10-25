<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IPushElementOperation;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Tokens\Base\AbstractToken;


class PushElementOperation extends AbstractToken implements IPushElementOperation
{
	/** @var IValueExpression */
	private $target;
	
	/** @var IValueExpression */
	private $value;
	
	
	public function setTarget(IValueExpression $valueExpression): void
	{
		$valueExpression->setParent($this);
		$this->target = $valueExpression;
	}
	
	public function getTarget(): IValueExpression
	{
		return $this->target;
	}
	
	public function setValue(IValueExpression $valueExpression): void
	{
		$valueExpression->setParent($this);
		$this->value = $valueExpression;
	}
	
	public function getValue(): IValueExpression
	{
		return $this->value;
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
			$this->value
		];
	}
}