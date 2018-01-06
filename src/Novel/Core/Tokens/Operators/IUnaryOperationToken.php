<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface IUnaryOperationToken extends ISingleOperatorToken
{
	public function setOperand(IToken $target): void;
	public function getOperand(): IToken;
}