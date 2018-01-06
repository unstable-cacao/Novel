<?php
namespace Novel\Tokens\Operators;


use Novel\Core\IToken;
use Novel\Core\Tokens\Operators\IBinaryOperationToken;
use Novel\Tokens\Consts\ConstValueToken;


class GenericBinaryOperation extends AbstractSingleOperatorToken implements IBinaryOperationToken
{
	/** @var IToken */
	private $left;
	
	/** @var IToken */
	private $right;
	
	
	public function setOperands($left, $right)
	{
		$this->setLeftSide($left);
		$this->setRightSide($right);
	}

	public function setLeftSide($left): void
	{
		$this->left = ConstValueToken::toToken($left);
	}

	public function setRightSide($right): void
	{
		$this->right = ConstValueToken::toToken($right);
	}

	public function getLeftOperand(): IToken
	{
		return $this->left;
	}

	public function getRightOperand(): IToken
	{
		return $this->right;
	}
}