<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;


class ConcatenationIdent implements IIdent
{
	public function name()
	{
		return OperatorNames::CONCATENATION;
	}
}