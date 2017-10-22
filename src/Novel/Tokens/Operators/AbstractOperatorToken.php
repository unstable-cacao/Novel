<?php
namespace Novel\Tokens\Operators;


use Novel\Core\Tokens\Operators\IOperator;
use Novel\Tokens\Base\AbstractChildlessToken;


abstract class AbstractOperatorToken extends AbstractChildlessToken implements IOperator
{
	public function getOperator(): string
	{
		return $this->name();
	}
}