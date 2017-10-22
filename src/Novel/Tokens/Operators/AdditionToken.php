<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\IAdditionToken;


class AdditionToken extends AbstractOperatorToken implements IAdditionToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::ADDITION);
	}
}