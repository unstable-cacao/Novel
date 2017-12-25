<?php
namespace Novel\Tokens\Operators;


use Novel\Core\Tokens\Operators\IInstanceResolutionOperatorToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Consts\Symbols\OperatorNames;


class StaticResolutionOperatorToken extends AbstractChildlessToken implements IInstanceResolutionOperatorToken
{
	public function getOperator(): string
	{
		return OperatorNames::STATIC_SCOPE;
	}
}