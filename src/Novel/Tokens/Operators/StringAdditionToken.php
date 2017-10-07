<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;


class StringAdditionToken extends AbstractOperatorToken
{
	public function __construct($name)
	{
		parent::__construct(BinaryOperatorNames::STRING_ADDITION);
	}
}