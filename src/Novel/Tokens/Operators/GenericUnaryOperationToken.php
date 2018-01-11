<?php
namespace Novel\Tokens\Operators;


use Novel\Core\IToken;
use Novel\Core\Tokens\Operators\IUnaryOperationToken;


class GenericUnaryOperationToken extends AbstractSingleOperatorToken implements IUnaryOperationToken
{
	/** @var IToken */
	private $target;
	
	/** @var bool */
	private $isLeft = true;
	
	
	public function setOperand(IToken $target): void
	{
		$this->target = $target;
	}

	public function getOperand(): IToken
	{
		return $this->target;
	}
	
	public function isLeft(): bool
	{
		return $this->isLeft;
	}
	
	public function setIsLeft(bool $isLeft): void
	{
		$this->isLeft = $isLeft;
	}
}