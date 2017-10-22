<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\IMultiplicationToken;


class MultiplicationToken extends AbstractOperatorToken implements IMultiplicationToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::MULTIPLICATION);
	}
}