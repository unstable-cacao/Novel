<?php
namespace Novel\Tokens\Operators;


use Novel\Core\Tokens\Operators\IStaticResolutionOperatorTokenToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Consts\Symbols\OperatorNames;


class StaticResolutionOperatorToken extends AbstractChildlessToken implements IStaticResolutionOperatorTokenToken
{
	public function getOperator(): string
	{
		return OperatorNames::STATIC_SCOPE;
	}
}