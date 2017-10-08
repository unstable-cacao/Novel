<?php
namespace Novel\Idents\ComparisonOperator;


use Novel\Consts\Idents\ComparisonOperatorNames;
use Novel\Core\IIdent;


class LessThanIdent implements IIdent
{
	public function name()
	{
		return ComparisonOperatorNames::LESS_THAN;
	}
}