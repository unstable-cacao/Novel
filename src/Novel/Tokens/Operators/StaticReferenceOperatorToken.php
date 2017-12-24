<?php

namespace Novel\Tokens\Operators;


use Novel\Consts\Symbols\OperatorNames;
use Novel\Core\Tokens\Operators\IInstanceReferenceOperatorToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class StaticReferenceOperatorToken extends AbstractChildlessToken implements IInstanceReferenceOperatorToken
{
	public function getOperator(): string
	{
		return OperatorNames::STATIC_SCOPE;
	}
}