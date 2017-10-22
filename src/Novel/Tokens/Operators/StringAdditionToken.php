<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\IStringAdditionToken;


class StringAdditionToken extends AbstractOperatorToken implements IStringAdditionToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::STRING_ADDITION);
	}
}