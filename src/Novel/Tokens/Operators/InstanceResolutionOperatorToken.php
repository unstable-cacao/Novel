<?php
namespace Novel\Tokens\Operators;


use Novel\Core\Tokens\Operators\IInstanceResolutionOperatorTokenToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Consts\Symbols\OperatorNames;


class InstanceResolutionOperatorToken extends AbstractChildlessToken implements IInstanceResolutionOperatorTokenToken
{
	public function getOperator(): string
	{
		return OperatorNames::ARROW;
	}
}