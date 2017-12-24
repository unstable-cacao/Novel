<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IPushElementOperation;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Tokens\Base\AbstractToken;


class PushElementOperation extends AbstractToken implements IPushElementOperation
{
	/** @var IValueExpressionToken */
	private $target;
	
	/** @var IValueExpressionToken */
	private $value;
	
	
	public function setTarget(IValueExpressionToken $valueExpression): void
	{
		$valueExpression->setParent($this);
		$this->target = $valueExpression;
	}
	
	public function getTarget(): IValueExpressionToken
	{
		return $this->target;
	}
	
	public function setValue(IValueExpressionToken $valueExpression): void
	{
		$valueExpression->setParent($this);
		$this->value = $valueExpression;
	}
	
	public function getValue(): IValueExpressionToken
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