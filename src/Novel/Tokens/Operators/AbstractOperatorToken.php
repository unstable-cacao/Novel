<?php
namespace Novel\Tokens\Operators;


use Novel\Tokens\Base\IOperatorToken;
use Novel\Tokens\Base\AbstractSimpleToken;


class AbstractOperatorToken extends AbstractSimpleToken implements IOperatorToken
{
	public function getOperator(): string
	{
		return $this->name();
	}
}