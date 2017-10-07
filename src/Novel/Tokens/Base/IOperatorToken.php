<?php
namespace Novel\Tokens\Base;


interface IOperatorToken extends IExpressionToken
{
	public function getOperator(): string;
}