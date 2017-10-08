<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;


class ModuloIdent implements IIdent
{
	public function name()
	{
		return OperatorNames::MODULO;
	}
}