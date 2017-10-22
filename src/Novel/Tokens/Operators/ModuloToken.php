<?php
namespace Novel\Tokens\Operators;


use Novel\Consts\Tokens\BinaryOperatorNames;
use Novel\Core\Tokens\Operators\IModuloToken;


class ModuloToken extends AbstractOperatorToken implements IModuloToken
{
	public function __construct()
	{
		parent::__construct(BinaryOperatorNames::MODULO);
	}
}