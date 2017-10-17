<?php
namespace Novel\Tokens\Operators;


use Novel\Tokens\Base\IOperatorToken;
use Novel\Tokens\Base\AbstractToken;


class AbstractOperatorToken extends AbstractToken implements IOperatorToken
{
	public function getOperator(): string
	{
		return $this->name();
	}
}