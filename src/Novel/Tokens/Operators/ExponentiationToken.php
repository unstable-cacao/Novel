<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;


class ExponentiationToken extends AbstractOperatorToken
{
	public function __construct($name)
	{
		parent::__construct(BinaryOperatorNames::EXPONENTIATION);
	}
}