<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;


class SubtractionIdent implements IIdent
{
	public function name()
	{
		return OperatorNames::SUBTRACTION;
	}
}