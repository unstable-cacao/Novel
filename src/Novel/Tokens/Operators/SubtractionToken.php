<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\ISubtractionToken;


class SubtractionToken extends AbstractOperatorToken implements ISubtractionToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::SUBTRACTION);
	}
}