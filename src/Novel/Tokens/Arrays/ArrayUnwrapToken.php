<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IArrayUnwrapToken;
use Novel\Tokens\Base\AbstractToken;


class ArrayUnwrapToken extends AbstractToken implements IArrayUnwrapToken
{
	/** @var IToken */
	private $target;
	
	
	public function setTarget(IToken $target): void
	{
		$target->setParent($this);
		$this->target = $target;
	}
	
	public function getTarget(): ?IToken
	{
		return $this->target;
	}
	
	public function count(): int
	{
		return $this->target ? 1 : 0;
	}
	
	public function hasChildren(): bool
	{
		return $this->target ? true : false;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->target];
	}
}