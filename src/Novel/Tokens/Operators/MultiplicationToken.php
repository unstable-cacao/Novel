<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;


class MultiplicationToken extends AbstractOperatorToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::MULTIPLICATION);
	}
}