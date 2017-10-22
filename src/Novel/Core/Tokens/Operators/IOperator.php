<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\Tokens\Expressions\IExpression;


interface IOperator extends IExpression
{
	public function getOperator(): string;
}