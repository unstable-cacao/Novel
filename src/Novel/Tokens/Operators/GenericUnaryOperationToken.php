<?php
namespace Novel\Tokens\Operators;


use Novel\Core\IToken;
use Novel\Core\Tokens\Operators\IUnaryOperationToken;


class GenericUnaryOperationToken extends AbstractSingleOperatorToken implements IUnaryOperationToken
{
	/** @var IToken */
	private $target;
	
	
	public function setOperand(IToken $target): void
	{
		$this->target = $target;
	}

	public function getOperand(): IToken
	{
		return $this->target;
	}
}