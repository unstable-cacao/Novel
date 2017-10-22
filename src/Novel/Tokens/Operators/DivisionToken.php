<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\IDivisionToken;


class DivisionToken extends AbstractOperatorToken implements IDivisionToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::DIVISION);
	}
}