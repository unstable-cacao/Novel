<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface IOperator extends IToken
{
	public function getOperator(): string;
}