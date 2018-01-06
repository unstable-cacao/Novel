<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface ITernaryOperationToken extends IToken
{
	public function setOperands($first, $second, $right);
	
	public function getFirstOperand(): IToken;
	public function getSecondOperand(): IToken;
	public function getThirdOperand(): IToken;
}