<?php
namespace Novel\Tokens\Operators;


use Novel\Tokens\Base\IOperatorToken;
use Novel\Tokens\Base\AbstractChildlessToken;


abstract class AbstractOperatorToken extends AbstractChildlessToken implements IOperatorToken
{
	public function getOperator(): string
	{
		return $this->name();
	}
}