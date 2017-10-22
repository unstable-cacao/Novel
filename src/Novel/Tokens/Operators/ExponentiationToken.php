<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\IExponentiationToken;


class ExponentiationToken extends AbstractOperatorToken implements IExponentiationToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::EXPONENTIATION);
	}
}