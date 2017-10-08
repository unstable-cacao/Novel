<?php
namespace Novel\Idents\ComparisonOperator;


use Novel\Consts\Idents\ComparisonOperatorNames;
use Novel\Core\IIdent;


class IdenticalIdent implements IIdent
{
	public function name()
	{
		return ComparisonOperatorNames::IDENTICAL;
	}
}