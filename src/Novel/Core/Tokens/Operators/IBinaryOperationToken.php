<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface IBinaryOperationToken extends ISingleOperatorToken
{
	public function setOperands($left, $right);
	public function setLeftSide($left): void;
	public function setRightSide($right): void;
	
	public function getLeftOperand(): IToken;
	public function getRightOperand(): IToken;
}