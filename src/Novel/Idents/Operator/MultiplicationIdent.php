<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;


class MultiplicationIdent implements IIdent
{
	public function name()
	{
		return OperatorNames::MULTIPLICATION;
	}
}