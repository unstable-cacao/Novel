<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;


class EqualIdent implements IIdent
{
	public function name()
	{
		return OperatorNames::EQUAL;
	}
}