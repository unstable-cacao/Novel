<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IArrayUnwrapToken;
use Novel\Tokens\Base\AbstractSingleChildToken;


class ArrayUnwrapToken extends AbstractSingleChildToken implements IArrayUnwrapToken
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
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->target];
	}
}