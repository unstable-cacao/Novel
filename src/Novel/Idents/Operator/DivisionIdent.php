<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;


class DivisionIdent implements IIdent
{
	public function name()
	{
		return OperatorNames::DIVISION;
	}
}